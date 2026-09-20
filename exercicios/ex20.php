<!-- Nome: Arison Ivo Firmino -->
<!-- RA: 2193094 -->
<!-- Turma: BCC - B -->
<!-- Disciplina: Programação Orientada a Objetos -->

<?php

require_once __DIR__ . '/../src/SobrevivenciaMarte.php';

use App\SobrevivenciaMarte;

echo PHP_EOL;

echo "=== Exercício 20 - Sobrevivência em Marte ===" . PHP_EOL . PHP_EOL;

try {
  $astronauta = new SobrevivenciaMarte("João Silva", 100, 100, 100, 100, 80, 60, 2);

  echo "Status inicial:" . PHP_EOL . PHP_EOL;
  echo $astronauta->status() . PHP_EOL;

  echo "Explorando..." . PHP_EOL . PHP_EOL;

  if ($astronauta->explorar(30)) {
    echo "Exploração realizada com sucesso." . PHP_EOL . PHP_EOL;
  } else {
    echo "Exploração recusada." . PHP_EOL . PHP_EOL;
  }

  echo $astronauta->status() . PHP_EOL;

  echo "Descansando..." . PHP_EOL . PHP_EOL;

  if ($astronauta->descansar(20)) {
    echo "Descanso realizado." . PHP_EOL;
  }

  echo $astronauta->status() . PHP_EOL;

  echo "Explorando..." . PHP_EOL . PHP_EOL;

  if ($astronauta->explorar(30)) {
    echo "Exploração realizada com sucesso." . PHP_EOL . PHP_EOL;
  } else {
    echo "Exploração recusada." . PHP_EOL . PHP_EOL;
  }

  echo $astronauta->status() . PHP_EOL;

  // explorando sem oxigênio
  echo "Explorando..." . PHP_EOL . PHP_EOL;

  if (!$astronauta->explorar(10)) {
    echo "Exploração recusada: oxigênio insuficiente." . PHP_EOL . PHP_EOL;
  }

  echo "Usando cilindro de oxigênio..." . PHP_EOL . PHP_EOL;

  if ($astronauta->usarCilindro()) {
    echo "Oxigênio recuperado." . PHP_EOL . PHP_EOL;
  } else {
    echo "Não foi possível usar o cilindro." . PHP_EOL . PHP_EOL;
  }

  echo $astronauta->status() . PHP_EOL;

  echo "Explorando..." . PHP_EOL . PHP_EOL;

  if ($astronauta->explorar(20)) {
    echo "Exploração realizada com sucesso." . PHP_EOL . PHP_EOL;
  } else {
    echo "Exploração recusada." . PHP_EOL . PHP_EOL;
  }

  echo $astronauta->status() . PHP_EOL;

  echo "Alimentando..." . PHP_EOL . PHP_EOL;

  if ($astronauta->alimentar(30)) {
    echo "Vida recuperada." . PHP_EOL . PHP_EOL;
  }

  echo $astronauta->status();
} catch (InvalidArgumentException $erro) {
  echo "Erro: " . $erro->getMessage() . PHP_EOL;
}

echo PHP_EOL;
