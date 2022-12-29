<?php
    require 'main.php';

    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $dataNacimento = $_POST['dataNascimento'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $perguntaSecreta = $_POST['perguntaSecreta'];
    $respostaSecreta = $_POST['respostaSecreta'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    // $conn->query("INSERT INTO users(username, password) VALUES ('$username', '$password')");
    $stmt = $conn->prepare('INSERT INTO users(username, password) VALUES (?, ?)');
    $stmt->execute([$username, $password]);

    http_response_code(201);
?>