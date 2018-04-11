<?php

if ($_POST) {
  //Primeiro deve-se validar no cliente e depois no servidor, por causa do tempo e caso não seja necessário
  //Supondo que já está validado no cliente
  if(empty($_POST["name"])){
    $nameErr = "Nome é um campo obrigatório";
  } else {
    $name = test_input($_POST["name"]);
  }

  if(empty($_POST["apelido"])){
    $apelidoErr = "Apelido é um campo obrigatório";
  } else {
    $apelido = test_input($_POST["apelido"]);
  }

  if(empty($_POST["email"])){
    $emailErr = "Email é um campo obrigatório";
  } else {
    $email = test_input($_POST["email"]);
  }
  if(empty($_POST["localidade"])){
    $localidadeErr = "Localidade é um campo obrigatório";
  } else {
    $localidade = test_input($_POST["localidade"]);
  }

  if(!empty($_FILES['uploaded_file'])){
    $path = "uploads/"; //não podemos pôr o caminho todo
    $path = $path . basename( $_FILES['uploaded_file']['name']); //caminho = caminho concatenado com a directoria e com o nome do formulário
    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)){ //ficheiro submetido
      echo "O ficheiro ". basename( $_FILES['uploaded_file']['name'])."foi submetido.";
    } else {
      echo "Houve um erro no upload do ficheiro.";
    }
  }

  if ((!empty($nameErr)) || (!empty($websiteErr)) || (!empty($commentErr)) ||(!empty($genderErr))) {
    ?>
    <h2>Errors:</h2>
    
    <?
    }

    //name
    if ((!empty($nameErr)) ) {
      ?>
     
      <ul>
        <li><? echo $nameErr;?></li> 
      </ul>
      <?
      }
   //apelido
   if ((!empty($apelidoErr)) ) {
    ?>
    
    <ul>
      <li><? echo $apelidoErr;?></li> 
    </ul>
    <?
    }
    //email
    if ((!empty($emailErr)) ) {
      ?>
      
      <ul>
        <li><? echo $emailErr;?></li> 
      </ul>
      <?
      }
      //localidade
      if ((!empty($localidadeErr)) ) {
        ?>
        
        <ul>
          <li><? echo $localidadeErr;?></li> 
        </ul>
        <?
        }



    if ((!empty($name)) || (!empty($website)) || (!empty($comment)) ||(!empty($gender))) {
      ?>
      <h2>Resultados do formulário:</h2>
      <ul>
        <li><?=$name;?></li>
        <li><?=$apelido;?></li>
        <li><?=$email;?></li>
        <li><?=$localidade;?></li>
      </ul>
      <?
  }
}

function test_input($data){ //função test_input recebe uma variável data
  $data = trim($data); //variável data fica sem espaços
  $data = stripslashes($data); //variável data fica sem as barras
  $data = htmlspecialchars($data); //variável data fica sem caracteres especiais
  return $data;






//***********************************
$mensagem= '
Olá '.$name.' '.$apelido.',

É bom saber que os nossos utilizadores de '.$localidade.' nos enviam ficheiros com a extensão '.pathinfo($path, PATHINFO_EXTENSION).'.

Cumprimentos,

Bruno Silva, Nº 15330';

//********************************************
mail($email, "TP1 Form", $mensagem, 'From: bruno1204998@gmail.com');

}
 ?>



