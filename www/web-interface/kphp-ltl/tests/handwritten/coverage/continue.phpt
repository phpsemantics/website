--TEST--
--FILE--
<?php
	for ($i = 0; $i < 10; $i++) {
		echo $i . "\n";
		if ($i == 3)
			continue;
	}
?>
--EXPECT--
0
1
2
3
4
5
6
7
8
9
