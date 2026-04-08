<?php
include("menu.php");
?>
<link rel="stylesheet" href="style.css">
<div class="content">
    <div class="card">
        <h2>Acervo da Biblioteca</h2>
        <p>Explore nossa coleção digital composta por obras clássicas, acadêmicas e literárias disponíveis para a
            leitura online</p>

    </div>
    <div class="grid">
        <?php
        // verificar se existe o arquivo livros.txt
        if (file_exists("livros.txt")) {
            $linhas = file("livros.txt");
            foreach ($linhas as $linha) {
                $d = explode("|", $linha);
                echo "<div class='livro'>";
                echo "<img src='capas/$d[4]' alt='Capa do livro'>";
                echo "div class = 'livro-info'>";
                echo "<h3>$d[0]</h3>";
                echo "<p>$d[1]</p>";
                echo "<small>$d[3]</small><br>";
                echo "<a class='btn' href='visualizar.php?pdf=$d[5]'>Ler Livro</a>";
                echo "</div></div>";
            }
        }

        ?>
    </div>

</div>