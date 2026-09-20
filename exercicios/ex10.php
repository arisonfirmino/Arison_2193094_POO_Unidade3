<!-- Nome: Arison Ivo Firmino -->
<!-- RA: 2193094 -->
<!-- Turma: BCC - B -->
<!-- Disciplina: Programação Orientada a Objetos -->

<?php

require_once __DIR__ . '/../src/CofrinhoMeta.php';

use App\CofrinhoMeta;

echo PHP_EOL;

echo "=== Exercício 10 - Cofrinho digital com meta ===" . PHP_EOL . PHP_EOL;

try {
  $cofrinho = new CofrinhoMeta("Notebook", 0, 2000);

  echo "Status inicial:" . PHP_EOL . PHP_EOL;
  echo $cofrinho->resumo() . PHP_EOL;

  echo "Depositando R$ 500,00..." . PHP_EOL . PHP_EOL;

  $cofrinho->depositar(500);
  echo $cofrinho->resumo() . PHP_EOL;

  echo "Depositando R$ 800,00..." . PHP_EOL . PHP_EOL;

  $cofrinho->depositar(800);
  echo $cofrinho->resumo() . PHP_EOL;

  echo "Retirando R$ 200,00..." . PHP_EOL . PHP_EOL;

  if ($cofrinho->retirar(200)) {
    echo "Retirada realizada com sucesso." . PHP_EOL . PHP_EOL;
  } else {
    echo "Não foi possível retirar." . PHP_EOL . PHP_EOL;
  }

  echo $cofrinho->resumo() . PHP_EOL;

  echo "Retirando R$ 2000,00..." . PHP_EOL . PHP_EOL;

  if ($cofrinho->retirar(2000)) {
    echo "Retirada realizada com sucesso." . PHP_EOL . PHP_EOL;
  } else {
    echo "Não foi possível retirar." . PHP_EOL . PHP_EOL;
  }

  echo $cofrinho->resumo() . PHP_EOL;

  echo "Depositando R$ 1000,00..." . PHP_EOL . PHP_EOL;

  $cofrinho->depositar(1000);
  echo $cofrinho->resumo() . PHP_EOL;

  if ($cofrinho->metaAtingida()) {
    echo "Meta atingida!" . PHP_EOL . PHP_EOL;
  } else {
    echo "Meta ainda não atingida." . PHP_EOL . PHP_EOL;
  }

  // depositando valor inválido
  echo "Depositando R$ -50,00..." . PHP_EOL . PHP_EOL;

  $cofrinho->depositar(-50);
} catch (InvalidArgumentException $erro) {
  echo "Erro: " . $erro->getMessage() . PHP_EOL;
}

echo PHP_EOL;
