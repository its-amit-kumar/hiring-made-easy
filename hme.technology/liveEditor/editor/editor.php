
<?php


require_once dirname(__DIR__).'/RedisDB.php';

if(isset($_GET['cid']))
{
	$cid = $_GET['cid'];
	$obj = new RedisDB();
	$data = $obj->checkChannel($cid);
	if($data == false)
	{
		exit();
	}

}

?> 



<!DOCTYPE html>
<html lang="en">
<head>




	<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js"></script>
<title>LiveEditor</title>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&family=Open+Sans&family=Roboto:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="challenge.css?id=<?php  echo random_int(1,100000); ?>">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<style>
.video{
            border: 1px solid black;
            height: 220px;
            width: 400px;
            overflow: hidden;
            background-color: grey;
            position: absolute;
            bottom: 100;
            right: 20;
	}
#editor{
z-index : 0;
}
</style>

</head>
<body style='background-color:#3a3a40'>




<div style="display: flex; justify-content:center; color:white">
	<h4 style="padding: 15px;position:absolute; left:1%">Channel-ID : <span id="cid"><?php echo $cid; ?></span></h4><br>
	<h4 style="padding: 15px;">Admin : <span id="admin"><?php echo $data['admin'] ?></span></h4><br>
	<h4 style="padding: 15px;">Date-Created : <span><?php echo $data['date'] ?></span></h4>
</div>

<div style="display: flex; justify-content:center;flex-direction:column">
	<h3 style='text-align:center; color:#dedddc;padding:10px;border-bottom:0.5px solid white;'>Meeting title : <?php echo $data['title']; ?></h3>
</div>


<div style='display:flex;justify-content:center;align-items:center'>   <!-- start -->

<div style="display: flex; justify-content:center;flex-direction:column; width:50%">
	<h2 style="width: 90%;margin-left:15px;font-family: 'Times New Roman', Times, serif ;font-weight: bolder;font-size: 33px;color:#bdbdbd">Problem Statement :</h2>
	<div style="width: 90%;padding:10px;margin-left:10px;font-family: 'Times New Roman', Times, serif;box-shadow: 3px 6px 9px #888888;font-weight: bold;font-size: 16px; padding : 20px; background-color:#e6e6e6;" >
	<pre style='color:black'>
		<?php echo $data['prob'] ?>
	</pre>
	</div>
</div>

