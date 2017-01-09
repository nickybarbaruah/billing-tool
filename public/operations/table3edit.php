<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$result = mysql_query("UPDATE emp_proj_map set " . $_POST["column"] . " = '".$_POST["editval"]."' WHERE  EMP_PROJCT_MAP_IDN=".$_POST["id"]);
?>