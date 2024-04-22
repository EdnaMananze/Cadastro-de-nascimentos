<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de nascimento de Bebes</title>

 <link rel="stylesheet" href="style.css">
    <script src=""></script>

</head>
<body>

   
    <form  action="cadastrar.php" method="POST" id="form">
        <label for="codBebe">codigo do Bebe:</label>
        <input type="text" name="codBebe" class="inputs required" oninput="nameValidate()">
        <span class="span-required"> s </span>
        <label for="dataNascimento">dataNascimento:</label>
        <input type="text" name="dataNascimento" class="inputs required">
        <span class="span-required" > </span>

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
        <input type="submit" value="Enviar">
</form>

  
<?php
require 'connect.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $codBebe = $_POST['codBebe'];
    $dataNascimento = $_POST['dataNascimento'];
    $tipoParto = $_POST['tipoParto'];
    $situacaoMedica = $_POST['situacaoMedica'];
    $nomeMae = $_POST['nomeMae'];
    $endereco = $_POST['endereco'];
    $contacto = $_POST['contacto'];
    $nomePai = $_POST['nomePai'];
    $enderecop = $_POST['enderecop'];
    $contactop = $_POST['contactop'];

   
    $sql = $pdo->prepare("INSERT INTO pacientes (codBebe, dataNascimento, tipoParto, situacaoMedica, nomeMae, endereco, contacto, nomePai, enderecop, contactop) VALUES  (:codBebe, :dataNascimento, :tipoParto, :situacaoMedica, :nomeMae, :endereco, :contacto, :nomePai, :enderecop, :contactop)");
    $sql->bindParam(':codBebe', $codBebe);
    $sql->bindParam(':dataNascimento', $dataNascimento);
    $sql->bindParam(':tipoParto', $tipoParto);
    $sql->bindParam(':situacaoMedica', $situacaoMedica);
    $sql->bindParam(':nomeMae', $nomeMae);
    $sql->bindParam(':endereco', $endereco);
    $sql->bindParam(':contacto', $contacto);
    $sql->bindParam(':nomePai', $nomePai);
    $sql->bindParam(':enderecop', $enderecop);
    $sql->bindParam(':contactop', $contactop);
    $sql->execute();

   
    if ($sql->rowCount() > 0) {
    header("Location:index.php");
    } else {
        echo "Erro ao inserir os dados no banco de dados.";
    }
}
?>
