<?php

require_once __DIR__ . '/../src/CartaoTransporte.php';

use App\CartaoTransporte;

echo PHP_EOL;

echo "=== Exercício 11 - Cartão de transporte urbano ===" . PHP_EOL . PHP_EOL;

try {
  $cartao = new CartaoTransporte("João Silva", 0, 5.00);

  echo "Status inicial:" . PHP_EOL . PHP_EOL;
  echo $cartao->resumo() . PHP_EOL;

  echo "Recarregando R$ 20,00..." . PHP_EOL . PHP_EOL;

  $cartao->recarregar(20);
  echo $cartao->resumo() . PHP_EOL;

  echo "Embarques:" . PHP_EOL . PHP_EOL;

  for ($i = 1; $i <= 5; $i++) {
    if ($cartao->embarcar()) {
      echo "Embarque {$i} confirmado." . PHP_EOL;
    } else {
      echo "Embarque {$i} não realizado: saldo insuficiente." . PHP_EOL;
    }
  }

  echo PHP_EOL . "Status final:" . PHP_EOL . PHP_EOL;
  echo $cartao->resumo();
} catch (InvalidArgumentException $erro) {
  echo "Erro: " . $erro->getMessage() . PHP_EOL;
}

echo PHP_EOL;
