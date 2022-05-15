<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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
function headRow($row)
{

}





if(!empty($_FILES['import_file']['name']))
{
    $validExtn=['xls','xlsx'];
    $file_name=$_FILES['import_file']['name'];
    $fileExtn=explode('.',$file_name);
    $fileExtn=end($fileExtn);
    if(in_array($fileExtn,$validExtn)){
    $path=$_FILES['import_file']['tmp_name'];
    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($path);
   $worksheet = $spreadsheet->getActiveSheet();


foreach ($worksheet->getRowIterator() as $row) {

  if(isRowEmpty($row))
  {
    echo 'Row Empty';
  }

    $cellIterator = $row->getCellIterator();
    $cellIterator->setIterateOnlyExistingCells(TRUE); // This loops through all cells,
                                      //    the default value is 'false'.

    echo '<pre>';
     print_r($cellIterator);
    // echo $cellIterator->['currentColumnIndex:PhpOffice\PhpSpreadsheet\Worksheet\RowCellIterator:private'];
    echo '</pre>';
    break;
    // foreach ($cellIterator as $cell) {
    
    //   echo $cell->getValue();
    // }
  
    
}
    
   
}else{echo 0;}

}
//  
//      

?>