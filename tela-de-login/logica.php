<?php
// Inicia a sessão
session_start();
// As variáveis login e senha recebem os dados digitados no formulário da página index.php
$user = $_POST['usuario'];
$senha = $_POST['senha'];

// Realiza a conexão com o banco de dados
$mysqli = new mysqli('localhost', 'root', '', 'mysql');
mysqli_set_charset($mysqli, 'utf8'); // Define os caracteres para UTF-8

// Realiza a consulta ao banco de dados, procurando pelo usuário e senha
if ($result = $mysqli->query("SELECT * FROM pessoa WHERE user = '$user' AND password = '$senha'")) {

    // Determina a quantidade de linhas resultantes do banco de dados
    $row_cnt = $result->num_rows;

    $result->close();
    // Se a quantidade de linhas for maior que zero, então existe
    if ($row_cnt > 0) {
        $_SESSION['user'] = $user; // Armazena o nome do usuário na sessão
        $_SESSION['senha'] = $senha; // Armazena a senha do usuário na sessão (Não recomendado!)
        header("Location: restrito.php"); // Redireciona o usuário para a página restrita
    } else {
        unset($_SESSION['user']); // Retira o usuário da sessão
        unset($_SESSION['senha']); // Retira a senha da sessão
        header("Location: index.php"); // Redireciona o usuário para a página de login
    }
}

// Fecha a conexão com o banco de dados
$mysqli->close();
?>
