<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$result = mysql_query("UPDATE project_master set " . $_POST["column"] . " = '".$_POST["editval"]."' WHERE  GL_OPRTNL_PROJCT_IDN=".$_POST["id"]);
?>