<?php
function sendMessage($mobile_no, $msg){
    $smssubject = urlencode($msg);
    $url=  "http://www.global91sms.in/app/smsapi/index.php?key=45BED37D77BD3A&routeid=459&type=text&contacts=".$mobile_no."&senderid=UBSJRC&msg=".$smssubject;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    $output = curl_exec($ch);
    $info = curl_getinfo($ch);
    curl_close($ch);
    return $output;
}

function AssociativeArrayToStr($array, $key_to_concat, $sep) {
    $i = 0;
    $string = "";
    foreach ($array as $key => $values) {
        foreach ($values as $k => $v) {
            if($k == $key_to_concat) {
                if($i == 0)
                    $string = $v;
                else
                    $string .= $sep .$v;
                $i++;
            }
        }
    }
    return $string;
}

function checkSubString($string, $search){
    $returnValue = false;
    if(strpos(strtolower($string), $search) !== false){
        $returnValue = true;
    }
    return $returnValue;
}

function convertTimeToIST($date_time){
    $userTimezone = new DateTimeZone('Asia/Kolkata');
    $gmtTimezone = new DateTimeZone('GMT');
    $myDateTime = new DateTime($date_time, $gmtTimezone);
    $offset = $userTimezone->getOffset($myDateTime);
    $myInterval=DateInterval::createFromDateString((string)$offset . 'seconds');
    $myDateTime->add($myInterval);
    $result = $myDateTime->format('d-m-Y H:i:s A');
    return $result;
}

function validateMobileNumber($mobile){
    $mobileregex = "/^[6-9][0-9]{9}$/" ;  
    return preg_match($mobileregex, $mobile) === 1;
}


function validateEmail($str) {
    return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
}

function sendResponse($data){
    echo json_encode($data); exit;
}


function array_remove_keys($array, $keys) {
    
    // array_diff_key() expected an associative array.
    $assocKeys = array();
    foreach($keys as $key) {
        $assocKeys[$key] = true;
    }

    return array_diff_key($array, $assocKeys);
}

function subStringReplace($search, $replace, $subject){
    return str_replace($search, $replace, $subject);
}

function upto2Decimal($number){
    return number_format((float)$number, 2, '.', '');
}

function isWeekend($date) {
    return (date('N', strtotime($date)) == 7);
}

function objectToArray ($object) {
    if(!is_object($object) && !is_array($object))
        return $object;

    return array_map('objectToArray', (array) $object);
}

function tj_array_column($assoc_array, $column) {
    $i = 0;
    $return_array = array();
    if (is_array($assoc_array)) {
        foreach ($assoc_array as $array) {
            $return_array[$i] = $array[$column];
            $i++;
        }
    }
    
    return $return_array;
}

function find_value_in_array_on_key($array, $key) {
    $result = array();
    foreach ($array as $item){
        if (isset($item[$key])){
            if($item[$key]!="")$result[]=$item[$key];
        }
    }
    return $result;
} 


function myUrlDecode($string) {
    $entities =     array('!26','!26', '!2A', '!27', '!28', '!29', '!3B', '!3A', '!40', '!3D', '!2B', '!24', '!2C', '!2F', '!3F', '!25', '!23', '!5B', '!5D', '!6A', '!6B');
    $replacements = array("&amp;",'&', '*',   "'",   "(",   ")",   ";",   ":",   "@",    "=",   "+",   "$",   ",",   "/",   "?",   "%",   "#",   "[",   "]",   ' '  , '.' );
    return str_replace($entities, $replacements, $string);
}

function myUrlEncode($string) {
    $replacements =  array('!26', '!26', '!2A', '!27', '!28', '!29', '!3B', '!3A', '!40', '!3D', '!2B', '!24', '!2C', '!2F', '!3F', '!25', '!23', '!5B', '!5D', '!6A', '!6B');
    $entities     =  array('&amp; ','&',   '*',   "'",   "(",   ")",   ";",   ":",   "@",    "=",   "+",   "$",   ",",   "/",   "?",   "%",   "#",   "[",   "]",   ' '  , '.' );
    return str_replace($entities, $replacements, $string);
}

