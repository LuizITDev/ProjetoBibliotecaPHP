salvar_livros.php
<?php
error_reporting(E_ALL);
ini_set('display_erros',1);
 
//criar pasta para salvar os livros
if(!is_dir("capas"));
mkdir("capas",0777,true);
//salvar os pdfs
if(!is_dir("pdfs"));
mkdir("pdfs",0777,true);
 
//Recebendo os dados do formulario
$titulo = $_POST["titulo"];
$autor = $_POST["autor"];
$ano = $_POST["ano"];
$categoria = $_POST["categoria"];
 
//tratamentos dos nomes
$capa = time()."_".preg_replace("/[^a-zA-Z0-9.]/","_",$_FILES["capa"]["name"]);
$pdf = time()."_".preg_replace("/[^a-zA-Z0-9.]/","_",$_FILES["arquivo"]["name"]);
 
move_uploaded_file($_FILES["capa"]["tmp_name"], "capas/" . $capa);
move_uploaded_file($_FILES["arquivo"]["tmp_name"], "pdfs/" . $pdf);
 
//colocar como disponivel o livro
$status = "disponivel";
//como estamos usando texto iremos inserir o caracter | para separar as informações
$linha = "$titulo|$autor|$ano|$categoria|$capa|$pdf|$status\n";
//gravar as informações em um arquivo
file_put_contents("livros.txt",$linha,FILE_APPEND);
//redirecionar para apagina livros
header("location:index.php");
exit;
 
 
?>
 
livros.php
<?php
include ("menu.php");
?>
<link rel="stylesheet" href="style.css">
<div class="content">
    <div class="card">
        <h2>Acervo da Biblioteca</h2>
        <p>Explore nossa coleção digital composta por obras clássicas, acadêmicas e literárias disponíveis para a leitura online.</p>
 
    </div>
    <div class="grid">
        <?php
        //verificar se existe o arquivo livro.txt
        if(file_exists("livros.txt")){
            $linhas = file("livros.txt");
            foreach($linhas as $linha){
                $d = explode ("|",$linha);
                echo"<div class='livro'>";
                echo "<img src='capas/" . trim($d[4]) . "'>";
                echo"<div class='livro-info'>";
                echo"<h3>$d[0]</h3>";
                echo"<p>$d[1]</p>";
                echo"<small>$d[3]</small><br>";
                echo"<a class='btn' href ='visualizar.php?pdf=$d[5]'>Ler livro</a>";
                echo"</div></div>";
 
            }
        }
 
        ?>
 
    </div>
 
 
</div>
 