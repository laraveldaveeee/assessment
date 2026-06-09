<?php 


function convert_number_to_words($number){ 
    // $decones = array( 
    //             '01' => "ONE", 
    //             '02' => "TWO", 
    //             '03' => "THREE", 
    //             '04' => "FOUR", 
    //             '05' => "FIVE", 
    //             '06' => "SIX", 
    //             '07' => "SEVEN", 
    //             '08' => "EIGHT", 
    //             '09' => "NINE", 
    //             10 => "TEN", 
    //             11 => "ELEVEN", 
    //             12 => "TWELVE", 
    //             13 => "THIRTEEN", 
    //             14 => "FOURTEEN", 
    //             15 => "FIFTEEN", 
    //             16 => "SIXTEEN", 
    //             17 => "SEVENTEEN", 
    //             18 => "EIGHTEEN", 
    //             19 => "NINETEEN" 
    //             );
    // $ones = array( 
    //             0 => "",
    //             1 => "ONE",     
    //             2 => "TWO", 
    //             3 => "THREE", 
    //             4 => "FOUR", 
    //             5 => "FIVE", 
    //             6 => "SIX", 
    //             7 => "SEVEN", 
    //             8 => "EIGHT", 
    //             9 => "NINE", 
    //             10 => "TEN", 
    //             11 => "ELEVEN", 
    //             12 => "TWELVE", 
    //             13 => "THIRTEEN", 
    //             14 => "FOURTEEN", 
    //             15 => "FIFTEEN", 
    //             16 => "SIXTEEN", 
    //             17 => "SEVENTEEN", 
    //             18 => "EIGHTEEN", 
    //             19 => "NINETEEN" 
    //             ); 
    
    // $tens = array( 
    //             0 => "ZERO",
    //             1 => "TEN",
    //             2 => "TWENTY", 
    //             3 => "THIRTY", 
    //             4 => "FORTY", 
    //             5 => "FIFTY", 
    //             6 => "SIXTY", 
    //             7 => "SEVENTY", 
    //             8 => "EIGHTY", 
    //             9 => "NINETY" 
    //             ); 
    // $hundreds = array( 
    //             "HUNDRED", 
    //             "THOUSAND", 
    //             "MILLION", 
    //             "BILLION", 
    //             "TRILLION", 
    //             "QUADRILLION" 
    //             ); //limit t quadrillion 
    // $num = number_format($num,2,".",","); 
    // $num_arr = explode(".",$num); 
    // $wholenum = $num_arr[0]; 
    // $decnum = $num_arr[1]; 
    // $whole_arr = array_reverse(explode(",",$wholenum));

    // krsort($whole_arr);
    // $rettxt = ""; 

    // foreach($whole_arr as $key => $i){ 
    //     if($i < 20){ 
    //         $rettxt .= $ones[$i]; 
    //     }
    //     elseif($i < 100){ 
    //         $rettxt .= $tens[substr($i,0,1)]; 
    //         $rettxt .= " ".$ones[substr($i,1,1)]; 
    //     }
    //     else{ 
    //         $rettxt .= $ones[substr($i,0,1)]." ".$hundreds[0]; 
    //         $rettxt .= " ".$tens[substr($i,1,1)]; 
    //         $rettxt .= " ".$ones[substr($i,2,1)]; 
    //     } 
    //     if($key > 0){ 
    //         $rettxt .= " ".$hundreds[$key]." "; 
    //     } 
    // } 

    // $rettxt = $rettxt." PESO/S";
    // if($decnum > 0){ 
    //     $rettxt .= " and "; 
    //     if($decnum < 20){ 
    //         $rettxt .= $decones[$decnum]; 
    //     }
    //     elseif($decnum < 100){ 
    //         $rettxt .= $tens[substr($decnum,0,1)]; 
    //         $rettxt .= " ".$ones[substr($decnum,1,1)]; 
    //     }
    //     $rettxt = $rettxt." CENTAVO/S"; 
    // } 

    // return $rettxt;


    $hyphen      = '-';
    $conjunction = '  ';
    $separator   = ' ';
    $negative    = 'negative ';
    $decimal     = ' over ';
    $dictionary  = array(
        0                   => 'Zero',
        1                   => 'One',
        2                   => 'Two',
        3                   => 'Three',
        4                   => 'Four',
        5                   => 'Five',
        6                   => 'Six',
        7                   => 'Seven',
        8                   => 'Eight',
        9                   => 'Nine',
        10                  => 'Ten',
        11                  => 'Eleven',
        12                  => 'Twelve',
        13                  => 'Thirteen',
        14                  => 'Fourteen',
        15                  => 'Fifteen',
        16                  => 'Sixteen',
        17                  => 'Seventeen',
        18                  => 'Eighteen',
        19                  => 'Nineteen',
        20                  => 'Twenty',
        30                  => 'Thirty',
        40                  => 'Forty',
        50                  => 'Fifty',
        60                  => 'Sixty',
        70                  => 'Seventy',
        80                  => 'Eighty',
        90                  => 'Ninety',
        100                 => 'Hundred',
        1000                => 'Thousand',
        1000000             => 'Million',
        1000000000          => 'Billion',
        1000000000000       => 'Trillion',
        1000000000000000    => 'Quadrillion',
        1000000000000000000 => 'Quintillion'
    );
   
    if (!is_numeric($number)) {
        return false;
    }
   
    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }
    if ($number < 0) {
        return $negative . convert_number_to_words(abs($number));
    }
    $string = $fraction = null;
    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }
    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . convert_number_to_words($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= convert_number_to_words($remainder);
            }
            break;
    }
    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }
   return $string;
}
 