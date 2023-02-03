<?php
include 'main.php';

$perguntaSecreta = $_POST['perguntaSecreta'];
$respostaSecreta = $_POST['respostaSecreta'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];

/* 
    1- Buscar usuario com email select
    2- Se o usuario não exister retonr erro
    3- Se pergunta e resposta n]ao for igual ao do banco retorna error
    4- Se se senha e confirmação não estão === retorna error
    5- Atualizar campo senha do usuario update
*/
 


$stmt = $conn->prepare("SELECT * FROM usuarios WHERE email_user = ? LIMIT 1"); 
$stmt->execute([$email]); 
$usuario = $stmt->fetch();

if (!isset($usuario)) {
    http_response_code(401);
    exit();
}

if ($perguntaSecreta != $usuario['PERGUNTA_SECRETA_USER'] || $respostaSecreta != $usuario['RESPOSTA_SECRETA_USER']){
    http_response_code(401);
    exit();
}

if ($password != $confirmPassword) {
    http_response_code(401);
    exit();
}


$stmt = $conn->prepare("UPDATE usuarios SET SENHA_USER = ? WHERE email_user = ? LIMIT 1"); 
$stmt->execute([$password, $email]); 


http_response_code(200);

?>