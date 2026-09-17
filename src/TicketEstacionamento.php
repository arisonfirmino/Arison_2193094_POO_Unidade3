<?php

namespace App;

use InvalidArgumentException;

class TicketEstacionamento
{
  private ?int $saidaMin = null;

  public function __construct(
    public string $placa,
    private int $entradaMin,
    private float $tarifaHora
  ) {
    if ($tarifaHora <= 0) {
      throw new InvalidArgumentException(" tarifa por hora deve ser maior que zero.");
    }

    $this->saidaMin = null;
  }

  public function registrarSaida(int $minuto): bool
  {
    if ($this->saidaMin !== null) {
      throw new InvalidArgumentException("A saída já foi registrada.");
    }

    if ($minuto <= $this->entradaMin) {
      throw new InvalidArgumentException("O horário de saída deve ser posterior ao horário de entrada.");
    }

    $this->saidaMin = $minuto;

    return true;
  }

  public function duracaoMin(): int
  {
    if ($this->saidaMin === null) {
      return 0;
    }

    return $this->saidaMin - $this->entradaMin;
  }

  public function valorAPagar(): float
  {
    $duracao = $this->duracaoMin();

    if ($duracao == 0) {
      return 0;
    }

    $horas = 0;

    for ($minutos = $duracao; $minutos > 0; $minutos -= 60) {
      $horas++;
    }

    return $horas * $this->tarifaHora;
  }

  public function resumo(): string
  {
    return "Placa: {$this->placa}\n"
      . "Duração: {$this->duracaoMin()} minutos\n"
      . "Valor: R$ " . $this->valorAPagar() . "\n";
  }
}
