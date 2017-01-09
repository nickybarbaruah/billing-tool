<?php require_once("../includes/db_connection.php"); ?>
<?php
  
$csvfile = "../files/employee_master.csv";

if(!file_exists($csvfile)) {
    die("File not found. Make sure you specified the correct path.");
}

$rowcount = 0;

$query = "LOAD DATA LOCAL INFILE '".$csvfile."' INTO TABLE employee_master
          FIELDS TERMINATED BY ','
          OPTIONALLY ENCLOSED BY '\"'
          LINES TERMINATED BY '\\n' 
          IGNORE 1 LINES (
          @var1,
          EMPLY_TCS_ID,
          EMPLY_SSO,
          EMPLY_NAME,
          EMPLY_BILNG_STAT,
          EMPLY_TECHNLGY,
          EMPLY_LOCATN,
          EMPLY_COMNT,
          EMPLY_ACT_FLG,
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
          SET GL_OPRTNL_EMPLY_IDN = NULL,
          SRC_CRETN_TS = STR_TO_DATE(@var2, '%m/%d/%Y %H:%i:%S.%f'),
      	  SRC_UPD_TS = STR_TO_DATE(@var3, '%m/%d/%Y %H:%i:%S.%f'),
      	  WEB_POSTNG_TS = STR_TO_DATE(@var4, '%m/%d/%Y %H:%i:%S.%f'),
      	  WEB_UPD_TS = STR_TO_DATE(@var5, '%m/%d/%Y %H:%i:%S.%f');
         ";          

$result = mysqli_query($connection, $query);

if($result) {
  //$rowcount = mysqli_affected_rows($result);
  echo "Loaded records into employee master table from this csv file.\n";
} else {
  echo "No data loaded :( ";
}

?>