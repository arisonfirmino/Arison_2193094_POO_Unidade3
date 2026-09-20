<?php

require_once __DIR__ . '/../src/RoboArena.php';

use App\RoboArena;

echo PHP_EOL;

echo "=== Exercício 19 - Robô de arena ===" . PHP_EOL . PHP_EOL;

try {
  $robo1 = new RoboArena("R2-D2", 100, 100, 60, 80);
  $robo2 = new RoboArena("C-3PO", 80, 100, 25, 40);

  echo "=== Robô 1 ===" . PHP_EOL . PHP_EOL;
  echo $robo1->status() . PHP_EOL;

  echo "Treinando..." . PHP_EOL . PHP_EOL;

  if ($robo1->treinar()) {
    echo "Treino realizado com sucesso." . PHP_EOL . PHP_EOL;
  } else {
    echo "Treino recusado: energia insuficiente." . PHP_EOL . PHP_EOL;
  }

  echo $robo1->status() . PHP_EOL;

  echo "Entrando em combate..." . PHP_EOL . PHP_EOL;

  if ($robo1->combater()) {
    echo "Combate realizado com sucesso." . PHP_EOL . PHP_EOL;
  } else {
    echo "Combate recusado." . PHP_EOL . PHP_EOL;
  }

  echo $robo1->status() . PHP_EOL;

  echo "Reparando 50 pontos..." . PHP_EOL . PHP_EOL;
  $reparo = $robo1->reparar(50);

  echo "Integridade recuperada: {$reparo}" . PHP_EOL . PHP_EOL;
  echo $robo1->status() . PHP_EOL;

  echo "Recarregando..." . PHP_EOL . PHP_EOL;
  $recarga = $robo1->recarregar(100);

  echo "Energia recuperada: {$recarga}" . PHP_EOL . PHP_EOL;
  echo $robo1->status() . PHP_EOL;

  echo "=== Robô 2 ===" . PHP_EOL . PHP_EOL;
  echo $robo2->status() . PHP_EOL;

  echo "Entrando em combate..." . PHP_EOL . PHP_EOL;

  if ($robo2->combater()) {
    echo "Combate realizado com sucesso." . PHP_EOL . PHP_EOL;
  } else {
    echo "Combate recusado: energia insuficiente." . PHP_EOL . PHP_EOL;
  }

  echo $robo2->status() . PHP_EOL;

  echo "Recarregando..." . PHP_EOL . PHP_EOL;
  $recarga = $robo2->recarregar(20);

  echo "Energia recuperada: {$recarga}" . PHP_EOL . PHP_EOL;

  echo "Entrando em combate..." . PHP_EOL . PHP_EOL;

  $robo2->combater();

  echo $robo2->status() . PHP_EOL;

  echo "Reparando 100 pontos..." . PHP_EOL . PHP_EOL;
  $reparo = $robo2->reparar(100);

  echo "Integridade recuperada: {$reparo}" . PHP_EOL . PHP_EOL;
  echo $robo2->status();
} catch (InvalidArgumentException $erro) {
  echo "Erro: " . $erro->getMessage() . PHP_EOL;
}

echo PHP_EOL;
