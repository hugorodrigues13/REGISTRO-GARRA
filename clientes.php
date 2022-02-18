<?php
include('conexao.php');

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
  <title>LISTA DE ALUNOS</title>


<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
 
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

</head>


<body>



  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="painel_funcionario.php"><big><big><i class="fa fa-arrow-left"></i></big></big></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
    <ul class="navbar-nav mr-auto">
      
    </ul>

     <form class="form-inline my-2 my-lg-0">
      <input name="txtpesquisarcpf" id="txtcpf" class="form-control mr-sm-2" type="search" placeholder="Buscar pelo CPF" aria-label="Pesquisar">
      <button name="buttonPesquisarCPF" class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
    </form>

   <form class="form-inline my-2 my-lg-0 mr-4">
      <input name="txtpesquisar" class="form-control mr-sm-2" type="search" placeholder="Buscar pelo nome" aria-label="Pesquisar">
      <button name="buttonPesquisar" class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</nav>





<div class="container">


    

      <br>


          
        </div>


          <div class="content">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title"> LISTA DE ALUNOS</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">



                        <!--LISTAR TODOS OS CLIENTES -->

                        <?php

                            if(isset($_GET['buttonPesquisar']) and $_GET['txtpesquisar'] !=''){
                              $nome = $_GET['txtpesquisar'] . '%';
                              $query = "select * from funcionarios where nome LIKE
                               '$nome' order by nome asc ";

                          }else if(isset($_GET['buttonPesquisarCPF']) and $_GET['txtpesquisarcpf'] !=''){
                              $nome = $_GET['txtpesquisarcpf'];
                              $query = "select * from funcionarios where cpf =
                               '$nome' order by nome asc ";

                          }else{
                              $query = "select * from funcionarios order by nome asc ";

                          }


                        

                            $result = mysqli_query($conexao, $query);
                            //$dado = mysqli_fetch_array($result);
                            $row = mysqli_num_rows($result);

                            if($row == ''){

                              echo "<h3> Não existem dados cadastrados no banco! </h3>";

                            }else{
                              
                                ?>


                      <table class="table">
                        <thead class=" text-primary">
                          
                        <th>
                            Nome
                          </th>
                          <th>
                            CPF
                          </th>
                          <th>
                            Graduação
                          </th>
                          <th>
                            Data Graduação
                          </th>
                           <th>
                            Endereço
                          </th>
                            <th>
                            Cargo
                          </th>
                           </th>
                            <th>
                            Data Nascimento
                          </th>
                          <th>
                          Filiacao
                          </th>
                          <th>
                          Registro
                          </th>
                           </th>
                           
                        </thead>
                        <tbody>
                         
                         <?php

      while($res_1 = mysqli_fetch_array($result)){
            $nome = $res_1["nome"];
            $cpf = $res_1["cpf"];
            $graduacao = $res_1["graduacao"];
            $dataGra = $res_1["dataGra"];
            $endereco = $res_1["endereco"];
            $cargo = $res_1["cargo"];
            $data = $res_1["data"];
            $filiacao = $res_1["filiacao"];
            $numRegistro = $res_1["numRegistro"];
            $id = $res_1["id"];

            $data2 = implode('/', array_reverse(explode('-', $data)));

  ?>

                            <tr>
                            <td><?php echo $nome; ?></td>
                             <td><?php echo $cpf; ?></td> 
                             <td><?php echo $graduacao; ?></td>
                             <td><?php echo $dataGra; ?></td>
                             <td><?php echo $endereco; ?></td>
                             <td><?php echo $cargo; ?></td>
                             <td><?php echo $data; ?></td>
                             <td><?php echo $filiacao; ?></td>
                             <td><?php echo $numRegistro; ?></td>
                             <td>
                                   
                            </tr>

                            <?php  
                               }
                             ?>

                         

                        </tbody>
                      </table>
                       <?php  
                               }
                             ?>
                    </div>
                  </div>
                </div>
              </div>

</div>




 <!-- Modal -->
      <div id="modalExemplo" class="modal fade" role="dialog">
        <div class="modal-dialog">
         <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title">Alunos Registrados</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

              <form method="POST" action="">
              <div class="form-group">
              <label for="id_produto">Nome</label>
                <input type="text" class="form-control mr-2" name="txtnome" placeholder="Nome" required>
              </div>
               <div class="form-group">
                <label for="fornecedor">CPF</label>
                 <input type="text" class="form-control mr-2" name="txtcpf" id="txtcpf" placeholder="CPF" required>
              </div>
              <div class="form-group">
                <label for="id_produto">Graduação</label>
                <input type="text" class="form-control mr-2" name="txtgraduacao" id="txtgraduacao" placeholder="Graduação" required>
              </div>
              <div class="form-group">
                <label for="id_produto">Data Graduação</label>
                <input type="text" class="form-control mr-2" name="txtdataGra" id="txtdataGra" placeholder="Data da Graduação" required>
              </div>
              <div class="form-group">
                <label for="quantidade">Endereço</label>
                <input type="text" class="form-control mr-2" name="txtendereco" placeholder="Endereço" required>
              </div>
              <div class="form-group">
                <label for="id_produto">Data Nascimento</label>
                <input type="text" class="form-control mr-2" name="txtdata" id="txtdata" placeholder="Data de Nascimento" required>
              </div>
              <div class="form-group">
                <label for="id_produto">Filiacao</label>
                <input type="text" class="form-control mr-2" name="txtfiliacao" id="txtfiliacao" placeholder="Filiação" required>
              </div>
              <div class="form-group">
                <label for="id_produto">Registro</label>
                <input type="text" class="form-control mr-2" name="txtregistro" id="txtregistro" placeholder="Numero de Registro" required>
              </div>
               <div class="form-group">
                <label for="fornecedor">Cargo</label>
                 <input type="text" class="form-control mr-2" name="txtcpf" id="txtcpf" placeholder="CPF" required>
              </div>
            </div>
                   
        

                </form>

          </div>
        </div>
      </div>    




