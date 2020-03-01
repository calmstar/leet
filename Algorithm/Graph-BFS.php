<?php
/**
 * Created by PhpStorm.
 * User: xxx
 * Date: 2020/3/1
 * Time: 17:29
 */

/**
 * 参考资料：https://www.bilibili.com/video/av25763384/?spm_id_from=trigger_reload
 *
 * 广度优先搜索
 *  Breadth First Search
 *      需要借助 队列 这种数据结构
 *
 * 注：广度优先搜索，对树来说，就是层次遍历
 */

$graph = [
    'A' => ['B', 'C'],
    'B' => ['A', 'C', 'D'],
    'C' => ['A', 'B', 'D', 'E'],
    'D' => ['B', 'C', 'E', 'F'],
    'E' => ['C', 'D'],
    'F' => ['D'],
];

/**
 * 广度度遍历图，并打印出节点值
 * @param $graph
 * @param $start
 */
function BFS ($graph, $start)
{
    $queue = [$start]; // 待处理元素集合
    $dealed = [$start]; // 已经处理过的元素集合
    while (count($queue) > 0) {
        $point = array_pop($queue); // 取出要处理的元素
        $neighborPoint = $graph[$point]; // 得到相邻节点
        foreach ($neighborPoint as $v) {
            if (!in_array($v, $dealed)) { // 如果该邻居节点没有处理过，则放入待处理的元素集合中，和 放入已处理过的元素集合中
                array_unshift($queue, $v); // 队列先进先出。array_unshift，从队尾放进东西；array_pop，从对头拿出东西
                array_push($dealed, $v);
            }
        }
        echo $point . "\n";
    }
}

BFS($graph, 'A');
/**
 * A
B
C
D
E
F
 */