#!/usr/bin/php
<?php ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title> KPHP: An Executable Formal Semantics for PHP </title>
	
	<!-- CSS for slidesjs.com example -->
  	<link rel="stylesheet" href="http://www.doc.ic.ac.uk/~maffeis/phpsemantics/stylesheet/font-awesome.min.css"><!-- SM may delete? -->
	<link rel="stylesheet" href="http://www.doc.ic.ac.uk/~maffeis/phpsemantics/stylesheet/style.css" type="text/css" /> 
	
	<!-- JQuery -->
	
	<script src="http://www.doc.ic.ac.uk/~maffeis/phpsemantics/scripts/jquery-1.11.3.min.js"></script>
	
	<!-- Importing CodeMirror -->

	<link rel="stylesheet" href="http://www.doc.ic.ac.uk/~maffeis/phpsemantics/scripts/codemirror/lib/codemirror.css">
	<link rel="stylesheet" href="http://www.doc.ic.ac.uk/~maffeis/phpsemantics/codemirror/addon/fold/foldgutter.css" />
	
	<script src="http://www.doc.ic.ac.uk/~maffeis/phpsemantics/scripts/codemirror/lib/codemirror.js"></script>
		
	<link href="http://www.doc.ic.ac.uk/~maffeis/phpsemantics/scripts/codemirror/theme/default.css" rel="stylesheet" type="text/css" />

 	<script src="http://www.doc.ic.ac.uk/~maffeis/phpsemantics/scripts/codemirror/mode/htmlmixed/htmlmixed.js"></script>
  	<script src="http://www.doc.ic.ac.uk/~maffeis/phpsemantics/scripts/codemirror/mode/xml/xml.js"></script>
   	<script src="http://www.doc.ic.ac.uk/~maffeis/phpsemantics/scripts/codemirror/mode/javascript/javascript.js" type="text/javascript"></script>
	<script src="http://www.doc.ic.ac.uk/~maffeis/phpsemantics/scripts/codemirror/mode/css/css.js"></script>
        <script src="http://www.doc.ic.ac.uk/~maffeis/phpsemantics/scripts/codemirror/mode/clike/clike.js"></script>
        <script src="http://www.doc.ic.ac.uk/~maffeis/phpsemantics/scripts/codemirror/mode/php/php.js" type="text/javascript"></script>

	<!-- Enable Code folding -->

	<script src="http://www.doc.ic.ac.uk/~maffeis/phpsemantics/scripts/codemirror/addon/fold/foldcode.js"></script>
	<script src="http://www.doc.ic.ac.uk/~maffeis/phpsemantics/scripts/codemirror/addon/fold/foldgutter.js"></script>
	<script src="http://www.doc.ic.ac.uk/~maffeis/phpsemantics/scripts/codemirror/addon/fold/brace-fold.js"></script>
	<script src="http://www.doc.ic.ac.uk/~maffeis/phpsemantics/scripts/codemirror/addon/fold/xml-fold.js"></script>
	<script src="http://www.doc.ic.ac.uk/~maffeis/phpsemantics/scripts/codemirror/addon/fold/markdown-fold.js"></script>
	<script src="http://www.doc.ic.ac.uk/~maffeis/phpsemantics/scripts/codemirror/addon/fold/comment-fold.js"></script>

	<!-- Importing our scripts -->

	<script type="text/javascript" src="http://www.doc.ic.ac.uk/~maffeis/phpsemantics/scripts/scripts.js"></script>


	<!-- SlidesJS CSS -->

	<link rel="stylesheet" href="http://www.doc.ic.ac.uk/~maffeis/phpsemantics/stylesheet/slidesjs.css" type="text/css" /> 

	<!-- Setting up the examples -->

	<script type="text/javascript">
	
	cat[0] = 'basic';
	ex[0]=[];
	ex[0][0] = 'hello';
	ex[0][1] = 'functions';
	ex[0][2] = 'objects.php';
	ex[0][3] = 'aliasing.php';
	
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
	
	/*	
	cat[3] = 'zend';
	ex[3]=[];
	ex[3][0] = 'engine_assignExecutionOrder_004.phpt';
	*/

	</script>

</head>



