<?php 
include_once("model/mBacSi.php");
class cBacsi{
    public function getBS(){
        $p = new mBacSi();
        $k= $p->selectBacSi();
        if(mysqli_num_rows($k)>0){
            return $k;
        }else return false;
    }
}

?>