<?php
include_once('model/mQuanli.php');
class cSanpham
{

    public function getALLND()
    {
        $p = new mSanpham();
        $tblSP = $p->selectALLND();
        if (!$tblSP) {
            return -1;
        } else {
            if ($tblSP->num_rows > 0) {
                return $tblSP;
            } else {
                return 0;
            }
        }
    }
    public function getALLCK()
    {
        $p = new mSanpham();
        $tblSP = $p->selectALLCK();
        if (!$tblSP) {
            return -1;
        } else {
            if ($tblSP->num_rows > 0) {
                return $tblSP;
            } else {
                return 0;
            }
        }
    }
    public function addTTBS($manv, $ckhoa)
    {
        $p = new mSanpham();
        $tblSP = $p->addBSTT($manv, $ckhoa);
        if (!$tblSP) {
            return -1;
        } else {
            if ($tblSP->num_rows > 0) {
                return $tblSP;
            } else {
                return 0;
            }
        }
    }
    public function addTTDD($manv, $ckhoa)
    {
        $p = new mSanpham();
        $tblSP = $p->addDDTT($manv, $ckhoa);
        if (!$tblSP) {
            return -1;
        } else {
            if ($tblSP->num_rows > 0) {
                return $tblSP;
            } else {
                return 0;
            }
        }
    }
    public function getALLROLE()
    {
        $p = new mSanpham();
        $tblSP = $p->selectALLROLE();
        if (!$tblSP) {
            return -1;
        } else {
            if ($tblSP->num_rows > 0) {
                return $tblSP;
            } else {
                return 0;
            }
        }
    }
    public function getALLPHONG()
    {
        $p = new mSanpham();
        $tblSP = $p->selectALLPHONG();
        if (!$tblSP) {
            return -1;
        } else {
            if ($tblSP->num_rows > 0) {
                return $tblSP;
            } else {
                return 0;
            }
        }
    }
    public function getALLBACS()
    {
        $p = new mSanpham();
        $tblSP = $p->selectALLBACS();
        if (!$tblSP) {
            return -1;
        } else {
            if ($tblSP->num_rows > 0) {
                return $tblSP;
            } else {
                return 0;
            }
        }
    }
    public function getALLDD()
    {
        $p = new mSanpham();
        $tblSP = $p->selectALLDD();
        if (!$tblSP) {
            return -1;
        } else {
            if ($tblSP->num_rows > 0) {
                return $tblSP;
            } else {
                return 0;
            }
        }
    }
    public function getALLSOCA($id)
    {
        $p = new mSanpham();
        $tblSP = $p->selectSOCA($id);
        if (!$tblSP) {
            return -1;
        } else {
            if ($tblSP->num_rows > 0) {
                return $tblSP;
            } else {
                return 0;
            }
        }
    }
    public function addLICHTRUC($timeName, $employee, $buoi, $catruc1, $room, $ck, $date)
    {
        $p = new mSanpham();
        $tblSP = $p->themLICHTRUC($timeName, $employee, $buoi, $catruc1, $room, $ck, $date);
        if (!$tblSP) {
            return -1;
        } else {
            if ($tblSP->num_rows > 0) {
                return $tblSP;
            } else {
                return 0;
            }
        }
    }
    public function getUSER()
    {
        $p = new mSanpham();
        $tblSP = $p->selectUSER();
        if (!$tblSP) {
            return -1;
        } else {
            if ($tblSP->num_rows > 0) {
                return $tblSP;
            } else {
                return 0;
            }
        }
    }
    public function getALLNVYCDL()
    {
        $p = new mSanpham();
        $tblSP = $p->selectALLNVYCDL();
        if (!$tblSP) {
            return -1;
        } else {
            if ($tblSP->num_rows > 0) {
                return $tblSP;
            } else {
                return 0;
            }
        }
    }
    public function getNVYCDL($id)
    {
        $p = new mSanpham();
        $tblSP = $p->selectNVYCDL($id);
        if (!$tblSP) {
            return -1;
        } else {
            if ($tblSP->num_rows > 0) {
                return $tblSP;
            } else {
                return 0;
            }
        }
    }
    public function getCACU($maca)
    {
        $p = new mSanpham();
        $tblSP = $p->selectCACU($maca);
        if (!$tblSP) {
            return -1;
        } else {
            if ($tblSP->num_rows > 0) {
                return $tblSP;
            } else {
                return 0;
            }
        }
    }
    public function getCAMOI($maca)
    {
        $p = new mSanpham();
        $tblSP = $p->selectCAMOI($maca);
        if (!$tblSP) {
            return -1;
        } else {
            if ($tblSP->num_rows > 0) {
                return $tblSP;
            } else {
                return 0;
            }
        }
    }
    public function updateTUCHOI($trangthai, $lydo, $maphieu)
    {
        $p = new mSanpham();
        $tblSP = $p->capnhatTUCHOI($trangthai, $lydo, $maphieu);
        if (!$tblSP) {
            return -1;
        } else {
            if ($tblSP->num_rows > 0) {
                return $tblSP;
            } else {
                return 0;
            }
        }
    }

