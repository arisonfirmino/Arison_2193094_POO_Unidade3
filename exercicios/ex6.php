<!-- Nome: Arison Ivo Firmino -->
<!-- RA: 2193094 -->
<!-- Turma: BCC - B -->
<!-- Disciplina: Programação Orientada a Objetos -->

<?php

require_once __DIR__ . '/../src/TicketEstacionamento.php';

use App\TicketEstacionamento;

echo PHP_EOL;

echo "=== Exercício 6 - Ticket de estacionamento ===" . PHP_EOL . PHP_EOL;

try {
  // permanência de 40 minutos
  echo "Permanência de 40 minutos:" . PHP_EOL . PHP_EOL;

  $ticket1 = new TicketEstacionamento("ABC-1234", 100, 10);

  $ticket1->registrarSaida(140);

  echo $ticket1->resumo() . PHP_EOL;

  // permanência de 60 minutos
  echo "Permanência de 60 minutos:" . PHP_EOL . PHP_EOL;

  $ticket2 = new TicketEstacionamento("DEF-5678", 100, 10);

  $ticket2->registrarSaida(160);

  echo $ticket2->resumo() . PHP_EOL;

  // permanência de 125 minutos
  echo "Permanência de 125 minutos:" . PHP_EOL . PHP_EOL;

  $ticket3 = new TicketEstacionamento("GHI-9012", 100, 10);

  $ticket3->registrarSaida(225);

  echo $ticket3->resumo();

  echo PHP_EOL;
} catch (InvalidArgumentException $erro) {
  echo "Erro: " . $erro->getMessage() . PHP_EOL;
}
