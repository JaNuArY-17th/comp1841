<?php 
include "../includes/DatabaseConnection.php";

function test($pdo, $sql, $arr1, $arr2) {
    $statement = $pdo->prepare($sql);
    foreach ($arr1 as $key=>$value) {
        $statement->bindValue($arr2[$key], $value);
    }
    $statement->execute();
}
?>