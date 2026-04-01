<!DOCTYPE html>
<html lang="pt-br">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Livro</title>
    <link rel="stylesheet" href="style.css">
</head>
 
<body>
    <?php
    include("menu.php");
    ?>
    <div class="content">
        <div class="card">
            <h2>Cadastro de Novo Livro</h2>
            <p>Adicione uma nova obra ao acervo digital da biblioteca. Preencha as informações abaixo e envie a capa e o
                arquivo digital do livro em formato pdf.</p>
            <br>
            <form action="salvar_livro.php" method="post">
                <label> Título do livro</label>
                <input type="text" name="titulo" required>
                <label> Autor</label>
                <input type="text" name="autor" required>
                <label> Ano de publicação </label>
                <input type="number" name="ano" required>
                <label> Categoria </label>
                <select name="categoria" required>
                <option value="">Selecione...</option>
                <option>Romance</option>
                <option>Literatura brasileira</option>
                <option>Fantasia</option>
                <option>Ficção científica</option>
                <option>Educação</option>
                <option>Tecnologia</option>
                <option>História</option>
                <option>Biografia</option>
                <option>Infantil</option>
 
 
                </select>
                <br><br>
               <label > Capa do livro (imagem)</label>
                <input type="file" name="capa" accept="image/*" required>
                <label > Arquivo do livro (pdf)</label>
                <input type="file" name="arquivo" accept="application/pdf" required>
                <br>
                <button class="btn">Cadastrar Livro</button>
 
 
            </form>
        </div>
    </div>
</body>
 
</html>
 