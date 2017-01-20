<?php

// 
trait testTrait {
	public function test() {
		return 'test';
	}
	
}

trait testTrait2 {
	public function test2() {
		return 'test2';
	}

}

class Test {
	
	use TestTrait, testTrait2;
}

$test = new Test();

echo $test->test();
echo "<hr>";
echo $test->test2();
