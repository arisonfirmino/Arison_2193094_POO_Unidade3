<!-- Nome: Arison Ivo Firmino -->
<!-- RA: 2193094 -->
<!-- Turma: BCC - B -->
<!-- Disciplina: Programação Orientada a Objetos -->

<?php

require_once __DIR__ . '/../src/BateriaDispositivo.php';

use App\BateriaDispositivo;

echo PHP_EOL;

echo "=== Exercício 14 - Bateria de dispositivo ===" . PHP_EOL . PHP_EOL;

try {
  $bateria = new BateriaDispositivo("Celular", 50);

  echo "Status inicial:" . PHP_EOL . PHP_EOL;
  echo $bateria->status() . PHP_EOL;

  echo "Usando por 10 minutos..." . PHP_EOL . PHP_EOL;

  if ($bateria->usar(10)) {
    echo "Uso realizado com sucesso." . PHP_EOL . PHP_EOL;
  } else {
    echo "A bateria chegou a zero durante o uso." . PHP_EOL . PHP_EOL;
  }

  echo $bateria->status() . PHP_EOL;

  echo "Usando por 23 minutos..." . PHP_EOL . PHP_EOL;

  if ($bateria->usar(23)) {
    echo "Uso realizado com sucesso." . PHP_EOL . PHP_EOL;
  } else {
    echo "A bateria chegou a zero durante o uso." . PHP_EOL . PHP_EOL;
  }

  echo $bateria->status() . PHP_EOL;

  echo "Carregando..." . PHP_EOL . PHP_EOL;

  $adicionado = $bateria->carregar(30);

  echo "Carga adicionada: {$adicionado}%" . PHP_EOL . PHP_EOL;
  echo $bateria->status() . PHP_EOL;

  echo "Carregando..." . PHP_EOL . PHP_EOL;

  $adicionado = $bateria->carregar(100);

  echo "Carga adicionada: {$adicionado}%" . PHP_EOL . PHP_EOL;
  echo $bateria->status() . PHP_EOL;

  echo "Bateria crítica?: " . ($bateria->estaCritica() ? "Sim" : "Não") . PHP_EOL;
} catch (InvalidArgumentException $erro) {
  echo "Erro: " . $erro->getMessage() . PHP_EOL;
}

echo PHP_EOL;
