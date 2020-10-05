@extends('sites.mastersite')
@section('content')


<!-- banner -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <!-- Indicators-->
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item item1 active">
            <div class="container">
                <div class="w3l-space-banner">
                    <div class="carousel-caption p-lg-5 p-sm-4 p-3">
                        <p>Obtenez un Cashback à plat de
                            <span>10%</span> </p>
                        <h3 class="font-weight-bold pt-2 pb-lg-5 pb-4">La
                            <span>Grande</span>
                            Vente
                        </h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item item2">
            <div class="container">
                <div class="w3l-space-banner">
                    <div class="carousel-caption p-lg-5 p-sm-4 p-3">
                        <p>
                            <span>Ecouteur</span> sans fil avancé</p>
                        <h3 class="font-weight-bold pt-2 pb-lg-5 pb-4">Meilleur
                            <span>Casque</span>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item item3">
            <div class="container">
                <div class="w3l-space-banner">
                    <div class="carousel-caption p-lg-5 p-sm-4 p-3">
                        <p>Obtenez un Cashback
                            <span>10%</span>  à plat de</p>
                        <h3 class="font-weight-bold pt-2 pb-lg-5 pb-4">Nouvelle
                            <span>Norme</span>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item item4">
            <div class="container">
                <div class="w3l-space-banner">
                    <div class="carousel-caption p-lg-5 p-sm-4 p-3">
                        <p>Obtenir Maintenant
                            <span>40%</span> De Réduction</p>
                        <h3 class="font-weight-bold pt-2 pb-lg-5 pb-4">Réduction
                            <span>D Aujourd hui</span>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!-- //banner -->

<!-- top Products -->
<div class="ads-grid py-sm-5 py-4">
    <div class="container py-xl-4 py-lg-2">
        <!-- tittle heading -->
        
        <!-- //tittle heading -->
        <div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
                <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3 " style="margin-right: 30%">
                    <span>N</span>os
                    <span>N</span>ouveau
                    <span>P</span>roduits
                </h3>
                <div class="row">
                    <!-- product left -->
                    <div class="agileinfo-ads-display col-lg-12" style="padding-left: 50px; padding-right: 50px;" >
                        <div class="wrapper">
                            <!-- first section -->
                            <div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
                                <div class="row">
                                    @foreach ($produits as $produit)
                                    <div class="col-md-3 product-men">
                                        <div class="men-pro-item simpleCart_shelfItem">
                                            <div class="men-thumb-item text-center">
                                                <img src="/storage/{{ $produit->image}}" height="100" width="150" alt="">
                                                <div class="men-cart-pro">
                                                    <div class="inner-men-cart-pro">
                                                        <a href="{{ route('detail',$produit->id) }}" class="link-product-add-cart">voir detail</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item-info-product text-center border-top mt-4">
                                                <h4 class="pt-1">
                                                    <a href="#">{{ $produit->designation }}</a>
                                                </h4>
                                                <div class="info-product-price my-2">
                                                    <span class="item_price">{{ $produit->prix}}</span>
                                                </div>
                                                @if($produit->created_at > date('Y-m-d H:i:s',  ( time() - 86400)))
                                                     <span class="product-new-top">nouveau</span>
                                                @endif
                                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                                    <form action="{{ route('cart.store') }}" method="post">
                                                        @csrf
                                                        <fieldset>
                                                            <input type="hidden" name="id" value="{{ $produit->id }}" />
                                                            <input type="hidden" name="designation" value="{{ $produit->designation }}" />
                                                            <input type="hidden" name="prix" value="{{ $produit->prix }}" />
                                                            <input type="hidden" class="form-control" value="{{ 1 }}" id="quatity" name="quatity" min="1"><br>
                                                            <button class="btn btn-primary" type="submit" >Ajouter au <i class=" fa fa-cart-plus" aria-hidden="true" title="panier"></i></button><br><br>
                                                        </fieldset>
                                                        <hr>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- //first section -->
                            <!-- second section -->
                     
                            <!-- //second section -->
                            <!-- 3rd section -->
                          
                            <!-- //3rd section -->
                            <!-- fourth section -->
                           
                        </div>
                    </div>
                    <!-- //product left -->
                    <!-- product right -->
                    
                </div>
        </div>
    </div>
</div>

<!-- //top products -->
@endsection
