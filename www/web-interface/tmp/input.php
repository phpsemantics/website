<?php
	// Welcome to the online interface for KPHP! :)
	
	function sayHello($name = "World") {
		return "Hello $name\n";
	}
	
	echo sayHello();
	echo sayHello("User");
?>