<?php
//Página de Conexão com database
//Dados de conexão local

$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "projetoweb";


//Dados de conexão InfinityFree
/* $servername = "sql204.epizy.com";
$username   = "epiz_28925354";
$password   = "pdWPy1MqQxMY";
$dbname     = "epiz_28925354_projetoWeb";
 */

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO aluno (aluno, disciplina, nota1, nota2)
  VALUES ('Rafaela', 'ADS', '9.0', '10.0')";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "Cadastrado com sucesso!";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>