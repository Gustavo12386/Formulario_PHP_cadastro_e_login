<?php

if(isset($_POST['submit'])){
  
include_once('config.php');

$nome = $_POST['nome'];
$senha = $_POST['senha'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$sexo = $_POST['genero'];
$data_nasc = $_POST['data_nascimento'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$endereco = $_POST['endereco'];

$result = mysqli_query($conexao, "INSERT INTO usuarios(nome, senha, email, telefone, sexo, data_nasc, cidade, estado, endereco)
VALUES ('$nome', '$senha', '$email', '$telefone', '$sexo', '$data_nasc', '$cidade', '$estado', '$endereco')");

header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <style>
      body {
           font-family: Arial, Helvetica, sans-serif;
           background-image: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
      }
      .box{
        color: white;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: rgba(0, 0, 0, 0.6);
        padding: 10px;
        border-radius: 15px;
        width: 30%;
      }
      fieldset{
        border: 3px solid dodgerblue;
      }
      legend{
        border: 1px solid dodgerblue;
        padding: 10px;
        text-align: center;
        background-color: dodgerblue;
        border-radius: 8px;        
      }
      .inputBox{
          position: relative;
      }
      .InputUser{
        background: none;
        border: none;
        border-bottom: 1px solid white;
        outline: none;
        color: white;
        font-size: 15px;
        width: 100%;
        letter-spacing: 2px;
      }
      .labelInput{
        position: absolute;
        top: 0px;
        left: 0px;
        pointer-events: none;
        transition: .5s;
      }
      .InputUser:focus ~ .labelInput,
      .InputUser:valid ~ .labelInput{      
        top: -20px;
        font-size: 12px;
        color: dodgerblue;
      }
      #data_nascimento{
        border: none;
        padding: 8px;
        border-radius: 10px;
        outline: none;
        font-size: 15px;
      }
      #submit{
        background-image: linear-gradient(to right, rgb(0, 92, 197), rgb(90, 20, 220));
        width: 30%;
        border: none;
        padding: 15px;
        color: white;
        font-size: 15px;
        cursor: pointer;
        border-radius: 10px;
      }
      
    </style>    
</head>
<body>
    <div class="box">
      <form action="formulario.php" method="POST">
         <fieldset>
            <legend><b>Formulário de Clientes</b></legend>
            <br>
            <div class="inputBox">
              <input type="text" name="nome" id="nome" class="InputUser">
              <label for="nome" class="labelInput">Nome completo</label>
            </div>
            <br><br>
            <div class="inputBox">
              <input type="password" name="senha" id="senha" class="InputUser">
              <label for="senha" class="labelInput">Senha</label>
            </div>
            <br><br>
            <div class="inputBox">
              <input type="text" name="email" id="email" class="InputUser">
              <label for="email" class="labelInput">Email</label>
            </div>
            <br><br>
            <div class="inputBox">
              <input type="tel" name="telefone" id="telefone" class="InputUser">
              <label for="telefone" class="labelInput">Telefone</label>
            </div>
            <br>
            <p>Sexo:</p>
            <input type="radio" id="feminino" name="genero" value="feminino" required>
            <label for="feminino">Feminino</label>
            <input type="radio" id="masculino" name="genero" value="masculino" required>
            <label for="masculino">Masculino</label>
            <input type="radio" id="outro" name="genero" value="outro" required>
            <label for="outro">Outro</label>
            <br><br>
            <div class="inputBox">
              <label for="data_nascimento"><b>Data de Nascimento</b></label>
              <input type="date" name="data_nascimento" id="data_nascimento" class="InputUser">              
            </div>
            <br><br>
            <div class="inputBox">
              <input type="text" name="cidade" id="cidade" class="InputUser">
              <label for="cidade" class="labelInput">Cidade</label>
            </div>
            <br><br>
            <div class="inputBox">
              <input type="text" name="estado" id="estado" class="InputUser">
              <label for="estado" class="labelInput">Estado</label>
            </div>
            <br><br>
            <div class="inputBox">
              <input type="text" name="endereco" id="endereco" class="InputUser">
              <label for="endereco" class="labelInput">Endereço</label>
            </div>
            <br><br>
            <input type="submit" name="submit" id="submit">
        </fieldset>
      </form>
    </div>
</body>
</html>