function print_array($array){
    echo "<pre>";
    print_r($array);
    exit;
}

function print_view($array){
    echo "<pre>";
    print_r($array);
    
}

function getResultArray($Q){
    $data=array();
    if($Q->num_rows()>0){
        foreach($Q->result_array() as $row){
            $data[]=$row;
        }
    }
    return $data;
}


function image_ext($ext,$file_name){
    $ext = pathinfo($file_name, PATHINFO_EXTENSION);
    if($ext == 'pdf'){
        echo '<i class="fa fa-file-pdf iconview"></i>';
    }elseif($ext == '.xlsx'){
        echo '<i class="fa fa-file-excel iconview" ></i>';
    }elseif($ext == 'docx'){
        echo '<i class="fa fa-file-text iconview"></i>';
    }elseif($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png'){
        echo '<i class="fa fa-file-image iconview"></i>';
    }
    return $ext;
}
   
function array_sum_return($array, $key) {
    $sumArray=array();
    foreach ($array as $item){
        if (isset($item[$key])) {
            $sumArray[]= $item[$key];
        }
    }
    return array_sum($sumArray);
}

function flatten(array $array) {
    $return = array();
    array_walk_recursive($array, function($a) use (&$return) { $return[] = $a; });
    return $return;
}

function SimpleArray($search_array){
    $data=array();
    foreach($search_array as $row){
        foreach($row as $k => $v)
        $data[]=$v;
    }
    return $data;
}

function getResultArraySimpleArray($Q){
    $data=array();
    if($Q->num_rows()>0){
        foreach($Q->result_array() as $row){
            foreach($row as $k => $v) $data[]=$v;
        }
    }
    return $data;
}


function getCurrentDate() {
    $now = date("Y-m-d h:i:s");
    return $now;
}

function getMonthsDD() {
    $month_array=array(
        '0'=>"Month",
        '1'=>"January",
        '2'=>"February",
        '3'=>"March",
        '4'=>"April",
        '5'=>"May",
        '6'=>"June",
        '7'=>"July",
        '8'=>"August",
        '9'=>"September",
        '10'=>"October",
        '11'=>"November",
        '12'=>"December");
    return $month_array;
}

function getMonthsSmall(){
    $month_array=array(
        '6'=>"Jun",
        '7'=>"Jul",
        '8'=>"Aug",
        '9'=>"Sep",
        '10'=>"Oct",
        '11'=>"Nov",
        '12'=>"Dec",
        '1'=>"Jan",
        '2'=>"Feb",
        '3'=>"Mar",
        '4'=>"Apr",
        '5'=>"May");
    return $month_array;
}


/*

|--------------------------------------------------------------------------

| Following Functions Created By Paperplane @rv!nd

|--------------------------------------------------------------------------

*/


function findKey($array, $keySearch) {
    foreach ($array as $key => $item) {
        if ($key == $keySearch) {
            return 1;
        } else {
            if (isset($array[$key]))
                findKey($array[$key], $keySearch);
        }
    }
    return 0;
}

function filter_unique_array($arrs, $id) {
    foreach($arrs as $k => $v) 
    {
        foreach($arrs as $key => $value) 
        {
            if($k != $key && $v[$id] == $value[$id])
            {
                 unset($arrs[$k]);
            }
        }
    }
    return $arrs;
}


/*END OF @rv!nd*/

function copyImage($imageSrc, $imageDest) {
    $src = urldecode($imageSrc);
    $len1 = strlen($src);
    $len2 = strlen(base_url());
    $fpath = substr($src, $len2 - 1, $len1);
    $pathParts = explode('/', $src);
    $oldFileName = $pathParts[count($pathParts) - 1];
    $ext = explode('.',$oldFileName);
    $newFileName = generateRandomCode().'.'.$ext[1];
    $srcCopy = $_SERVER['DOCUMENT_ROOT'].$fpath;
    $destCopy = $_SERVER['DOCUMENT_ROOT'].$imageDest.$newFileName;
    
    $copy = copy($srcCopy, $destCopy);
    unlink($srcCopy);
    if($copy == false) {
        return false;
    }
    return $newFileName;
}

