<?php
    include("model/mUser.php");
    class cUser{
        public function addUser($sql) {
            $p = new mUser();
            
            return $p -> insUser($sql);
        }public function getUser($sql) {
            $p = new mUser();
            
            $tblSP = $p->selUser($sql);
            if (!$tblSP) {
                return -1;
            } else {
                if ($tblSP->num_rows > 0) {
                    return $tblSP;
                } else {
                    return 0; // Không có dòng dữ liệu
                }
            }
        }
        
    }
    
?>