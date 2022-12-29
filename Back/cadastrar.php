<?php
    require 'main.php';

    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $dataNascimento = $_POST['dataNascimento'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $perguntaSecreta = $_POST['perguntaSecreta'];
    $respostaSecreta = $_POST['respostaSecreta'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if($password2 != $password) {
        http_response_code(401);
        exit();
    }

    try {
        $stmt = $conn->prepare('INSERT INTO usuarios(cpf_user, nome_user, sobrenome_user, email_user, senha_user, confirmar_senha_user, data_nascimento_user, pergunta_secreta_user, resposta_secreta_user) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
        $stmt->execute([$cpf, $nome, $sobrenome, $email, $password, $password2, $dataNascimento, $perguntaSecreta, $respostaSecreta]);
        http_response_code(201);

    } catch (Exception $e) {
        echo 'Exceção capturada: ',  $e->getMessage(), "\n";
        http_response_code(500);

    }


?>