<?php
    require 'main.php';

    // Passo 1: Pegar informações do front;
   
    $nomePopular = $_POST['nome_popular'];
    $nomeCientifico = $_POST['nome_cientifico'];
    $indicacaoUso = $_POST['indicacao_de_uso'];

    // Passo 2: Inserir as informações no BD;

    $stmt = $conn->prepare('INSERT INTO ervas(nome_popular_erv, nome_cientifico, indicacao_uso_erv) VALUES (?, ?, ?)');
    $stmt->execute([$nomePopular, $nomeCientifico, $indicacaoUso]);

    // Passo 3: Retornar ok!

    http_response_code(201);
?>