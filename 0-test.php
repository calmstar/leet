<?php
$graph = [
    'A' => ['B', 'C'],
    'B' => ['A', 'C', 'D'],
    'C' => ['A', 'B', 'D', 'E'],
    'D' => ['B', 'C', 'E', 'F'],
    'E' => ['C', 'D'],
    'F' => ['D'],
];

function BFSFindParent ($graph, $start)
{
    // 起始节点没有父节点
    $parentNodeArr = [$start => ''];
    $queue = [];
    $dealed = [];
    array_push($queue, $start);
    while (!empty($queue)) {
        $node = array_shift($queue);
        $dealed[] = $node;
        $neighborArr = $graph[$node];
        foreach ($neighborArr as $v) {
            if (!in_array($v, $queue) && !in_array($v, $dealed)) {
                array_push($queue, $v);
                $parentNodeArr[$v] = $node;
            }
        }
    }
    return $parentNodeArr;
}

$parentNodeArr = BFSFindParent($graph,'A');
$end = 'F';
$way = $end;
while (!empty($parentNodeArr[$end])) {
    $way = $parentNodeArr[$end] .  '->' .  $way;
    $end = $parentNodeArr[$end];
}
echo $way;