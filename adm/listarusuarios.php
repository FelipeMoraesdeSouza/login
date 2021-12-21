<?php
    $localhost  = "localhost";
    $username   = "root";
    $password   = "";
    $db         = "bdprojeto";

    try {
        $con = new PDO("mysql:host=$localhost;dbname=$db",$username,$password);
        //var_dump($con); //debugar - Descobrir o que está sendo respondido
        //echo "funcionou";

    } catch(PDOException $e) {
        echo "conexão falhou:<br> ".$e->getMessage();

    }
?>
<?php
try {

  $sql = "SELECT * from tblusuarios";
  $qry = $con->query($sql);    
  $usuarios = $qry->fetchAll(PDO::FETCH_OBJ);
  

 } catch(PDOException $e){
   echo $e-> getMessage();
 }
 
?>
<html>
  
  <head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  </head>

  <body>

    <div class="container">

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

      
    
    
        <!-- Inicio da tabela -->
        <table class="table table-dark table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">E-mail</th>
            <th scope="col">senha</th>
            <th scope="col">idsituação</th>
            <th scope="col">idnivelacesso</th>
            <th scope="col">criado</th>
            <th scope="col">modificado</th>
            <th colspan=2>Açôes</th>
          </tr>
        </thead>

          <!-- fim da tabela -->
          <tbody>
            
            <?php foreach($usuarios as $usuario){ ?>
              <tr>
                <td><?php echo $usuario->idusuario?>        </td>
                <td><?php echo $usuario->nome?>             </td>
                <td><?php echo $usuario->email?>            </td>
                <td><?php echo $usuario->senha?>            </td>
                <td><?php echo $usuario->idsituacao?>       </td>
                <td><?php echo $usuario->idnivelacesso?>    </td>
                <td><?php echo $usuario->criado?>           </td>
                <td><?php echo $usuario->modificado?>       </td>

                <td><a href="frmusuarios.php?idusuario=<?php echo $usuario->idusuario?>" class="btn btn-warning">Editar</a></td>
                <td><a href="frmusuarios.php?op=del&idusuario=<?php echo $usuario->idusuario ?>" class="btn btn-danger">Excluir</a></td>
              </tr>
            <?php }?> 
          </tbody>
          </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>