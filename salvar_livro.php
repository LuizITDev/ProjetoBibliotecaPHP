<?php
error_reporting(E_ALL);
ini_set('display_errors',1);

//criar pasta para inserir fotos 
if(!is_dir("capas")) {
mkdir("capas",0777,true);
}

//salvar os pdfs
if(!is_dir("pdfs")) {
mkdir("pdfs" ,  0777,true);
}

// recebendo os dados do formulario
$titulo = $_POST["titulo"];
$autor = $_POST["autor"];
$ano = $_POST ["ano"];
$categoria = $_POST["categoria"];

//tratamento dos nomes
$capas = time()."_".preg_replace("/[^a-zA-Z0-9.]/)","_",$_FILES["capa"]["name"]);
$pdf = time()."_".preg_replace("/[^a-zA-Z0-9.]/)","_",$_FILES["arquivo"]["name"]);

// colocar como disponivel o livro 
$status = "disponivel";

//como estamos usando texto iremos inserir o caracter | para separar as informações 
$linha ="$titulo | $autor  |$ano | $categoria | $capa | $pdf | $status;\n";

// gravar as informações em um arquivo 
file_put_contents("livros.txt",$linha,FILE_APPEND);
  
//redirecionar para pagina livros 
header("location:index.php");
exit;

?>