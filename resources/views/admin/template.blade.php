<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Electoro store-Panneau dadministration</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<link href="{{asset('assets/assets/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all">
<!-- Custom Theme files -->
<link href="{{asset('assets/assets/css/style.css')}}" rel="stylesheet" type="text/css" media="all"/>
<!--js-->
<script src="{{asset('assets/assets/js/jquery-2.1.1.min.js')}}"></script>
<!--icons-css-->
<link href="{{asset('assets/assets/css/font-awesome.css')}}" rel="stylesheet">
<!--Google Fonts-->
<link href="{{asset('assets/assets//fonts.googleapis.com/css?family=Carrois+Gothic')}}" rel='stylesheet' type='text/css'>
<link href="{{asset('assets/assets//fonts.googleapis.com/css?family=Work+Sans:400,500,600')}}" rel='stylesheet' type='text/css'>
<!--static chart-->
{!! Html::style('https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css') !!}
{!! Html::style('https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css') !!}

<script src="{{asset('assets/assets/js/Chart.min.js')}}"></script>
<!--//charts-->
<!-- geo chart -->
    <script src="{{ asset('assets/assets//cdn.jsdelivr.net/modernizr/2.8.3/modernizr.min.js') }}" type="text/javascript"></script>
    <script>window.modernizr || document.write('<script src="{{ asset("assets/assets/lib/modernizr/modernizr-custom.js") }}"><\/script>')</script>
    <!--<script src="lib/html5shiv/html5shiv.js"></script>-->
     <!-- Chartinator  -->
    <script src="{{ asset('assets/assets/js/chartinator.js') }}" ></script>
    <script type="text/javascript">
        jQuery(function ($) {

            var chart3 = $('#geoChart').chartinator({
                tableSel: '.geoChart',

                columns: [{role: 'tooltip', type: 'string'}],

                colIndexes: [2],

                rows: [
                    ['China - 2020'],
                    ['Colombia - 2020'],
                    ['France - 2020'],
                    ['Italy - 2020'],
                    ['Japan - 2020'],
                    ['Kazakhstan - 2020'],
                    ['Mexico - 2020'],
                    ['Poland - 2015'],
                    ['Russia - 2020'],
                    ['Spain - 2020'],
                    ['Tanzania - 2020'],
                    ['Turkey - 2020']],

                ignoreCol: [2],

                chartType: 'GeoChart',

                chartAspectRatio: 1.5,

                chartZoom: 1.75,

                chartOffset: [-12,0],

                chartOptions: {

                    width: null,

                    backgroundColor: '#fff',

                    datalessRegionColor: '#F5F5F5',

                    region: 'world',

                    resolution: 'countries',

                    legend: 'none',

                    colorAxis: {

                        colors: ['#679CCA', '#337AB7']
                    },
                    tooltip: {

                        trigger: 'focus',

                        isHtml: true
                    }
                }


            });
        });
    </script>
</head>
<body>
<div class="page-container">
   <div class="left-content">
	   <div class="mother-grid-inner">
            <!--header start here-->
				<div class="header-main">
					<div class="header-left">
							<div class="logo-name">
									 <a href="index.html"> <h1>Shoppy</h1>
									<!--<img id="logo" src="" alt="Logo"/>-->
								  </a>
							</div>
							<!--search-box-->
								<div class="search-box">
									<form>
										<input type="text" placeholder="Chercher..." required="">
										<input type="submit" value="">
									</form>
								</div><!--//end-search-box-->
							<div class="clearfix"> </div>
						 </div>
						 <div class="header-right">
							<div class="profile_details_left"><!--notifications of menu start -->
								<div class="clearfix"> </div>
							</div>
							<!--notification menu end -->
							<div class="profile_details">
								<ul>
									<li class="dropdown profile_details_drop">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
											<div class="profile_img">
												<span class="prfil-img"><img src="assets/assets/images/p1.png" alt=""> </span>
												<div class="user-name">
													<p>Malorum</p>
													<span>Administrateur</span>
												</div>
												<i class="fa fa-angle-down lnr"></i>
												<i class="fa fa-angle-up lnr"></i>
												<div class="clearfix"></div>
											</div>
										</a>
										<ul class="dropdown-menu drp-mnu">
											<li> <a href="#"><i class="fa fa-user"></i> Profil</a> </li>
											<li> <a href="#"><i class="fa fa-sign-out"></i> Se déconnecter</a> </li>
										</ul>
									</li>
								</ul>
							</div>
							<div class="clearfix"> </div>
						</div>

				     <div class="clearfix"> </div>
				</div>
<!--heder end here-->
<!-- script-for sticky-nav -->
		<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop();
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });

		});
		</script>
		<!-- /script-for sticky-nav -->
<!--inner block start here-->