<body>
	<h1> KPHP: An Executable Formal Semantics for PHP </h1>

	<div id="tabs">
		<a href="javascript:tab('intro');"> About  </a>
		<a href="javascript:tab('docs');"> Overview </a>
		<a href="javascript:tab('download');"> Download </a>
		<a href="javascript:tab('interface');"> Online interface </a>
	</div>

	<div id="intro">
		<h2> About </h2>
		<img width="880" src="http://www.doc.ic.ac.uk/~maffeis/phpsemantics/img/seq.png" align="center"> 

		<p>
		KPHP is an executable formal semantics for PHP written in 
		<a href="http://www.kframework.org/index.php/Main_Page"> K</a>, 
		a language definitional framework based on 
		<a href="http://fsl.cs.illinois.edu/index.php/Term_Rewriting_and_Rewriting_Logic"> Rewriting Logic </a>
		and 
		implemented on top of the
		<a href="http://maude.cs.uiuc.edu"> Maude</a> system.
		</p>
		
		<p>
		KPHP is described in the paper <b> An Executable Formal Semantics of PHP </b>
		by 
		<a href="http://dfilaretti.wordpress.com/about/"> D. Filaretti</a> 
		and 
		<a href="http://www.doc.ic.ac.uk/~maffeis/"> S. Maffeis</a>, to appear at ECOOP 2014. 
                An up-to-date, extended version of the paper is available 
		<a href="http://www.doc.ic.ac.uk/~maffeis/phpsemantics/files/kphp.pdf	"> here</a>. 
		</p>
		
		<p>
		If you just want to try out KPHP,  you can use the <a href="javascript:tab('interface');">Online interface</a>.
		All the source files are available in the  <a href="javascript:tab('download');">Download</a> section, 
                together with a Linux-based virtual machine with a fresh working copy of the KPHP distribution and dependencies.
		</p>
		
		<p>
		All files are copyright of the authors. 
		</br></br></br>
                <img width="200" src="http://www.doc.ic.ac.uk/~maffeis/phpsemantics/img/imperial_trans.png"> 
		</br>
		Work funded by EPSRC grant EP1004246/1.
		</p>
	
	</div>
	
	<div id="docs" class="hid">
		<h2> An overview of the KPHP Project </h2>
		<iframe src="http://www.doc.ic.ac.uk/~maffeis/phpsemantics/overview.html" frameborder=0 height=750 width=650 align="middle"></iframe>
	</div>
	
	<div id="download" class="hid">
		<h2> Downloads and Documentation </h2>
		
		<p>
		All KPHP source files are human readable and executable via the K tools
		(see the instructions provided in the Documentation section). 
		</p>
		
		<h3> Documentation </h3>
		
		We provide an informal 
		<a href="http://www.doc.ic.ac.uk/~maffeis/phpsemantics/documentation.html"> documentation</a>
		based on examples.
		We plan to expand and revise this documentation in the future. 
		
		<h3> Sources </h3>
		
		<p>
		You can download all the sources 
		as a single zip file <a href="http://www.doc.ic.ac.uk/~maffeis/phpsemantics/files/kphp-sources.zip"> here</a>.
		See the Documentation section and the README file included in the
		archive for usage information.
		</p>
		
		<p>
		Note that it is necessary to obtain a 
		<a href="http://www.kframework.org/index.php/K_tool_binaries"> binary distribution of the K Framework</a>  
		in order to compile 
		and execute our semantics. Please get the <b> latest build </b>.
		</p>
		
		<h3> Using the KPHP virtual machine </h3>
	
		<p>
		Alternatively, in case you experience issues installing the K tools
		(which is unlikely),
		you can use our self-contained Linux-based
		<a href="http://www.doc.ic.ac.uk/~maffeis/phpsemantics/files/kphp-vm.zip"> virtual machine </a>.
		</p>
	
		<p>
		The archive contains the following files:
		<ul>
		<li><code> kvm3.vmwarevm </code>: The virtual machine</li>
		<li><code> k </code> folder: The K tools</li>
	        </ul>
		</p>
	
		<p>
		For detailed set-up and usage information, please refer to the
		<a href="http://www.kframework.org/index.php/KVM_-_The_K_Virtual_Machine"> KVM documentation </a>. 
		Note that the procedure is the same but there is no need to download the KVM or the K tools, as
		are already provided by us in this package.
		</p>
	
		<p>
		When setting up the shared folders in VMWare (5th bulletpoint in the 
		"Setting up the KVM" section) you should add the <code> k </code> folder 
		as well as the folder containing the KPHP sources.
		</p>
	
	</div>
	

	<div id="interface" class="hid">
	        <iframe width="100%" height="1250" frameborder=0 src="http://kphp.doc.ic.ac.uk:55080/web-interface"></iframe>
        </div>
</body>
</html>
