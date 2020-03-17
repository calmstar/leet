<?php
function buildHeap ($arr)
{
$cou = count($arr);
if ($cou < 2) return $arr;

// 数组中的最后一个位置就是堆的最后一个节点
$lastNode = $cou-1;
// 最后一个节点的父节点就是 最后的父节点
$lastNodeParent = intval(($lastNode-1)/2);
// 从最后一个父节点开始向前构建堆
for ($i = $lastNodeParent; $i >= 0; $i--) {
heapify($arr, $cou-1, $i);
}
return $arr;
}

// 每进行一次heapify,就是处理其中一棵二叉树进行堆化
function heapify (&$arr, $lastIndex, $index)
{
// 防止索引$index 越界
if ($lastIndex < $index) return ;

$leftChild = 2 * $index + 1;
$rightChild = 2 * $index + 2;
$maxIndex = $index;

// 如果左子节点的数值比父节点的数值大，则修改$maxIndex
if ($lastIndex >= $leftChild && $arr[$maxIndex] < $arr[$leftChild]) {
$maxIndex = $leftChild;
}
// 如果右子节点的数值比父节点的数值大，则修改$maxIndex
if ($lastIndex >= $rightChild && $arr[$maxIndex] < $arr[$rightChild]) {
$maxIndex = $rightChild;
}

// 把最大的节点树值放到父节点。
if ($maxIndex != $index) {
swap($arr, $index, $maxIndex);
// 上层二叉树进行了交换，可能会导致更小的数被排下来，所以需要对$maxIndex位置进行再次堆化
heapify($arr, $lastIndex, $maxIndex);
}
}

function swap (&$arr, $index, $maxIndex)
{
$temp = $arr[$index];
$arr[$index] = $arr[$maxIndex];
$arr[$maxIndex] = $temp;
}

function  heapSort ($arr)
{
    $cou = count($arr);
    if ($cou < 2) return $arr;

    // 得到已经堆化好的数组
    $arr = buildHeap($arr);
    $sortArr = [];
    for ($i = $cou-1; $i >= 0; $i--) {
        // 把堆中顶部元素拿出（最大的数）
        $sortArr[] = $arr[0];
        // 把最后一个节点的元素和头部元素值交换
        swap ($arr, 0, $i);
        unset($arr[$i]);
        // 对 头部元素的二叉树进行堆化
        heapify($arr, count($arr)-1, 0);
    }
    return $sortArr;
}


$arr = [4, 10, 3, 5, 1, 9];
//$res = buildHeap($arr);
//var_dump($res);


var_dump(heapSort($arr));