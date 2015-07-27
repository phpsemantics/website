--TEST--
when assigning an array whose current pointer has overflown, 
the original array is reset, but the copy keeps the original
(overflown) current pointer.
--FILE--
<?php
	$x = array(1);
	next($x);
	$y = $x;
	echo "x: " . current($x) . "\n";	// 1
	echo "y: " . current($y) . "\n";	// false
?>
--EXPECT--
x: 1
y: 
