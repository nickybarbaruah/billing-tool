<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$sql = "SELECT * from billing_master limit 2000";
$faq = $db_handle->runQuery($sql);
?>
<html>
    <head>
      <title>Mapping Table</title>
		<style>
			body{width:610px;}
			.current-row{background-color:#B24926;color:#FFF;}
			.current-col{background-color:#1b1b1b;color:#FFF;}
			.tbl-qa{width: 100%;font-size:0.8em;font-family:Calibri;background-color: #f5f5f5;}
			.tbl-qa th.table-header {padding: 5px;white-space:nowrap;text-align: left;padding:5px;}
			.tbl-qa .table-row td {padding:3px;white-space:nowrap;background-color: #FDFDFD;}
		</style>
		<script src="jquery-1.10.2.js"></script>
		<script>
		function showEdit(editableObj) {
			$(editableObj).css("background","#FFF");
		} 
		
		function saveToDatabase(editableObj,column,id) {
			$(editableObj).css("background","#FFF url(loaderIcon.gif) no-repeat right");
			$.ajax({
				url: "table4edit.php",
				type: "POST",
				data:'column='+column+'&editval='+editableObj.innerHTML+'&id='+id,
				success: function(data){
					$(editableObj).css("background","#FDFDFD");
				}        
		   });
		}
		</script>
    </head>
    <body>		
	   <table class="tbl-qa">
		  <thead>
			  <tr>
				<th class="table-header">Billing IDN</th>
				<th class="table-header">Map IDN</th>
				<th class="table-header">Current Year</th>
				<th class="table-header">Fiscal Month</th>
				<th class="table-header">Fiscal Week</th>
				<th class="table-header">Billing Hrs</th>
				<th class="table-header">Actual Billing Days</th>
				<th class="table-header">Expected Billing Days</th>
				<th class="table-header">Emp Location</th>
				<th class="table-header">Emp Billing Status</th>
				<th class="table-header">Emp Billing Rate</th>
				<th class="table-header">Billed Fiscal Week</th>
				<th class="table-header">Comments</th>
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
          <td><?php echo $faq[$k]["EMP_PROJCT_INPUT_IDN"]; ?></td>
  				<td><?php echo $faq[$k]["EMP_PROJCT_MAP_IDN"]; ?></td>
          <td contenteditable="true" onBlur="saveToDatabase(this,'CURR_YEAR','<?php echo $faq[$k]["EMP_PROJCT_INPUT_IDN"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["CURR_YEAR"]; ?></td>
          <td contenteditable="true" onBlur="saveToDatabase(this,'FISCL_MONTH','<?php echo $faq[$k]["EMP_PROJCT_INPUT_IDN"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["FISCL_MONTH"]; ?></td>
          <td contenteditable="true" onBlur="saveToDatabase(this,'FISCL_WEEK','<?php echo $faq[$k]["EMP_PROJCT_INPUT_IDN"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["FISCL_WEEK"]; ?></td>
          <td contenteditable="true" onBlur="saveToDatabase(this,'BILLNG_HRS','<?php echo $faq[$k]["EMP_PROJCT_INPUT_IDN"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["BILLNG_HRS"]; ?></td>
          <td contenteditable="true" onBlur="saveToDatabase(this,'ACTUAL_BILLNG_DYS','<?php echo $faq[$k]["EMP_PROJCT_INPUT_IDN"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["ACTUAL_BILLNG_DYS"]; ?></td>
          <td contenteditable="true" onBlur="saveToDatabase(this,'EXPECT_BILLNG_DYS','<?php echo $faq[$k]["EMP_PROJCT_INPUT_IDN"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["EXPECT_BILLNG_DYS"]; ?></td>          
          <td contenteditable="true" onBlur="saveToDatabase(this,'EMPLY_LOCATN','<?php echo $faq[$k]["EMP_PROJCT_INPUT_IDN"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["EMPLY_LOCATN"]; ?></td>          
          <td contenteditable="true" onBlur="saveToDatabase(this,'EMPLY_BILL_STAT','<?php echo $faq[$k]["EMP_PROJCT_INPUT_IDN"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["EMPLY_BILL_STAT"]; ?></td>          
          <td contenteditable="true" onBlur="saveToDatabase(this,'EMPLY_BILL_RATE','<?php echo $faq[$k]["EMP_PROJCT_INPUT_IDN"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["EMPLY_BILL_RATE"]; ?></td>          
          <td contenteditable="true" onBlur="saveToDatabase(this,'BILLD_FW','<?php echo $faq[$k]["EMP_PROJCT_INPUT_IDN"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["BILLD_FW"]; ?></td>          
          <td contenteditable="true" onBlur="saveToDatabase(this,'PROJCT_COMNT','<?php echo $faq[$k]["EMP_PROJCT_INPUT_IDN"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["PROJCT_COMNT"]; ?></td>          
<!--	          <td contenteditable="true" onBlur="saveToDatabase(this,'HISTRY','<?php echo $faq[$k]["EMP_PROJCT_INPUT_IDN"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["HISTRY"]; ?></td> -->
          <td contenteditable="true" onBlur="saveToDatabase(this,'SRC_IDN','<?php echo $faq[$k]["EMP_PROJCT_INPUT_IDN"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["SRC_IDN"]; ?></td>
          <td><?php echo $faq[$k]["SRC_SYS_ID"]; ?></td>
          <td contenteditable="true" onBlur="saveToDatabase(this,'DAT_ORGN','<?php echo $faq[$k]["EMP_PROJCT_INPUT_IDN"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["DAT_ORGN"]; ?></td>
          <td contenteditable="true" onBlur="saveToDatabase(this,'POSTNG_AGNT','<?php echo $faq[$k]["EMP_PROJCT_INPUT_IDN"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["POSTNG_AGNT"]; ?></td>            
          <td contenteditable="true" onBlur="saveToDatabase(this,'SRC_CRETN_ID','<?php echo $faq[$k]["EMP_PROJCT_INPUT_IDN"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["SRC_CRETN_ID"]; ?></td>            
          <td><?php echo $faq[$k]["SRC_CRETN_TS"]; ?></td>            
          <td><?php echo $faq[$k]["SRC_UPD_TS"]; ?></td>            
          <td contenteditable="true" onBlur="saveToDatabase(this,'SRC_UPD_ID','<?php echo $faq[$k]["EMP_PROJCT_INPUT_IDN"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["SRC_UPD_ID"]; ?></td>            
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
