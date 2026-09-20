<?php

namespace App;

use InvalidArgumentException;

class SobrevivenciaMarte
{
  private int $vida;
  private int $energia;
  private int $oxigenio;
  private int $cargasOxigenio;

  public function __construct(
    public string $astronauta,
    private int $vidaMaxima,
    private int $energiaMaxima,
    private int $oxigenioMaximo,
    int $vida,
    int $energia,
    int $oxigenio,
    int $cargasOxigenio
  ) {
    if ($vidaMaxima <= 0 || $energiaMaxima <= 0 || $oxigenioMaximo <= 0) {
      throw new InvalidArgumentException("Os valores máximos devem ser maiores que zero.");
    }

    if ($vida < 0 || $vida > $vidaMaxima) {
      throw new InvalidArgumentException("A vida deve estar entre 0 e o máximo definido.");
    }

    if ($energia < 0 || $energia > $energiaMaxima) {
      throw new InvalidArgumentException("A energia deve estar entre 0 e o máximo definido.");
    }

    if ($oxigenio < 0 || $oxigenio > $oxigenioMaximo) {
      throw new InvalidArgumentException("O oxigênio deve estar entre 0 e o máximo definido.");
    }

    if ($cargasOxigenio < 0) {
      throw new InvalidArgumentException("A quantidade de cargas não pode ser negativa.");
    }

    $this->vida = $vida;
    $this->energia = $energia;
    $this->oxigenio = $oxigenio;
    $this->cargasOxigenio = $cargasOxigenio;
  }

  public function explorar(int $minutos): bool
  {
    if ($minutos <= 0) {
      throw new InvalidArgumentException("O tempo de exploração deve ser maior que zero.");
    }

    if ($this->vida === 0 || $this->oxigenio === 0) {
      return false;
    }

    $energiaNecessaria = $minutos;
    $oxigenioNecessario = $minutos;

    if ($this->energia < $energiaNecessaria) {
      return false;
    }

    if ($this->oxigenio < $oxigenioNecessario) {
      return false;
    }

    $this->energia -= $energiaNecessaria;
    $this->oxigenio -= $oxigenioNecessario;

    return true;
  }

  public function descansar(int $pontos): bool
  {
    if ($pontos <= 0) {
      throw new InvalidArgumentException("A quantidade de recuperação deve ser maior que zero.");
    }

    if ($this->vida === 0) {
      return false;
    }

    $this->energia += $pontos;

    if ($this->energia > $this->energiaMaxima) {
      $this->energia = $this->energiaMaxima;
    }

    return true;
  }

  public function alimentar(int $pontos): bool
  {
    if ($pontos <= 0) {
      throw new InvalidArgumentException("A quantidade de recuperação deve ser maior que zero.");
    }

    if ($this->vida === 0) {
      return false;
    }

    $this->vida += $pontos;

    if ($this->vida > $this->vidaMaxima) {
      $this->vida = $this->vidaMaxima;
    }

    return true;
  }

  public function usarCilindro(): bool
  {
    if ($this->cargasOxigenio <= 0) {
      return false;
    }

    if ($this->oxigenio === $this->oxigenioMaximo) {
      return false;
    }

    $this->oxigenio = $this->oxigenioMaximo;
    $this->cargasOxigenio--;

    return true;
  }

  public function estaCritico(): bool
  {
    return $this->vida === 0 || $this->oxigenio === 0;
  }

  public function status(): string
  {
    return "Astronauta: {$this->astronauta}\n"
      . "Vida: {$this->vida}/{$this->vidaMaxima}\n"
      . "Energia: {$this->energia}/{$this->energiaMaxima}\n"
      . "Oxigênio: {$this->oxigenio}/{$this->oxigenioMaximo}\n"
      . "Cargas de oxigênio: {$this->cargasOxigenio}\n"
      . "Situação: " . ($this->estaCritico() ? "Crítica" : "Estável") . "\n";
  }
}
