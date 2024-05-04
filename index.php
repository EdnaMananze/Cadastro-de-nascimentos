<?php
require 'connect.php';

$lista = [];
$sql = $pdo->query("SELECT * FROM pacientes");
if($sql->rowCount() > 0) {
    $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
}

if (isset($_POST['campoPesquisa']) && isset($_POST['valorPesquisa'])) {
    $campo = $_POST['campoPesquisa'];
    $valor = $_POST['valorPesquisa'];
    $pesq = "%$valor%";
    $cmd = $pdo->prepare("SELECT * FROM pacientes WHERE $campo LIKE :n ORDER BY id_paciente ASC");
    $cmd->bindValue(':n', $pesq);
    $cmd->execute();
    $pesquisa_resultados = $cmd->fetchAll(PDO::FETCH_ASSOC);
}

?>

<form method="post">
    <label for="campoPesquisa">Campo de Pesquisa:</label>
    <select name="campoPesquisa" id="campoPesquisa">
        <option value="codBebe">Código do Bebê</option>
        <option value="dataNascimento">Data de Nascimento</option>
        <option value="tipoParto">Tipo de Parto</option>
        <option value="situacaoMedica">Situação Médica</option>
        <option value="nomeMae">Nome da Mãe</option>
        <option value="endereco">Endereço</option>
        <option value="contacto">Contato</option>
        <option value="nomePai">Nome do Pai</option>
        <option value="enderecop">Endereço do Pai</option>
        <option value="contactop">Contato do Pai</option>
    </select>
    <input type="text" name="valorPesquisa" placeholder="Pesquisar">
    <button type="submit" name="Procurar">Procurar</button>
</form>

<h2>Dados Atuais</h2>
 <a href="cadastrar.php">Cadastrar</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Código do Bebê</th>
        <th>Data de Nascimento</th>
        <th>Tipo de Parto</th>
        <th>Situação Médica</th>
        <th>Nome da Mãe</th>
        <th>Endereço</th>
        <th>Contato</th>
        <th>Nome do Pai</th>
        <th>Endereço do Pai</th>
        <th>Contato do Pai</th>
        <th>Accoes</th>
    </tr>

    <?php foreach($lista as $pacientes): ?>
        <tr>
            <td><?=$pacientes['id_paciente'];?></td>
            <td><?=$pacientes['codBebe'];?></td>
            <td><?=$pacientes['dataNascimento'];?></td>
            <td><?=$pacientes['tipoParto'];?></td>
            <td><?=$pacientes['situacaoMedica'];?></td>
            <td><?=$pacientes['nomeMae'];?></td>
            <td><?=$pacientes['contacto'];?></td>
            <td><?=$pacientes['endereco'];?></td>
            <td><?=$pacientes['nomePai'];?></td>
            <td><?=$pacientes['contactop'];?></td>
            <td><?=$pacientes['enderecop'];?></td>
            <td>
                <a href="editar.php?id_paciente=<?php echo $pacientes['id_paciente']; ?>">Editar</a>
                <a href="excluir.php?id_paciente=<?php echo $pacientes['id_paciente']; ?>">Excluir</a>
            </td>
        </tr>
    <?php endforeach; ?>

    <?php if (isset($pesquisa_resultados)): ?>
        <?php foreach ($pesquisa_resultados as $dados): ?>
            <tr>
                <td><?=$dados['id_paciente'];?></td>
                <td><?=$dados['codBebe'];?></td>
                <td><?=$dados['dataNascimento'];?></td>
                <td><?=$dados['tipoParto'];?></td>
                <td><?=$dados['situacaoMedica'];?></td>
                <td><?=$dados['nomeMae'];?></td>
                <td><?=$dados['endereco'];?></td>
                <td><?=$dados['contacto'];?></td>
                <td><?=$dados['nomePai'];?></td>
                <td><?=$dados['enderecop'];?></td>
                <td><?=$dados['contactop'];?></td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>

</table>
