<?php

namespace App;

use InvalidArgumentException;

class CronometroTreino
{
  private int $segundosAcumulados = 0;

  public function __construct(
    public string $atividade,
  ) {}

  public function adicionarTempo(int $segundos): bool
  {
    if ($segundos <= 0) {
      throw new InvalidArgumentException("O tempo adicionado deve ser maior que zero.");
    }

    $this->segundosAcumulados += $segundos;

    return true;
  }

  public function zerar(): void
  {
    $this->segundosAcumulados = 0;
  }

  public function totalMinutos(): float
  {
    return $this->segundosAcumulados / 60;
  }

  public function formatarTempo(): string
  {
    $horas = 0;
    $minutos = 0;
    $segundos = $this->segundosAcumulados;

    while ($segundos >= 3600) {
      $horas++;
      $segundos -= 3600;
    }

    while ($segundos >= 60) {
      $minutos++;
      $segundos -= 60;
    }

    if ($horas < 10) {
      $horas = "0" . $horas;
    }

    if ($minutos < 10) {
      $minutos = "0" . $minutos;
    }

    if ($segundos < 10) {
      $segundos = "0" . $segundos;
    }

    return $horas . ":" . $minutos . ":" . $segundos;
  }
}
