<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Index</title>
<?php include "head.php"; ?>

    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>

    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="script.js"></script>

</head>
<body>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Lista de produtos</h2>
                        <a href="produtos/create.php" class="btn btn-success pull-right">Adicionar Produto</a>

                    </div>
                   <?php
                    include_once 'connection.php';
                    $result = mysqli_query($conn,"select * from produtos INNER JOIN preco P on P.idprod = produtos.idprod");
                    ?>

                    <?php
                    if (mysqli_num_rows($result) > 0) {
                    ?>
                      <table id ="tabela" class='table table-bordered table-striped'>

                          <thead>
                          <tr>
                              <td>ID</td>
                              <td>Nome</td>
                              <td>Cor</td>
                              <td>Preço real</td>
                              <td>Desconto</td>
                              <td>Preço final</td>
                              <td>Ação</td>
                          </tr>
                          <tr>
                              <th><input type="text" id="txtColuna1"/></th>
                              <th><input type="text" id="txtColuna2"/></th>
                              <th><input type="text" id="txtColuna3"/></th>
                          </tr>
                          </thead>

                    <?php
                    $i=0;
                    while($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row["idprod"]; ?></td>
                        <td><?php echo $row["nome"]; ?></td>
                        <td><?php echo $row["cor"]; ?></td>
                        <td><?php echo number_format($row["preco"], 2, ',', '.') ?></td>
                        <td><?php
                            if($row["cor"] == "vermelho"  && $row["preco"] > 50 ){
                                $desconto =5;
                            }else if($row["cor"] == "amarelo"){
                                $desconto=10;
                            }else if($row["cor"] == "azul" || $row["cor"] == "vermelho" ){
                                    $desconto=20;
                            }else{
                                $desconto=0;
                            }
                            ?>
                            <?php echo $desconto,"%" ?>
                        </td>
                        <td><?php
                            $final =$row["preco"]-($row["preco"]*($desconto/100));
                        echo number_format($final, 2, ',', '.')
                            ?></td>
                        <td><a href="produtos/update.php?id=<?php echo $row["idprod"]; ?>&preco=<?php echo $row["idpreco"]; ?>" title='Atualizar'><span class='glyphicon glyphicon-pencil'></span></a>
                        <a href="produtos/delete.php?id=<?php echo $row["idprod"]; ?>&preco=<?php echo $row["idpreco"]; ?>" title='Delete'><i class='material-icons'><span class='glyphicon glyphicon-trash'></span></a>
                        </td>
                    </tr>
                    <?php
                    $i++;
                    }
                    ?>
                    </table>
                     <?php
                    }
                    else{
                        echo "No result found";
                    }
                    ?>

                </div>
            </div>     
        </div>

</body>
</html>
