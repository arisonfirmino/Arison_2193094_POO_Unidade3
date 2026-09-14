<?php

require_once __DIR__ . '/../src/Triangulo.php';

use App\Triangulo;

echo PHP_EOL;

echo "=== Exercício 5 - Triângulo e suas regras ===" . PHP_EOL . PHP_EOL;

try {
  // triângulo equilátero
  echo "Triângulo equilátero:" . PHP_EOL . PHP_EOL;

  $equilatero = new Triangulo(5, 5, 5);

  echo "É válido ?: " . ($equilatero->ehValido() ? "Sim" : "Não") . PHP_EOL;
  echo "Classificação: " . $equilatero->classificar() . PHP_EOL;
  echo "Perímetro: " . $equilatero->perimetro() . PHP_EOL . PHP_EOL;

  // triângulo escaleno
  echo "Triângulo escaleno:" . PHP_EOL . PHP_EOL;

  $escaleno = new Triangulo(3, 4, 5);

  echo "É válido ?: " . ($escaleno->ehValido() ? "Sim" : "Não") . PHP_EOL;
  echo "Classificação: " . $escaleno->classificar() . PHP_EOL;
  echo "Perímetro: " . $escaleno->perimetro() . PHP_EOL . PHP_EOL;

  // conjunto de lados inválido
  echo "Conjunto de lados inválido:" . PHP_EOL . PHP_EOL;

  $invalido = new Triangulo(1, 2, 3);

  echo "É válido ?: " . ($invalido->ehValido() ? "Sim" : "Não") . PHP_EOL;
  echo "Classificação: " . $invalido->classificar() . PHP_EOL;
  echo "Perímetro: " . $invalido->perimetro() . PHP_EOL . PHP_EOL;
} catch (InvalidArgumentException $erro) {
  echo "Erro: " . $erro->getMessage() . PHP_EOL;
}
