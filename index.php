<?php

$originpass = "hasanibrahimkozan"; //şifremiz
$originkey = "hayat"; //key değerimiz

$ch = str_split($originpass); //şifreyi parçalıyoruz
$key = str_split($originkey); //keyi parçalıyoruz

$a = range(1, 26); //1'den 26'ya kadar olan bir dizi
$b = range('a', 'z'); //a'dan z'ye kadar olan bir dizi
$c = array_map(null, $a, $b); //$a ve $b dizisinin array_map ile denkleştirilmesi
for ($i = 0; $i < 26; $i++) { //26 kere dön
    if (!array_key_exists($i, $ch)) { //eğer $i değeri sifre uzunluğundan büyükse döngüden çık. (key harf sayısı kadar dönüyor döngü)
        break;
    } else {
        $d = array_map(null, $ch, $key); //$ch ve $key dizisinin array_map ile denkleştirilmesi
        $crypt = $d[$i][1]; //$d dizisinin tek tek her elemanından key değerine karşılık gelen harfi alıyoruz
        $keyvalue = (array_search($crypt, $b)); //harf dizimizde key değerini arıyoruz. dönen yanıt karşılık gelen value değerinin sayısı
        $passvalue = (array_search($ch[$i], $b)); // harf dizimizde şifre değerini arıyoruz. dönen yanıt karşılık gelen value değerinin sayısı

        $equal[] = (int)(fmod(($passvalue + $keyvalue), 26) + 1); //şifreden dönen sayı ile keyden dönen sayıyı toplayıp 26'ya göre modunu alıyoruz ve integer a çevirip $equal dizisine ekliyoruz.
        @$sifre[] = $b[$equal[$i]];//key değerinde ki harflere karşılık gelen sayıları, $b yani harfler dizimizde ki keylere denk gelen harflerle eşleştiriyoruz. Ve eşleşen harfler şifrelenmiş metnimiz oluyor
    }
}
$sifre = (implode($sifre)); //sifre dizisini string'e çeviriyoruz

echo "Orjinal metin : <b>" . $originpass;
echo "</b><br>";
echo "Key Değeri : <b>" . $originkey;
echo "</b><br><br>";
echo "Şifre : <b>" . $sifre;