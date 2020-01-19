<?php
/**
 *
 * @param $arr
 */
function  bubbleSort ($arr)
{
    $cou = count($arr);
    if ($cou < 2) return $arr;

    // 如果是六个数字，则执行五组比较就可以了
    for ($i = 0; $i < $cou-1; $i++) {
        // 是否发生过交换，默认没有发生交换
        $flag = false;
        for ($j = 1; $j < $cou-$i; $j++) {
            // 上面的$j从1开始，所以这使用 $j-1 索引
            if ($arr[$j-1] > $arr[$j]) { // 前面一个数字比后面一个大，则进行交换
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