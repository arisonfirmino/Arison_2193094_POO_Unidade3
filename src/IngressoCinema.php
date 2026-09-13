<?php

namespace App;

use InvalidArgumentException;

class IngressoCinema
{
  public function __construct(
    public string $filme,
    private float $precoBase,
    private bool $meiaEntrada
  ) {
    if ($precoBase <= 0) {
      throw new InvalidArgumentException("O preço base deve ser maior que zero.");
    }
  }

  public function calcularValorFinal(): float
  {
    if ($this->meiaEntrada) {
      return $this->precoBase - ($this->precoBase * (50 / 100));
    }

    return $this->precoBase;
  }

  public function definirMeiaEntrada(bool $possuiDireito): void
  {
    $this->meiaEntrada = $possuiDireito;
  }

  public function resumo(): string
  {
    return "Filme: {$this->filme}\n"
      . "Tipo do ingresso: " . ($this->meiaEntrada ? "Meia-entrada" : "Inteiro") . "\n"
      . "Valor final: R$ " . $this->calcularValorFinal() . "\n";
  }
}
