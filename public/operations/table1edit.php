<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$result = mysql_query("UPDATE employee_master set " . $_POST["column"] . " = '".$_POST["editval"]."' WHERE  GL_OPRTNL_EMPLY_IDN=".$_POST["id"]);
?>