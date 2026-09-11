<?php

require_once __DIR__ . '/../src/Retangulo.php';

use App\Retangulo;

echo PHP_EOL;

echo "=== Exercício 1 - Retângulo ===" . PHP_EOL . PHP_EOL;

try {
  // retângulo 1
  echo "Retângulo 1:" . PHP_EOL . PHP_EOL;

  $retangulo1 = new Retangulo(40, 40);

  // área retângulo 1
  echo "Área retângulo 1: " . $retangulo1->area() . PHP_EOL;

  // perímetro retângulo 1
  echo "Perímetro retângulo 1: " . $retangulo1->perimetro() . PHP_EOL;

  // retângulo 1 é quadrado?
  echo "Retângulo 1 é quadrado?: " . ($retangulo1->ehQuadrado() ? "Sim" : "Não") . PHP_EOL;

  echo PHP_EOL;

  // retângulo 2
  echo "Retângulo 2:" . PHP_EOL . PHP_EOL;

  $retangulo2 = new Retangulo(120, 45);

  // área retângulo 2
  echo "Área retângulo 2: " . $retangulo2->area() . PHP_EOL;

  // perímetro retângulo 2
  echo "Perímetro retângulo 2: " . $retangulo2->perimetro() . PHP_EOL;

  // retângulo 2 é quadrado?
  echo "Retângulo 2 é quadrado?: " . ($retangulo2->ehQuadrado() ? "Sim" : "Não") . PHP_EOL;
} catch (InvalidArgumentException $erro) {
  echo "Erro: " . $erro->getMessage() . PHP_EOL;
}

echo PHP_EOL;
