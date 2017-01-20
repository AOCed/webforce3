<?php
namespace Foo;

use Bar\A as BarA;
use Bar\C;

class B extends BarA {
	public function displayVar(){
		echo $this->var;
	}
	public function now(){
		$now = new \Datetime();
		echo $now->format('d-m-Y');
	}
	public function bonjour(){
		C::hello();
	}
	
	public static function bonjourD(){
		//Le namespace de D est Foo\Baz
		// Comme on est dans le namespace Foo, sans use, on y accéde comme ca:
		Baz\D::hello();
	}
}

