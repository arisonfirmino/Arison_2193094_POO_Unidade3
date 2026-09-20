<!-- Nome: Arison Ivo Firmino -->
<!-- RA: 2193094 -->
<!-- Turma: BCC - B -->
<!-- Disciplina: Programação Orientada a Objetos -->

<?php

require_once __DIR__ . '/../src/MaquinaSnack.php';

use App\MaquinaSnack;

echo PHP_EOL;

echo "=== Exercício 13 - Máquina de snacks ===" . PHP_EOL . PHP_EOL;

try {
  $maquina = new MaquinaSnack("Chocolate", 5.00);

  echo "Status inicial:" . PHP_EOL . PHP_EOL;
  echo $maquina->status() . PHP_EOL;

  // compra sem estoque
  echo "Comprando..." . PHP_EOL . PHP_EOL;

  if ($maquina->comprar()) {
    echo "Compra realizada com sucesso." . PHP_EOL;
  } else {
    echo "Estoque insuficiente." . PHP_EOL;
  }

  echo PHP_EOL . "Reabastecendo..." . PHP_EOL . PHP_EOL;
  $maquina->reabastecer(2);

  echo "Inserindo R$ 3,00 de crédito..." . PHP_EOL . PHP_EOL;
  $maquina->inserirCredito(3);

  // compra com crédito insuficiente
  echo "Comprando..." . PHP_EOL . PHP_EOL;

  if ($maquina->comprar()) {
    echo "Compra realizada com sucesso." . PHP_EOL . PHP_EOL;
  } else {
    echo "Crédito insuficiente." . PHP_EOL . PHP_EOL;
  }

  echo "Inserindo R$ 2,00 de crédito..." . PHP_EOL . PHP_EOL;
  $maquina->inserirCredito(2);

  echo "Comprando..." . PHP_EOL . PHP_EOL;

  if ($maquina->comprar()) {
    echo "Compra realizada com sucesso." . PHP_EOL . PHP_EOL;
  } else {
    echo "Compra não realizada." . PHP_EOL . PHP_EOL;
  }

  echo $maquina->status() . PHP_EOL;

  echo "Inserindo R$ 10,00 de crédito..." . PHP_EOL . PHP_EOL;
  $maquina->inserirCredito(10);

  // compra com crédito excedente
  echo "Comprando..." . PHP_EOL . PHP_EOL;

  if ($maquina->comprar()) {
    echo "Compra realizada com sucesso." . PHP_EOL;
  } else {
    echo "Compra não realizada." . PHP_EOL;
  }

  echo $maquina->status() . PHP_EOL;

  echo "Devolvendo crédito..." . PHP_EOL . PHP_EOL;
  $valorDevolvido = $maquina->devolverCredito();

  echo "Valor devolvido: R$ " . $valorDevolvido . PHP_EOL . PHP_EOL;
  echo $maquina->status();
} catch (InvalidArgumentException $erro) {
  echo "Erro: " . $erro->getMessage() . PHP_EOL;
}

echo PHP_EOL;
