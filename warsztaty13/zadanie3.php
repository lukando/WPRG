<?php

trait A {
    public function smallTalk() {
        echo 'a';
    }
    public function bigTalk() {
        echo 'A';
    }
}
trait B {
    public function smallTalk() {
        echo 'b';
    }
    public function bigTalk() {
        echo 'B';
    }
}

class test{
    use A, B {
        A::smallTalk insteadof B;
        B::bigTalk insteadof A;
    }
}

$test = new test();
$test->smallTalk();
$test->bigTalk();
?>