<?php
    $sol = [];
    $nums = null;

    function combinationSum($candidates, $target) {
        sort($candidates);
        $GLOBALS['nums'] = $candidates;
        $temp = [];
        search($target, $temp, 0);
        return $GLOBALS['sol'];
    }
    
    function search($target, $list, $start){
        if ($target == 0) {
    			array_push($GLOBALS['sol'], $list);
    			return;
    		}
        for ($i = $start; $i < count($GLOBALS['nums']); $i++){
            if ($GLOBALS['nums'][$i] > $target) break;
            else {
                array_push($list, $GLOBALS['nums'][$i]);
                search($target - $GLOBALS['nums'][$i], $list, $i);
                array_pop($list);
            }
        }
    }
	
    $source = [
      '1s' => 1,
      '5s' => 5,
      '10s' => 10,
      '25s' => 25,
      '50s' => 50,
      'G1' => 100,
      'G2' => 200,
    ];
    $sum = 350;
    $ans = combinationSum(array_values($source), $sum);
    
    if (count($ans)==0) {
        echo("Empty");
    }
     
    $arr1 = [];
    $arr2 = [];
    for ($i = 0; $i < count($ans); $i++) {
      $arr2 = [];
      for ($j = 0; $j < count($ans[$i]); $j++) {
        $arr2[] = $ans[$i][$j];
      }
      $arr1[] = $arr2;
    } 
    
    foreach ($arr1 as $key => $value) {
      foreach(array_count_values($value) as $k => $v){
        $jml[$key][$k] = $v;
      }
    }
    
    foreach($jml as $key => $value) {
      foreach($value as $k => $v) {
        $result[$key][$k] = $v . "x" . array_search($k, $source);
      }
    }
  
    $new_result = [];
    foreach($result as $value)
    {
      $new_result[] =  implode(' + ', $value);
    }
    
    var_dump($new_result);
?>