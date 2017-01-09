<?php
require_once("operations/dbcontroller.php");
$db_handle = new DBController();
$sql = "SELECT * from employee_master";
$faq = $db_handle->runQuery($sql);
?>
<html>
    <head>
      <title>Employee Table</title>
		<style>
			body{width:610px;}
			.current-row{background-color:#B24926;color:#FFF;}
			.current-col{background-color:#1b1b1b;color:#FFF;}
			.tbl-qa{width: 100%;font-size:0.8em;font-family:Calibri;background-color: #f5f5f5;}
			.tbl-qa th.table-header {padding: 5px;white-space:nowrap;text-align: left;padding:5px;}
			.tbl-qa .table-row td {padding:3px;white-space:nowrap;background-color: #FDFDFD;}
		</style>

    </head>
    <body>		
	   <table class="tbl-qa">
		  <thead>
			  <tr>   
				<th class="table-header">Emp IDN</th>
				<th class="table-header">TCS_ID</th> 
				<th class="table-header">SSO</th> 
				<th class="table-header">Name</th> 
				<th class="table-header">Billing State</th> 
				<th class="table-header">Technology</th> 
				<th class="table-header">Location</th> 
				<th class="table-header">Active Flag</th> 
				<th class="table-header">Comments</th> 
<!--				<th class="table-header">History</th> --> 
				<th class="table-header">Source</th> 
				<th class="table-header">Sys ID</th> 
				<th class="table-header">Data Origin</th> 
				<th class="table-header">Post Agent</th> 
				<th class="table-header">Created By</th> 
				<th class="table-header">Created At</th> 
				<th class="table-header">Updated At</th> 
				<th class="table-header">Updated By</th> 
				<th class="table-header">Web Posted At</th> 
				<th class="table-header">Web Updated</th>
			  </tr>
		  </thead>
		  <tbody>
		  <?php
		  foreach($faq as $k=>$v) {
		  ?>
			  <tr class="table-row">
          <td><?php echo $faq[$k]["GL_OPRTNL_EMPLY_IDN"]; ?></td>
  				<td><?php echo $faq[$k]["EMPLY_TCS_ID"]; ?></td>
          <td><?php echo $faq[$k]["EMPLY_SSO"]; ?></td>
          <td><?php echo $faq[$k]["EMPLY_NAME"]; ?></td>
          <td><?php echo $faq[$k]["EMPLY_BILNG_STAT"]; ?></td>
          <td><?php echo $faq[$k]["EMPLY_TECHNLGY"]; ?></td>
          <td><?php echo $faq[$k]["EMPLY_LOCATN"]; ?></td>
          <td><?php echo $faq[$k]["EMPLY_ACT_FLG"]; ?></td>
          <td><?php echo $faq[$k]["EMPLY_COMNT"]; ?></td>
<!--	          <td><?php //echo $faq[$k]["HISTRY"]; ?></td> -->
          <td><?php echo $faq[$k]["SRC_IDN"]; ?></td>
          <td><?php echo $faq[$k]["SRC_SYS_ID"]; ?></td>
          <td><?php echo $faq[$k]["DAT_ORGN"]; ?></td>
          <td><?php echo $faq[$k]["POSTNG_AGNT"]; ?></td>            
          <td><?php echo $faq[$k]["SRC_CRETN_ID"]; ?></td>            
          <td><?php echo $faq[$k]["SRC_CRETN_TS"]; ?></td>            
          <td><?php echo $faq[$k]["SRC_UPD_TS"]; ?></td>            
          <td><?php echo $faq[$k]["SRC_UPD_ID"]; ?></td>            
          <td><?php echo $faq[$k]["WEB_POSTNG_TS"]; ?></td>            
          <td><?php echo $faq[$k]["WEB_UPD_TS"]; ?></td>            
			  </tr>
		<?php
		}
		?>
		  </tbody>
		</table>
    </body>
</html>
