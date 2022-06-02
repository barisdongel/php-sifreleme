<?php

function sifreleme($cryp, $key)
{
    $ch = str_split(strtolower($cryp));

    $arr = array("a" => 1, "b" => 2, "c" => 3, "d" => 4, "e" => 5, "f" => 6, "g" => 7, "h" => 8, "i" => 9, "j" => 10, "k" => 11, "l" => 12, "m" => 13, "n" => 14, "o" => 15, "p" => 16, "q" => 17, "r" => 18, "s" => 19, "t" => 20, "u" => 21, "v" => 22, "w" => 23, "x" => 24, "y" => 25, "z" => 26);


    for ($i = 0; $i < count($ch); $i++) {
        //sifreyi parcalama
        $equal = strtr($ch[$i], $arr) . '-';
        $explode = explode("-", $equal);

        //sifreyi key ile toplama
        $topla = $explode[$i] + $key;//key ile toplanacak;
        $coz = array_search ($topla, $arr);
        print_r($coz);
    }
}

function executeLetters($pass, $keyvalue)
{
    $return = "";

    $input = str_split($pass);

    foreach ($input as $p) {
        $return .= sifreleme($p, $keyvalue);
    }
}

$sifre = "Baris";
$anahtar = 4;

$sifrelimetin = executeLetters($sifre, $anahtar);
