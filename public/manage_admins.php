<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_logged_in(); confirm_AAA(); ?>


<?php
  $admin_set = find_all_admins();
?>

<?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php"); ?>
<div id="main">
  <div id="navigation">
		<br />
		<a href="admin.php">&laquo; Main menu</a><br />
  </div>
  <div id="page">
    <?php echo message(); ?>
    <h2 style="padding: 0 1em">Manage Admins</h2>
    <table>
      <tr>
        <th style="text-align: left; width: 200px; padding: 0 2em">Username</th>
        <th colspan="2" style="text-align: left;">Actions</th>
      </tr>
    <?php while($admin = mysqli_fetch_assoc($admin_set)) { ?>
      <tr>
        <td style="padding: 0 2em"><?php 
        //print_r($admin);
        echo htmlentities($admin["USERNAME"]); ?></td>
        <td><a href="edit_admin.php?username=<?php echo urlencode($admin["USERNAME"]); ?>">Edit</a></td>
        <td style="padding: 0 10px"><a href="delete_admin.php?username=<?php echo urlencode($admin["USERNAME"]); ?>" onclick="return confirm('Are you sure?');">Delete</a></td>
      </tr>
    <?php } ?>
    </table>
    <br />
    <a href="new_admin.php" style="padding: 0 2em">Add new admin</a>
  </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>
