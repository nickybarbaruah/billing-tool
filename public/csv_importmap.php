<?php require_once("../includes/db_connection.php"); ?>
<?php
  
$csvfile = "../files/map.csv";

if(!file_exists($csvfile)) {
    die("File not found. Make sure you specified the correct path.");
}

$rowcount = 0;

$query = "LOAD DATA LOCAL INFILE '".$csvfile."' INTO TABLE projmap_temp
          FIELDS TERMINATED BY ','
          OPTIONALLY ENCLOSED BY '\"'
          LINES TERMINATED BY '\\n' 
          IGNORE 1 LINES (
          EMP_PROJCT_MAP_IDN,
          ADF_WRKFLW_NO,
          PROJCT_NAME,
          GE_PM_NAME,
          EMPLY_NAME,
          EMP_SSO,
          ALLOCTN_STRT_DT,
          ALLOCTN_END_DT,
          EMPLY_BILL_STAT,
          EMPLY_BILL_RATE,
          ALLOCTN_PERCNTG,
          PROJCT_EMP_MAP_FLG,
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
          GL_OPRTNL_PROJCT_IDN,
          GL_OPRTNL_EMPLY_IDN) 
          SET SRC_CRETN_TS = STR_TO_DATE(@var2, '%m/%d/%Y %H:%i:%S.%f'),
      	  SRC_UPD_TS = STR_TO_DATE(@var3, '%m/%d/%Y %H:%i:%S.%f'),
      	  WEB_POSTNG_TS = STR_TO_DATE(@var4, '%m/%d/%Y %H:%i:%S.%f'),
      	  WEB_UPD_TS = STR_TO_DATE(@var5, '%m/%d/%Y %H:%i:%S.%f');
         ";          

$result = mysqli_query($connection, $query);

if($result) {
  //$rowcount = mysqli_affected_rows($result);
  echo "Loaded records into map table from this csv file.\n";
} else {
  echo "No data loaded :( <br/><br/>"; 
  print_r($query);
}

?>

