<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$result = mysql_query("UPDATE billing_master set " . $_POST["column"] . " = '".$_POST["editval"]."' WHERE  EMP_PROJCT_INPUT_IDN=".$_POST["id"]);
?>