<?php

    include "conect_bd.php";

    try {
        $matriz = $conexao-> prepare("select * from up_img where id_foto = 1");

        if($matriz-> execute()) {
            while($linha = $matriz-> fetch(PDO::FETCH_OBJ)) {
                $arquivo = $linha-> nome_foto;
                echo "<div> <img src='img/up_img/$arquivo'> </div>";
            }
        }
    }
    catch(PDOException $Erro) {
        echo "Por favor ligue na assistência de TI" . $Erro-> getMessage();
    } 


?>