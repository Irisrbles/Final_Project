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

		max-width: 800px;
		min-height: 500px;
		display: flex;
		margin: auto;
		color: white;
		font-family: myFont;
		font-size: 13px;
	}

	#left_pannel{

		min-height: 400px;
		background-color: #9D2235;
		flex: 1;
		text-align: center;
	}

	#profile_image{
		
		width: 50%;
		border: solid thin white;
		border-radius: 50%;
		margin: 10px;		
	}

	#left_pannel label{
		
		width: 100%;
		height: 20px;
		display: block;	
		border-bottom: solid thin #ffffff55;
		cursor: pointer;
		padding: 5px;
		transition: all 1s ease;
	}

	#left_pannel label:hover{
		
		background-color: grey;
	}

	
	#left_pannel label img{
		
		float: right;
		width: 25px;

	}

	#right_pannel{

		min-height: 400px;
		flex: 4;
		text-align: center;
	}

	#header{

		background-color: dimgrey;
		height: 70px;
		font-size: 40px;
		text-align: center;
		font-family: headFont;
	}

	#inner_left_pannel{

		background-color: dimgrey;
		flex: 1;
	}

	#inner_right_pannel{

		background-color: white;
		flex: 2;
		min-height: 430px;
		transition: all 2s ease;
	}


	#radio_contacts:checked ~ #inner_right_pannel{

		flex: 0;
	}

	#radio_settings:checked ~ #inner_right_pannel{

		flex: 0;
	}

	#contact{

		width: 150px;
		height: 170px;
		margin: 10px;
		display: inline-block;
		overflow: hidden
		vertical-align: top;
	}

	#contact img{

		width: 100%;
	}


</style>
<body>

	<div id="wrapper">
		<div id="left_pannel">

			<div style="padding: 10px;">
				<img id="profile_image" src="ui/images/user3.jpg">
				<br>
				User
				<br>
				<span style="font-size: 12px; opacity: 0.5;">user@gmail.com</span>

				<br>
				<br>
				<br>
				<div>
					<label id="label_chat" for="radio_chat">Chat <img src="ui/icons/chat.png"></label>
					<label id="label_contacts" for="radio_contacts">Contacts <img src="ui/icons/contacts.png"></label>
					<label id="label_settings" for="radio_settings">Settings <img src="ui/icons/settings.png"></label>
				</div>


			</div>
		</div>	
			<div id="right_pannel">
				<div id="header">CODE RED</div>
				<div id="container" style="display: flex;">

					<div id="inner_left_pannel">
						

						<div style="text-align: center;">
							<div id="contact">
								<img src="ui/images/user1.jpg">
								<br>Username
							</div>

							<div id="contact">
								<img src="ui/images/user2.jpg">
								<br>Username
							</div>

							<div id="contact">
								<img src="ui/images/user3.jpg">
								<br>Username
							</div>
						</div>
					</div>

					<input type="radio" id="radio_chat" name="myradio" style="display: none;"> 
					<input type="radio" id="radio_contacts" name="myradio" style="display: none;">
					<input type="radio" id="radio_settings" name="myradio" style="display: none;">
					
					
					<div id="inner_right_pannel">
						
					</div>

				</div>
			</div>
	</div>
</body>
</html>

<script type="text/javascript">
	
	function _(element){

		return document.getElementById(element);
	}

	
	var label = _("label_chat");
	label.addEventListener("click",function(){

		var inner_pannel = _("inner_left_pannel");

		var ajax = new XMLHttpRequest();
		ajax.onload = function(){

			if (ajax.status == 200 || ajax.readState == 4) {

				inner_pannel.innerHTML = ajax.responseText;
			}

		}

		ajax.open("POST", "file.php", true);
		ajax.send("");
		
	});

</script>