<div class='main-body' style='width:50%'>

	<br>


	<div class="dropdown row" id = "selector">
		
		<div class="col-10">

			<a href="#l" hidden="hidden"></a>
			
			<nav class="navbar navbar-dark bg-dark rounded" id="textEditorNavbar">
		<h5 class="text-white">Language:</h5>
		
		<select id="LanguageSelector" class="LanguageSelector rounded highlight">
			<option value="" selected disabled hidden>Choose here</option> 
			<option value="python" id="python">Python</option> 
			<option value="cpp" id="cpp">C++</option> 
			<option value="cpp" id="cpp">C</option> 
			<option value="java" id="java">Java</option> 
		</select> 


		<h5 class="text-white">Theme:</h5>
		<select id="ThemeSelector" class="ThemeSelector rounded"> 
			<option value="ambiance" id="LanguageOption">Ambiance</option> 
			<option value="chaos" id="LanguageOption">Chaos</option> 
			<option value="chrome" id="LanguageOption">Chrome</option> 
			<option value="clouds" id="LanguageOption">Clouds</option>
			<option value="clouds_midnight" id="LanguageOption">Clouds Midnight</option> 
			<option value="cobalt" id="LanguageOption">Cobalt</option> 
			<option value="crimson_editor" id="LanguageOption">Crimson Editor</option> 
			<option value="dawn" id="LanguageOption">Dawn</option> 
			<option value="dracula" id="LanguageOption">Dracula</option> 
			<option value="dreamweaver" id="LanguageOption">Dreamweaver</option> 
			<option value="eclipse" id="LanguageOption">Eclipse</option> 
			<option value="github" id="LanguageOption">Github</option> 
			<option value="gob" id="LanguageOption">Gob</option> 
			<option value="gruvbox" id="LanguageOption">Gruvbox</option> 
			<option value="idle_fingers" id="LanguageOption">Idle Fingers</option> 
			<option value="iplastic" id="LanguageOption">Iplasic</option> 
			<option value="katzenmilch" id="LanguageOption">Katzenmilch</option> 
			<option value="kr_theme" id="LanguageOption">Kr Theme</option> 
			<option value="kuroir" id="LanguageOption">Kuroir</option> 
			<option value="merbivore" id="LanguageOption">Merbivore</option> 
			<option value="merbivore_soft" id="LanguageOption">Merbivore Soft</option> 
			<option value="mono_industrial" id="LanguageOption">Mono Industrial</option>  
			<option value="monokai" id="LanguageOption">Monokai</option> 
			<option value="nord_dark" id="LanguageOption">Nord Dark</option> 
			<option value="pastel_on_dark" id="LanguageOption">Pastel on Dark</option> 
			<option value="solarized_dark" id="LanguageOption">Solarized Dark</option> 
			<option value="solarized_light" id="LanguageOption">Solarized Light</option> 
			<option value="sqlserver" id="LanguageOption">SQL Server</option> 
			<option value="terminal" id="LanguageOption">Terminal</option> 
			<option value="textmate" id="LanguageOption">Textmate</option> 
			<option value="tomorrow" id="LanguageOption">Tomorrow</option> 
			<option value="tomorrow_night" id="LanguageOption">Tomorrow Night</option>
			<option value="tomorrow_night_blue" id="LanguageOption">Tomorrow Night Blue</option> 
			<option value="tomorrow_night_bright" id="LanguageOption">Tomorrow Night Bright</option> 
			<option value="tomorrow_night_eighties" id="LanguageOption">Tomorrow Night Eighties</option> 
			<option value="twilight" selected="selected" id="LanguageOption">Twilight</option> 
			<option value="vibrant_ink" id="LanguageOption">Vibrant Ink</option> 
			<option value="xcode" id="LanguageOption">X Code</option> 

		</select>
		<h5 class="text-white">Text Size:</h5>
		<input type="number" class="LanguageSelector rounded" value="18" min="10" max="50" id="textsize">


	</nav>
	</div>
	</div>
	<div class="col-2"></div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<div class="row">
		
		<div class="col-10 main">
		<div id="editor"></div>
	</div>
	<div class="col-2"></div>
	</div>

		
	<script src="Ace/ace.js" type="text/javascript" charset="utf-8"></script>



	<!-- <div class="row" id="edit">
		<div class="col-2"></div>
		<div class="col-8">
			<div class="row">
				<div>
					
				</div>
			</div>
			<br>
			<div class="row input">
				<div class="col-8" id="input">
					<input type="checkbox" name="CustomInput" id="CustomInput">Custom Input<br>
					<textarea type="text" name="input" class="outputtxt" placeholder="Type your input here" id="InputTestCase"></textarea>

				</div>
				<div class="col-4">
					<div class="row">
						<div class="col-6">
							<div class="buttonn rounded successs" id="runcodecustom"><span class="btntext">Run Code</span></div>
						</div>
						<div class="col-6">
							<div class="buttonn rounded failuree" id="submitCode"><span class="btntext">Submit Code</span></div>
						</div>
						<div class="row">
						</div>
						
					</div>

				
				</div>
			</div>
			
		</div>
		<div class="col-2"></div>
	</div> -->
	<br>
	<br>

</div>

</div>

<div class="video" id="vi" style='width:20vw;top: 20%; left:5%'>
<iframe style="height: 95%; width: 180%; margin-top: 5%; position: relative;left:-78px" src="https://www.hme.technology:8080/index1.html?cid=<?php echo $_GET['cid'];  ?>" allow="camera; microphone" title="description"></iframe>

    </div>
<script type="text/javascript" src="challenge.js?id=006"></script>
</body>

