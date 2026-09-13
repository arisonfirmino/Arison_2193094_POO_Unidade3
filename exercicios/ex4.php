<?php

require_once __DIR__ . '/../src/CronometroTreino.php';

use App\CronometroTreino;

echo PHP_EOL;

echo "=== Exercício 4 - Cronômetro de treino ===" . PHP_EOL . PHP_EOL;

try {
  $cronometro = new CronometroTreino("Corrida");

  // adiciona 60 segundos
  $cronometro->adicionarTempo(60);

  // adiciona 120 segundos
  $cronometro->adicionarTempo(120);

  // adiciona 30 segundos
  $cronometro->adicionarTempo(30);

  echo $cronometro->formatarTempo() . PHP_EOL . PHP_EOL;

  echo "Zerando cronometro..." . PHP_EOL . PHP_EOL;

  $cronometro->zerar();

  echo $cronometro->formatarTempo() . PHP_EOL . PHP_EOL;
} catch (InvalidArgumentException $erro) {
  echo "Erro: " . $erro->getMessage() . PHP_EOL;
}
