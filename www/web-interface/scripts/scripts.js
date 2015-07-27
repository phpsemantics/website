var xhr = new XMLHttpRequest();
var xhr1 = new XMLHttpRequest();
var xhr2 = new XMLHttpRequest();
var xhr3 = new XMLHttpRequest();

var cat = [];
var ex = [];

var cs, es;

function getRadioValue(theRadioGroup)
{
    var elements = document.getElementsByName(theRadioGroup);
    for (var i = 0, l = elements.length; i < l; i++)
    {
        if (elements[i].checked)
        {
            return elements[i].value;
        }
    }
}


window.addEventListener('load', function()
{
 cs = document.getElementById('cat');
 es = document.getElementById('ex');
 for(i=0; i<cat.length; i++)
 {
  cs.options.add(new Option(cat[i], i));
 }
 catchange(0);
});

function catchange(j)
{
 es.options.length = 0;
 for(var t = ex[j], i=0; i<t.length; i++)
 {
  es.options.add(new Option(t[i], i));
 }
}

/*

function loadex()
{
	var u = cs.value, v = es.value;
	xhr.open("GET", x="examples/"+cat[u]+"/"+ex[u][v]);
	xhr.onload = function(){ cm.setValue(xhr.responseText);}
	xhr.send();
}

*/

function invokeK() {
	
	document.getElementById("result").value = "Loading...";
	cmc.setValue("Loading...");
	
	var url = "runk.php";

	var input = encodeURIComponent(cm.getValue());
	var type = getRadioValue('type');
	var input_buf = document.getElementById("input-buf").value;
	var ltl = document.getElementById("ltl").value;

	var p_input = "input=" + input;
	var p_type = "type=" + type;
	var p_input_buf = "input-buf=" + input_buf;
	var p_ltl = "ltl=" + ltl;

	var result = "";
	
	var params = p_input + "&" + p_input_buf + "&" + p_ltl + "&" + p_type;

	
	xhr3.open("POST", url, true);

	//Send the proper header information along with the request


	xhr3.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr3.setRequestHeader("Content-length", params.length);
	xhr3.setRequestHeader("Connection", "open");


	xhr3.onload = function(){ 
		result = xhr3.responseText; 
		var res = result.split("^^^");
		
		if (res.length == 2) {
			document.getElementById("result").value = res[0];
			cmc.setValue(res[1]);
		}
		if (res.length == 1) {
			cmc.setValue(res[0]);
		}
	}
	xhr3.send(params);	
	
	

}



function loadex()
{
	var u = cs.value, v = es.value;
	if (cat[u] != 'verification') {
		xhr.open("GET", x="examples/"+cat[u]+"/"+ex[u][v]);
		xhr.onload = function(){ cm.setValue(xhr.responseText);}
		xhr.send();	
	}
	else {
		// load example
		xhr.open("GET", x="examples/"+cat[u]+"/"+ex[u][v]);
		xhr.onload = function(){ cm.setValue(xhr.responseText);}
		xhr.send();	
		
		// load LTL query
		
		xhr1.open("GET", x="examples/"+cat[u]+"/"+ex[u][v]+".ltl");
		xhr1.onload = function(){
			document.getElementById("ltl").value = xhr1.responseText;
		}
		xhr1.send();
		
		// load input buffer
		
		xhr2.open("GET", x="examples/"+cat[u]+"/"+ex[u][v]+".input");
		xhr2.onload = function(){
			document.getElementById("input-buf").value = xhr2.responseText;
		}
		xhr2.send();	
	}
}

var atab = "intro";
function tab(id)
{
	$('#'+atab).toggle();
	$('#'+id).toggle();
 	atab = id;
 	cm.refresh();
	return void(0);
}