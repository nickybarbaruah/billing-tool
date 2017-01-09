<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>

<?php
$username = "";

if (isset($_POST['submit'])) {
  // Process the form
  
  // validations
  $required_fields = array("username", "password");
  validate_presences($required_fields);
  
  if (empty($errors)) {
    // Attempt Login

		$username = $_POST["username"];
		$password = $_POST["password"];
		
		$found_admin = attempt_login($username, $password);

    if ($found_admin) {
      // Success
			// Mark user as logged in
			$_SESSION["userid"] = $found_admin["USERID"];
			$_SESSION["username"] = $found_admin["USERNAME"];
      $_SESSION["level"] = $found_admin["LEVEL"];
      redirect_to("admin.php");
    } else {
      // Failure
      $_SESSION["message"] = "Username/password not found.";
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
    
    <h2 style="padding: 0 15px">Login</h2>
    <form action="login.php" method="post">
      <table>
      <tr>
      <td><p style="padding: 0 15px">Username: </p></td>
      <td><input type="text" name="username" value="<?php echo htmlentities($username); ?>" /></td>
      </tr>
      <tr>
      <td><p style="padding: 0 15px">Password:</p></td>
      <td><input type="password" name="password" value="" /></td>
      </tr>
      <tr><td><p style="padding: 0 15px"><input style="padding: 0 15px" type="submit" name="submit" value="Submit" /></p></td></tr>
      </table>
    </form>
  </div>
</div>

<?php include("../includes/layouts/footer.php"); ?>
