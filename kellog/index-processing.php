<?php
$input = $_POST;
$data = create_dataset();
$result = array();
foreach ($data as $key=>$value) {
    $score_denominator = 0;
    $score = 0;
    if(is_numeric($input['nightlife'])) {
        $score = $score + pow(($value['nightlife'] - $input['nightlife']),2);
        $score_denominator = $score_denominator + 1;
    }
    if(is_numeric($input['housing'])) {
        $score = $score + pow(($value['housing'] - $input['housing']),2);
        $score_denominator = $score_denominator + 1;
    }
    if(is_numeric($input['culture'])) {
        $score = $score + pow(($value['culture'] - $input['culture']),2);
        $score_denominator = $score_denominator + 1;
    }
    if(is_numeric($input['exertion'])) {
        $score = $score + pow(($value['exertion'] - $input['exertion']),2);
        $score_denominator = $score_denominator + 1;
    }
    if(is_numeric($input['free_time'])) {
        $score = $score + pow(($value['free_time'] - $input['free_time']),2);
        $score_denominator = $score_denominator + 1;
    }
    $result[] = $score / $score_denominator;
}
asort($result);
$ranking = array_keys($result);
//print_r($ranking);
for($i=0; $i<5; $i++) {
    $a = $data[$ranking[$i]];
    print_r($a);
    echo '<br>';
}
function create_dataset() {
    $data = array();
    //$data[] = array('place'=>, 'base_price'=>, 'nightlife'=>, 'housing'=>, 'culture'=>, 'exertion'=>, 'free_time'=>);
    $data[] = array('place'=>'Amazing Race', 'base_price'=>3000, 'nightlife'=>4, 'housing'=>3, 'culture'=>4, 'exertion'=>5, 'free_time'=>2);
    $data[] = array('place'=>'Germany - Bike', 'base_price'=>2700, 'nightlife'=>3, 'housing'=>3, 'culture'=>3, 'exertion'=>5, 'free_time'=>2);
    $data[] = array('place'=>'Guatemala', 'base_price'=>2775, 'nightlife'=>4, 'housing'=>3, 'culture'=>2, 'exertion'=>4, 'free_time'=>2);
    $data[] = array('place'=>'Costa Rica', 'base_price'=>2400, 'nightlife'=>3, 'housing'=>3.5, 'culture'=>2, 'exertion'=>4, 'free_time'=>3);
    $data[] = array('place'=>'USA Hawaii', 'base_price'=>2875, 'nightlife'=>4, 'housing'=>4, 'culture'=>2, 'exertion'=>4, 'free_time'=>2);
    $data[] = array('place'=>'Croatia', 'base_price'=>2925, 'nightlife'=>5, 'housing'=>3, 'culture'=>2, 'exertion'=>4, 'free_time'=>2);
    $data[] = array('place'=>'Belize', 'base_price'=>2659, 'nightlife'=>4, 'housing'=>4, 'culture'=>2, 'exertion'=>4, 'free_time'=>3);
    $data[] = array('place'=>'Iceland', 'base_price'=>3200, 'nightlife'=>4, 'housing'=>4, 'culture'=>3, 'exertion'=>4, 'free_time'=>2);
    $data[] = array('place'=>'Peru', 'base_price'=>3200, 'nightlife'=>3, 'housing'=>3, 'culture'=>5, 'exertion'=>4, 'free_time'=>2);
    $data[] = array('place'=>'Dominican Republic', 'base_price'=>2400, 'nightlife'=>4, 'housing'=>5, 'culture'=>2, 'exertion'=>4, 'free_time'=>2);
    $data[] = array('place'=>'Italy', 'base_price'=>2800, 'nightlife'=>4, 'housing'=>3.5, 'culture'=>4, 'exertion'=>4, 'free_time'=>3);
    $data[] = array('place'=>'Nicaragua', 'base_price'=>2315, 'nightlife'=>4, 'housing'=>5, 'culture'=>2, 'exertion'=>4, 'free_time'=>3);
    $data[] = array('place'=>'Argentina', 'base_price'=>3000, 'nightlife'=>4, 'housing'=>4, 'culture'=>3, 'exertion'=>3, 'free_time'=>1);
    $data[] = array('place'=>'Baltics', 'base_price'=>2700, 'nightlife'=>3.5, 'housing'=>3, 'culture'=>2, 'exertion'=>3, 'free_time'=>2);
    $data[] = array('place'=>'Slovenia', 'base_price'=>2800, 'nightlife'=>2, 'housing'=>3, 'culture'=>2, 'exertion'=>3, 'free_time'=>2);
    $data[] = array('place'=>'Canary Islands', 'base_price'=>2800, 'nightlife'=>4, 'housing'=>3, 'culture'=>2, 'exertion'=>3, 'free_time'=>3);
    $data[] = array('place'=>'Chile', 'base_price'=>2999, 'nightlife'=>3, 'housing'=>4, 'culture'=>2, 'exertion'=>3, 'free_time'=>3);
    $data[] = array('place'=>'South Africa', 'base_price'=>3100, 'nightlife'=>3, 'housing'=>4, 'culture'=>4, 'exertion'=>3, 'free_time'=>2);
    $data[] = array('place'=>'Austria/Czech', 'base_price'=>3000, 'nightlife'=>5, 'housing'=>3, 'culture'=>3.5, 'exertion'=>2.5, 'free_time'=>2);
    $data[] = array('place'=>'Ireland/Scotland', 'base_price'=>2600, 'nightlife'=>4.5, 'housing'=>3, 'culture'=>3, 'exertion'=>2, 'free_time'=>1.5);
    $data[] = array('place'=>'Brazil', 'base_price'=>2900, 'nightlife'=>4, 'housing'=>4, 'culture'=>3, 'exertion'=>2, 'free_time'=>1);
    $data[] = array('place'=>'Hungary - Budapest', 'base_price'=>2972, 'nightlife'=>5, 'housing'=>3.5, 'culture'=>2, 'exertion'=>2, 'free_time'=>1);
    $data[] = array('place'=>'Portugal', 'base_price'=>2800, 'nightlife'=>4, 'housing'=>4, 'culture'=>3, 'exertion'=>2, 'free_time'=>2);
    $data[] = array('place'=>'Romania', 'base_price'=>2650, 'nightlife'=>4, 'housing'=>4, 'culture'=>3, 'exertion'=>2, 'free_time'=>2);
    $data[] = array('place'=>'Morocco', 'base_price'=>2800, 'nightlife'=>1, 'housing'=>4, 'culture'=>5, 'exertion'=>2, 'free_time'=>2);
    $data[] = array('place'=>'Turkey', 'base_price'=>2800, 'nightlife'=>5, 'housing'=>4, 'culture'=>2, 'exertion'=>2, 'free_time'=>1);
    $data[] = array('place'=>'Family - USA Wisconsin', 'base_price'=>1900, 'nightlife'=>1, 'housing'=>5, 'culture'=>1, 'exertion'=>2, 'free_time'=>5);
    $data[] = array('place'=>'Spain - Northern', 'base_price'=>2800, 'nightlife'=>5, 'housing'=>4, 'culture'=>3, 'exertion'=>2, 'free_time'=>2);
    $data[] = array('place'=>'Thailand', 'base_price'=>3070, 'nightlife'=>4.5, 'housing'=>4, 'culture'=>4, 'exertion'=>2, 'free_time'=>2);
    $data[] = array('place'=>'Greece', 'base_price'=>3150, 'nightlife'=>5, 'housing'=>4, 'culture'=>3, 'exertion'=>2, 'free_time'=>4);
    $data[] = array('place'=>'France', 'base_price'=>3000, 'nightlife'=>3, 'housing'=>3, 'culture'=>4, 'exertion'=>2, 'free_time'=>3);
    $data[] = array('place'=>'Panama', 'base_price'=>2600, 'nightlife'=>5, 'housing'=>4, 'culture'=>2, 'exertion'=>3, 'free_time'=>2);
    $data[] = array('place'=>'Spain - Central', 'base_price'=>2900, 'nightlife'=>4.5, 'housing'=>5, 'culture'=>2, 'exertion'=>1.5, 'free_time'=>4);
    $data[] = array('place'=>'Aruba/Curacao', 'base_price'=>2970, 'nightlife'=>4, 'housing'=>4.5, 'culture'=>2, 'exertion'=>1, 'free_time'=>3);
    return $data;
}
