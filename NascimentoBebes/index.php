
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require 'connect.php';

$lista = [];
$sql = $pdo->query("SELECT *FROM  pacientes");
if($sql->rowCount() > 0);
{
    $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
}

    ?>
    
    <form method="post">
            <table cellpadding="2" cellspacing="3" class="table table-dark table-striped">
                <tr>
                    <td>Pesquisa</td>
                    <td><input type="text" name="marca" placeholder="Pesquisar"></td>
                    <td colspan="2"><button type="submit" name="Procurar"class="btn btn-primary">Procurar</button> </td>
                </tr>
        </form>

    <h2>Dados Atuais</h2>

 
   
    <table border="1">
        <tr>
            <th>ID</th>
            <th>codigo do Bebe</th>
            <th>data de nascimento</th>
            <th>TIPO DE PARTO</th>
            <th>SITUACAO MEDICA</th>
            <th>NOME DA MAE</th>
            <th>ENDERECO</th>
            <th>CONTACTO</th>
            <th>NOME DO PAI</th>
            <th>ENDERECO</th>
            <th>CONTACTO</th>
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
        
<!--funcaqo pra pesquisar--->
        

<?php
        if (isset($_POST['codBebe'])) {
            $valor = $_POST['codBebe'];
            require 'connect.php';
            $pesq = "%$valor%";
            $cmd = $pdo->prepare('SELECT * FROM pacientes WHERE marca LIKE :n ORDER BY id ASC');
            if (isset($_POST['codBebe'])) {
                $valor = $_POST['codBebe'];
                require 'connect.php';
                $pesq = "%$valor%";
                $cmd = $pdo->prepare('SELECT * FROM pacientes
                WHERE codBebe LIKE :n ORDER BY id_paciente ASC');
                $cmd->bindValue(':n', $pesq);
                $cmd->execute();
                if ($cmd->rowcount() > 0) {
                    while ($dados = $cmd->fetch(PDO::FETCH_ASSOC)) { ?>
                        <tr>
                            <td>
                                <?php echo $dados['id_paciente']; ?>
                            </td>
                            <td>
                                <?php echo $dados['codBebe']; ?>
                            </td>
                            <td>
                                <?php echo $dados['dataNascimento']; ?>
                                </td>
                            <td>
                                <?php echo $dados['tipoParto']; ?>
                                </td>
                            <td>
                                <?php echo $dados['situacaoMedica']; ?>
                                </td>
                            <td>
                                <?php echo $dados['nomeMae']; ?>
                            </td>
                            <td>
                                <?php echo $dados['endereco']; ?>
                            </td>
                            <td>
                                <?php echo $dados['contacto']; ?>
                            </td>
                            <td>
                                <?php echo $dados['nomePai']; ?>
                            </td>
                            <td>
                                <?php echo $dados['enderecop']; ?>
                            </td>
                            <td>
                                <?php echo $dados['contactop']; ?>
                            </td>
                           
                        </tr>
                    <?php }
                } else {
                } ?>
                <tr>
                    <td colspan="6">
                        <center>Nao foram encontrados registos!
                    </td>
                <tr>
                <?php }
        } ?>


        </td>
    </tr>
<?php endforeach; ?>

    <a href="cadastrar.php">cadastrar</a>

<!---funcao para validacao dos campos com apenas jQuery-->
<script>
const form  =  document.getElementById('form');
const campos = document.querySelectorAll('.required');
const spans  = document.querySelectorAll('.span-required');
const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
const precoRegex = /^\d+(\.\d{1,2})?$/;


function setError(index){
   campos[index].style.border = '2px solid #e63636';
   spans[index].style.display = 'block';
}
function removeError(index){
    campos[index].style.border = '';
   spans[index].style.display = 'none';
}
//valida a insercao do cliente

function nameValidate(){
    if(campos[0].value.length < 3) 
    {
        setError(0);
    }
    else{
        removeError(0);
    }
    
}
function emailValidate(){
    if(!emailRegex.test(campos[1].value ))
    {
        setError(1);
    }
    else
    {
        removeError(1);
    }
}

function contactValidate() {
    const contactValue = campos[2].value;

    if (!/^\d{8}$/.test(contactValue)) {
        setError(2);
    } else {
        removeError(2);
    }
}
//valida a insersao da viatura
function modelValidate(){
    if(campos[3].value.length < 2) 
    {
        setError(3);
    }
    else{
        removeError(3);
    }
}

function yearValidate() {
    const yearValue = campos[4].value;

    if (!/^\d+$/.test(modelValue)) {
        setError(4);
    } else {
        removeError(4);
    }
}

// Adiciona eventos de validação aos campos
$(document).ready(function () {
    campos[0].addEventListener('blur', nameValidate);
    campos[1].addEventListener('blur', emailValidate);
    campos[2].addEventListener('blur', contactValidate);
    campos[3].addEventListener('blur', modelValidate);
    campos[4].addEventListener('blur',  yearValidate);
    campos[5].addEventListener('blur',  precoValidate);
    

    campos[4].addEventListener('input', function() {
    const yearValue = campos[4].value;

    if (!/^\d{4}$/.test(yearValue)) {
        setError(4);
    } else {
        removeError(4);
    }
});

});


function precoValidate() {
    const precoValue = campos[5].value;

    if (/^\d+(\.\d{1,2})?$/.test(precoValue)) {
        removeError(5);
    } else {
        setError(5);
    }
}
//validacao do checkbox
form.addEventListener('submit', function(event) {
    const checkboxes = document.querySelectorAll('input[name="cor[]"]');
    let isChecked = false;

    checkboxes.forEach(function(checkbox) {
        if (checkbox.checked) {
            isChecked = true;
        }
    });

    if (!isChecked) {
        alert('Por favor, selecione pelo menos uma cor.');
        event.preventDefault(); // Impede o envio do formulário
    }
});




</script>


</body>
</html>