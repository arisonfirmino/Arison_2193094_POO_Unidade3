<?php

namespace App;

use InvalidArgumentException;

class Hidrometro
{
  public function __construct(
    public string $identificacao,
    private float $leituraAnterior,
    private float $leituraAtual
  ) {
    if ($leituraAnterior < 0 || $leituraAtual < 0) {
      throw new InvalidArgumentException("As leituras não podem ser negativas.");
    }

    if ($leituraAtual < $leituraAnterior) {
      throw new InvalidArgumentException("A leitura atual não pode ser menor que a leitura anterior.");
    }
  }

  public function registrarLeitura(float $novaLeitura): bool
  {
    if ($novaLeitura < 0) {
      throw new InvalidArgumentException("A leitura não pode ser negativa.");
    }

    if ($novaLeitura < $this->leituraAtual) {
      return false;
    }

    $this->leituraAnterior = $this->leituraAtual;
    $this->leituraAtual = $novaLeitura;

    return true;
  }

  public function consumoUltimoPeriodo(): float
  {
    return $this->leituraAtual - $this->leituraAnterior;
  }

  public function estimarConta(float $precoPorM3): float
  {
    if ($precoPorM3 < 0) {
      throw new InvalidArgumentException("O preço por m³ não pode ser negativo.");
    }

    return $this->consumoUltimoPeriodo() * $precoPorM3;
  }

  public function resumo(): string
  {
    return "Identificação: {$this->identificacao}\n"
      . "Leitura anterior: {$this->leituraAnterior} m³\n"
      . "Leitura atual: {$this->leituraAtual} m³\n"
      . "Consumo: {$this->consumoUltimoPeriodo()} m³\n";
  }
}
