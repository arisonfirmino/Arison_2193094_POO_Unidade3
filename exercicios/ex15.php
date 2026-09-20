<!-- Nome: Arison Ivo Firmino -->
<!-- RA: 2193094 -->
<!-- Turma: BCC - B -->
<!-- Disciplina: Programação Orientada a Objetos -->

<?php

require_once __DIR__ . '/../src/DroneInspecao.php';

use App\DroneInspecao;

echo PHP_EOL;

echo "=== Exercício 15 - Drone de inspeção ===" . PHP_EOL . PHP_EOL;

try {
  $drone = new DroneInspecao("DJI Mavic", 15);

  echo "Status inicial:" . PHP_EOL . PHP_EOL;
  echo $drone->status() . PHP_EOL;

  echo "Decolando..." . PHP_EOL . PHP_EOL;

  if ($drone->decolar()) {
    echo "Drone decolou." . PHP_EOL . PHP_EOL;
  } else {
    echo "Bateria insuficiente." . PHP_EOL . PHP_EOL;
  }

  echo "Recarregando 30%..." . PHP_EOL . PHP_EOL;

  $adicionado = $drone->recarregar(30);

  echo "Carga adicionada: {$adicionado}%." . PHP_EOL . PHP_EOL;
  echo $drone->status() . PHP_EOL;

  echo "Decolando..." . PHP_EOL . PHP_EOL;

  if ($drone->decolar()) {
    echo "Drone decolou." . PHP_EOL . PHP_EOL;
  } else {
    echo "Não foi possível decolar." . PHP_EOL . PHP_EOL;
  }

  echo "Voando 5 km..." . PHP_EOL . PHP_EOL;

  if ($drone->voar(5)) {
    echo "Voo realizado com sucesso." . PHP_EOL . PHP_EOL;
  } else {
    echo "Não foi possível realizar toda a distância solicitada." . PHP_EOL . PHP_EOL;
  }

  echo $drone->status() . PHP_EOL;

  echo "Recarregando 100%..." . PHP_EOL . PHP_EOL;

  $adicionado = $drone->recarregar(100);

  echo "Carga adicionada: {$adicionado}%." . PHP_EOL . PHP_EOL;
  echo $drone->status() . PHP_EOL;

  echo "Pousando..." . PHP_EOL . PHP_EOL;

  if ($drone->pousar()) {
    echo "Drone pousou com sucesso." . PHP_EOL . PHP_EOL;
  } else {
    echo "O drone já estava no solo." . PHP_EOL . PHP_EOL;
  }

  echo "Status final:" . PHP_EOL . PHP_EOL;
  echo $drone->status();
} catch (InvalidArgumentException $erro) {
  echo "Erro: " . $erro->getMessage() . PHP_EOL;
}

echo PHP_EOL;
