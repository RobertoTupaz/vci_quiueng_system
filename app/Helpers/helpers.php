<?php 

if (!function_exists('addZeroes')) {
    function addZeroes($length) {

        if($length == 1) {
            return '000';
        } else if($length == 2) {
            return '00';
        } else if($length == 3) {
            return '0';
        } else {
            return '';
        }
    }
}