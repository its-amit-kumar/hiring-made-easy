	const channel = {
    cid: $("#cid").val(),
  };


//var socket = io.connect("https://www.codegreenback.com:3100");

$(document).ready(function(){

	var socket = io.connect("https://www.codegreenback.com:3100");

	 socket.emit("connect2channel", { cid: $("#cid").text()});
	 
	     

	socket.on("new_data_incoming", function (data) {
		// console.log(data);
		editor.setValue(data.data);
  });

	
	
const myActivity = {

	sendData : function(){
		socket.emit("new_data",payload)
	},


}

const editor_operations = {
	data : null,
	row : null,
	column : null,
	data : null,
	newData : null,
	start_index : null,
	end_index : null,
	flag :true
}

const payload = {
	row : null,
	append : true,
	data : null,
	delete : null
}





	$("#editor").keyup(function(){
		if(editor_operations.flag)
		{
			editor_operations.flag = false;
			setTimeout(function () {
				payload.data = editor.getValue();
				myActivity.sendData();
				editor_operations.flag = true;

			console.log(editor.selection.getCursor());
			console.log(editor.getValue());
		}, 500);
		}
		


	});



	function getFormData(object) {
    const formData = new FormData();
    Object.keys(object).forEach(key => formData.append(key, object[key]));
    return formData;
	}

	var e = document.getElementById("LanguageSelector");
	e.addEventListener("change",function(){
		var strUser = e.options[e.selectedIndex].value;
		if(strUser == "python"){
			editor.session.setMode("ace/mode/python");
    		lang = "python";
		}
		if(strUser == "cpp"){
			editor.session.setMode("ace/mode/c_cpp");
    		lang = "cpp";
		}
		if(strUser == "java"){
			editor.session.setMode("ace/mode/java");
    		lang = "java";
		}
	});


	var editor = ace.edit("editor");
	
    ace.config.set('basePath', '/Ace');
    ace.config.set('themePath', '/Ace');
    editor.setTheme("ace/theme/twilight");
    var m = document.getElementById("textsize");
    editor.setFontSize(m.value+"px");
    
	m.addEventListener("change",function(){
		var a = m.value;
		editor.setFontSize(a+"px");
		
	});

	document.getElementById("ThemeSelector").addEventListener("change",function(){
		editor.setTheme("ace/theme/"+document.getElementById("ThemeSelector").value);
	});

});
	
	




	

