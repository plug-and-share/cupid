<?php

$conexao = pg_connect("host=localhost port=5432 user=postgres password=senha123")
	or die ("Erro na conexao");

	echo "conexao ok";
  ?>