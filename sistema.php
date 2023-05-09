<?php
session_start();
include_once('config.php');

if((!isset($_SESSION['email']) == true) and (!isset($_POST['senha']) == true))
{
   unset($_SESSION['email']);
   unset($_SESSION['senha']); 
   header('Location: login.php');    
}
$logado = $_SESSION['email'];
if(!empty($_GET['search']))
{
  $data = $_GET['search'];
  $sql = "SELECT * FROM usuarios WHERE id LIKE '%$data' or nome LIKE '$data' or email LIKE '$data' ORDER BY id ASC";
}
else
{ 
  $sql = "SELECT * FROM usuarios ORDER BY id ASC";
}

$result = $conexao->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <title>Sistema</title>
    <style>
       body{
        background: linear-gradient(to right, rgb(20, 147, 220), rgb(17,54,71)); 
        color: white; 
        text-align: center;    
       }
       .table-bg{
         background: rgba(0, 0, 0, 0.3);
         border-radius: 15px 15px 0 0;
       }
       .box-search{
         display: flex;
         justify-content: center;
         gap: .3%;
       }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container-fluid">
         <a class="navbar-brand" href="#">Formulario PHP</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>
      </div>
      <div class="d-flex">
        <a href="sair.php" class="btn btn-danger me-5">Sair</a>
      </div>
    </nav>
    <br>
    <?php
     echo "<h1>Bem vindo <u>$logado</u></h1>";
    ?>
    <br>
    <div class="box-search">
        <input type="search" class="form-control w-25" placeholder="pesquisar" id="pesquisar">
        <button onclick="searchData()" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
      <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
      </svg>
        </button>
    </div>
    <div class="m-5">
         <table class="table text-white table-bg">
      <thead>
         <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Senha</th>
            <th scope="col">Email</th>
            <th scope="col">Telefone</th>
            <th scope="col">Sexo</th>
            <th scope="col">Data de Nascimento</th>
            <th scope="col">Cidade</th>
            <th scope="col">Estado</th>
            <th scope="col">Endereço</th>
            <th scope="col">...</th>
         </tr>
      </thead>
      <tbody>
          <?php
            while($user_data = mysqli_fetch_assoc($result)){
               echo "<tr>";
               echo "<td>".$user_data['id']."</td>";
               echo "<td>".$user_data['nome']."</td>";
               echo "<td>".$user_data['senha']."</td>";
               echo "<td>".$user_data['email']."</td>";
               echo "<td>".$user_data['telefone']."</td>";
               echo "<td>".$user_data['sexo']."</td>";
               echo "<td>".$user_data['data_nasc']."</td>";
               echo "<td>".$user_data['cidade']."</td>";
               echo "<td>".$user_data['estado']."</td>";
               echo "<td>".$user_data['endereco']."</td>";
               echo "<td>
               <a class='btn btn-sm btn-primary' href='edit.php?id=$user_data[id]'>
               <svg width='24' stroke-width='1.5' height='24' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'> <path d='M20 12V5.74853C20 5.5894 19.9368 5.43679 19.8243 5.32426L16.6757 2.17574C16.5632 2.06321 16.4106 2 16.2515 2H4.6C4.26863 2 4 2.26863 4 2.6V21.4C4 21.7314 4.26863 22 4.6 22H11' stroke='currentColor' stroke-linecap='round' stroke-linejoin='round'/> <path d='M8 10H16M8 6H12M8 14H11' stroke='currentColor' stroke-linecap='round' stroke-linejoin='round'/> <path d='M16 5.4V2.35355C16 2.15829 16.1583 2 16.3536 2C16.4473 2 16.5372 2.03725 16.6036 2.10355L19.8964 5.39645C19.9628 5.46275 20 5.55268 20 5.64645C20 5.84171 19.8417 6 19.6464 6H16.6C16.2686 6 16 5.73137 16 5.4Z' fill='currentColor' stroke='currentColor' stroke-linecap='round' stroke-linejoin='round'/> <path d='M17.9541 16.9394L18.9541 15.9394C19.392 15.5015 20.102 15.5015 20.5399 15.9394V15.9394C20.9778 16.3773 20.9778 17.0873 20.5399 17.5252L19.5399 18.5252M17.9541 16.9394L14.963 19.9305C14.8131 20.0804 14.7147 20.2741 14.6821 20.4835L14.4394 22.0399L15.9957 21.7973C16.2052 21.7646 16.3988 21.6662 16.5487 21.5163L19.5399 18.5252M17.9541 16.9394L19.5399 18.5252' stroke='currentColor' stroke-linecap='round' stroke-linejoin='round'/>
               </svg>
               </a>
               <a class='btn btn-sm btn-danger' href='delete.php?id=$user_data[id]'>
                  <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                  <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                  </svg>                
               </a>
               </td>";
               echo "</tr>";
            }
          ?>
      </tbody>
      </table>
    </div>
</body>
<script>
  var search = document.getElementById('pesquisar');
  
  search.addEventListener("keydown", function(event){
      if(event.key == "Enter")
      {
        searchData();
      }
  });
  function searchData()
  {
   window.location = 'sistema.php?search='+search.value;    

  }
</script>   
</html>
