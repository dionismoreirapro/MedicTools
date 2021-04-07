
<?php 
$id = $_GET['id'];

include('../../conexao.php');

?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<style>

    @page {
        margin: 0px;
            
    }
    .container {
        position: relative;
    }    

    #imagem {
        width: 100%;
        position: absolute;
    }
    .area-texto p{
        margin-top: 500px;
        margin-left: 10px;
        margin-right: 10px;
    }
    .assinatura-medico {
        text-align: center;
      
    }
    .dados_medicos{
        text-align: center;
        padding-top: -30px;
    }
    .assinatura_medico{
        text-align: center;
        padding-top: 200px;
    }
</style>
 
<div class="container">
    <img id="imagem" src="../../img/atestado-fundo.jpeg">
    
</div>

<div class="container">

  <?php

    $res = $pdo->query("SELECT * from consultas where id = '$id'");
    $dados = $res->fetchAll(PDO::FETCH_ASSOC);
    $row = count($dados);

    for ($i=0; $i < count($dados); $i++) { 
            foreach ($dados[$i] as $key => $value) {
            }
           
            $paciente = $dados[$i]['paciente'];
            $medico = $dados[$i]['medico'];
            $data = $dados[$i]['data'];
            $atestado = $dados[$i]['atestado'];
            $hora = $dados[$i]['hora'];
            
            $data2 = implode('/', array_reverse(explode('-', $data)));

            //BUSCAR O NOME DO MEDICO
            $res_medico = $pdo->query("select * from medicos where id = '$medico'");
            $dados_medico = $res_medico->fetchAll(PDO::FETCH_ASSOC);
            $nome_medico = $dados_medico[0]['nome'];
            $crm = $dados_medico[0]['crm'];

            //BUSCAR O NOME DO PACIENTE
            $res_paciente = $pdo->query("select * from pacientes where id = '$paciente'");
            $dados_paciente = $res_paciente->fetchAll(PDO::FETCH_ASSOC);
            $nome_paciente = $dados_paciente[0]['nome'];
            $cpf_paciente = $dados_paciente[0]['cpf'];
   }  
?>

<div class="area-texto">
    <p> Atesto para os devidos fins, que o Sr. <?php echo $nome_paciente ?>, inscrito no CPF n.º <?php echo $cpf_paciente ?>, foi atendido no dia <?php echo $data2 ?> às <?php echo $hora ?> apresentando um quadro que o impossibilita realizar qualquer tipo de tarefa ou trabalho e necessita de <strong><?php echo $atestado ?></strong> dias de repouso. </p>
    <br><br><br>
</div>
<div class="assinatura_medico">
        <p>--------------------------------------------------------------------------------------------</p>
</div>
<div class="dados_medicos"> 
    <p><?php echo $nome_medico ?> - CRM <?php echo $crm ?> <br><br></p>
    <p><?php echo $cidade ?> - <?php echo $data2 ?><br></p>
    


</div>
    














