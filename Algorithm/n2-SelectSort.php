<?php

/**
 * 选择排序
 * 每次选择最大的数 -- 交换放在右边
 * @param $arr
 * @return mixed
 */
function selectSort ($arr)
{
    $cou = count($arr);
    if ($cou < 2) return $arr;

    // 如果是六个数字，选择五次最大的数放在右边，即可。执行五组比较即可
    for ($i = 0; $i < $cou-1; $i++) {
        // 假设最大的数的索引是0
        $max = $arr[0];
        $maxIndex = 0;
        for ($j = 1; $j < $cou-$i; $j++) {
            if ($max < $arr[$j]) {
                // 选出最大的数字
                $maxIndex = $j;
                $max = $arr[$j];
            }
        }

        // 最大值的索引是否为最右边的数字
        if ($maxIndex != $cou-1-$i) {
            // 执行交换
            $temp = $arr[$maxIndex];
            $arr[$maxIndex] = $arr[$cou-1-$i];
            $arr[$cou-1-$i] = $temp;
        }
    }
    return $arr;
}

$arr = [1, 9, 5, 6, 2, 8, 23];
var_dump(selectSort($arr));