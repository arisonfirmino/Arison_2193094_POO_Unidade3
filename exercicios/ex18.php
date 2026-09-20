<?php

require_once __DIR__ . '/../src/PlanoDados.php';

use App\PlanoDados;

echo PHP_EOL;

echo "=== Exercício 18 - Plano de dados móvel ===" . PHP_EOL . PHP_EOL;

try {
  $plano1 = new PlanoDados("João", 10);
  $plano2 = new PlanoDados("Maria", 5);

  echo "=== Plano 1 ===" . PHP_EOL . PHP_EOL;
  echo $plano1->status() . PHP_EOL;

  echo "Consumindo 3 GB..." . PHP_EOL . PHP_EOL;

  if ($plano1->consumir(3)) {
    echo "Consumo realizado com sucesso." . PHP_EOL . PHP_EOL;
  } else {
    echo "Consumo recusado: dados insuficientes." . PHP_EOL . PHP_EOL;
  }

  echo $plano1->status() . PHP_EOL;

  echo "Consumindo 8 GB..." . PHP_EOL . PHP_EOL;

  if ($plano1->consumir(8)) {
    echo "Consumo realizado com sucesso." . PHP_EOL . PHP_EOL;
  } else {
    echo "Consumo recusado: dados insuficientes." . PHP_EOL . PHP_EOL;
  }

  echo $plano1->status() . PHP_EOL;

  echo "Comprando pacote adicional..." . PHP_EOL . PHP_EOL;
  $plano1->comprarPacote(5);

  echo $plano1->status() . PHP_EOL;

  echo "Consumindo 4 GB..." . PHP_EOL . PHP_EOL;

  if ($plano1->consumir(4)) {
    echo "Consumo realizado com sucesso." . PHP_EOL . PHP_EOL;
  } else {
    echo "Consumo recusado: dados insuficientes." . PHP_EOL . PHP_EOL;
  }

  echo $plano1->status() . PHP_EOL;

  echo "=== Plano 2 ===" . PHP_EOL . PHP_EOL;
  echo $plano2->status() . PHP_EOL;

  echo "Consumindo 5 GB..." . PHP_EOL . PHP_EOL;

  if ($plano2->consumir(5)) {
    echo "Consumo realizado com sucesso." . PHP_EOL . PHP_EOL;
  } else {
    echo "Consumo recusado: dados insuficientes." . PHP_EOL . PHP_EOL;
  }

  echo $plano2->status() . PHP_EOL;

  echo "Consumindo 1 GB..." . PHP_EOL . PHP_EOL;

  if ($plano2->consumir(1)) {
    echo "Consumo realizado com sucesso." . PHP_EOL . PHP_EOL;
  } else {
    echo "Consumo recusado: dados insuficientes." . PHP_EOL . PHP_EOL;
  }

  echo $plano2->status() . PHP_EOL;
} catch (InvalidArgumentException $erro) {
  echo "Erro: " . $erro->getMessage() . PHP_EOL;
}
