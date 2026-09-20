<!-- Nome: Arison Ivo Firmino -->
<!-- RA: 2193094 -->
<!-- Turma: BCC - B -->
<!-- Disciplina: Programação Orientada a Objetos -->

<?php

require_once __DIR__ . '/../src/PersonagemRPG.php';

use App\PersonagemRPG;

echo PHP_EOL;

echo "=== Exercício 9 - Personagem de RPG ===" . PHP_EOL . PHP_EOL;

try {
  $personagem = new PersonagemRPG("Kratos", "Guerreiro", 100, 80);

  echo "Status inicial:" . PHP_EOL . PHP_EOL;
  echo $personagem->status() . PHP_EOL;

  echo "Recebendo 30 de dano..." . PHP_EOL . PHP_EOL;
  $personagem->receberDano(30);
  echo $personagem->status() . PHP_EOL;

  echo "Curando 20 pontos..." . PHP_EOL . PHP_EOL;
  $personagem->curar(20);
  echo $personagem->status() . PHP_EOL;

  echo "Usando habilidade..." . PHP_EOL . PHP_EOL;

  if ($personagem->usarHabilidade(40)) {
    echo "Habilidade utilizada com sucesso." . PHP_EOL . PHP_EOL;
  } else {
    echo "Não foi possível utilizar a habilidade." . PHP_EOL . PHP_EOL;
  }

  echo $personagem->status() . PHP_EOL;

  echo "Usando habilidade..." . PHP_EOL . PHP_EOL;

  if ($personagem->usarHabilidade(100)) {
    echo "Habilidade utilizada com sucesso." . PHP_EOL . PHP_EOL;
  } else {
    echo "Não foi possível utilizar a habilidade." . PHP_EOL . PHP_EOL;
  }

  echo $personagem->status() . PHP_EOL;

  echo PHP_EOL . "Descansando..." . PHP_EOL . PHP_EOL;
  $personagem->descansar(50);
  echo $personagem->status() . PHP_EOL;

  echo "Recebendo 200 de dano..." . PHP_EOL . PHP_EOL;
  $personagem->receberDano(200);
  echo $personagem->status() . PHP_EOL;

  echo "Usando habilidade..." . PHP_EOL . PHP_EOL;

  if ($personagem->usarHabilidade(10)) {
    echo "Habilidade utilizada com sucesso." . PHP_EOL . PHP_EOL;
  } else {
    echo "Personagem está sem vida." . PHP_EOL . PHP_EOL;
  }
} catch (InvalidArgumentException $erro) {
  echo "Erro: " . $erro->getMessage() . PHP_EOL;
}
