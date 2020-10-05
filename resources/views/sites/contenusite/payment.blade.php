@extends('sites.mastersite')
@section('content')

<div class="services-breadcrumb">
    <div class="agile_inner_breadcrumb">
        <div class="container">
            <ul class="w3_short">
                <li>
                    <a href="{{ route('site.contenu') }}">Accueil</a>
                    <i>|</i>
                </li>
                <li>Page de paiemet</li>
            </ul>
        </div>
    </div>
</div>
<!-- //page -->
<!-- payment page-->
<div class="privacy py-sm-5 py-4">
    <div class="container py-xl-4 py-lg-2">
        <!-- tittle heading -->
        
        <!-- //tittle heading -->
        <div class="row">
            <h3 class="tittle-w3l mb-lg-5 mb-sm-4 mb-3">
                <span>A</span>dresse
                <span>D</span>e
                <span>L</span>ivraison</h3>
            <div class="col-md-10">
				<div class="address_form_agile mt-sm-5 mt-4">
					
					<form action="#" method="post" class="creditly-card-form agileinfo_form" >
                        @csrf
						<div class="creditly-wrapper wthree, w3_agileits_wrapper " >
							<div class="information-wrapper">
								<div class="first-row">
									<div class="controls form-group">
                                        <input type="text" class="form-control" value="{{ $nom  }}" disabled name="nom" >
                                    </div>
                                    <div class="controls form-group">
										<input type="text" class="form-control" value=" {{ $prenom }}" disabled name="prenom">
                                    </div>
                                    <div class="controls form-group">
										<input type="text" class="form-control" value=" {{ $tel }}"  name="tel" required="">
                                    </div>
                                     <div class="controls form-group">
										<input type="text" class="form-control" value=" {{ $adresse }}"  name="adresse" required="">
                                    </div>
                                    <div class="controls form-group">
										<input type="text" class="form-control" placeholder="Ville" name="ville" required="">
                                    </div>
								</div>
							</div>
						</div>
					</form>
				</div>
            </div>
            <hr>
        </div>
        <br><br>
        <h3 class="tittle-w3l mb-lg-5 mb-sm-4 mb-3">
            <span>C</span>hoisir
            <span>U</span>n
            <span>M</span>oyen
            <span>D</span>e
            <span>P</span>aiement</h3>
        <div style="margin-top: 5%">
            <div class="row">
            <div class="col-md-6 ">
                <!--Horizontal Tab-->
                <div id="parentHorizontalTab">
                        <img class="pp-img" src="{{asset('assets/images/orange.jpg')}}" alt="Image Alternative text" title="Image Title">
                            <div>
                                <div id="tab4" class="tab-grid" style="display: block;">
                                    <div class="row">
                                        <div class="col-md-6 number-paymk">
                                            <form action="#" method="post" class="creditly-card-form-2 shopf-sear-headinfo_form">
                                                <section class="creditly-wrapper payf_wrapper">
                                                    <div class="credit-card-wrapper">
                                                        <div class="first-row form-group">
                                                            <div class="controls">
                                                                <label class="control-label">Numero</label>
                                                                <input class="form-control" type="text" name="name" placeholder="00224">
                                                            </div>
                                                        </div>
                                                      <button type="submit" class="btn btn-primary">Valider</button><br><br>
                                                    </div>
                                                </section>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </div>
                <!--Plug-in Initialisation-->
            </div>
            <div class="col-md-6">
                <!--Horizontal Tab-->
                <div id="parentHorizontalTab">
                        <img class="pp-img" src="{{asset('assets/images/areeba.jpg')}}" alt="Image Alternative text" title="Image Title">
                            <div>
                                <div id="tab4" class="tab-grid" style="display: block;">
                                    <div class="row">
                                        <div class="col-md-6 number-paymk">
                                            <form action="#" method="post" class="creditly-card-form-2 shopf-sear-headinfo_form">
                                                <section class="creditly-wrapper payf_wrapper">
                                                    <div class="credit-card-wrapper">
                                                        <div class="first-row form-group">
                                                            <div class="controls">
                                                                <label class="control-label">Numero</label>
                                                                <input class="form-control" type="text" name="name" placeholder="00224">
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Valider</button><br><br>
                                                    </div>
                                                </section>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </div>
                <!--Plug-in Initialisation-->
            </div>
            </div>
        </div>
    </div>
</div>
<!-- easy-responsive-tabs -->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/easy-responsive-tabs.css')}} " />
<script src="{{asset('assets/js/easyResponsiveTabs.js')}}"></script>

<script>
    $(document).ready(function () {
        //Horizontal Tab
        $('#parentHorizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            tabidentify: 'hor_1', // The tab groups identifier
            activate: function (event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#nested-tabInfo');
                var $name = $('span', $info);
                $name.text($tab.text());
                $info.show();
            }
        });
    });
</script>
@endsection
