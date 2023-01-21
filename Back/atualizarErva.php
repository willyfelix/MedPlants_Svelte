<?php
    require 'main.php';

    if (!isset($_SESSION['user'])) {
        http_response_code(401);
        exit();
    }

    $id = $_POST['id_erv'];
    $nomePopular = $_POST['nome_popular'];
    $nomeCientifico = $_POST['nome_cientifico'];
    $indicacaoUso = $_POST['indicacao_de_uso'];
    $contraIndicacao = $_POST['contra_indicacao_erv'];
    $propriedades = $_POST['propriedades_erv'];


    $stmt = $conn->prepare('UPDATE ervas SET indicacao_uso_erv = ?, nome_popular_erv = ?, nome_cientifico = ?, contra_indicacao_erv = ?, propriedades_erv = ? WHERE id_erv = ?');
    $stmt->execute([$indicacaoUso, $nomePopular, $nomeCientifico, $contraIndicacao, $propriedades, $id]);

    http_response_code(201);

?>