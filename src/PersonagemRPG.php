<?php

namespace App;

use InvalidArgumentException;

class PersonagemRPG
{
  public function __construct(
    public string $nome,
    public string $classe,
    private int $vida,
    private int $energia
  ) {
    if ($vida < 0 || $vida > 100) {
      throw new InvalidArgumentException("A vida deve estar entre 0 e 100.");
    }

    if ($energia < 0 || $energia > 100) {
      throw new InvalidArgumentException("A energia deve estar entre 0 e 100.");
    }
  }

  public function receberDano(int $pontos): bool
  {
    if ($pontos <= 0) {
      throw new InvalidArgumentException("O dano deve ser maior que zero.");
    }

    $this->vida -= $pontos;

    if ($this->vida < 0) {
      $this->vida = 0;
    }

    return true;
  }

  public function curar(int $pontos): bool
  {
    if ($pontos <= 0) {
      throw new InvalidArgumentException("A cura deve ser maior que zero.");
    }

    $this->vida += $pontos;

    if ($this->vida > 100) {
      $this->vida = 100;
    }

    return true;
  }

  public function usarHabilidade(int $custoEnergia): bool
  {
    if ($custoEnergia <= 0) {
      throw new InvalidArgumentException("O custo de energia deve ser maior que zero.");
    }

    if ($this->vida === 0) {
      return false;
    }

    if ($this->energia < $custoEnergia) {
      return false;
    }

    $this->energia -= $custoEnergia;

    return true;
  }

  public function descansar(int $pontos): bool
  {
    if ($pontos <= 0) {
      throw new InvalidArgumentException("A recuperação de energia deve ser maior que zero.");
    }

    $this->energia += $pontos;

    if ($this->energia > 100) {
      $this->energia = 100;
    }

    return true;
  }

  public function status(): string
  {
    return "Nome: {$this->nome}\n"
      . "Classe: {$this->classe}\n"
      . "Vida: {$this->vida}\n"
      . "Energia: {$this->energia}\n";
  }
}
