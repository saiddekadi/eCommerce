<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="zxx">
<head>
<title>Elecotro store |  SIGN Up</title>
<!-- custom-theme -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Esteem Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //custom-theme -->
<link href="login/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="login/css/snow.css" rel="stylesheet" type="text/css" media="all" />
<link href="login/css/component.css" rel="stylesheet" type="text/css" media="all" />
<link href="login/css/style_grid.css" rel="stylesheet" type="text/css" media="all" />
<link href="login/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome-icons -->
<link href="login/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome-icons -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
</head>
<body>
			<!-- /pages_agile_info_w3l -->

	<div class="pages_agile_info_w3l">
		<!-- /login -->
			<div class="over_lay_agile_pages_w3ls two">
			<div class="registration">
			
				<div class="signin-form profile">
					<h2>Enregistrement</h2>
					<div class="login-form">
						<form action="{{ route('client.add') }}" method="post">
							@csrf
							<div class="form-group {!! $errors->has('nom') ? 'has-error' : '' !!}">
								<input type="text" name="nom" placeholder="Nom" required="">
								{!! $errors->first('nom', '<small class="help-block">:message</small>') !!}
							</div>
							<div class="form-group {!! $errors->has('prenom') ? 'has-error' : '' !!}">
								<input type="text" name="prenom" placeholder="Prenom" required="">
								{!! $errors->first('prenom', '<small class="help-block">:message</small>') !!}
							</div>
							<div class="form-group {!! $errors->has('tel') ? 'has-error' : '' !!}">
								<input type="text" name="tel" placeholder="Telephone" required="">
								{!! $errors->first('tel', '<small class="help-block">:message</small>') !!}
							</div>
							<div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
								<input type="text" name="email" placeholder="Email" required="">
								{!! $errors->first('email', '<small class="help-block">:message</small>') !!}
							</div>
							<div class="form-group {!! $errors->has('adresse') ? 'has-error' : '' !!}">
								<input type="text" name="adresse" placeholder="Adresse" required="">
								{!! $errors->first('adresse', '<small class="help-block">:message</small>') !!}
							</div>
							<div class="form-group {!! $errors->has('password') ? 'has-error' : '' !!}">
								<input type="password" name="password" placeholder="Mot de pass" required="">
								{!! $errors->first('password', '<small class="help-block">:message</small>') !!}
							</div>

							<input type="password" name="password_confirmation" placeholder="Confirmation mot de passe" required="">

							<div class="tp">
								<input type="submit" value="S'inscrire">
							</div>
						</form>
					</div>
					
						<h6><a href="javascript:history.back()">Retour</a><h6>
				</div>
			</div>

			<div class="copyrights_agile two">
					<p>© 2020 Esteem. All Rights Reserved | Design by</p>
			</div>	
		</div>
	</div>
						
	<script type="text/javascript" src="login/js/jquery-2.1.4.min.js"></script>
	<script src="login/js/modernizr.custom.js"></script>

	<script src="login/js/classie.js"></script>
	<script src="login/js/gnmenu.js"></script>
	<script>
	new gnMenu( document.getElementById( 'gn-menu' ) );
	</script>
	
<!-- //js -->

<script src="login/js/screenfull.js"></script>
		<script>
		$(function () {
			$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

			if (!screenfull.enabled) {
				return false;
			}

			

			$('#toggle').click(function () {
				screenfull.toggle($('#container')[0]);
			});	
		});
		</script>
<script src="login/js/jquery.nicescroll.js"></script>
<script src="login/js/scripts.js"></script>
<script src="login/js/snow.js"></script>
 <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<script type="text/javascript" src="login/js/bootstrap-3.1.1.min.js"></script>


</body>
</html>