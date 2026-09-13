<?php

require_once __DIR__ . '/../src/IngressoCinema.php';

use App\IngressoCinema;

echo PHP_EOL;

echo "=== Exercício 3 - Ingresso de cinema ===" . PHP_EOL . PHP_EOL;

try {
  // ingresso inteiro
  echo "Ingresso inteiro:" . PHP_EOL . PHP_EOL;

  $ingresso = new IngressoCinema("Homem-Aranha: Um Novo Dia", 35, false);

  echo $ingresso->resumo() . PHP_EOL;

  // ingresso meia-entrada
  echo "Ingresso meia-entrada:" . PHP_EOL . PHP_EOL;

  $ingressoMeia = $ingresso;

  echo $ingressoMeia->resumo() . PHP_EOL;

  echo "Aplicando meia-entrada..." . PHP_EOL . PHP_EOL;

  $ingressoMeia->definirMeiaEntrada(true);

  echo $ingressoMeia->resumo() . PHP_EOL;
} catch (InvalidArgumentException $erro) {
  echo "Erro: " . $erro->getMessage() . PHP_EOL;
}
