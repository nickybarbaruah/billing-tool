<?php
require_once("operations/dbcontroller.php");
$db_handle = new DBController();
$sql = "SELECT * from project_master";
$faq = $db_handle->runQuery($sql);
?>
<html>
    <head>
      <title>Project Table</title>
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
				<th class="table-header">Project IDN</th>
				<th class="table-header">Project Name</th>
				<th class="table-header">GE PM</th>
				<th class="table-header">IT PM</th>
				<th class="table-header">LT Project Name</th>
				<th class="table-header">ADF Workflow No.</th>
				<th class="table-header">PNL COE Function</th>
				<th class="table-header">Project Lead</th>
				<th class="table-header">GE Architect</th>
				<th class="table-header">Technologies</th>
				<th class="table-header">Estimate</th>
				<th class="table-header">Actual</th>
				<th class="table-header">Starting Week</th>
				<th class="table-header">Ending Week</th>
				<th class="table-header">Active Flag</th>
				<th class="table-header">Comments</th>
				<th class="table-header">Billing</th>
<!--				<th class="table-header">HISTRY</th>    -->
				<th class="table-header">Source IDN</th>
				<th class="table-header">Sys ID</th>
				<th class="table-header">Data Origin</th>
				<th class="table-header">Posting Agent</th>
				<th class="table-header">Created By</th>
				<th class="table-header">Created At</th>
				<th class="table-header">Updated At</th>
				<th class="table-header">Updated By</th>
				<th class="table-header">Web Posted At</th>
				<th class="table-header">Web Updated At</th>
			  </tr>
		  </thead>
		  <tbody>
		  <?php
		  foreach($faq as $k=>$v) {
		  ?>
			  <tr class="table-row">
          <td><?php echo $faq[$k]["GL_OPRTNL_PROJCT_IDN"]; ?></td>
          <td><?php echo $faq[$k]["PROJCT_NAME"]; ?></td>
          <td><?php echo $faq[$k]["GE_PM_NAME"]; ?></td>
          <td><?php echo $faq[$k]["IT_PM_NAME"]; ?></td>
          <td><?php echo $faq[$k]["LT_PROJCT_NAME"]; ?></td>
          <td><?php echo $faq[$k]["ADF_WRKFLW_NO"]; ?></td>
          <td><?php echo $faq[$k]["PNL_COE_FNCTN"]; ?></td>
          <td><?php echo $faq[$k]["PROJCT_LEAD_NAME"]; ?></td>
          <td><?php echo $faq[$k]["GE_ARCHTCT_NAME"]; ?></td>
          <td><?php echo $faq[$k]["PROJCT_TECH"]; ?></td>
          <td><?php echo $faq[$k]["PROJCT_ESTMT"]; ?></td>
          <td><?php echo $faq[$k]["PROJCT_ACTUAL"]; ?></td>
          <td><?php echo $faq[$k]["PROJCT_STRT_FW"]; ?></td>
          <td><?php echo $faq[$k]["PROJCT_END_FW"]; ?></td>
          <td><?php echo $faq[$k]["PROJCT_ACT_FLG"]; ?></td>
          <td><?php echo $faq[$k]["PROJCT_COMNT"]; ?></td>
          <td><?php echo $faq[$k]["PROJCT_BILNG"]; ?></td>
<!--          <td><?php //echo $faq[$k]["HISTRY"]; ?></td>    -->
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
