<?php 
    class cDateWeek {
        public function LayThu($date){
            $dayOfWeek = strftime('%A', strtotime($date));
            return $dayOfWeek;
        }

        public function Tuan($date) {
            $timestamp = strtotime($date);

            $monday = date('Y-m-d', strtotime('last monday', $timestamp));
            if (date('N', $timestamp) == 1) { 
                $monday = date('Y-m-d', $timestamp);
            }

            $sunday = date('Y-m-d', strtotime('next sunday', $timestamp));
            if (date('N', $timestamp) == 7) { 
                $sunday = date('Y-m-d', $timestamp);
            }

            return [
                'Monday' => $monday,
                'Sunday' => $sunday
            ];
        }
    }


?>