<?php
   
    $filename='/tmp/dbname.sql';     
    $fileExt = pathinfo($filename);     
    set_time_limit(0);     
    ini_set('max_execution_time', '0');     
    header('content-type:application/octet-stream');     
    header('Accept-Ranges:bytes');          
    $filesize = filesize($filename);     
    header('Accept-Length:'.$filesize);     
    header('content-disposition:attachment;filename='.basename($filename));     
    $read_buffer = 16384;     
    $handle = fopen($filename, 'rb');     
    $sum_buffer = 0;     
    while(!feof($handle) && $sum_buffer<$filesize) {
           echo fread($handle,$read_buffer);         
            $sum_buffer += $read_buffer;     
    }     
    fclose($handle);     
    exit;
