<?php
if(isset($_FILES["arquivo"])) {$arquivo = $_FILES["arquivo"];}

if($arquivo !== null) {
preg_match("/\.(gif|png|jpg|jpeg|mp4){1}$/i", $arquivo["name"], $ext );

    if($ext == true) {
        $nome_arquivo = md5(uniqid(time())) . "." . $ext[1];
        $caminho_arquivo = "img/up_img/" . $nome_arquivo;
        move_uploaded_file($arquivo["tmp_name"], $caminho_arquivo );

        include "conect_bd.php";

        try {
            $comando = $conexao-> prepare("insert into up_img(nome_foto, id_foto) values('$nome_arquivo', 1)");
            $comando-> execute();

            if($comando-> rowCount()>0) {
                echo "<script>alert('Upload realizado com sucesso')</script>";
                header("location:./img.php");
            }
            else {
                echo "<script>alert('Erro no cadastramento')</script>";
            }
        }
        catch(PDOException $Erro) {
            echo "Ligar para a equipe de TI" . $Erro->getMessage();
        }


        

}

}

?>