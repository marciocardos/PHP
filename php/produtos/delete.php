<?php
include_once '../connection.php';
$sql1 = "DELETE FROM preco WHERE idpreco='" . $_GET["preco"] . "'";
$sql2 = "DELETE FROM produtos WHERE idprod='" . $_GET["id"] . "'";
if (mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2)) {
   header("location: ../index.php");
   exit();
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>