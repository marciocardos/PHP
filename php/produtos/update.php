<?php
// Include database connection file
require_once "../connection.php";

    if(count($_POST)>0) {
        mysqli_query($conn,"UPDATE preco set  idprod='" . $_POST['idprod'] . "',preco='" . $_POST['preco'] . "' WHERE idpreco='" . $_GET['preco'] . "'");

        mysqli_query($conn,"UPDATE produtos set  idprod='" . $_POST['idprod'] . "', nome='" . $_POST['nome'] .  "' WHERE idprod='" . $_POST['idprod'] . "'");

        header("location: ../index.php");
     exit();
    }
    $result = mysqli_query($conn,"select * from produtos INNER JOIN preco  on preco.idprod = produtos.idprod WHERE produtos.idprod='" . $_GET['id'] . "'");
    $row= mysqli_fetch_array($result);
  
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Atualizacao</title>
    <?php include "../head.php"; ?>
</head>
<body>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h2>Atualização</h2>
                    </div>

                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label>ID</label>
                            <input type="text" name="idprod"  readonly class="form-control" value="<?php echo $row["idprod"]; ?>" maxlength="50" required="">
                            
                        </div>
                        <div class="form-group ">
                            <label>Nome</label>
                            <input type="text" name="nome" class="form-control" value="<?php echo $row["nome"]; ?>" maxlength="30" required="">
                        </div>

                        <div class="form-group">
                            <label>Preco</label>
                            <input type="number" name="preco" class="form-control" value="<?php echo $row["preco"]; ?>" maxlength="12"required="">
                        </div>
                        <input type="hidden" name="id" value="<?php echo $row["idprod"]; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="../index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>  
        </div>
</body>
</html>