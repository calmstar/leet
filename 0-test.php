<?php
/**
 * Created by PhpStorm.
 * User: xxx
 * Date: 2020/3/16
 * Time: 16:56
 */

function  countSortV3 ($arr) {
    $cou = count($arr);
    if ($cou < 2) return $arr;
    // 仍然要得到计数数组
    $countArr = [];
    foreach ($arr as $v) {
        if (!isset($countArr [$v])) {
            $countArr[$v] = 1;
        } else {
            $countArr[$v]++;
        }
    }

    // 对计数数组进行累加.先确保键是排好序的. 由于键可能不连续，使用foreach
    // 把计数数组前面的值和现在的值加起来，赋给现在的值
    ksort($countArr);
    $temp = 0;
    foreach ($countArr as $k => $v) {
        $countArr[$k] = $countArr[$k] + $temp;
        $temp = $countArr[$k];
    }

    $res = [];
    // 由于要稳定排序，所以要倒着来循环放入数字
    for ($j = $cou-1; $j >= 0; $j--) {
        $index = --$countArr[$arr[$j]];
        $res[$index] = $arr[$j];
    }
    ksort($res);
    return $res;
}

$arr = [1, 9, 5, 6, 2, 8, 23];
$arr = [3, 3,6,5,3,6,5];
var_dump(countSortV3($arr));