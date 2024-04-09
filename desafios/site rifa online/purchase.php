<?php

// Configurações do banco de dados
$servername = "localhost";
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "seu_banco_de_dados";

// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Processamento do formulário de compra de bilhetes
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    
    // Insere os dados na tabela de compras
    $sql = "INSERT INTO compras (nome, email) VALUES ('$name', '$email')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Compra realizada com sucesso!";
    } else {
        echo "Erro ao processar a compra: " . $conn->error;
    }
}

// Fecha a conexão com o banco de dados
$conn->close();

?>
