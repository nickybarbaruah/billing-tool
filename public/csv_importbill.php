<?php require_once("../includes/db_connection.php"); ?>
<?php
  
$csvfile = "../files/billing_master.csv";

if(!file_exists($csvfile)) {
    die("File not found. Make sure you specified the correct path.");
}

$rowcount = 0;

$query = "LOAD DATA LOCAL INFILE '".$csvfile."' INTO TABLE billing_temp
          FIELDS TERMINATED BY ','
          OPTIONALLY ENCLOSED BY '\"'
          LINES TERMINATED BY '\\n' 
          IGNORE 1 LINES (
          EMP_PROJCT_INPUT_IDN,
          PROJCT_NAME,
          EMPLY_NAME,
          CURR_YEAR,
          FISCL_MONTH,
          FISCL_WEEK,
          BILLNG_HRS,

          BILLD_FW	,
          ACTUAL_BILLNG_DYS	,
          EXPECT_BILLNG_DYS	,
          EMPLY_LOCATN	,
          EMPLY_BILL_STAT	,
          EMPLY_BILL_RATE	,
          ALLOCTN_PERCNTG	,
          PROJCT_COMNT	,
          HISTRY	,
          SRC_IDN	,
          SRC_SYS_ID	,
          DAT_ORGN	,
          POSTNG_AGNT	,
          SRC_CRETN_ID	,
          @var2	,
          @var3	,
          SRC_UPD_ID	,
          @var4	,
          @var5	,
          LT_NAME) 
          SET SRC_CRETN_TS = STR_TO_DATE(@var2, '%m/%d/%Y %H:%i:%S.%f'),
      	  SRC_UPD_TS = STR_TO_DATE(@var3, '%m/%d/%Y %H:%i:%S.%f'),
      	  WEB_POSTNG_TS = STR_TO_DATE(@var4, '%m/%d/%Y %H:%i:%S.%f'),
      	  WEB_UPD_TS = STR_TO_DATE(@var5, '%m/%d/%Y %H:%i:%S.%f');
         ";          

$result = mysqli_query($connection, $query);

if($result) {
  //$rowcount = mysqli_affected_rows($result);
  echo "Loaded records into billing master table from this csv file.\n";
} else {
  echo "No data loaded :( ";
}

/*
          EMP_PROJCT_INPUT_IDN,
          PROJCT_NAME,
          EMPLY_NAME,
          CURR_YEAR,
          FISCL_MONTH,
          FISCL_WEEK,
          BILLNG_HRS,
          
          ACTUAL_BILLNG_DYS,
          EXPECT_BILLNG_DYS,
          PROJCT_COMNT,
          HISTRY,
          SRC_IDN,
          SRC_SYS_ID,
          DAT_ORGN,
          POSTNG_AGNT,
          SRC_CRETN_ID,
          @var2,
          @var3,
          SRC_UPD_ID,
          @var4,
          @var5,
          BILLD_FW,
          BILLNG_HRS1,
          EMPLY_LOCATN,
          EMPLY_BILL_STAT,
          EMPLY_BILL_RATE,
          ALLOCTN_PERCNTG,
          LT_NAME
*/

?>

