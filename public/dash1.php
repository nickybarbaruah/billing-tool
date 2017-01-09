<?php
require_once("operations/dbcontroller.php");
$db_handle = new DBController();
$FISCL_MONTH = "select distinct FISCL_MONTH from billing_master";
$months = $db_handle->runQuery($FISCL_MONTH);
//print_r($months);
$month = 'Mar';
?>
<?php
$sql = "select 
           bm.CURR_YEAR CURR_YEAR,
           pm.PROJCT_BILNG PROJCT_BILNG,
           bm.BILLD_FW BILLD_FW,
           pm.GE_PM_NAME GE_PM_NAME,
           pm.LT_PROJCT_NAME LT_PROJCT_NAME,
           pm.PROJCT_NAME PROJCT_NAME,
           pm.PNL_COE_FNCTN PNL_COE_FNCTN,
           bm.EMPLY_BILL_STAT EMPLY_BILL_STAT, 
           bm.FISCL_WEEK FISCL_WEEK, 
           Sum( bm.BILLNG_HRS) TOTAL_BILL
                    	
             from billing_master bm
             join emp_proj_map map
           	on bm.EMP_PROJCT_MAP_IDN = map.EMP_PROJCT_MAP_IDN
               and bm.EMP_PROJCT_MAP_IDN <> -99999
                      
             Left Join project_master pm
           	  on  map.LT_PROJCT_NAME = pm.LT_PROJCT_NAME
                          
           	  where  bm.CURR_YEAR = '2016'
           	  and    bm.FISCL_MONTH = '".$month."'
           	  and 	 bm.BILLD_FW is not null	
                 and 	 bm.BILLD_FW not in ('?')
           	  and    pm.PROJCT_NAME is not null
                      
             Group by 1,2,3,4,5,6,7,8
             Order by 5,6,7,8;";
$faq = $db_handle->runQuery($sql);
?>     
<html>
    <head>
      <title>Dashboard 1</title>
		<style>
			body{width:610px;}
			.current-row{background-color:#B24926;color:#FFF;}
			.current-col{background-color:#1b1b1b;color:#FFF;}
			.tbl-qa{width: 100%;font-size:0.8em;font-family:Calibri;background-color: #f5f5f5;}
			.tbl-qa th.table-header {padding: 5px;white-space:nowrap;text-align: left;padding:5px;}
			.tbl-qa .table-row td {padding:3px;white-space:nowrap;background-color: #FDFDFD;}
      .tbl-qa .table-data td:nth-child(even) {background: #CCC;}
		</style>

    </head>
    <body>		
	   <table class="tbl-qa">
		  <thead>
			  <tr>   
				<th class="table-header">Current Year</th>
<!--				<th class="table-header">Project Billing</th>    --> 
				<th class="table-header">Billed Fiscal Week</th> 
				<th class="table-header">GE PM</th> 
				<th class="table-header">LT Project Name</th> 
				<th class="table-header">Project</th> 
				<th class="table-header">PNL COE Function</th> 
				<th class="table-header">Emp Billing Status</th> 
				<th class="table-header">Fiscal Week</th>  
				<th class="table-header">Total Bill</th> 
			  </tr>
		  </thead>
		  <tbody>
		  <?php
		  foreach($faq as $k=>$v) {
		  ?>
			  <tr class="table-row">
          <td><?php echo $faq[$k]["CURR_YEAR"]; ?></td>
<!--          <td><?php echo $faq[$k]["PROJCT_BILNG"]; ?></td>    --> 
          <td><?php echo $faq[$k]["BILLD_FW"]; ?></td> 
          <td><?php echo $faq[$k]["GE_PM_NAME"]; ?></td> 
          <td><?php echo $faq[$k]["LT_PROJCT_NAME"]; ?></td> 
          <td><?php echo $faq[$k]["PROJCT_NAME"]; ?></td> 
          <td><?php echo $faq[$k]["PNL_COE_FNCTN"]; ?></td> 
          <td><?php echo $faq[$k]["EMPLY_BILL_STAT"]; ?></td> 
          <td><?php echo $faq[$k]["FISCL_WEEK"]; ?></td>  
          <td><?php echo $faq[$k]["TOTAL_BILL"]; ?></td>     
			  </tr>
		<?php
		}
		?>
		  </tbody>
		</table>
    </body>
</html>
