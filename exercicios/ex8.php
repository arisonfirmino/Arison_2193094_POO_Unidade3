<?php

require_once __DIR__ . '/../src/LampadaInteligente.php';

use App\LampadaInteligente;

echo PHP_EOL;

echo "=== Exercício 8 - Lâmpada inteligente ===" . PHP_EOL . PHP_EOL;

try {
  // lâmpada 1
  $lampada1 = new LampadaInteligente("Quarto");

  echo "Lâmpada 1 - Status inicial:" . PHP_EOL . PHP_EOL;

  echo $lampada1->status();

  echo PHP_EOL;

  $lampada1->ajustarIntensidade(80);
  $lampada1->ligar();

  echo "Após alterações:" . PHP_EOL . PHP_EOL;

  echo $lampada1->status();

  echo PHP_EOL;

  // lâmpada 1
  $lampada2 = new LampadaInteligente("Sala");

  echo "Lâmpada 2 - Status inicial:" . PHP_EOL . PHP_EOL;

  echo $lampada2->status();

  echo PHP_EOL;

  $lampada2->ajustarIntensidade(30);
  $lampada2->ligar();

  echo "Após alterações:" . PHP_EOL . PHP_EOL;

  echo $lampada2->status();

  echo PHP_EOL;
} catch (InvalidArgumentException $erro) {
  echo "Erro: " . $erro->getMessage() . PHP_EOL;
}
