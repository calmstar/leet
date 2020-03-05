<?php
/**
 * Created by PhpStorm.
 * User: xxx
 * Date: 2020/3/5
 * Time: 18:44
 */


/**
 * 计数排序：适用于数据量大，但取值范围小的数组
 * @param $my_array
 * @param $min
 * @param $max
 * @return mixed
 */
function counting_sort($my_array, $min, $max)
{
    $count = array();
    for ($i = $min; $i <= $max; $i++) {
        $count[$i] = 0;
    }
    foreach ($my_array as $number) {
        $count[$number]++;
    }
    $z = 0;
    for ($i = $min; $i <= $max; $i++) {
        while ($count[$i]-- > 0) {
            $my_array[$z++] = $i;
        }
    }
    return $my_array;
}

$test_array = array(3, 0, 2, 5, -1, 4, 1);
echo "原始数组 :\n";
echo implode(', ', $test_array);
echo "\n排序后数组:\n";
echo implode(', ', counting_sort($test_array, -1, 5)) . PHP_EOL;