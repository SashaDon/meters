<?php

class sdon_meters {
    /**
     *
     *
     */
    public static function meter_1($p) {
        if (!isset($p['max'])) {
          return 'max param is missing';
        }

        if (isset($p['max']) && !$p['max'] > 0) {
            return 'max param is wrong - ' . $p['max'];
        }

        if (!isset($p['current'])) {
            return 'max param is missing';
        }

        if (isset($p['current']) && !$p['current'] > 0) {
            return 'current param is wrong - ' . $p['current'];
        }

        if (!isset($p['name'])) {
            return 'name param is missing';
        }

        $array = array();
        $spaces = array();
        $length = $p['length'];
        $number =  $p['current'] * 100 / $p['max'];

        for ($x = 0; $x < ceil($length*$number/100); $x++) {
            array_push($array, "|");
        }

        for ($x = 0; $x < floor($length - ($length*$number/100)); $x++) {
            array_push($spaces, " ");
        }

        //echo implode($array);
        return $p['name'] . "[" . implode($array) . implode($spaces) . "]" . round($number, 1) . "%";
    }
}

if (php_sapi_name() == "cli") {
    echo sdon_meters::meter_1([
        'name'    => "Bar 1",
        'max'     => 2000000,
        'current' => 500000,
        'length'  => 100,
        'units'   => '',
    ]) . "\n";

    echo sdon_meters::meter_1([
        'name'    => "Bar 2",
        'max'     => 9000,
        'current' => 8000,
        'length'  => 100,
        'units'   => '',
    ]) . "\n";

    echo sdon_meters::meter_1([
        'name'    => "Bar 3",
        'max'     => 8000000,
        'current' => 4500000,
        'length'  => 100,
        'units'   => '',
    ]) . "\n";
    echo sdon_meters::meter_1([
        'name'    => "Bar 4",
        'max'     => 200500,
        'current' => 50000,
        'length'  => 100,
        'units'   => '',
    ]) . "\n";

    echo sdon_meters::meter_1([
        'name'    => "Bar 5",
        'max'     => 900550,
        'current' => 5020,
        'length'  => 100,
        'units'   => '',
    ]) . "\n";

    echo sdon_meters::meter_1([
        'name'    => "Bar 6",
        'max'     => 80500000,
        'current' => 60350000,
        'length'  => 100,
        'units'   => '',
    ]) . "\n";
    echo sdon_meters::meter_1([
        'name'    => "Bar 7",
        'max'     => 1000,
        'current' => 1000,
        'length'  => 100,
        'units'   => '',
    ]) . "\n";

    echo sdon_meters::meter_1([
        'name'    => "Bar 8",
        'max'     => 2524622,
        'current' => 350000,
        'length'  => 100,
        'units'   => '',
    ]) . "\n";

}