<div class="inner-block">
<!--market updates updates-->
<div class="market-updates">
                    <div class="col-md-4 market-update-gd">
                        <div class="market-update-block clr-block-1">
                            <div class="col-md-8 market-update-left">
                                <h3>83</h3>
                                <h4>Utilisateurs enregistrés</h4>
                                <p></p>
                            </div>
                            <div class="col-md-4 market-update-right">
                                <i class="fa fa-file-text-o"> </i>
                            </div>
                        <div class="clearfix"> </div>
                        </div>
                    </div>
                    <div class="col-md-4 market-update-gd">
                        <div class="market-update-block clr-block-2">
                        <div class="col-md-8 market-update-left">
                            <h3>135</h3>
                            <h4>Commandes enregistrées</h4>
                            <p></p>
                        </div>
                            <div class="col-md-4 market-update-right">
                                <i class="fa fa-file-text-o"> </i>
                            </div>
                        <div class="clearfix"> </div>
                        </div>
                    </div>
                    <div class="col-md-4 market-update-gd">
                        <div class="market-update-block clr-block-3">
                            <div class="col-md-8 market-update-left">
                                <h3>23</h3>
                                <h4>Nouveaux produits enregistrés</h4>
                                <p></p>
                            </div>
                            <div class="col-md-4 market-update-right">
                                <i class="fa fa-file-text-o"> </i>
                            </div>
                        <div class="clearfix"> </div>
                        </div>
                    </div>
                <div class="clearfix"> </div>
            </div>

@yield('contenue')

</div>

<div class="copyrights">
	 <p>© 2020 Shoppy. All Rights Reserved  <a href="{{ asset('http://w3layouts.com/') }}" target="_blank"></a> </p>
</div>
<!--COPY rights end here-->
</div>
</div>
<!--slider menu-->
    <div class="sidebar-menu">
		  	<div class="logo"> <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="#"> <span id="logo" ></span>
			      <!--<img id="logo" src="" alt="Logo"/>-->
			  </a> </div>
		    <div class="menu">
		      <ul id="menu" >
		        <li id="menu-home" ><a href="{{ route('admin') }}"><i class="fa fa-tachometer"></i><span>Tableau  de bord</span></a></li>
		        <li><a href="#"><i class="fa fa-gift" aria-hidden="true"></i><span>Produits</span><span class="fa fa-angle-right" style="float: right"></span></a>
		          <ul>
		            <li><a href="{{ route('produit.create') }}">Ajouter</a></li>
		            <li><a href="{{ route('produit.index') }}">Lister</a></li>
		          </ul>
		        </li>
		        <li><a href="#"><i class="fa fa-cogs"></i><span>Categories</span><span class="fa fa-angle-right" style="float: right"></span></a>
		          <ul>
		            <li><a href="{{ route('categorie.create') }}">Ajouter</a></li>
		            <li><a href="{{ route('categorie.index') }}">Lister</a></li>
		          </ul>
		        </li>
		         <li><a href="#"><i class="fa fa-shopping-cart"></i><span>Commandes</span><span class="fa fa-angle-right" style="float: right"></span></a>
		         	<ul id="menu-academico-sub" >
			            <li id="menu-academico-avaliacoes" ><a href="#">Ajouter</a></li>
			            <li id="menu-academico-boletim" ><a href="#">Lister</a></li>
		             </ul>
		         </li>
                 <li><a href="#"><i class="fa fa-users" aria-hidden="true"></i></i><span>Clients</span><span class="fa fa-angle-right" style="float: right"></span></a>
		          <ul>
		            <li><a href="{{ route( 'client.create' ) }}">Ajouter</a></li>
		            <li><a href="{{ route( 'client.index' ) }}">Lister</a></li>
		          </ul>
		        </li>
		      </ul>
		    </div>
	 </div>
	<div class="clearfix"> </div>
</div>
<!--slide bar menu end here-->
<script>
var toggle = true;

$(".sidebar-icon").click(function() {
  if (toggle)
  {
    $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
    $("#menu span").css({"position":"absolute"});
  }
  else
  {
    $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
    setTimeout(function() {
      $("#menu span").css({"position":"relative"});
    }, 400);
  }
                toggle = !toggle;
            });
</script>
<!--scrolling js-->
		<script src="{{ asset('assets/assets/js/jquery.nicescroll.js') }}"></script>
		<script src="{{ asset('assets/assets/js/scripts.js') }}"></script>
		<!--//scrolling js-->
<script src="{{ asset('assets/assets/js/bootstrap.js') }}"></script>
<!-- mother grid end here-->
</body>
<script type="text/javascript" src="{{ asset('assets/assets/js/bootstrap.js') }}"></script>
        <script type="text/javascript">
        $(document).ready(function() {
            $(".alert").addClass("in").fadeOut(4500);
			$('[data-toggle=collapse]').click(function(){
				$(this).find("i").toggleClass("glyphicon-chevron-right glyphicon-chevron-down");
			});
        });
</script>
</html>
