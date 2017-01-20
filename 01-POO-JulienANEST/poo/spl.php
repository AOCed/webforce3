<?php 

echo "<pre>";

// $a = new stdClass();
// $a->var = "bla";
print_r(get_declared_classes());
echo "<hr>";
print_r(get_declared_interfaces());

echo "<hr>";
$a = new DOMDocument();
print_r($a->createElement('p'));

// var_dump($a);

$s = new SplObjectStorage();
// $o1 = new StdClass;
// $o2 = new StdClass;
// $o3 = new StdClass;

// $s->attach($o1);
// $s->attach($o2);

var_dump($s);

// var_dump($s->contains($o1));
// var_dump($s->contains($o2));
// var_dump($s->contains($o3));

echo "<pre>";

?>