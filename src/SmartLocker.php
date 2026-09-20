<?php

namespace App;

use InvalidArgumentException;

class SmartLocker
{
  private bool $ocupado = false;
  private ?string $identificacaoEncomenda = null;
  private ?int $codigoRetirada = null;
  private int $tentativasIncorretas = 0;
  private bool $bloqueado = false;

  public function __construct(
    public string $compartimento
  ) {}

  public function depositar(string $identificacaoEncomenda, int $codigoRetirada): bool
  {
    if ($this->ocupado) {
      return false;
    }

    if ($this->bloqueado) {
      return false;
    }

    if ($identificacaoEncomenda === "") {
      throw new InvalidArgumentException("A identificação da encomenda não pode ser vazia.");
    }

    if ($codigoRetirada < 0) {
      throw new InvalidArgumentException("O código de retirada não pode ser negativo.");
    }

    $this->identificacaoEncomenda = $identificacaoEncomenda;
    $this->codigoRetirada = $codigoRetirada;
    $this->ocupado = true;
    $this->tentativasIncorretas = 0;

    return true;
  }

  public function retirar(int $codigo): bool
  {
    if (!$this->ocupado) {
      return false;
    }

    if ($this->bloqueado) {
      return false;
    }

    if ($codigo !== $this->codigoRetirada) {
      $this->tentativasIncorretas++;

      if ($this->tentativasIncorretas >= 3) {
        $this->bloqueado = true;
      }

      return false;
    }

    $this->ocupado = false;
    $this->identificacaoEncomenda = null;
    $this->codigoRetirada = null;
    $this->tentativasIncorretas = 0;

    return true;
  }

  public function redefinir(): void
  {
    $this->bloqueado = false;
    $this->tentativasIncorretas = 0;
  }

  public function status(): string
  {
    if ($this->bloqueado) {
      $estado = "Bloqueado";
    } elseif ($this->ocupado) {
      $estado = "Ocupado";
    } else {
      $estado = "Livre";
    }

    return "Compartimento: {$this->compartimento}\n"
      . "Estado: {$estado}\n"
      . "Tentativas incorretas: {$this->tentativasIncorretas}\n";
  }
}
