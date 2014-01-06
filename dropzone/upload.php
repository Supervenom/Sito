<?php
 
$upload_folder = 'file-upload';
if (!empty($_FILES)) {
  $temp_file = $_FILES['file']['tmp_name'];
  $target_path = dirname( __FILE__ ) .  '/' . $upload_folder . '/';
  $target_file =  $target_path . $_FILES['file']['name'];
     
 
  if( file_exists( $target_path ) ) {
    move_uploaded_file($temp_file, $target_file);
  } else {
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
  }
}
 
?>