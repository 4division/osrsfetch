
<?php
if(isset($_POST['field1']) ) {
    $data = $_POST['field1'] ."\n";
    $filename =$username.".txt";
    $ret = file_put_contents('bio/'. $filename.'', $data, LOCK_EX);
    if($ret === false) {
        die('There was an error writing this file');
    }
    else {
        echo "$ret bytes written to file";
    }
}

?>