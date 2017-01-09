<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php
  $admin = find_admin_by_id($_GET["username"]);
  
  if (!$admin) {
    // admin ID was missing or invalid or 
    // admin couldn't be found in database
    redirect_to("manage_admins.php");
  }
  
  //print_r($admin);
?>

<?php
if (isset($_POST['submit'])) {
  //print_r("Submitted");
  // Process the form
  //print_r(mysql_prep($_POST["level"]));
  
  // validations
  $required_fields = array("username", "password");
  validate_presences($required_fields);  
  
  $fields_with_max_lengths = array("username" => 30);
  validate_max_lengths($fields_with_max_lengths);
  //print_r($errors);
  
  if (empty($errors)) {
    
    // Perform Update

    $username = $admin["USERNAME"];
    $userid = mysql_prep($_POST["userid"]);
    $level = mysql_prep($_POST["level"]);

    $hashed_password = password_encrypt($_POST["password"]);
  
    $query  = "UPDATE admins SET ";
    $query .= "userid = '{$userid}', ";
    $query .= "level = '{$level}', ";
    $query .= "password = '{$hashed_password}' ";
    $query .= "WHERE username = '{$username}' ";
    $query .= "LIMIT 1";
    $result = mysqli_query($connection, $query);
    
    print_r($query);
    
    if ($result && mysqli_affected_rows($connection) == 1) {
      // Success
      $_SESSION["message"] = "Admin updated.";
      redirect_to("manage_admins.php");
    } else {
      // Failure
      $_SESSION["message"] = "Admin update failed.";
    }
  
  }
} else {
  // This is probably a GET request
  //print_r("Not Submitted");  
} // end: if (isset($_POST['submit']))

?>

<?php $layout_context = "admin"; ?>
<?php include("../includes/layouts/header.php"); ?>

<div id="main">
  <div id="navigation">
    &nbsp;
  </div>
  <div id="page">
    <?php echo message(); ?>
    <?php echo form_errors($errors); ?>
    
    <h2 style="padding: 0 15px">Edit Admin: <?php echo htmlentities($admin["USERNAME"]); ?></h2>
    <form action="edit_admin.php?username=<?php echo urlencode($admin["USERNAME"]); ?>" method="post">
      <table>
      <tr>
      <td style="padding: 0 15px">Username: </td>
      <td><input type="text" name="username" value="<?php echo htmlentities($admin["USERNAME"]); ?>" /></td>
      </tr>      
      <tr>
        <td style="padding: 0 15px">User ID:</td>
        <td><input type="text" name="userid" value="<?php echo htmlentities($admin["USERID"]); ?>" /></td>
      </tr>      
      <tr>
        <td style="padding: 0 15px">Level:</td>
        <td><input type="text" name="level" value="<?php echo htmlentities($admin["LEVEL"]); ?>" /></td>
      </tr>      
      <tr>
        <td style="padding: 0 15px">Password:</td>
        <td><input type="password" name="password" value="" /></td>
      </tr>
      <tr>
        <td style="padding: 0 15px"><input type="submit" name="submit" value="Update" /></td>
      </tr>
      </table>
    </form>
    <br />
    <p style="padding: 0 15px"><a href="manage_admins.php">Cancel</a></p>
  </div>
</div>

<?php include("../includes/layouts/footer.php"); ?>
