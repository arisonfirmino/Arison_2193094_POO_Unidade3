<?php

namespace App;

use InvalidArgumentException;

class PacoteEntrega
{
  private string $status = "aguardando";
  private int $tentativas = 0;

  public function __construct(
    public string $codigo,
    public string $destino
  ) {}

  public function sairParaEntrega(): bool
  {
    if ($this->status !== "aguardando") {
      return false;
    }

    if ($this->tentativas >= 3) {
      return false;
    }

    $this->tentativas++;
    $this->status = "em rota";

    return true;
  }

  public function registrarFalha(): bool
  {
    if ($this->status !== "em rota") {
      return false;
    }

    if ($this->tentativas >= 3) {
      $this->status = "devolução";
    } else {
      $this->status = "aguardando";
    }

    return true;
  }

  public function confirmarEntrega(): bool
  {
    if ($this->status !== "em rota") {
      return false;
    }

    $this->status = "entregue";

    return true;
  }

  public function statusAtual(): string
  {
    return "Código: {$this->codigo}\n"
      . "Destino: {$this->destino}\n"
      . "Status: {$this->status}\n"
      . "Tentativas: {$this->tentativas}\n";
  }
}
