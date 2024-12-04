<?php // var_dump($data); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-top: 10px;
            font-weight: bold;
        }
        input, textarea, button, select {
            margin-top: 5px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="file"] {
            padding: 0;
        }
        button {
            margin-top: 20px;
            background-color: #28a745;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Cadastro de Produtos</h1>
        <form action="/Produto/addProduto" method="POST" enctype="multipart/form-data">
            <!-- Nome do Produto -->
            <label for="nome">Nome do Produto:</label>
            <input type="text" id="nome" name="nome" placeholder="Ex: Violão Acústico" required>

            <!-- Categoria do Produto -->
            <label for="nome">Categoria:</label>
            <select id="categoria" name="categoria">
                <option>Selecione uma categoria</option>
                <?php
                    $categorias = $data["categorias"];
                    foreach($categorias as $categoria) {
                        // var_dump($estado);
                        echo('<option value="' . $categoria->id . '">' . $categoria->nome . '</option>');
                    }
                ?>
            </select>

            <!-- Cor do Produto -->
            <label for="cor">Cor:</label>
            <input type="text" id="cor" name="cor" placeholder="Ex: Preto, Natural, Vermelho" required>

            <!-- Preço -->
            <label for="preco">Preço (R$):</label>
            <input type="number" id="preco" name="preco" step="0.01" placeholder="Ex: 599.99" required>

            <!-- Descrição -->
            <label for="descricao">Descrição:</label>
            <textarea id="descricao" name="descricao" rows="4" placeholder="Descreva o produto..." required></textarea>

            <!-- Fotos -->
            <label for="fotos">Fotos do Produto:</label>
            <input type="file" id="fotos" name="fotos" accept="image/*" multiple required>

            <!-- Botão de envio -->
            <button type="submit">Cadastrar Produto</button>
        </form>
    </div>
</body>
</html>