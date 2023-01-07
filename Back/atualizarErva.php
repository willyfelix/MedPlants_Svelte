<?php
    include 'main.php';

    if (!isset($_SESSION['user'])) {
        http_response_code(401);
        exit();
    }

    $id = $_POST['id_erv'];
    $indicacaoErva = $_POST['indicacao_uso_erv'];

    $stmt = $conn->prepare('UPDATE ervas SET indicacao_uso_erv = ? WHERE id = ?');
    $stmt->execute([$indicacaoErva, $id]);

?>