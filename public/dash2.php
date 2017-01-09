<?php
require_once("operations/dbcontroller.php");
$db_handle = new DBController();
$sql = "select
        bill.CURR_YEAR CURR_YEAR,
        bill.BILLD_FW BILLD_FW,
        proj.PNL_COE_FNCTN PNL_COE_FNCTN,
        bill.EMPLY_BILL_STAT EMPLY_BILL_STAT,
        emp.EMPLY_NAME EMPLY_NAME,
        bill.FISCL_WEEK FISCL_WEEK,
        bill.EXPECT_BILLNG_DYS EXPECT_BILLNG_DYS,
        bill.ACTUAL_BILLNG_DYS ACTUAL_BILLNG_DYS,
        bill.EXPECT_BILLNG_DYS - bill.ACTUAL_BILLNG_DYS GAP,
        emp.EMPLY_LOCATN EMPLY_LOCATN,
        proj.PROJCT_COMNT PROJCT_COMNT
          from (select * from billing_master where EMP_PROJCT_MAP_IDN <> -99999) bill
          left join 
          (select * from emp_proj_map where GL_OPRTNL_EMPLY_IDN <> -99999 and GL_OPRTNL_PROJCT_IDN <> -99999) map
        	on bill.EMP_PROJCT_MAP_IDN = map.EMP_PROJCT_MAP_IDN
          left join
          (select * from project_master where PROJCT_NAME is not null) proj
        	on map.GL_OPRTNL_PROJCT_IDN = proj.GL_OPRTNL_PROJCT_IDN
          left join
          (select * from employee_master where EMPLY_NAME is not null) emp
        	on map.GL_OPRTNL_EMPLY_IDN = emp.GL_OPRTNL_EMPLY_IDN
        
          where bill.CURR_YEAR = '2015'
          and     bill.FISCL_MONTH = 'Nov'
          and (bill.EXPECT_BILLNG_DYS -  bill.ACTUAL_BILLNG_DYS)  >0
          #Group by 1,2,3,4,5,6,7,8,9,10,11
          Order by 5,6;";
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
        <th class="table-header">Employee Name</th>
        <th class="table-header">Employee Location</th>
				<th class="table-header">Emp Billing Status</th>                
				<th class="table-header">Current Year</th> 
				<th class="table-header">Billed Fiscal Week</th>
				<th class="table-header">Fiscal Week</th>          
				<th class="table-header">PNL COE Function</th>   
				<th class="table-header">Expected Billing Days</th>
				<th class="table-header">Actual Billing Days</th>
        <th class="table-header">Difference</th>
        <th class="table-header">Project Comment</th>             
			  </tr>
		  </thead>
		  <tbody>
		  <?php
		  foreach($faq as $k=>$v) {
		  ?>
			  <tr class="table-row">
          <td><?php echo $faq[$k]["EMPLY_NAME"]; ?></td> 
          <td><?php echo $faq[$k]["EMPLY_LOCATN"]; ?></td> 
          <td><?php echo $faq[$k]["EMPLY_BILL_STAT"]; ?></td> 
          <td><?php echo $faq[$k]["CURR_YEAR"]; ?></td> 
          <td><?php echo $faq[$k]["BILLD_FW"]; ?></td> 
          <td><?php echo $faq[$k]["FISCL_WEEK"]; ?></td> 
          <td><?php echo $faq[$k]["PNL_COE_FNCTN"]; ?></td> 
          <td><?php echo $faq[$k]["EXPECT_BILLNG_DYS"]; ?></td>  
          <td><?php echo $faq[$k]["ACTUAL_BILLNG_DYS"]; ?></td>
          <td><?php echo $faq[$k]["GAP"]; ?></td>
          <td><?php echo $faq[$k]["PROJCT_COMNT"]; ?></td>        
			  </tr>
		<?php
		}
		?>
		  </tbody>
		</table>
    </body>
</html>
