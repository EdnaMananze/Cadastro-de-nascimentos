<?php
// Inclua o arquivo de conexão com o banco de dados
require_once 'connect.php';

// Verifique se o ID do cliente a ser editado foi fornecido
if(isset($_GET['id_paciente'])) {
    $id_paciente = $_GET['id_paciente'];
    
    // Consulta para selecionar o cliente com base no ID
    $consulta = $pdo->prepare("SELECT * FROM pacientes WHERE id_paciente= ?");
    $consulta->execute([$id_pacientee]);
    $pacientes = $consulta->fetch(PDO::FETCH_ASSOC);
    
    if(!$pacientes) {
        echo "paciente não encontrado.";
        exit;
    }
} else {
    echo "ID do paciente não fornecido.";
    exit;
}

// Verifique se o formulário foi submetido
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtenha os dados do formulário
    $dados = [
        'id_paciente' => $_POST['id_paciente'],
        'codBebe' => $_POST['codBebe'],
        'dataNascimento' => $_POST['dataNascimento'],
        'tipoParto' => $_POST['tipoParto'],
        'situacaoMedica' => $_POST['situacaoMedica'],
        'nomeMae' => $_POST['nomeMae'],
        'endereco' => $_POST['endereco'],
        'contacto' => $_POST['contacto'],
        'nomePai' => $_POST['nomePai'],
        'enderecop' => $_POST['enderecop'],
        'contactop' => $_POST['contactop']
        
    ];

    // Atualize o cliente no banco de dados
    $atualizar = $pdo->prepare("UPDATE pacientes SET id_paciente = ?, codBebe  = ?, dataNascimento = ?, tipoParto = ?, situacaoMedica = ?, nomeMae  = ?, endereco  = ?, contacto, nomePai  = ?, enderecop  = ?, contactop  = ? WHERE id_paciente = ?");
    $atualizar->execute([$dados[' id_paciente'], $dados['codBebe'], $dados['dataNascimento'],  $dados['tipoParto'],  $dados['situacaoMedica'],  $dados['nomeMae'],   $dados['endereco'], $dados['nomePai'],   $dados['enderecop'],  $dados['contactop'],  $id_paciente]);
    
    echo "Paciente atualizado com sucesso.";
      
    header('Location: index.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar </title>
</head>
<body>
    <h1>Editar Cadastro de nascimentos</h1>
    <form action="" method="post">
        <!-- Preencha os campos do formulário com os valores do cliente -->
        <label for="id_paciente">ID Paciente:</label>
        <input type="text" id="id_paciente" name="id_paciente" value="<?= $pacientes['id_paciente'] ?>"><br>
        
        <label for="codBebe">Codigo do bebe:</label>
        <input type="text" id="codBebe" name="codBebe" value="<?= $pacientes['codBebe'] ?>"><br>
        

        <label for="dataNascimento">DATA DE nascimento:</label>
        <input type="text" id="dataNascimento" name="modelo" value="<?= $Pacientes['dataNascimento'] ?>"><br>

        <label for="tipoParto">Tipo de parto:</label>
        <input type="text" id="tipoParto" name="tipoParto" value="<?= $pacientes['tipoParto'] ?>"><br>
        
      <label for="">situacao Medica</label>
        <input type="text" id="situacaoMedica" name="situacaoMedica" value="<?= $pacientes['situacaoMedica'] ?>"><br>
     <label for="nomeMae"> Nome da Mae</label>
        <input type="text" id=" nomeMae" name=" nomeMae" value="<?= $pacientes[' nomeMae'] ?>"><br>

       <label for="">endereco</label>
        <input type="text" id="endereco" name="endereco" value="<?= $pacientes['endereco'] ?>"><br>

        <label for="">contacto</label>
        <input type="text" id="contacto" name="contacto" value="<?= $pacientes['contacto'] ?>"><br>

        <label for="nomePai"> Nome do Pai</label>
        <input type="text" id=" nomepai" name=" nomePai" value="<?= $pacientes[' nomePai'] ?>"><br>
       <label for="">endereco</label>
        <input type="text" id="enderecop" name="enderecop" value="<?= $pacientes['enderecop'] ?>"><br>
        <label for="">contacto</label>
        <input type="text" id="contactop" name="contactop" value="<?= $pacientes['contactop'] ?>"><br>
        <input type="submit" value="Atualizar">
    </form>
</body>
</html>
