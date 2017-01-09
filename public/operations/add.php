<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'billing' AND TABLE_NAME = 'employee_master';";
$faq = $db_handle->runQuery($sql);
//print_r($faq);
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
    }
    tr:nth-child(even)
    {
    background:#e9e9e9;
    }
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

  	function getresult(url) {    
  	$.ajax({
  		url: url,
  		type: "POST",
  		data:  {rowcount:$("#rowcount").val(),name:$("#name").val(),code:$("#code").val()},
  		success: function(data){ $("#toys-grid").html(data); $('#add-form').hide();}
  	   });
  	}
      
    function add() {
    	var valid = validate();
    	if(valid) {
    		$.ajax({
    			url: "add.php",
    			type: "POST",
    			data:  {name:$("#add-name").val(),code:$("#add-code").val(),category:$("#category").val(),price:$("#price").val(),stock_count:$("#stock_count").val()},
    			success: function(data){ getresult("getresult.php"); }
    		   });
    }
    
  	function validate() {
  		var valid = true;	
  		$(".demoInputBox").css('background-color','');
  		$(".info").html('');
  		
  		if(!$("#add-name").val()) {
  			$("#name-info").html("(required)");
  			$("#add-name").css('background-color','#FFFFDF');
  			valid = false;
  		}
  		if(!$("#add-code").val()) {
  			$("#code-info").html("(required)");
  			$("#add-code").css('background-color','#FFFFDF');
  			valid = false;
  		}
  		if(!$("#category").val()) {
  			$("#category-info").html("(required)");
  			$("#category").css('background-color','#FFFFDF');
  			valid = false;
  		}
  		if(!$("#price").val()) {
  			$("#price-info").html("(required)");
  			$("#price").css('background-color','#FFFFDF');
  			valid = false;
  		}	
  		if(!$("#stock_count").val()) {
  			$("#stock_count-info").html("(required)");
  			$("#stock_count").css('background-color','#FFFFDF');
  			valid = false;
  		}	
  		return valid;
  	}    
	
  	function add() {
      
    }
  
		</script>

    </head>
    <body>		

    <div data-role="page" id="pageone">
      <div data-role="header">
        <h1>Employee Table</h1>
      </div>    
      <div data-role="main" class="ui-content">
        <h3>Enter values<h3>
        <form name="emp" method="post" action="" id="emp">
        <table data-role="table" data-mode="columntoggle" class="ui-responsive ui-shadow" id="myTable" data-filter="true" data-input="#filterTable-input">
        <tbody>
          <?php
      		  foreach($faq as $k=>$v) {
    		  ?>
        <tr class="table-row">
          <td><?php echo $faq[$k]["COLUMN_NAME"]; ?></td>
          <td><input type="text" name="<?php echo $faq[$k]["COLUMN_NAME"]; ?>" id="<?php echo $faq[$k]["COLUMN_NAME"]; ?>"></td>
          <td><?php echo "     "?></td>
        </tr>        
      <!-- <input type="button" name="submit" id="btnAddAction" value="Add" onClick="add();" /> -->
    		<?php
    		}
    		?>            
		    </tbody>
		    </table>
		      <input type="button" name="submit" id="btnAddAction" value="Add Record" onClick="add();" />
        </form>  
      </div>
    </div>      
    </body>
</html>