function generateNumber(){
    return str_pad(mt_rand(1,99999999),5,'0',STR_PAD_LEFT);
}

function generateRandomCode($strLength=16) {
    $d=date ("d");
    $m=date ("m");
    $y=date ("Y");
    $t=time();
    $dmt=$d+$m+$y+$t;
    $ran= rand(0,10000000);
    $dmtran= $dmt+$ran;
    $un=  uniqid();
    $dmtun = $dmt.$un;
    $mdun = md5($dmtran.$un);
    $sort=substr($mdun, $strLength); // if you want sort length code.
    return $mdun;
}

/**
 *
 * Function to make URLs into links
 *
 * @param string The url string
 *
 * @return string
 *
 **/
function makeLink($string, $label){

    /*** make sure there is an http:// on all URLs ***/
    $string = preg_replace("/([^\w\/])(www\.[a-z0-9\-]+\.[a-z0-9\-]+)/i", "$1http://$2",$string);
    /*** make all URLs links ***/
    $string = preg_replace("/([\w]+:\/\/[\w-?&;#~=\.\/\@]+[\w\/])/i","<a target=\"_blank\" href=\"$1\">.$label.</a>",$string);
    /*** make all emails hot links ***/
    $string = preg_replace("/([\w-?&;#~=\.\/]+\@(\[?)[a-zA-Z0-9\-\.]+\.([a-zA-Z]{2,3}|[0-9]{1,3})(\]?))/i","<a href=\"mailto:$1\">$1</a>",$string);

    return $string;
}

function highlightkeyword($str, $search) {
    $highlightcolor = "#daa732";
    $occurrences = substr_count(strtolower($str), strtolower($search));
    $newstring = $str;
    $match = array();
 
    for ($i=0;$i<$occurrences;$i++) {
        $match[$i] = stripos($str, $search, $i);
        $match[$i] = substr($str, $match[$i], strlen($search));
        $newstring = str_replace($match[$i], '[#]'.$match[$i].'[@]', strip_tags($newstring));
    }
 
    $newstring = str_replace('[#]', '<span style="color: '.$highlightcolor.';">', $newstring);
    $newstring = str_replace('[@]', '</span>', $newstring);
    return $newstring;
 
}

function whatever($array, $key, $val) {
    foreach ($array as $item)
        if (isset($item[$key]) && $item[$key] == $val)
            return true;
    return false;
}

function whatever_return($array, $key, $val) {
    foreach ($array as $item)
        if (isset($item[$key]) && $item[$key] == $val)
            return $item;
    return false;
}



function find_key_in_array($array, $key){
    $result = array();
    foreach ($array as $item){
        if (isset($item[$key])){
            $result[]=$item;
        }
    }
    return $result;
}


function custom_sort($array, $order){ //length of order and array to be same
    usort($array, function ($a, $b) use ($order) {
        $pos_a = array_search($a, $order);
        $pos_b = array_search($b, $order);
        return $pos_a - $pos_b;
    });
    return $array;
}

function sortArrayByArray($array,$orderArray) {
    $ordered = array();
    foreach($orderArray as $key => $value) {
        if(array_key_exists($key,$array)) {
                $ordered[$key] = $array[$key];
                unset($array[$key]);
        }
    }
    return $ordered+$array;
}



function calc_percentage($numerator="",$denomenator="",$precision='0'){
    if($denomenator>0){
        $res = sprintf("%1.2f",(round( ($numerator / $denomenator) * 100, $precision )));
        return $res;
    }else{
        return 0;
    }
}

function percentageOf( $number, $everything, $decimals = 2 ){
    return @round( $number / $everything * 100, $decimals );
}


function romanic_number($integer, $upcase = true) 
{ 
    $table = array('M'=>1000, 'CM'=>900, 'D'=>500, 'CD'=>400, 'C'=>100, 'XC'=>90, 'L'=>50, 'XL'=>40, 'X'=>10, 'IX'=>9, 'V'=>5, 'IV'=>4, 'I'=>1); 
    $return = ''; 
    while($integer > 0) 
    { 
        foreach($table as $rom=>$arb) 
        { 
            if($integer >= $arb) 
            { 
                $integer -= $arb; 
                $return .= $rom; 
                break; 
            } 
        } 
    } 

    return $return; 
} 

