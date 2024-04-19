<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Code Red</title>
</head>



<style type="text/css">

	@font-face{

		font-family: headFont;
		src: url(ui/fonts/Exo-Bold.ttf);
	}
	
	@font-face{

		font-family: myFont;
		src: url(ui/fonts/OpenSans-Regular.ttf);
	}

	#wrapper{

		max-width: 900px;
		min-height: 500px;
		margin: auto;
		color: grey;
		font-family: myFont;
		font-size: 13px;
	}

	form{

		margin: auto;
		padding: 10px;
		width: 100%;
		max-width: 400px;
	}

	input[type=text], input[type=password], input[type=button] {

		padding: 10px;
		margin: 10px;
		width: 98%;
		border-radius: 5px;
		border: solid 1px grey;
	}
	
	input[type=button]{

		width: 100%;
		cursor: pointer;
		background-color: red;
		color: white;
	}


	input[type=radio]{

		transform: scale(1.2);
		cursor: pointer;
	}

	#header{

		background-color: dimgrey;
		font-size: 40px;
		text-align: center;
		font-family: headFont;
		width: 100%;
		color: white;
	}


</style>
<body>

	<div id="wrapper">

		<div id="header">
			CODE RED
			<div style="font-size:20px; font-family: myFont;">Signup</div>
		</div>
		<form id="myForm" method="post">
			<input type="text" name="username" placeholder="Username" required autocomplete="off"><br>
			<input type="text" name="email" placeholder="Email" required autocomplete="off"><br>
			<div style="padding: 10px">
				<br>Gender:<br>
				<input type="radio" value="Male" name="gender" required>Male<br>
				<input type="radio" value="Female" name="gender" required>Female<br>
			</div>
			<input type="password" name="password" placeholder="Password" required autocomplete="off"><br>
			<input type="button" value="Sign up" id="signup_button"><br>

		</form>
		
	</div>	
</body>
</html>

<script type="text/javascript">
	
	function _(element){

		return document.getElementById(element);
	}

	var signup_button = _("signup_button");
	signup_button.addEventListener("click",collect_data);

	function collect_data(){

		var myForm = _("myForm");
		var inputs = myForm.getElementsByTagName("INPUTS");

		var data = {};
		for (var i = input.length - 1; i >= 0; i--) {
			
			var key = inputs[i].name;

			switch(key){

				case "username":
					data.username = inputs[i].value;
					break;

				case "email":
					data.email = inputs[i].value;
					break;  

				case "gender":
					if (inputs[i].checked) {
						data.gender = inputs[i].value;
					}
					break;

				case "password":
					data.password = inputs[i].value;
					break;

				case "password2":
					data.password2 = inputs[i].value;
					break;  	
			}
		}

		send_data(data,"signup");

	}

	function send_data(data,type){

		var xml = new XMLHttpRequest();

		xml.onload = function(){
			console.log(xml.responseText);	
			if (xml.readyState == 4 || xml.status = 200) {

				alert(xml.responseText);
			}
		}

			data.data_type = type;
			var data_string = JSON.stringify(data);

			xml.open("POST","api.php",true);
			xml.send(data_string);
	}

</script>