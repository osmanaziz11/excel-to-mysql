<?php
require 'vendor/autoload.php';

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
      $worksheet = $spreadsheet->getActiveSheet();
    foreach ($worksheet->getRowIterator() as $row)
    {
        if(isRowEmpty($row))
         {
             echo 'Row Empty';
         }

        $cellIterator = $row->getCellIterator();
        $cellIterator->setIterateOnlyExistingCells(TRUE); // This loops through all cells,
                                                         //    the default value is 'false'.
                                                         // foreach ($cellIterator as $cell) {
                                                         //   echo $cell->getValue();
                                                         // }
    }
  
    }else{$status=0;}

    echo $status;
}    

?>