<?php

namespace App;

use InvalidArgumentException;

class CofrinhoMeta
{
  public function __construct(
    public string $objetivo,
    private float $saldo,
    private float $meta
  ) {
    if ($saldo < 0) {
      throw new InvalidArgumentException("O saldo não pode ser negativo.");
    }

    if ($meta <= 0) {
      throw new InvalidArgumentException("A meta deve ser maior que zero.");
    }
  }

  public function depositar(float $valor): bool
  {
    if ($valor <= 0) {
      throw new InvalidArgumentException("O valor do depósito deve ser maior que zero.");
    }

    $this->saldo += $valor;

    return true;
  }

  public function retirar(float $valor): bool
  {
    if ($valor <= 0) {
      throw new InvalidArgumentException("O valor da retirada deve ser maior que zero.");
    }

    if ($valor > $this->saldo) {
      return false;
    }

    $this->saldo -= $valor;

    return true;
  }

  public function percentualDaMeta(): float
  {
    return ($this->saldo / $this->meta) * 100;
  }

  public function metaAtingida(): bool
  {
    return $this->saldo >= $this->meta;
  }

  public function resumo(): string
  {
    return "Objetivo: {$this->objetivo}\n"
      . "Saldo: R$ {$this->saldo}\n"
      . "Meta: R$ {$this->meta}\n"
      . "Progresso: {$this->percentualDaMeta()}%\n";
  }
}
