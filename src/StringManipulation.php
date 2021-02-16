<?php
/**
 * This class will Manipulate the string into Upper case and Alternate case,
 * Store each character on the string to a CSV file
 * Author: Mohamed Riyas KP
 * Date : 16/02/2020
 */
class StringManipulation{

    public function __construct($str){
        /* Check the string is empty */
        if($str==='') throw new Exception("Atleast need single alphabet");

        /* Check the string contains any non alphabets */
        if(preg_match('/[^A-Za-z ]/', $str)) throw new Exception("Invalid String. Only A-Z and a-z alphabets allowed");
        
        $this->string = $str;
    }

    /* To display the entered string */
    public function display(){
        return $this->string;
    }

    /* To change the string to upper case */
    public function toUpperCase(){
        return strtoupper($this->string);
    }

    /* To change the string to alternate upper and lower case */
    public function toAlternateCase(){
        $alternative = str_split(strtolower($this->string),1);
        for($i=0;$i<sizeof($alternative);$i++){
            if(($i+1)%2==0){
                $alternative[$i]=strtoupper($alternative[$i]);
            } 
        }
        return $alternative = implode("",$alternative);
    }

    /* To create CSV file from the string */
    public function toCSV(){

        $strArray = str_split($this->string,1);

        $file = fopen("output.csv","w");
        
        $status = fputcsv($file,$strArray);
       
        fclose($file);
        if($status){
            return "CSV created!";
        } else {
            return "CSV failed!";
        }
    }

    /* To display the results in single call*/
    public function result(){
        
        $result = $this->toUpperCase().PHP_EOL;
        $result.=$this->toAlternateCase().PHP_EOL;
        $result.=$this->toCSV().PHP_EOL;

        return $result;
    }

}
