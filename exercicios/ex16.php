<?php

require_once __DIR__ . '/../src/PacoteEntrega.php';

use App\PacoteEntrega;

echo PHP_EOL;

echo "=== Exercício 16 - Pacote em rota de entrega ===" . PHP_EOL . PHP_EOL;

try {
  // pacote 1
  echo "=== Pacote 1 ===" . PHP_EOL . PHP_EOL;

  $pacote1 = new PacoteEntrega("WASD-001", "Avenida Hygino Muzzy Filho, 1001");

  echo $pacote1->statusAtual() . PHP_EOL;

  if ($pacote1->sairParaEntrega()) {
    echo "Pacote saiu para entrega." . PHP_EOL . PHP_EOL;
  }

  if ($pacote1->confirmarEntrega()) {
    echo "Entrega confirmada." . PHP_EOL . PHP_EOL;
  }

  echo $pacote1->statusAtual() . PHP_EOL;

  // nova saída após entrega
  echo "Nova saída..." . PHP_EOL . PHP_EOL;

  if (!$pacote1->sairParaEntrega()) {
    echo "Saída bloqueada." . PHP_EOL . PHP_EOL;
  }

  // pacote 2
  echo "=== Pacote 2 ===" . PHP_EOL . PHP_EOL;

  $pacote2 = new PacoteEntrega("WASD-002", "Avenida Hygino Muzzy Filho, 1001");

  echo $pacote2->statusAtual() . PHP_EOL;

  for ($i = 1; $i <= 3; $i++) {
    echo "Tentativa {$i}:" . PHP_EOL . PHP_EOL;

    if ($pacote2->sairParaEntrega()) {
      echo "Pacote saiu para entrega." . PHP_EOL . PHP_EOL;
    }

    if ($pacote2->registrarFalha()) {
      echo "Falha registrada." . PHP_EOL . PHP_EOL;
    }

    echo $pacote2->statusAtual() . PHP_EOL;
  }

  if (!$pacote2->sairParaEntrega()) {
    echo "Quarta tentativa bloqueada." . PHP_EOL;
  }

  echo PHP_EOL . "Status final:" . PHP_EOL . PHP_EOL;
  echo $pacote2->statusAtual();
} catch (InvalidArgumentException $erro) {
  echo "Erro: " . $erro->getMessage() . PHP_EOL;
}

echo PHP_EOL;