</body>
</html>


<!--CADASTRAR -->

<?php
if(isset($_POST['button'])){
  $nome = $_POST['txtnome'];
  $graduacao = $_POST['txtgraduacao'];
  $dataGra = $_POST['txtdataGra'];
  $endereco = $_POST['txtendereco'];
  $cargo = $_POST['cargo'];
  $cpf = $_POST['txtcpf'];
  $data = $_POST['txtdata'];
  $filiacao = $_POST['txtfiliacao'];
  $numRegistro = $_POST['txtregistro'];

//VERIFICAR SE O CPF JA ESTA CADASTRADO
$query_verificar = "select * from clientes where cpf = '$cpf'";

$result_verificar = mysqli_query($conexao, $query_verificar);
$row_verificar = mysqli_num_rows($result_verificar);


if($row_verificar > 0){
   echo "<script language='javascript'> window.alert('CPF já cadastrado');</script>";
   exit();

}

  $query = "INSERT into clientes (nome, cpf, graduacao, dataGra endereco, cargo, data, filiacao, numRegistro) 
            VALUES ('$nome', '$cpf', '$graduacao', '$dataGra', '$endereco', '$cargo',  curDate(),  '$filiacao', '$numRegistro' )";
        $result = mysqli_query($conexao, $query);

            if($result == ''){
              echo "<script language='javascript'> window.alert('Ocorreu um erro ao cadastrar!');</script>";
            }else{
              echo "<script language='javascript'> window.alert('Salvo com sucesso!');</script>";
              echo "<script language='javascript'> window.location='clientes.php';</script>";
            }
}

?>

  <!-- EXCLUIR -->

  <?php
  if(@$_GET['func'] == 'deleta'){
    $id = $_GET['id'];
    $query = "DELETE FROM funcionarios where id = '$id'";
    mysqli_query($conexao, $query);
     echo "<script language='javascript'> window.location='clientes.php';</script>";

  }
  ?>

    <!-- EDITAR -->

  <?php
  if(@$_GET['func'] == 'edita'){ 
    $id = $_GET['id'];  
    $query_editar = "select * from funcionarios where id = '$id'";
    $result_editar = mysqli_query($conexao, $query_editar);

    while($res_1 = mysqli_fetch_array($result_editar)){
        
?>

<!-- Modal -->
      <div id="modalEditar" class="modal fade" role="dialog">
        <div class="modal-dialog">
         <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title">Registro</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">

              <form method="POST" action="">

              <div class="form-group">
                <label for="id_produto">Nome</label>
                <input type="text" class="form-control mr-2" name="txtnome" placeholder="Nome"
                 value="<?php echo $res_1['nome'];?>" required>
              </div>

              <div class="form-group">
              <label for="id_produto">Graduacao</label>
                <input type="text" class="form-control mr-2" name="txtgraduacao" id="txtgraduacao" placeholder="Graduação"
                 value="<?php echo $res_1['graduacao'];?>" required>
              </div>

              <div class="form-group">
                <label for="quantidade">Endereço</label>
                <input type="text" class="form-control mr-2" name="txtendereco" placeholder="Endereço"
                  value="<?php echo $res_1['endereco'];?>" required>
              </div>

               <div class="form-group">
               <label for="id_produto">Data</label>
                <input type="text" class="form-control mr-2" name="txtdata" id="txtdata" placeholder="Data de Nascimento"
                  value="<?php echo $res_1['data'];?>" required>
              </div>

              <div class="form-group">
                <label for="id_produto">Filiacao</label>
                <input type="text" class="form-control mr-2" name="txtfiliacao" id="txtfiliacao" placeholder="Filiação" 
                value="<?php echo $res_1['filiacao'];?>" required>
              </div>

              <div class="form-group">
                <label for="id_produto">NumRegistro</label>
                <input type="text" class="form-control mr-2" name="txtregistro" id="txtregistro" placeholder="Numero de Registro" 
                value="<?php echo $res_1['registro'];?>" required>
              </div>

              <div class="form-group">
                <label for="fornecedor">CPF</label>
                 <input type="text" class="form-control mr-2" name="txtcpf" id="txtcpf" placeholder="CPF"
                 value="<?php echo $res_1['cpf'];?>" required>
              </div>

            </div>
                   
            
                </form>

            </div>
          </div>
        </div>
      </div>    



<script> $("#modalEditar").modal("show")</script>
  
<!-- Comando para editar os dados -->


    //VERIFICAR SE O CPF JA ESTA CADASTRADO
$query_verificar = "select * from clientes where cpf = '$cpf'";

$result_verificar = mysqli_query($conexao, $query_verificar);
$row_verificar = mysqli_num_rows($result_verificar);


if($row_verificar > 0){
   echo "<script language='javascript'> window.alert('CPF já cadastrado');</script>";
   exit();

  }


}

  $query_editar = "UPDATE clientes set nome = '$nome', telefone = '$telefone', endereco = '$endereco', email = '$email', cpf = '$cpf' where id = '$id'";

        $result_editar = mysqli_query($conexao, $query_editar);

            if($result_editar == ''){
              echo "<script language='javascript'> window.alert('Ocorreu um erro ao editar!');</script>";
            }else{
              echo "<script language='javascript'> window.location='clientes.php';</script>";
            }
}

?>


<?php } } ?>
  
<!--MASCARAS -->

<script type="text/javascript">
$(document).ready(function(){
  $('#txttelefone').mask('(00) 00000-0000');
  $('#txtcpf').mask('000.000.000-00');
});
</script>

