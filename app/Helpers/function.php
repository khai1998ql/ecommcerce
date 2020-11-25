<?php
    function base_url(){
        return $url =  "http://localhost/ecommerce/";
    }
    function strlenURL(){
        return strlen(base_url());
    }
    function linkImg($url){
        return substr($url, strlenURL());
    }
    function to_sub($str) {
        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);
        return $str;
    }
    function formatPrice($number){
        $number = intval($number);
        return $number = number_format($number,0,'.',',') . " đ";

    }
    function formatPriceSalePer($number, $sale){
        $number = intval($number);
        $sale = intval($sale);
        $price = $number*(100 - $sale)/100;
        return formatPrice($price);
    }
    function formatPriceSale($number1, $number2){
        $number1 = intval($number1);
        $number2 = intval($number2);
        $price = $number1-$number2;
        return formatPrice($price);
    }
    function formatSumPriceSalePer($number, $sale, $qty){
        $number = intval($number);
        $sale = intval($sale);
        $qty = intval($qty);
        $price = $number * (100 - $sale)/ 100 * $qty;
        return formatPrice($price);
    }
?>
