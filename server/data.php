<?php
require '../vendor/autoload.php';
require 'db-config.php';

$hash_db=new db_config();

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$status='';
// Check if entire row is empty 
function isRowEmpty($row){
   $is_row_empty = true;
        foreach ($row->getCellIterator() as $cell) {
            if ($cell->getValue() !== null && $cell->getValue() !== '') {
                $is_row_empty = false;
                break;
            }
        }
        return $is_row_empty;
}

if(!empty($_FILES['import_file']['name']))
{
    $validExtn=['xls','xlsx'];
    $file_name=$_FILES['import_file']['name'];
    $fileExtn=explode('.',$file_name);
    $fileExtn=end($fileExtn);
    if(in_array($fileExtn,$validExtn)){
      $status=1;
      $path=$_FILES['import_file']['tmp_name'];
      $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($path);
      $worksheet = $spreadsheet->getActiveSheet()->toArray();
      $count=0;
    foreach ($worksheet as $row)
    {
        if($row[0]=='S.No' || $row[0]=='')
            continue;
        $count++;
        $user_data=array(
            ':sno'=> $row[0],
            ':name'=>$row[1],
            ':phone'=>$row[2],
            ':email'=>$row[3],
            ':provider'=>$row[4],
            ':reseller'=>$row[5],
            ':activated_on'=>$row[6],
            ':renewed_on'=>$row[7],
            ':system_exp'=>$row[8],
            ':mac_address'=>$row[9],
            ':user'=>$row[10],
            ':status'=>$row[11],
            ':bf_months'=>$row[12],
            ':bal_months'=>$row[13],
            ':bf_dollar'=>$row[14],
            ':payment_status'=>$row[15],
            ':comments'=>$row[16],
            ':paid_till'=>$row[17],
            ':box_price'=>$row[18],
            ':actual_renew'=>$row[19],
            ':months_bought'=>$row[20]
        );
        $paid_on_data=array(
            ':sno'  => $row[0],
            ':paid_on_1'=>$row[21],
            ':paid_on_2'=>$row[22],
            ':paid_on_3'=>$row[23],
            ':paid_on_4'=>$row[24],
            ':paid_on_5'=>$row[25],
            ':paid_on_6'=>$row[26],
            ':paid_on_7'=>$row[27],
            ':paid_on_8'=>$row[28],
            ':paid_on_9'=>$row[29],
            ':paid_on_10'=>$row[30],
            ':paid_on_11'=>$row[31],
            ':paid_on_12'=>$row[32],
            ':paid_on_13'=>$row[33],
            ':paid_on_14'=>$row[34],
            ':paid_on_15'=>$row[35],
            ':paid_on_16'=>$row[36],
            ':paid_on_17'=>$row[37],
            ':paid_on_18'=>$row[38],
            ':paid_on_19'=>$row[39],
            ':paid_on_20'=>$row[40],
            ':paid_on_21'=>$row[41],
            ':paid_on_22'=>$row[42],
            ':paid_on_23'=>$row[43],
            ':paid_on_24'=>$row[44],
            ':paid_on_25'=>$row[45],
            ':paid_on_26'=>$row[46],
            ':paid_on_27'=>$row[47],
            ':paid_on_28'=>$row[48],
            ':paid_on_29'=>$row[48],
            ':paid_on_30'=>$row[50],
            ':paid_on_31'=>$row[51]
        );
        $total_data=array(  
            ':sno'=>$row[0],
            ':total'=>$row[52],
            ':renewed'=>$row[53],
            ':balance'=>$row[54],
            ':remarks'=>$row[55]
        );

            $hash_db->insert_user_row($user_data);
            $hash_db->insert_user_paid_row($paid_on_data);
            $hash_db->insert_user_total_row($total_data);                                              
    }
  
    }else{$status=0;}

    echo $status;
}    

if(isset($_POST['status']))
{
   $res=$hash_db->get_userInfo();
   echo json_encode($res);
}
?>