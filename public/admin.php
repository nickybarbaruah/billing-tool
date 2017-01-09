<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php"); ?>

<div id="main">
  <div id="navigation">
    &nbsp;
  </div>
  <div id="page">
    <h2 style="padding: 0 15px">Admin Menu</h2>
    <p style="padding: 0 15px">Welcome to the admin area, <?php echo htmlentities($_SESSION["username"]); ?>.</p>
    <ul>
      <li><a href="manage_pages.php">Billing Main</a></li>
      <?php 
        if($_SESSION["level"]=='AAA'){
          echo "<li><a href=\"manage_admins.php\">Manage Admin Users</a></li>";        
        }      
      ?>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </div>
</div>

<?php include("../includes/layouts/footer.php"); ?>
