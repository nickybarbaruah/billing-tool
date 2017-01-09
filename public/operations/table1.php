<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$sql = "SELECT * from employee_master";
$faq = $db_handle->runQuery($sql);
?>
<html>
    <head>
      <title>Employee Table</title>
		<style>
			body{width:100%;}
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
				url: "table1edit.php",
				type: "POST",
				data:'column='+column+'&editval='+editableObj.innerHTML+'&id='+id,
				success: function(data){
					$(editableObj).css("background","#FDFDFD");
				}        
		   });
		}
    
    function validationActFlag(flagVal) {
      if (flagVal.localeCompare("Active") == 0 || flagVal.localeCompare("Inactive") == 0){
        return true;
      } else {
        return false;
      }    
    }
    
    function validationID(ID) {
      if (ID>100000 && ID<9999999){
        return true;
      } else {
        return false;
      }    
    }                                                 
    
    function errorInput(editableObj) {
			$(editableObj).css("border","FF3333");
		}
    
		</script>
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
				<th class="table-header">Creator</th> 
				<th class="table-header">Created At</th> 
				<th class="table-header">Sourced At</th> 
				<th class="table-header">Sourced By</th> 
				<th class="table-header">Web TS</th> 
				<th class="table-header">Web Updated</th>
			  </tr>
		  </thead>
		  <tbody>
		  <?php
		  foreach($faq as $k=>$v) {
		  ?>
			  <tr class="table-row">
          <td><?php echo $faq[$k]["GL_OPRTNL_EMPLY_IDN"]; ?></td>
  				<td contenteditable="true" onBlur="if(validationID(this.value)){saveToDatabase(this,'EMPLY_TCS_ID','<?php echo $faq[$k]["GL_OPRTNL_EMPLY_IDN"]; ?>')}else{errorInput(this)}" onClick="showEdit(this);"><?php echo $faq[$k]["EMPLY_TCS_ID"]; ?></td>

          <td contenteditable="true" onBlur="saveToDatabase(this,'EMPLY_SSO','<?php echo $faq[$k]["GL_OPRTNL_EMPLY_IDN"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["EMPLY_SSO"]; ?></td>
          <td contenteditable="true" onBlur="saveToDatabase(this,'EMPLY_NAME','<?php echo $faq[$k]["GL_OPRTNL_EMPLY_IDN"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["EMPLY_NAME"]; ?></td>
          <td contenteditable="true" onBlur="saveToDatabase(this,'EMPLY_BILNG_STAT','<?php echo $faq[$k]["GL_OPRTNL_EMPLY_IDN"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["EMPLY_BILNG_STAT"]; ?></td>
          <td contenteditable="true" onBlur="saveToDatabase(this,'EMPLY_TECHNLGY','<?php echo $faq[$k]["GL_OPRTNL_EMPLY_IDN"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["EMPLY_TECHNLGY"]; ?></td>
          <td contenteditable="true" onBlur="saveToDatabase(this,'EMPLY_LOCATN','<?php echo $faq[$k]["GL_OPRTNL_EMPLY_IDN"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["EMPLY_LOCATN"]; ?></td>

          <td contenteditable="true" onBlur="if(validationActFlag(this.value)){saveToDatabase(this,'EMPLY_ACT_FLG','<?php echo $faq[$k]["GL_OPRTNL_EMPLY_IDN"]; ?>')}else{errorInput(this)}" onClick="showEdit(this);"><?php echo $faq[$k]["EMPLY_ACT_FLG"]; ?></td>

          <td contenteditable="true" onBlur="saveToDatabase(this,'EMPLY_COMNT','<?php echo $faq[$k]["GL_OPRTNL_EMPLY_IDN"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["EMPLY_COMNT"]; ?></td>
<!--	          <td contenteditable="true" onBlur="saveToDatabase(this,'HISTRY','<?php echo $faq[$k]["GL_OPRTNL_EMPLY_IDN"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["HISTRY"]; ?></td> -->
          <td contenteditable="true" onBlur="saveToDatabase(this,'SRC_IDN','<?php echo $faq[$k]["GL_OPRTNL_EMPLY_IDN"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["SRC_IDN"]; ?></td>
          <td><?php echo $faq[$k]["SRC_SYS_ID"]; ?></td>
          <td contenteditable="true" onBlur="saveToDatabase(this,'DAT_ORGN','<?php echo $faq[$k]["GL_OPRTNL_EMPLY_IDN"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["DAT_ORGN"]; ?></td>
          <td contenteditable="true" onBlur="saveToDatabase(this,'POSTNG_AGNT','<?php echo $faq[$k]["GL_OPRTNL_EMPLY_IDN"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["POSTNG_AGNT"]; ?></td>            
          <td contenteditable="true" onBlur="saveToDatabase(this,'SRC_CRETN_ID','<?php echo $faq[$k]["GL_OPRTNL_EMPLY_IDN"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["SRC_CRETN_ID"]; ?></td>            
          <td><?php echo $faq[$k]["SRC_CRETN_TS"]; ?></td>            
          <td><?php echo $faq[$k]["SRC_UPD_TS"]; ?></td>            
          <td contenteditable="true" onBlur="saveToDatabase(this,'SRC_UPD_ID','<?php echo $faq[$k]["GL_OPRTNL_EMPLY_IDN"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["SRC_UPD_ID"]; ?></td>            
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
