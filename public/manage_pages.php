<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php include("../includes/layouts/header.php"); ?>

<script language="JavaScript">
<!--
function autoResize(id){
    var newheight;
    var newwidth;

    if(document.getElementById){
        newheight = document.getElementById(id).contentWindow.document .body.scrollHeight;
        newwidth = document.getElementById(id).contentWindow.document .body.scrollWidth;
    }

    document.getElementById(id).height = (newheight) + "px";
    document.getElementById(id).width = (newwidth) + "px";
}
//-->
</script>


<div id="main">
  <div id="navigation">
		<br />
    <a href="admin.php">&laquo; Main menu</a><br/><br/>
    <?php if($_SESSION["level"]=='A'){ 
    echo "<ul>";
		echo "<li><a href=\"dash1.php\"  target=\"base\">Dashboard 1</a></li>";
		echo "</ul>";
    } elseif($_SESSION["level"]=='AA') {
    echo "<ul>";
		echo "<li><a href=\"table1.php\"  target=\"base\">Employee Table</a></li>";
    echo "<li><a href=\"table2.php\"  target=\"base\">Project Table</a></li>";
    echo "<li><a href=\"table3.php\"  target=\"base\">Map Table</a></li>";
    echo "<li><a href=\"table4.php\"  target=\"base\">Billing Table</a></li>";
		echo "</ul>";
    echo "<br /><br />";
    echo "<ul>";
		echo "<li><a href=\"dash1.php\"  target=\"base\">Dashboard 1</a></li>";
		echo "</ul>";        
    } elseif($_SESSION["level"]=='AAA') {
    echo "Read";
    echo "<ul>";
		echo "<li><a href=\"table1.php\"  target=\"base\">Employee Table</a></li>";
    echo "<li><a href=\"table2.php\"  target=\"base\">Project Table</a></li>";
    echo "<li><a href=\"table3.php\"  target=\"base\">Map Table</a></li>";
    echo "<li><a href=\"table4.php\"  target=\"base\">Billing Table</a></li>";
		echo "</ul>";
    echo "Edit";
    echo "<ul>";
		echo "<li><a href=\"operations/table11.php\"  target=\"base\">Employee Table</a></li>";
    echo "<li><a href=\"operations/table2.php\"  target=\"base\">Project Table</a></li>";
    echo "<li><a href=\"operations/table3.php\"  target=\"base\">Map Table</a></li>";
    echo "<li><a href=\"operations/table4.php\"  target=\"base\">Billing Table</a></li>";
		echo "</ul>";
    echo "<br /><br />";
    echo "Dashboards";
    echo "<ul>";
		echo "<li><a href=\"dash1.php\"  target=\"base\">Monthly Billing</a></li>";
    echo "<li><a href=\"dash2.php\"  target=\"base\">Leave Report</a></li>";
		echo "</ul>";        
    }
    ?>
    

  </div>
  
  <div id="page">
		<?php echo message();
    if($_SESSION["level"]=='AAA') {
    echo "<iframe src=\"table1.php\" name=\"base\" display:block; width=100% height=550px></iframe>";
    }elseif($_SESSION["level"]=='AA') {
    echo "<iframe src=\"table1.php\" name=\"base\" display:block; width=100% height=550px></iframe>";
    }elseif($_SESSION["level"]=='A') {
    echo "<iframe src=\"dash1.php\" name=\"base\" display:block; width=100% height=550px></iframe>";
    }
    ?>
  </div>
</div>

<?php include("../includes/layouts/footer.php"); ?>
