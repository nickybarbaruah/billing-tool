<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php //confirm_logged_in(); 
?>

<?php
if (isset($_POST['submit'])) {
  // Process the form
  
  // validations
  $required_fields = array("userid", "username", "email", "password", "level");
  validate_presences($required_fields);
  
  $fields_with_max_lengths = array("username" => 30);
  validate_max_lengths($fields_with_max_lengths);
  
  if (empty($errors)) {
    // Perform Create

    $userid = mysql_prep($_POST["userid"]);
    $username = mysql_prep($_POST["username"]);
    $email = mysql_prep($_POST["email"]);
    $hashed_password = password_encrypt($_POST["password"]);
    $level = mysql_prep($_POST["level"]);
    
    $query  = "INSERT INTO admins (";
    $query .= " userid, username, email, password, level";
    $query .= ") VALUES (";
    $query .= "  '{$userid}', '{$username}', '{$email}', '{$hashed_password}', '{$level}'";
    $query .= ")";
    $result = mysqli_query($connection, $query);

    if ($result) {
      // Success
      $_SESSION["message"] = "Admin created.";
      redirect_to("manage_admins.php");
    } else {
      // Failure
      $_SESSION["message"] = "Admin creation failed.";
    }
  }
} else {
  // This is probably a GET request
  
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
    
    <h2 style="padding: 0 15px">Create Admin</h2>
    <form action="new_admin.php" method="post">
      <table>
      <tr>
        <td style="padding: 0 15px">Userid:</td>
        <td><input type="text" name="userid" value="" /></td>
      </tr>
      <tr>
        <td style="padding: 0 15px">Username:</td>
        <td><input type="text" name="username" value="" /></td>
      </tr>
      <tr>
        <td style="padding: 0 15px">Email:</td>
        <td><input type="text" name="email" value="" /></td>
      </tr>
      <tr>
        <td style="padding: 0 15px">Password:</td>
        <td><input type="password" name="password" value="" /></td>
      </tr>
      <tr>
        <td style="padding: 0 15px">Level:</td>
        <td><select name="level">
          <option value="A">A</option>
          <option value="AA">AA</option>
          <option value="AAA">AAA</option>
        </select></td>
      </tr>
      <p style="padding: 0 15px"><input type="submit" name="submit" value="Create Admin" /></p>
    </table>
    </form>
    <br />
    <p style="padding: 0 15px"><a href="manage_admins.php">Cancel</a></p>
  </div>
</div>

<?php include("../includes/layouts/footer.php"); ?>
