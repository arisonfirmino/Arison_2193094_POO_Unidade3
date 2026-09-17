<?php

namespace App;

class Semaforo
{
  private string $cor = "Vermelho";
  private int $ciclosCompletos = 0;

  public function __construct(
    public string $local
  ) {}

  public function avancar(): void
  {
    if ($this->cor === "Vermelho") {
      $this->cor = "Verde";
    } elseif ($this->cor === "Verde") {
      $this->cor = "Amarelo";
    } else {
      $this->cor = "Vermelho";
      $this->ciclosCompletos++;
    }
  }

  public function podePassar(): bool
  {
    return $this->cor === "Verde";
  }

  public function estado(): string
  {
    return "Local: {$this->local}\n"
      . "Cor atual: {$this->cor}\n"
      . "Ciclos completos: {$this->ciclosCompletos}\n";
  }
}
