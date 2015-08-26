<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title> KPHP Web Interface </title>
	
	<!-- Stylesheets -->
	
	<link rel="stylesheet" href="stylesheet/style.css" type="text/css" /> 
	
	<!-- JQuery -->
	
	<script src="scripts/jquery-1.11.0.js"></script>
	
	<!-- Importing CodeMirror -->

	<link rel="stylesheet" href="scripts/codemirror/lib/codemirror.css">
	<link rel="stylesheet" href="../addon/fold/foldgutter.css" />
	
	<script src="scripts/codemirror/lib/codemirror.js"></script>
		
	<link href="scripts/codemirror/theme/default.css" rel="stylesheet" type="text/css" />

 	<script src="scripts/codemirror/mode/htmlmixed/htmlmixed.js"></script>
  	<script src="scripts/codemirror/mode/xml/xml.js"></script>
   	<script src="scripts/codemirror/mode/javascript/javascript.js" type="text/javascript"></script>
    <script src="scripts/codemirror/mode/css/css.js"></script>
    <script src="scripts/codemirror/mode/clike/clike.js"></script>
    <script src="scripts/codemirror/mode/php/php.js" type="text/javascript"></script>

	<!-- Enable Code folding -->

	<script src="scripts/codemirror/addon/fold/foldcode.js"></script>
	<script src="scripts/codemirror/addon/fold/foldgutter.js"></script>
	<script src="scripts/codemirror/addon/fold/brace-fold.js"></script>
	<script src="scripts/codemirror/addon/fold/xml-fold.js"></script>
	<script src="scripts/codemirror/addon/fold/markdown-fold.js"></script>
	<script src="scripts/codemirror/addon/fold/comment-fold.js"></script>

	<!-- Importing our scripts -->

	<script type="text/javascript" src="scripts/scripts.js"></script>

	<!-- Setting up the examples -->
	<script type="text/javascript">
	
	cat[0] = 'basic';
	ex[0]=[];
	ex[0][0] = 'hello';
	ex[0][1] = 'functions';
	
	cat[1] = 'foreach';
	ex[1]=[];
	ex[1][0] = '1.phpt';
	ex[1][1] = '2.phpt';
	ex[1][2] = '3.phpt';
	ex[1][3] = '4.phpt';
	ex[1][4] = '5.phpt';
	ex[1][5] = '6.phpt';
	ex[1][6] = '7.phpt';
	
	cat[2] = 'verification';
	ex[2]=[];
	ex[2][0] = 'alias.phpt';
	ex[2][1] = 'hash_hmac.phpt';
	ex[2][2] = 'PMA_is_valid.phpt';
	ex[2][3] = 'types.phpt';
	ex[2][4] = 'func.phpt';
	

	cat[3] = 'zend';
	ex[3]=[];
	ex[3][0] = 'engine_assignExecutionOrder_004.phpt';

</script>


</head>

<body>
	<div id="interface">
	<h2> KPHP web interface </h2>
	<p>
		Welcome! This web interface is under construction. 
		More features coming soon.
	</p>
	<p>
		<b> Note:</b> we know our semantics isn't perfect.
		If you are running a script and you notice something strange 
		(e.g. wrong output, error messages, crashes, etc.) please
		<a href="mailto:admin@phpsemantics.org?Subject=I found a bug in KPHP" target="_top">
		drop us an email</a> containing your script and we'll try to fix the problem.
	</p>
	
	
	</br></br>
	
	<form action="#" method="post">
		
	<!-- Load examples  -->
		
	<div>
		<b>Load example:</b> &nbsp;
			Category: <select id="cat" onchange="catchange(this.value)"></select> &nbsp;
			File: <select id="ex"></select> &nbsp;
		<input type="button" value="Load" onclick="loadex();">
		&nbsp;
		<input type="button" value="submit" onclick="invokeK();"/>
	</div>
	
	<!-- Action type  -->
	
	<fieldset style="margin-bottom: 6px;padding-bottom:0px">
		<legend> Action </legend>
		
		<p style="margin-top:0px">
			<input type="radio" name="type" value="0" id="tc" checked="true"/>
		  	<label for="tc"> Execution </label>  
		  	
<!--		  	<input id="sh" type="checkbox" name="show_heap" value="1" /> -->
<!--			<label for="cl"> Heap pretty print </label> -->
			<br/>		
			
		   	<input type="radio" name="type" value="1" id="pp" />
		    <label for="pp"> Symbolic Model Checking </label> <br/> 
		</p>
	</fieldset>
	
	<!-- Input script textfield  -->
	        <div>
	        <b>Input script:</b>
	        <br/>
	        <textarea name="input" style="width:100%; height:200px;" id="input">
	        </textarea>
	        </div>
	        
	<!-- Stdout textfield  -->
	
			<div id="stdout">
	        <b> Stdout </b>
	        <br />
	        <textarea style="width:100%;height:150px;" id="result"> 
	        </textarea>
	        </div>


	<!-- LTL formula  -->
	        
	        <div id="ltl-stuff">
	        <b> LTL formula </b>
	        <br/>
	 		<textarea name="ltl" style="width:100%; height:20px;" id="ltl">
	        </textarea>
	        
	        
	<!-- Symbolic Input buffer  -->
	        
	        <b> Symbolic input buffer </b>
	        <br/>
	 		<textarea name="input-buf" style="width:100%; height:20px;" id="input-buf">
	        </textarea>
	        </div>
	</form>
	<!-- Configuration textfield  -->
	
	        <div>
	        <b> Internal output (configuration/verification output) </b>
	        <br/>
	        <textarea name="config" style="width:100%; height:200px;" id="config">
	        </textarea>
	        </div>
	
	</div>
	<!-- Instantiate CodeMirror (input textbox) -->
	
	<script>
		cm = CodeMirror.fromTextArea(document.getElementById('input'),{
				lineNumbers: true,
				mode: "php",
		 });
	</script>	
	
	<script>
		cmc = CodeMirror.fromTextArea(document.getElementById('config'),{
				mode: "xml",
				lineNumbers: true,
				lineWrapping: true,
				readOnly: true,
				extraKeys: {"Ctrl-Q": function(cm){ cm.foldCode(cm.getCursor()); }},
				foldGutter: true,
				gutters: ["CodeMirror-linenumbers", "CodeMirror-foldgutter"]
		 });
		 //cmc.foldCode(CodeMirror.Pos(0, 0))
		 //cmc.foldCode(CodeMirror.Pos(21, 0))
		
	</script>	

	<script type="text/javascript">
		$("#ltl-stuff").hide();                                                                                           	                                                                                                      
	 	$("input[type=radio]").change(function() {  
	 		if($(this).prop('value') == '0'){
	    		$("#stdout").show();
	    		$("#ltl-stuff").hide();
	    	}
	    	else {
	    		$("#stdout").hide();
	    		$("#ltl-stuff").show();
	    	}});
	</script>
	
</body>
</html>