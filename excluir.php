<?php
// Inclua o arquivo de conexão com o banco de dados
require_once 'connect.php';

// Verifique se o ID do cliente a ser excluído foi fornecido
if(isset($_GET['id_paciente'])) {
    $id_paciente = $_GET['id_paciente'];

    // Exclua o cliente do banco de dados
    $excluir = $pdo->prepare("DELETE FROM pacientes WHERE id_paciente = ?");
    $excluir->execute([$id_paciente]);
    
    header('Location: index.php');
    exit();
} else {
    echo "ID do paciente não fornecido.";
}
?>
