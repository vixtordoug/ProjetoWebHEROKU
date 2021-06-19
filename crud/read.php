<?php
echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Id</th><th>Aluno</th><th>Disciplina</th><th>Nota I</th><th>Nota II</th></tr>";

class TableRows extends RecursiveIteratorIterator {
  function __construct($it) {
    parent::__construct($it, self::LEAVES_ONLY);
  }

  function current() {
    return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
  }

  function beginChildren() {
    echo "<tr>";
  }

  function endChildren() {
    echo "</tr>" . "\n";
  }
}

//Dados de conexão local

/* $servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "projetoweb"; */


//Dados de conexão InfinityFree
$servername = "sql204.epizy.com";
$username   = "epiz_28925354";
$password   = "pdWPy1MqQxMY";
$dbname     = "epiz_28925354_projetoWeb";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $conn->prepare("SELECT id,aluno, disciplina, nota1, nota2 FROM aluno");
  $stmt->execute();

  // set the resulting array to associative
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
    echo $v;
  }
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>