<?php
require_once "../connection.php";

if(isset($_POST['save']))
{    


     $nome = $_POST['nome'];
     $cor = $_POST['cor'];
     $preco = $_POST['preco'];
    $sql = "INSERT INTO produtos (nome,cor) VALUES ('$nome','$cor')";
    mysqli_query($conn, $sql) ;
    $idInserido=mysqli_insert_id($conn);
    $sql2 = "INSERT INTO preco (idprod,preco) VALUES ('$idInserido','$preco')";
     if ( mysqli_query($conn, $sql2) ) {
        header("location: ../index.php");
        exit();
     } else {
        echo "Error: " . $sql . "
" . mysqli_error($conn);
     }
     mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Criar</title>
    <?php include "../head.php"; ?>
</head>
<body>
 
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h2>Adicionar</h2>
                    </div>

                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Codigo</label>
                            <input type="number" name="idprod" class="form-control" disabled value="" maxlength="50" required="">
                        </div>
                        <div class="form-group ">
                            <label>Nome</label>
                            <input type="text" name="nome" class="form-control" value="" maxlength="30" required="">
                        </div>
                        <div class="form-group">
                            <label>Cor</label>
                            <input type="text" name="cor" class="form-control" value="" maxlength="12" required="">
                        </div>
                        <div class="form-group">
                            <label>Preco</label>
                            <input type="number" name="preco" class="form-control" value="" maxlength="12" required="">
                        </div>

                        <input type="submit" class="btn btn-primary" name="save" value="submit">
                        <a href="../index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>

            </div> 
               
        </div>

</body>
</html>
