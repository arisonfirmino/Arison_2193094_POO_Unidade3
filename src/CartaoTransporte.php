<?php

namespace App;

use InvalidArgumentException;

class CartaoTransporte
{
  private int $viagensRealizadas;

  public function __construct(
    public string $titular,
    private float $saldo,
    private float $tarifa,
  ) {
    if ($saldo < 0) {
      throw new InvalidArgumentException("");
    }

    if ($tarifa <= 0) {
      throw new InvalidArgumentException("");
    }

    $this->viagensRealizadas = 0;
  }

  public function recarregar(float $valor): bool
  {
    if ($valor < 0) {
      throw new InvalidArgumentException("");
    }

    $this->saldo += $valor;

    return true;
  }

  public function embarcar(): bool
  {
    if ($this->saldo < $this->tarifa) {
      return false;
    }

    $this->saldo -= $this->tarifa;
    $this->viagensRealizadas++;

    return true;
  }

  public function saldoAtual(): float
  {
    return $this->saldo;
  }

  public function viagensRealizadas(): int
  {
    return $this->viagensRealizadas;
  }

  public function resumo(): string
  {
    return "Titular: {$this->titular}\n"
      . "Saldo: R$ {$this->saldoAtual()}\n"
      . "Tarifa: R$ {$this->tarifa}\n"
      . "Viagens realizadas: {$this->viagensRealizadas()}\n";
  }
}
