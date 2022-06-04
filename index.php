<?php

function crypting($cryp, $key)
{
    $ch = str_split(strtolower($cryp));
    $kk = str_split(strtolower($key));

    $arr = array("a" => 1, "b" => 2, "c" => 3, "d" => 4, "e" => 5, "f" => 6, "g" => 7, "h" => 8, "i" => 9, "j" => 10, "k" => 11, "l" => 12, "m" => 13, "n" => 14, "o" => 15, "p" => 16, "q" => 17, "r" => 18, "s" => 19, "t" => 20, "u" => 21, "v" => 22, "w" => 23, "x" => 24, "y" => 25, "z" => 26);

    //key degerini alma
    for ($j = 0; $j < count($kk); $j++) {
        //keyi parcalama
        $equal = strtr($kk[$j], $arr) . '-';
        $keycode = explode("-", $equal);
    }

    for ($i = 0; $i < count($ch); $i++) {
        //sifreyi parcalama
        $equal = strtr($ch[$i], $arr) . '-';
        $explode = explode("-", $equal);

        //sifreyi key ile toplama
        $topla = fmod(($explode[$i] + $keycode[$i]), 26); //şifre de ki harflere karşılık gelen sayı key de ki harflere karşılık gelen sayı ile toplanıp 25 ile mod'u alınacak;
        $coz = array_search($topla, $arr);
        print_r($coz);
        echo "<br>";
    }
}

function executeLetters($pass, $keyvalue)
{
    $return = "";

    $input = str_split($pass);

    foreach ($input as $p) {
        $return .= crypting($p, $keyvalue);
    }
}

$sifre = "baris";
$anahtar = "abc";

$sifrelimetin = executeLetters($sifre, $anahtar);
