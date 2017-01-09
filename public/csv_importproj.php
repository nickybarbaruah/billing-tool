<?php require_once("../includes/db_connection.php"); ?>
<?php
  
$csvfile = "../files/project_master.csv";

if(!file_exists($csvfile)) {
    die("File not found. Make sure you specified the correct path.");
}

$rowcount = 0;

$query = "LOAD DATA LOCAL INFILE '".$csvfile."' INTO TABLE project_master
          FIELDS TERMINATED BY ','
          OPTIONALLY ENCLOSED BY '\"'
          LINES TERMINATED BY '\\n' 
          IGNORE 1 LINES (
          @var1,
          PROJCT_NAME,
          GE_PM_NAME,
          IT_PM_NAME,
          LT_PROJCT_NAME,
          ADF_WRKFLW_NO,
          PNL_COE_FNCTN,
          PROJCT_LEAD_NAME,
          GE_ARCHTCT_NAME,
          PROJCT_TECH,
          PROJCT_ESTMT,
          PROJCT_ACTUAL,
          PROJCT_STRT_FW,
          PROJCT_END_FW,
          PROJCT_ACT_FLG,
          PROJCT_COMNT,
          PROJCT_BILNG,
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
          @var5) 
          SET GL_OPRTNL_PROJCT_IDN = NULL,
          SRC_CRETN_TS = STR_TO_DATE(@var2, '%m/%d/%Y %H:%i:%S.%f'),
      	  SRC_UPD_TS = STR_TO_DATE(@var3, '%m/%d/%Y %H:%i:%S.%f'),
      	  WEB_POSTNG_TS = STR_TO_DATE(@var4, '%m/%d/%Y %H:%i:%S.%f'),
      	  WEB_UPD_TS = STR_TO_DATE(@var5, '%m/%d/%Y %H:%i:%S.%f');
         ";          

$result = mysqli_query($connection, $query);

if($result) {
  //$rowcount = mysqli_affected_rows($result);
  echo "Loaded records into project master table from this csv file.\n";
} else {
  echo "No data loaded :( ";
}

?>