function find_division_id($div_name=""){
    $division_id = "";
     switch ($div_name) {
        case 'A':
            $division_id = '1';
        break;
         case 'B':
            $division_id = '2';
        break;
        case 'C':
            $division_id = '3';
        break;
        case 'D':
            $division_id = '4';
        break;
        case 'E':
            $division_id = '5';
        break;
        case 'F':
            $division_id = '6';
        break;
        case 'G':
            $division_id = '7';
        break;
        case 'H':
            $division_id = '8';
        break;
        case 'P':
            $division_id = '9';
        break;
    }
    return $division_id;
}

function array_sort($array, $on, $order=SORT_ASC)
{
    $new_array = array();
    $sortable_array = array();

    if (count($array) > 0) {
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                foreach ($v as $k2 => $v2) {
                    if ($k2 == $on) {
                        $sortable_array[$k] = $v2;
                    }
                }
            } else {
                $sortable_array[$k] = $v;
            }
        }

        switch ($order) {
            case SORT_ASC:
                asort($sortable_array);
            break;
            case SORT_DESC:
                arsort($sortable_array);
            break;
        }

        foreach ($sortable_array as $k => $v) {
            $new_array[$k] = $array[$k];
        }
    }

    return $new_array;
}


function make_comparer() {
    // Normalize criteria up front so that the comparer finds everything tidy
    $criteria = func_get_args();
    foreach ($criteria as $index => $criterion) {
        $criteria[$index] = is_array($criterion)
            ? array_pad($criterion, 3, null)
            : array($criterion, SORT_ASC, null);
    }

    return function($first, $second) use (&$criteria) {
        foreach ($criteria as $criterion) {
            // How will we compare this round?
            list($column, $sortOrder, $projection) = $criterion;
            $sortOrder = $sortOrder === SORT_DESC ? -1 : 1;

            // If a projection was defined project the values now
            if ($projection) {
                $lhs = call_user_func($projection, $first[$column]);
                $rhs = call_user_func($projection, $second[$column]);
            }
            else {
                $lhs = $first[$column];
                $rhs = $second[$column];
            }

            // Do the actual comparison; do not return if equal
            if ($lhs < $rhs) {
                return -1 * $sortOrder;
            }
            else if ($lhs > $rhs) {
                return 1 * $sortOrder;
            }
        }

        return 0; // tiebreakers exhausted, so $first == $second
    };
}

function date_of_birth_in_words($birth_date){
    
    $birth_date = ($birth_date=="") ? date('d-m-Y') : $birth_date;
    $new_birth_date = explode('-', $birth_date);
    $day = $new_birth_date[0];
    $month = $new_birth_date[1];
    $year  = $new_birth_date[2];
    $birth_day=dateToThwords($day);
    $birth_year=dobTowords($year);
    $monthNum = $month;
    $dateObj = DateTime::createFromFormat('!m', $monthNum);//Convert the number into month name
    $monthName = strtoupper($dateObj->format('F'));

    $newDate = date("d M Y", strtotime($birth_date));
    $date_suffix = strtoupper(date('dS', strtotime($newDate)));

    $dob_chritian_era = $birth_day ." ". $monthName ." ". $birth_year;
    return ucwords(strtolower($dob_chritian_era));
}

