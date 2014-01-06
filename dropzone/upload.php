<?php
include 'ChromePhp.php';
$ds          = DIRECTORY_SEPARATOR; 
$space = ' ';
 
$storeFolder = 'file-upload';  
 
if (!empty($_FILES)) {
 
    $tempFile = $_FILES['file']['tmp_name'];         
 
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds; 
 
    $targetFile =  $targetPath. $_FILES['file']['name']; 
 
    move_uploaded_file($tempFile,$targetFile);
	
	$command = 'lp -d _192_168_001_048 '. $targetFile;
	ChromePhp::log($command);
	
	$output = shell_exec($command);
 
} else {                                                           
    $result  = array();
 
    $files = scandir($storeFolder);                 //1
    if ( false!==$files ) {
        foreach ( $files as $file ) {
            if ( '.'!=$file && '..'!=$file) {       //2
                $obj['name'] = $file;
                $obj['size'] = filesize($storeFolder.$ds.$file);
                $result[] = $obj;
            }
        }
    }
     
    header('Content-type: text/json');              //3
    header('Content-type: application/json');
    echo json_encode($result);
}
?>
