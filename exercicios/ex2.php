<?php

require_once __DIR__ . '/../src/Temperatura.php';

use App\Temperatura;

echo PHP_EOL;

echo "=== Exercício 2 - Temperatura controlada ===" . PHP_EOL . PHP_EOL;

try {
  // temperatura comum
  echo "Temperatura comum:" . PHP_EOL . PHP_EOL;

  $temperatura = new Temperatura(0);
  $temperatura->alterar(31);

  echo $temperatura->descricao() . PHP_EOL;

  // temperatura negativa
  echo "Temperatura negativa:" . PHP_EOL . PHP_EOL;

  $temperatura->alterar(-13);

  echo $temperatura->descricao() . PHP_EOL;

  // temperatura abaixo do zero absoluto
  echo "Temperatura abaixo do zero absoluto:" . PHP_EOL . PHP_EOL;

  $temperatura->alterar(-300);

  echo $temperatura->descricao() . PHP_EOL;
} catch (InvalidArgumentException $erro) {
  echo "Erro: " . $erro->getMessage() . PHP_EOL;
}

echo PHP_EOL;
