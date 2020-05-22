<?php

namespace App;

class HashUrl {

//const $codeset = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
//readable character set excluded (0,O,1,l)
const codeset = "23456789abcdefghijkmnopqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ";
const secretNumber = 32512352135;

static function encode($n){
    $base = strlen(self::codeset);
    $input = self::secretNumber + $n;
    $converted = '';

    while ($input > 0) {
        $converted = substr(self::codeset, bcmod($input,$base), 1) . $converted;
        $input = self::bcFloor(bcdiv($input, $base));
    }

    return $converted ;
}

static function decode($code){
    $base = strlen(self::codeset);
    $c = '0';
    for ($i = strlen($code); $i; $i--) {
        $c = bcadd($c,bcmul(strpos(self::codeset, substr($code, (-1 * ( $i - strlen($code) )),1))
                ,bcpow($base,$i-1)));
    }

    return bcmul($c, 1, 0) - self::secretNumber;
}

static private function bcFloor($x)
{
    return bcmul($x, '1', 0);
}

static private function bcCeil($x)
{
    $floor = bcFloor($x);
    return bcadd($floor, ceil(bcsub($x, $floor)));
}

static private function bcRound($x)
{
    $floor = bcFloor($x);
    return bcadd($floor, round(bcsub($x, $floor)));
}

} 
?>