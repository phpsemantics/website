<?php
	// K runtime
	$krun = "/home/guest/bin/k/bin/krun";

	// Read input script	
	$input_script = $_POST['input'];
	
	// Opens temporary input file for K
	$input_file = 'tmp/input.php';
	$handle = fopen($input_file, 'w') or die('Cannot open file:  '.$input_file);

	// Write input script into the file
	fwrite($handle, $input_script);

	// Command line options
	$parser = "kphp/parser/parser.jar";
	
	$config_file = "tmp/out_config.xml";

	$action = $_POST["type"];
	
	// normal execution case
	if ($action == 0) {
		//echo "doing execution";
		$kompiled_def = "kphp";
		// create kphp command line
		$cmd = "$krun  --output-file $config_file -d $kompiled_def  --parser='java -jar $parser' $input_file"; 
		// run command line
		$result = shell_exec($cmd);
		// read configuration
		$config = file_get_contents($config_file);
		$return = "$result ^^^ $config"; 
//		echo $input_script;
		echo $return;
		

	}

	// model checking
	if ($action == 1) {
		$kompiled_def = "kphp-ltl";
		$input_buffer = trim($_POST["input-buf"]);

		if ($input_buffer == "")
			$input_buffer = "ListItem(0)";

		$ltl = $_POST["ltl"];
		// create kphp command line
		$cmd = "$krun  --output-file $config_file -d $kompiled_def  --parser='java -jar $parser' $input_file -cPC='true' -cIN='$input_buffer' --ltlmc='$ltl'";
		//echo $cmd;
		// run command line
		$result = shell_exec($cmd);
		// read configuration
		$config = file_get_contents($config_file);
		echo $config;
	}
?>
