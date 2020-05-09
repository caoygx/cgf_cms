<?php

function show_img($v){
    return "<img src='{$v}' width='50' />";
}

function generate_admin_url($menuConfig){
    if(empty($menuConfig['controller'])) return '';
    $url = "/admin/".$menuConfig['controller'].'/'.$menuConfig['action'];
    return $url;
}

function getControllerUrl(){
    $pathinfo = app()->request->pathinfo();
    $pathinfo = explode('/',$pathinfo);
    //$module = $pathinfo[0];
    $controllerUrl = "/".$pathinfo[0]."/".$pathinfo[1];
    return $controllerUrl;
}

function haveUploadFile(){
    foreach ($_FILES as $k => $v) {
        if(!empty($v['tmp_name'])) return true;
    }
    return false;
}

/**
 * @param $v
 * @param string $style  .图片尺寸要在阿里云定义，一个尺寸必须要设置两种格式名。如thumb,thumb_webp即图片原始格式和webp格式
 * @return mixed|string
 */
function img($v,$style="thumb"){

    if(empty($v))  return config('app.default_img');

    if(IS_WEBP){
        //$style .= '_webp';
    }

    //有http://,https://则转为通用协议
    if(substr($v,0,4) == 'http'){
        $pos = strpos($v,'://');
        //var_dump($pos);exit('x');
        $v = substr($v,$pos+1);
        //$v = strstr($v,'://');
    }else{
        $v =  URL_IMG.'/'.$v;
    }
    return $v."?x-oss-process=style/{$style}";
}


//导出操作
function exportExcel($expTitle,$expCellName,$expTableData){
    $xlsTitle = iconv('utf-8', 'gb2312', $expTitle);//文件名称
    $fileName = $expTitle.date('_Ymd_His');//or $xlsTitle 文件名称可根据自己情况设定
    $cellNum = count($expCellName);
    $dataNum = count($expTableData);
    $objPHPExcel = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
    //vendor('PHPExcel.Classes.PHPExcel');
    //$objPHPExcel = new \PHPExcel();
    $cellName = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ');

    //$objPHPExcel->getActiveSheet(0)->mergeCells('A1:'.$cellName[$cellNum-1].'1');//合并单元格
    //$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', $expTitle.'  Export time:'.date('Y-m-d H:i:s'));//第一行标题
    //for($i=0;$i<$cellNum;$i++){
    $j = 0;
    foreach ($expCellName as $columnName=>$columnZh){
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue($cellName[$j].'1', $columnZh);
        $j++;
    }

    // Miscellaneous glyphs, UTF-8
    for($i=0;$i<$dataNum;$i++){
        //for($j=0;$j<$cellNum;$j++){
        $j = 0;
        foreach ($expCellName as $columnName=>$columnZh){
            //var_dump($expTableData);
            if(is_numeric($expTableData[$i][$columnName]) &&  strlen($expTableData[$i][$columnName])>8){
                $objPHPExcel->getActiveSheet(0)->setCellValueExplicit($cellName[$j].($i+2), $expTableData[$i][$columnName],\PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            }else{
                $objPHPExcel->getActiveSheet(0)->setCellValue($cellName[$j].($i+2), $expTableData[$i][$columnName]);
            }
            $j++;
        }
    }


    $objWriter = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($objPHPExcel, 'Xlsx');
    //$writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($objPHPExcel);
    //$objWriter->save('01simple.xlsx');exit;
    //$writer->save('world.xlsx');

    header('pragma:public');
    header('Content-type:application/vnd.ms-excel;charset=utf-8;name="'.$xlsTitle.'.xls"');
    header("Content-Disposition:attachment;filename=$fileName.xls");//attachment新窗口打印inline本窗口打印

    $objWriter->save('php://output');
    exit;
}
