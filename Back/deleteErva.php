<?php
    include 'main.php';
   
    if (!isset($_SESSION['user'])) {
        http_response_code(401);
        exit();
    }

    $id = $_POST['id_erv'];

    $stmt = $conn->prepare('DELETE FROM ervas WHERE id_erv = ?');
    $stmt->execute([
        $id,
    ])

?>