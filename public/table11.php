<?php
require_once("operations/dbcontroller.php");
$db_handle = new DBController();
$sql = "SELECT * from employee_master";
$faq = $db_handle->runQuery($sql);
?>
<!DOCTYPE html>
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
  </div>

  <div data-role="footer">
    <h1>Footer Text</h1>
  </div>
</div> 

</body>
</html>
