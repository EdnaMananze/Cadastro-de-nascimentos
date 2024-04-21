<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de nascimento de Bebes</title>

 <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>
<body>

   
    <form  action="cadastrar.php" method="POST" id="form">
        <label for="codBebe">codigo do Bebe:</label>
        <input type="text" name="codBebe" class="inputs required" oninput="nameValidate()">
        <span class="span-required"> s </span>
        <label for="dataNascimento">dataNascimento:</label>
        <input type="text" name="dataNascimento" class="inputs required">
        <span class="span-required" >Invalido </span>

        <label for="tipoParto">Tipo de parto:</label>
        <input type="text" name="tipoParto" class="inputs required">
        <span class="span-required" > Invalido </span>

        <label for="situacaoMedica">Situacao medica:</label>
        <input type="text" name="situacaoMedica" class="inputs required">

        <label for="nomeMae">Nome da Mae:</label>
        <input type="text" name="nomeMae" class="inputs required">

        <label for="Endereco">Endereco:</label>
        <input type="text" name="endereco" class="inputs required">

        <label for="contacto">Contacto:</label>
        <input type="text" name="contacto" class="inputs required">

        <label for="nomePai">Nome do Pai:</label>
        <input type="text" name="nomePai" class="inputs required">

        <label for="Enderecop">Enderecop:</label>
        <input type="text" name="enderecop" class="inputs required">

        <label for="contactop">Contactop:</label>
        <input type="text" name="contactop" class="inputs required">

    </form>

    <?php
require 'connect.php';

$codBebe     = filter_input(INPUT_POST, 'codBebe');
$dataNascimento    = filter_input(INPUT_POST, 'dataNascimento ');
$tipoParto    = filter_input(INPUT_POST, 'tipoParto', FILTER_VALIDATE_INT);
$situacaoMedica = filter_input(INPUT_POST, 'situacaoMedica');
$nomeMae = filter_input(INPUT_POST, 'nomeMae', FILTER_VALIDATE_FLOAT);
$endereco = filter_input(INPUT_POST, 'endereco', FILTER_VALIDATE_FLOAT);
$contacto = filter_input(INPUT_POST, 'contacto', FILTER_VALIDATE_FLOAT);
$nomePai = filter_input(INPUT_POST, 'nomePai', FILTER_VALIDATE_FLOAT);
$endereco = filter_input(INPUT_POST, 'enderecop', FILTER_VALIDATE_FLOAT);
$contacto = filter_input(INPUT_POST, 'contactop', FILTER_VALIDATE_FLOAT);




    $sql = $pdo->prepare("INSERT INTO pacientes (codBebe, dataNascimento, tipoParto, situacaoMedica, nomeMae, endereco, contacto, nomePai, enderecop, contactop) VALUES  (:codBebe, :dataNascimento, :tipoParto, :situacaoMedica, :nomeMae, :endereco, :contacto, :nomePai, :enderecop, :contactop)");
    $sql->bindParam(':codBebe', $codBebe);
    $sql->bindParam(':dataNascimento', $dataNascimento);
    $sql->bindParam(':tipoParto', $tipoParto);
    $sql->bindParam(':situacaoMedica', $situacaoMedica);
    $sql->bindParam(':nomeMae', $nomeMae);
    $sql->bindParam(':endereco', $enderec);
    $sql->bindParam(':contacto', $contacto);
    $sql->bindParam(':nomePai', $nomePai);
    $sql->bindParam(':enderecop', $enderecop);
    $sql->bindParam(':contactop', $contactop);
    $sql->execute();
         
    header('Location: index.php');
    exit();


?>
