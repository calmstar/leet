<?php
/**
 *
 * @param $arr
 */
function  bubbleSort ($arr)
{
    $cou = count($arr);
    if ($cou < 2) return $arr;

    for ($i = 0; $i < $cou-1; $i++) {
        $flag = false; // 是否发生过交换，默认没有发生交换
        for ($j = 1; $j < $cou-$i; $j++) {
            if ($arr[$j-1] > $arr[$j]) {
                $temp = $arr[$j];
                $arr[$j] = $arr[$j-1];
                $arr[$j-1] = $temp;
                $flag = true; // 标识改为已发生交换
            }
        }
        if (!$flag) break; // 没有发生交换
    }
    return $arr;
}

$arr = [1, 9, 5, 6, 2, 8, 23];
var_dump(bubbleSort($arr));