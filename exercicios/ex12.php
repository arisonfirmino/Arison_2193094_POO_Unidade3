<?php

require_once __DIR__ . '/../src/Hidrometro.php';

use App\Hidrometro;

echo PHP_EOL;

echo "=== Exercício 12 - Hidrômetro residencial ===" . PHP_EOL . PHP_EOL;

try {
  $hidrometro = new Hidrometro("HID-001", 1000, 1050);

  echo "Leitura inicial:" . PHP_EOL . PHP_EOL;
  echo $hidrometro->resumo() . PHP_EOL;

  echo "Leitura de 1100 m³..." . PHP_EOL . PHP_EOL;

  $hidrometro->registrarLeitura(1100);
  echo $hidrometro->resumo() . PHP_EOL;

  echo "Leitura de 1180 m³..." . PHP_EOL . PHP_EOL;

  $hidrometro->registrarLeitura(1180);
  echo $hidrometro->resumo() . PHP_EOL;

  echo "Estimativa da conta: R$ " . $hidrometro->estimarConta(2.50) . PHP_EOL . PHP_EOL;

  // leitura inválida
  echo "Leitura de 1150 m³..." . PHP_EOL . PHP_EOL;

  if ($hidrometro->registrarLeitura(1150)) {
    echo "Leitura registrada com sucesso." . PHP_EOL . PHP_EOL;
  } else {
    echo "Leitura recusada." . PHP_EOL . PHP_EOL;
  }

  echo $hidrometro->resumo() . PHP_EOL;
} catch (InvalidArgumentException $erro) {
  echo "Erro: " . $erro->getMessage() . PHP_EOL;
}
