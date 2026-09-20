<?php

require_once __DIR__ . '/../src/SmartLocker.php';

use App\SmartLocker;

echo PHP_EOL;

echo "=== Exercício 17 - Smart Locker de encomendas ===" . PHP_EOL . PHP_EOL;

try {
  $locker = new SmartLocker("Compartimento A1");

  echo "Status inicial:" . PHP_EOL . PHP_EOL;
  echo $locker->status() . PHP_EOL;

  echo "Depositando encomenda..." . PHP_EOL . PHP_EOL;

  if ($locker->depositar("ENCOMENDA-001", 1234)) {
    echo "Encomenda depositada com sucesso." . PHP_EOL . PHP_EOL;
  }

  echo $locker->status() . PHP_EOL;

  echo "Tentativa de retirada..." . PHP_EOL . PHP_EOL;

  if ($locker->retirar(1111)) {
    echo "Encomenda retirada." . PHP_EOL . PHP_EOL;
  } else {
    echo "Código incorreto." . PHP_EOL . PHP_EOL;
  }

  echo "Tentativa de retirada..." . PHP_EOL . PHP_EOL;

  if ($locker->retirar(2222)) {
    echo "Encomenda retirada." . PHP_EOL . PHP_EOL;
  } else {
    echo "Código incorreto." . PHP_EOL . PHP_EOL;
  }

  echo "Tentativa de retirada..." . PHP_EOL . PHP_EOL;

  if ($locker->retirar(3333)) {
    echo "Encomenda retirada." . PHP_EOL . PHP_EOL;
  } else {
    echo "Código incorreto. Compartimento bloqueado." . PHP_EOL . PHP_EOL;
  }

  echo $locker->status() . PHP_EOL;

  echo "Depositando encomenda..." . PHP_EOL . PHP_EOL;

  if (!$locker->depositar("ENCOMENDA-002", 5678)) {
    echo "Depósito bloqueado." . PHP_EOL . PHP_EOL;
  }

  echo "=== Novo objeto ===" . PHP_EOL . PHP_EOL;

  $novoLocker = new SmartLocker("Compartimento B2");

  $novoLocker->depositar("ENCOMENDA-003", 5678);

  echo $novoLocker->status() . PHP_EOL;

  echo "Tentativa de retirada..." . PHP_EOL . PHP_EOL;

  if ($novoLocker->retirar(5678)) {
    echo "Encomenda retirada com sucesso." . PHP_EOL . PHP_EOL;
  }

  echo $novoLocker->status();
} catch (InvalidArgumentException $erro) {
  echo "Erro: " . $erro->getMessage() . PHP_EOL;
}

echo PHP_EOL;
