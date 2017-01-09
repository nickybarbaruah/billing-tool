    <div id="footer"><br/>Copyright <?php echo date("Y"); ?>, Tata Consultancy Services</div>

	</body>
</html>
<?php
  // 5. Close database connection
	if (isset($connection)) {
	  mysqli_close($connection);
	}
?>
