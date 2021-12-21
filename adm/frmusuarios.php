<?php 
$idusuario = isset($_GET["idusuario"]) ? $_GET["idusuario"]:null;
$op = isset($_GET["op"]) ? $_GET["op"]: null;
 
try {
    $servidor= "localhost";
    $usuario = "root";
    $senha = "";
    $bd = "bdprojeto";
    $con = new PDO ("mysql:host=$servidor;dbname=$bd",$usuario,$senha);

    if($op=="del"){
        $sql = "DELETE FROM tblusuarios where idusuario= :idusuario";
        $stmt = $con->prepare($sql);
        $stmt->bindValue(":idusuario",$idusuario);
        $stmt->execute();
        header("location: listarusuarios.php");

    }

    if($idusuario){
        $sql = "SELECT * FROM tblusuarios where idusuario=:idusuario";
        $stmt = $con->prepare($sql);
        $stmt->bindValue(":idusuario",$idusuario);       
        $stmt->execute();
        $idusuario = $stmt->fetch(PDO::FETCH_OBJ);

    }

    if($_POST){

        if($_POST["idusuario"]){ 
        $sql = "UPDATE tblusuarios SET nome = :nome, email = :email, senha = :senha, idsituacao = :idsituacao, idnivelacesso = :idnivelacesso, criado = :criado, modificado = :modificado where idusuario = :idusuario";
        $stmt = $con->prepare($sql);
        
        $stmt->bindValue(":nome",$_POST["nome"]);
        $stmt->bindValue(":email",$_POST["email"]);
        $stmt->bindValue(":senha",md5($_POST["senha"]));
        $stmt->bindValue(":idsituacao",$_POST["idsituacao"]);
        $stmt->bindValue(":idnivelacesso",$_POST["idnivelacesso"]);
        $stmt->bindValue(":criado",$_POST["criado"]);
        $stmt->bindValue(":modificado",$_POST["modificado"]);

        $stmt->bindValue(":idusuario",$_POST["idusuario"]);
        $stmt->execute();
              

        } else {
            $sql = "INSERT INTO tblusuarios (nome, email, senha, idsituacao, idnivelacesso, criado, modificado) values(:nome, :email, :senha, :idsituacao, :idnivelacesso, :criado, :modificado)";
            $stmt = $con->prepare($sql);
            $stmt->bindValue(":nome",$_POST["nome"]);
            $stmt->bindValue(":email",$_POST["email"]);
            $stmt->bindValue(":senha",$_POST["senha"]);
            $stmt->bindValue(":idsituacao",$_POST["idsituacao"]);
            $stmt->bindValue(":idnivelacesso",$_POST["idnivelacesso"]);
            $stmt->bindValue(":criado",$_POST["criado"]);
            $stmt->bindValue(":modificado",$_POST["modificado"]);
            $stmt->execute();            
        }
            header("location: listarusuarios.php");
    }
    
} catch(PDOException $e){
    echo "erro de conexão com o BD".$e->getMessage();
}

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Cadastar Usuário</title>
    </head>

    <body>
        <div class="container" class="border border-dark">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="administrativo.php">Home</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="frmusuarios.php">Cadastar Usuarios</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="listarusuarios.php">Lista de Funcionarios</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link " href="sair.php">sair</a>
                        </li>
                        
                    </ul>
                    </div>
                </div>
            </nav>

            <hr>

            <h1>Cadastro de Usuarios</h1><br>

            <form method="POST">                
                <div class="mb-3">
                <label  >Nome do Usuario</label><br>
                <input   type="text"      name="nome"   value="<?php echo isset($idusuario) ? $idusuario->nome :null ;?>"><br>
                </div>   
                
                <div class="mb-3">
                <label  >E-mail </label><br>
                <input   type="email"      name="email"       value="<?php echo isset($idusuario) ? $idusuario->email :null ;?>"><br>
                </div>

                <div class="mb-3">
                <label  >Senha</label><br>
                <input  type="text"  required    name="senha"  ><br>
                </div>
                
                <div class="mb-3">
                <label  >ID situação </label><br>
                <input   type="text"     name="idsituacao"     value="<?php echo isset($idusuario) ? $idusuario->idsituacao :null ;?>"><br>
                </div>

                <div class="mb-3">
                <label  >ID nivel de acesso </label><br>
                <input   type="text"     name="idnivelacesso"     value="<?php echo isset($idusuario) ? $idusuario->idnivelacesso :null ;?>"><br>
                </div>

                <div class="mb-3">
                <label  >Data de criação do Cadastro </label><br>
                <input   type="date"     name="criado"     value="<?php echo isset($idusuario) ? $idusuario->criado :null ;?>"><br>
                </div>

                <div class="mb-3">
                <label  >Data de Modificação do Cadastro </label><br>
                <input   type="date"     name="modificado"     value="<?php echo isset($idusuario) ? $idusuario->modificado :null ;?>"><br>
                </div>

                <input type="hidden"    name="idusuario" value="<?php echo isset($idusuario) ? $idusuario->idusuario :null ;?>"><br>
                <input type="submit" class="btn btn-outline-dark" value="cadastar"><br>

            </form>
            <br>
            <a href="listarusuarios.php" class="btn btn-outline-dark">Voltar</a>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>