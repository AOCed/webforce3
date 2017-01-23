<?php

class A {
	
	public static function qui() {
		echo 'LA';
		echo __CLASS__;
	}
	public static function test(){
		static::qui();
	}
}

class B extends A {
	public static function qui() {
		echo "Ici";
		echo __CLASS__;
	}
}

B::test();