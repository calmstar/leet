<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 07/03/2017
 * Time: 21:35
 */

class node{
    private $value;
    private $pre;
    public function __construct($value){
        $this->value = $value;
        $this->pre = null;
    }
    public function addPre($node){
        $this->pre = $node;
    }
    public function getPre(){
        return $this->pre;
    }
    public function getValue(){
        return $this->value;
    }
}

class stack{
    private $top;
    static public $size;
    public function __construct($value){
        $this->top = new node($value);
    }

    public function push($value){
        $current = $this->top;
        $newNode = new node($value);
        $newNode->addPre($current);
        $this->top = $newNode;
    }

    public function getAllStack(){
        $stack = null;
        $current = $this->top;
        while ($current->getPre() != null){
            $stack .= $current->getValue()."\n";
            $current = $current->getPre();
        }
        return $stack;
    }

    public function getSize(){
        $current = $this->top;
        while (null != $current->getValue()){
            self::$size++;
            $current = $current->getPre();
        }
        return self::$size;
    }

    public function pop(){
        $current = $this->top;
        $this->top = $current->getPre();
        unset($current);
    }

    public function getTop(){
        return $this->top->getValue();
    }
}

$stack = new stack(0);
$stack->push(1);
$stack->push(2);
$stack->push(3);
$stack->push(4);
$stack->push(5);
$stack->push(6);
$stack->push('a');
$stack->push('b');
$stack->push('c');
$stack->push('d');
echo "无出栈顺序:".$stack->getAllStack()."<br>";
$stack->pop();
$stack->pop();
$stack->pop();
echo "三次出栈后:".$stack->getAllStack()."<br>";
echo "此时的栈顶元素:".$stack->getTop()."<br>";
echo "栈的长度为:".$stack->getSize()."<br>";

/**
 * https://www.cnblogs.com/clubs/p/11949578.html
 *
 * https://www.jianshu.com/p/8a83ec29c3e4
 */
