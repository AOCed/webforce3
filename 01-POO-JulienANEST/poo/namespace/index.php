<?php
include 'autoload.php';
// include 'Foo/A.php';
// include 'Bar/A.php';
// include 'Bar/C.php';
// include 'Foo/Baz/D.php';
// include 'Foo/B.php';

// On accéde à la classe A de Foo
$a = new Foo\A();
echo $a->var;

echo "<hr>";
// Si la classe A de Bar n'a pas de namespace, on accéde à la classe A de Bar
// $a = new A();

// Avec un namespace � la classe A de Bar, on accéde à la casse A de Bar
$a2 = new Bar\A();
echo $a2->var;
echo "<hr>";

$b = new Foo\B();
$b->displayVar();
echo '<br>';
$b->now();
echo '<br>';
$b->displayVar();

echo '<br>';
$c = new Bar\C();

$b->bonjour();

echo '<br>';
$d = new Foo\Baz\D();
$b->bonjourD();







