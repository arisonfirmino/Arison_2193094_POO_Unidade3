<?php

require_once __DIR__ . '/../src/Semaforo.php';

use App\Semaforo;

echo PHP_EOL;

echo "=== Exercício 7 - Semáforo inteligente ===" . PHP_EOL . PHP_EOL;

try {
  $semaforo = new Semaforo("Avenida Hygino Muzzy Filho");

  for ($i = 1; $i <= 7; $i++) {
    $semaforo->avancar();

    echo "Avanço {$i}:" . PHP_EOL . PHP_EOL;

    echo $semaforo->estado();

    echo "Pode passar?: " . ($semaforo->podePassar() ? "Sim" : "Não") . PHP_EOL;

    echo PHP_EOL;
  }
} catch (InvalidArgumentException $erro) {
  echo "Erro: " . $erro->getMessage() . PHP_EOL;
}
