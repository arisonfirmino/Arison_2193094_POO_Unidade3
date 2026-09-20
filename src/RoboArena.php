<?php

namespace App;

use InvalidArgumentException;

class RoboArena
{
  private int $energia;
  private int $integridade;
  private int $pontuacao;

  public function __construct(
    public string $nome,
    private int $energiaMaxima,
    private int $integridadeMaxima,
    int $energia,
    int $integridade,
    int $pontuacao = 0
  ) {
    if ($energiaMaxima <= 0) {
      throw new InvalidArgumentException("A energia máxima deve ser maior que zero.");
    }

    if ($integridadeMaxima <= 0) {
      throw new InvalidArgumentException("A integridade máxima deve ser maior que zero.");
    }

    if ($energia < 0 || $energia > $energiaMaxima) {
      throw new InvalidArgumentException("A energia deve estar entre 0 e o máximo definido.");
    }

    if ($integridade < 0 || $integridade > $integridadeMaxima) {
      throw new InvalidArgumentException("A integridade deve estar entre 0 e o máximo definido.");
    }

    if ($pontuacao < 0) {
      throw new InvalidArgumentException("A pontuação não pode ser negativa.");
    }

    $this->energia = $energia;
    $this->integridade = $integridade;
    $this->pontuacao = $pontuacao;
  }

  public function treinar(): bool
  {
    if ($this->energia < 10) {
      return false;
    }

    $this->energia -= 10;
    $this->pontuacao += 10;

    return true;
  }

  public function combater(): bool
  {
    if ($this->energia < 20) {
      return false;
    }

    if ($this->integridade === 0) {
      return false;
    }

    $this->energia -= 20;
    $this->integridade -= 10;

    if ($this->integridade < 0) {
      $this->integridade = 0;
    }

    $this->pontuacao += 20;

    return true;
  }

  public function recarregar(int $quantidade): int
  {
    if ($quantidade <= 0) {
      throw new InvalidArgumentException("A quantidade de recarga deve ser maior que zero.");
    }

    $energiaAnterior = $this->energia;

    $this->energia += $quantidade;

    if ($this->energia > $this->energiaMaxima) {
      $this->energia = $this->energiaMaxima;
    }

    return $this->energia - $energiaAnterior;
  }

  public function reparar(int $quantidade): int
  {
    if ($quantidade <= 0) {
      throw new InvalidArgumentException("A quantidade de reparo deve ser maior que zero.");
    }

    $integridadeAnterior = $this->integridade;

    $this->integridade += $quantidade;

    if ($this->integridade > $this->integridadeMaxima) {
      $this->integridade = $this->integridadeMaxima;
    }

    return $this->integridade - $integridadeAnterior;
  }

  public function status(): string
  {
    return "Nome: {$this->nome}\n"
      . "Energia: {$this->energia}/{$this->energiaMaxima}\n"
      . "Integridade: {$this->integridade}/{$this->integridadeMaxima}\n"
      . "Pontuação: {$this->pontuacao}\n";
  }
}
