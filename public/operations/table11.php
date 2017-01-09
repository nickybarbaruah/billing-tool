<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$sql = "SELECT * from employee_master";
$faq = $db_handle->runQuery($sql);
?>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    <style>
    th
    {
    border-bottom: 1px solid #d6d6d6;
    white-space:nowrap;
    }
    tr:nth-child(even)
    {
    background:#e9e9e9;
    }
    tr
    {
    white-space:nowrap;
    overflow-x:scroll;
    }
    #pageone
    {
      overflow-x:auto;
      font-size: 13px !important;
    }
    #myTable
    {
      overflow-x:auto;
      font-size: 12px !important;
    }
    .ui-table-columntoggle-btn.ui-mini { font-size: 13 !important; }
    </style>
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
    <div data-role="page" id="pageone">
      <div data-role="header">
        <h1>Employee Table</h1>
      </div>
      <div data-role="main" class="ui-content">
      <form>
        <input id="filterTable-input" data-type="search" placeholder="Search values ...">
      </form>
      <form action="add.php">
        <input type="submit" value="Make New Entry" id="adder">
      </form>
      <table data-role="table" data-mode="columntoggle" class="ui-responsive ui-shadow" id="myTable" data-filter="true" data-input="#filterTable-input">
        <thead>
          <tr>
				  <th data-priority="18">Emp IDN</th>
				  <th data-priority="1">TCS_ID</th> 
				  <th data-priority="2">SSO</th> 
				  <th>Name</th> 
  				<th data-priority="3">Billing State</th> 
  				<th data-priority="4">Technology</th> 
  				<th data-priority="5">Location</th> 
  				<th data-priority="6">Active Flag</th> 
  				<th data-priority="7">Comments</th> 
  <!--				<th>History</th> --> 
  				<th data-priority="8">Source</th> 
  				<th data-priority="9">Sys ID</th> 
  				<th data-priority="10">Data Origin</th> 
  				<th data-priority="11">Post Agent</th> 
  				<th data-priority="12">Created By</th> 
  				<th data-priority="13">Created At</th> 
  				<th data-priority="14">Updated At</th> 
  				<th data-priority="15">Updated By</th> 
  				<th data-priority="16">Web Posted At</th> 
  				<th data-priority="17">Web Updated</th>          
        </tr>
      </thead>
		  <tbody>
		  <?php
		  foreach($faq as $k=>$v) {
		  ?>
			  <tr>
          <td><?php echo $faq[$k]["GL_OPRTNL_EMPLY_IDN"]; ?></td>
  				<td contenteditable="true" onBlur="saveToDatabase(this,'EMPLY_TCS_ID','<?php echo $faq[$k]["GL_OPRTNL_EMPLY_IDN"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["EMPLY_TCS_ID"]; ?></td>
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
		?></div>
		  </tbody>
		</table>
    </body>
</html>
