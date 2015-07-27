<?php
	
	// when aliasing is present, the effect of re-assigning the object being
	// iterated is immediately visible

	$obj1 -> a = 1; $obj1 -> b = 2; 
	$obj2 -> a = 3; $obj2 -> b = 4; 
	$ref = &$obj1;
	foreach ($obj1 as $v) { 
		echo "$v,";
		if ($v === $obj1 -> a) 
		$obj1 = $obj2; 
	};
	if ($obj1 === $obj2) echo "true\n";	// 1,3,4,true
?>