<script>
navigator.getUserMedia (
   // constraints
   {
      video: true,
      audio: true
   },

   // successCallback
   function(localMediaStream) {
      var video = document.querySelector('video');
      video.src = window.URL.createObjectURL(localMediaStream);
      video.onloadedmetadata = function(e) {
         // Do something with the video here.
      };
   },

   // errorCallback
   function(err) {
    if(err === PERMISSION_DENIED) {
      // Explain why you need permission and how to update the permission setting
    }
   }
);
/*
function makeDragable(dragHandle, dragTarget) {
  let dragObj = null; //object to be moved
  let xOffset = 0; //used to prevent dragged object jumping to mouse location
  let yOffset = 0;

  document.querySelector(dragHandle).addEventListener("mousedown", startDrag, true);
  document.querySelector(dragHandle).addEventListener("touchstart", startDrag, true);

  /*sets offset parameters and starts listening for mouse-move*/
  /*function startDrag(e) {
    e.preventDefault();
    e.stopPropagation();
    dragObj = document.querySelector(dragTarget);
    dragObj.style.position = "absolute";
    let rect = dragObj.getBoundingClientRect();

    if (e.type=="mousedown") {
      xOffset = e.clientX - rect.left; //clientX and getBoundingClientRect() both use viewable area adjusted when scrolling aka 'viewport'
      yOffset = e.clientY - rect.top;
      window.addEventListener('mousemove', dragObject, true);
    } else if(e.type=="touchstart") {
      xOffset = e.targetTouches[0].clientX - rect.left;
      yOffset = e.targetTouches[0].clientY - rect.top;
      window.addEventListener('touchmove', dragObject, true);
    }
  }

  /*Drag object*/
  /*function dragObject(e) {
    e.preventDefault();
    e.stopPropagation();

    if(dragObj == null) {
      return; // if there is no object being dragged then do nothing
    } else if(e.type=="mousemove") {
      dragObj.style.left = e.clientX-xOffset +"px"; // adjust location of dragged object so doesn't jump to mouse position
      dragObj.style.top = e.clientY-yOffset +"px";
    } else if(e.type=="touchmove") {
      dragObj.style.left = e.targetTouches[0].clientX-xOffset +"px"; // adjust location of dragged object so doesn't jump to mouse position
      dragObj.style.top = e.targetTouches[0].clientY-yOffset +"px";
    }
  }

  /*End dragging*/
  /*document.onmouseup = function(e) {
    if (dragObj) {
      dragObj = null;
      window.removeEventListener('mousemove', dragObject, true);
      window.removeEventListener('touchmove', dragObject, true);
    }
  }
}

makeDragable('#vi', '#vi')*/




window.onload = function() {
  draggable(document.getElementById('vi'));
}

function draggable(el) {
  el.addEventListener('mousedown', function(e) {
    var offsetX = e.clientX - parseInt(window.getComputedStyle(this).left);
    var offsetY = e.clientY - parseInt(window.getComputedStyle(this).top);
    
    function mouseMoveHandler(e) {
      el.style.top = (e.clientY - offsetY) + 'px';
      el.style.left = (e.clientX - offsetX) + 'px';
    }

    function reset() {
      window.removeEventListener('mousemove', mouseMoveHandler);
      window.removeEventListener('mouseup', reset);
    }

    window.addEventListener('mousemove', mouseMoveHandler);
    window.addEventListener('mouseup', reset);
  });
}









/*
    window.onload = addListeners;

    function addListeners(){
        document.getElementById('vi').addEventListener('mousedown', mouseDown, false);
        window.addEventListener('mouseup', mouseUp, false);

    }

    function mouseUp()
    {
        window.removeEventListener('mousemove', divMove, true);
    }

    function mouseDown(e){
    window.addEventListener('mousemove', divMove, true);
    }

    function divMove(e){
        var div = document.getElementById('vi');
    div.style.position = 'absolute';
    div.style.top = e.clientY + 'px';
    div.style.left = e.clientX + 'px';
    }*/
</script>

</html>