    public function getUSERGIONG($name)
    {
        $p = new mSanpham();
        $tblSP = $p->selectUSERGIONG($name);
        if (!$tblSP) {
            return -1;
        } else {
            if ($tblSP->num_rows > 0) {
                return $tblSP;
            } else {
                return 0;
            }
        }
    }
    public function layMNVN($maca)
    {
        $p = new mSanpham();
        $tblSP = $p->getMNVM($maca);
        if (!$tblSP) {
            return -1;
        } else {
            if ($tblSP->num_rows > 0) {
                return $tblSP;
            } else {
                return 0;
            }
        }
    }
    public function upTRANGTH($maphieu)
    {
        $p = new mSanpham();
        $tblSP = $p->capnhatTT($maphieu);
        if (!$tblSP) {
            return -1;
        } else {
            if ($tblSP->num_rows > 0) {
                return $tblSP;
            } else {
                return 0;
            }
        }
    }
    public function upMNVCU($manhanvien, $camoi)
    {
        $p = new mSanpham();
        $tblSP = $p->capnhatMNVCU($manhanvien, $camoi);
        if (!$tblSP) {
            return -1;
        } else {
            if ($tblSP->num_rows > 0) {
                return $tblSP;
            } else {
                return 0;
            }
        }
    }
    public function upMNVMOI($manhanvien, $camoi)
    {
        $p = new mSanpham();
        $tblSP = $p->capnhatMNVMOI($manhanvien, $camoi);
        if (!$tblSP) {
            return -1;
        } else {
            if ($tblSP->num_rows > 0) {
                return $tblSP;
            } else {
                return 0;
            }
        }
    }

    public function getADDND($ten, $sdt, $email, $diachi, $chucvu, $iduser)
    {
        $p = new mSanpham();
        $tblSP = $p->addND($ten, $sdt, $email, $diachi, $chucvu, $iduser);
        if (!$tblSP) {
            return -1;
        } else {
            if ($tblSP->num_rows > 0) {
                return $tblSP;
            } else {
                return 0;
            }
        }
    }
    public function getADDROLE($user, $password, $idrole)
    {
        $p = new mSanpham();
        $tblSP = $p->addROLE($user, $password, $idrole);
        if (!$tblSP) {
            return -1;
        } else {
            if ($tblSP->num_rows > 0) {
                return $tblSP;
            } else {
                return 0;
            }
        }
    }
    public function getNAMER($id)
    {
        $p = new mSanpham();
        $tblSP = $p->selectNAMER($id);
        if (!$tblSP) {
            return -1;
        } else {
            if ($tblSP->num_rows > 0) {
                return $tblSP;
            } else {
                return 0;
            }
        }
    }
    public function getTENROLE($id)
    {
        $p = new mSanpham();
        $tblSP = $p->selectTENROLE($id);
        if (!$tblSP) {
            return -1;
        } else {
            if ($tblSP->num_rows > 0) {
                return $tblSP;
            } else {
                return 0;
            }
        }
    }

    public function xoaND($id)
    {
        $p = new mSanpham();
        $tblSP = $p->deleteND($id);
        if (!$tblSP) {
            return -1;
        } else {
            if ($tblSP->num_rows > 0) {
                return $tblSP;
            } else {
                return 0;
            }
        }
    }
    public function suaND($ten, $sdt, $email, $diachi, $manv)
    {
        $p = new mSanpham();
        $tblSP = $p->updateND($ten, $sdt, $email, $diachi, $manv);
        if (!$tblSP) {
            return -1;
        } else {
            if ($tblSP->num_rows > 0) {
                return $tblSP;
            } else {
                return 0;
            }
        }
    }
    public function suaROLEUSER($idrole, $userid)
    {
        $p = new mSanpham();
        $tblSP = $p->updateROLEUSER($idrole, $userid);
        if (!$tblSP) {
            return -1;
        } else {
            if ($tblSP->num_rows > 0) {
                return $tblSP;
            } else {
                return 0;
            }
        }
    }
    public function suaROLEND($iduser, $chucvu)
    {
        $p = new mSanpham();
        $tblSP = $p->updateROLEND($iduser, $chucvu);
        if (!$tblSP) {
            return -1;
        } else {
            if ($tblSP->num_rows > 0) {
                return $tblSP;
            } else {
                return 0;
            }
        }
    }
    public function suaQUYENUSER($id, $iduser)
    {
        $p = new mSanpham();
        $tblSP = $p->updateQUYENUSER($id, $iduser);
        if (!$tblSP) {
            return -1;
        } else {
            if ($tblSP->num_rows > 0) {
                return $tblSP;
            } else {
                return 0;
            }
        }
    }
    public function getIDNV($iduser)
    {
        $p = new mSanpham();
        $tblSP = $p->selectIDNV($iduser);
        if (!$tblSP) {
            return -1;
        } else {
            if ($tblSP->num_rows > 0) {
                return $tblSP;
            } else {
                return 0;
            }
        }
    }
    public function getND($mand)
    {
        $p = new mSanpham();
        $tblSP = $p->selectND($mand);
        if (!$tblSP) {
            return -1;
        } else {
            if ($tblSP->num_rows > 0) {
                return $tblSP;
            } else {
                return 0;
            }
        }
    }

}

?>