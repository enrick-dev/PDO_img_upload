<?php

$Bco = "_iniciate";
$Usuario = "root";
$Senha = "";

try {
    $conexao = new PDO("mysql:host=localhost; dbname=$Bco", "$Usuario", "$Senha");
    $conexao-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexao-> exec("set names utf8");
}
catch(PDOException $Erro) {
    echo "Por favor, ligue na assistencia de TI" . $Erro-> getMessage();
}

?>