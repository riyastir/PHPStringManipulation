<?php
/**Including the class file */
require './StringManipulation.php';

echo "Please enter the string (a-z,A-Z): ";
/**Get the input from user and trim the spaces from both ends */
$userInput = trim(fgets(STDIN));
try{
    $data = new StringManipulation($userInput);
    $result = $data->result();
    fwrite(STDOUT, $result);    
} catch(Exception $e){
    fwrite(STDERR, $e->getMessage());
}