function dateToThwords($num)
{ 
    $num = (int)$num;

    $ones = array(
        '1' => "FIRST", 
        '2' => "SECOND", 
        '3' => "THIRD", 
        '4' => "FOURTH", 
        '5' => "FIFTH", 
        '6' => "SIXTH", 
        '7' => "SEVENTH", 
        '8' => "EIGHTH", 
        '9' => "NINTH",
        '01' => "FIRST", 
        '02' => "SECOND", 
        '03' => "THIRD", 
        '04' => "FOURTH", 
        '05' => "FIFTH", 
        '06' => "SIXTH", 
        '07' => "SEVENTH", 
        '08' => "EIGHTH", 
        '09' => "NINTH",
        '10' => "TENTH", 
        '11' => "ELEVENTH", 
        '12' => "TWELVETH", 
        '13' => "THIRTEENTH", 
        '14' => "FOURTEENTH", 
        '15' => "FIFTEENTH", 
        '16' => "SIXTEENTH", 
        '17' => "SEVENTEENTH", 
        '18' => "EIGHTEENTH", 
        '19' => "NINETEENTH",
        '20' => "TWENTIETH",
        '21' => "TWENTY FIRST",
        '22' => "TWENTY SECOND",
        '23' => "TWENTY THIRD",
        '24' => "TWENTY FOURTH",
        '25' => "TWENTY FIFTH",
        '26' => "TWENTY SIXTH",
        '27' => "TWENTY SEVENTH",
        '28' => "TWENTY EIGHTH",
        '29' => "TWENTY NINTH",
        '30' => "THIRTIETH",
        '31' => "THIRTY FIRST",
    ); 
    return $ones[$num];
}


function dobTowords($num)
{ 

    $ones = array(
        0 =>"ZERO", 
        1 => "ONE", 
        2 => "TWO", 
        3 => "THREE", 
        4 => "FOUR", 
        5 => "FIVE", 
        6 => "SIX", 
        7 => "SEVEN", 
        8 => "EIGHT", 
        9 => "NINE",
        10 => "TEN", 
        11 => "ELEVEN", 
        12 => "TWELVE", 
        13 => "THIRTEEN", 
        14 => "FOURTEEN", 
        15 => "FIFTEEN", 
        16 => "SIXTEEN", 
        17 => "SEVENTEEN", 
        18 => "EIGHTEEN", 
        19 => "NINETEEN",
        "014" => "FOURTEEN" 
    ); 
    $tens = array( 
        0 => "ZERO",
        1 => "TEN",
        2 => "TWENTY", 
        3 => "THIRTY", 
        4 => "FORTY", 
        5 => "FIFTY", 
        6 => "SIXTY", 
        7 => "SEVENTY", 
        8 => "EIGHTY", 
        9 => "NINETY" 
    ); 
    $hundreds = array( 
        "HUNDRED", 
        "THOUSAND",
        "MILLION", 
        "BILLION", 
        "TRILLION",
        "QUARDRILLION" 
    ); /* limit t quadrillion */

    $num = number_format($num,2,".",",");
    $num_arr = explode(".",$num); 
    $wholenum = $num_arr[0]; 
    $decnum = $num_arr[1]; 
    $whole_arr = array_reverse(explode(",",$wholenum)); 
    krsort($whole_arr,1); 
    $rettxt = ""; 

    foreach($whole_arr as $key => $i){
        while(substr($i,0,1)=="0")
                $i=substr($i,1,5);
        if($i < 20){ 
            /* echo "getting:".$i; */
            $rettxt .= $ones[$i]; 
        }elseif($i < 100){ 
            if(substr($i,0,1)!="0")  $rettxt .= $tens[substr($i,0,1)]; 
            if(substr($i,1,1)!="0") $rettxt .= " ".$ones[substr($i,1,1)]; 
        }else{ 
            if(substr($i,0,1)!="0") $rettxt .= $ones[substr($i,0,1)]." ".$hundreds[0]; 
            if(substr($i,1,1)!="0")$rettxt .= " ".$tens[substr($i,1,1)]; 
            if(substr($i,2,1)!="0")$rettxt .= " ".$ones[substr($i,2,1)]; 
        } 

        if($key > 0){ 
            $rettxt .= " ".$hundreds[$key]." "; 
        } 
    } 

    if($decnum > 0){ 
        $rettxt .= " and "; 
        if($decnum < 20){ 
            $rettxt .= $ones[$decnum]; 
        }elseif($decnum < 100){ 
            $rettxt .= $tens[substr($decnum,0,1)]; 
            $rettxt .= " ".$ones[substr($decnum,1,1)]; 
        } 
    } 
    return $rettxt; 
}?>