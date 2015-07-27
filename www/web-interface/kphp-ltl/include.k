require "errors.k"
module INCLUDE
	imports ERRORS

// =/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=
// =/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=
/*@ \section{File inclusion} 
		Unsupported at the moment */
// =/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=
// =/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=/=

rule
	<k> 'InternalFunction('Eval(_)) => NOT-SUPPORTED("KPHP ERROR: 'Eval not supported") ... </k>
	<trace> Trace:List => Trace ListItem("eval") </trace>
	[step, error]
	
rule
	<k> 'InternalFunction('Include(_)) => NOT-SUPPORTED("KPHP ERROR: 'Include not supported") ... </k>
	<trace> Trace:List => Trace ListItem("include") </trace>
	[step, error]

rule
	<k> 'InternalFunction('RequireOnce(_)) => NOT-SUPPORTED("KPHP ERROR: 'RequireOnce not supported") ... </k>
	<trace> Trace:List => Trace ListItem("require-once") </trace>
	[step, error]

rule
	<k> 'InternalFunction('Require(_)) => NOT-SUPPORTED("KPHP ERROR: 'Require not supported") ... </k>
	<trace> Trace:List => Trace ListItem("require") </trace>
	[step, error]

endmodule
