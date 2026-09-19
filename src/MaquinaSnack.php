<?php

namespace App;

use InvalidArgumentException;

class MaquinaSnack
{
  private int $estoque = 0;
  private float $credito = 0;

  public function __construct(
    public string $produto,
    private float $preco
  ) {
    if ($preco <= 0) {
      throw new InvalidArgumentException("O preço deve ser maior que zero.");
    }
  }

  public function reabastecer(int $quantidade): bool
  {
    if ($quantidade <= 0) {
      throw new InvalidArgumentException("A quantidade deve ser maior que zero.");
    }

    $this->estoque += $quantidade;

    return true;
  }

  public function inserirCredito(float $valor): bool
  {
    if ($valor <= 0) {
      throw new InvalidArgumentException("O valor do crédito deve ser maior que zero.");
    }

    $this->credito += $valor;

    return true;
  }

  public function comprar(): bool
  {
    if ($this->estoque <= 0) {
      return false;
    }

    if ($this->credito < $this->preco) {
      return false;
    }

    $this->estoque--;
    $this->credito -= $this->preco;

    return true;
  }

  public function devolverCredito(): float
  {
    $valor = $this->credito;
    $this->credito = 0;

    return $valor;
  }

  public function status(): string
  {
    return "Produto: {$this->produto}\n"
      . "Preço: R$ {$this->preco}\n"
      . "Estoque: {$this->estoque}\n"
      . "Crédito: R$ {$this->credito}\n";
  }
}
