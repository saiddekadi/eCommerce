@extends('sites.mastersite')
@section('content')

<!-- banner-2 -->
<div class="page-head_agile_info_w3l">

</div>
<!-- //banner-2 -->
<!-- page -->
<div class="services-breadcrumb">
    <div class="agile_inner_breadcrumb">
        <div class="container">
            <ul class="w3_short">
                <li>
                    <a href="{{ route('site.contenu') }}">Accueil</a>
                    <i>|</i>
                </li>
                <li>Detail</li>
            </ul>
        </div>
    </div>
</div>
<!-- //page -->

<!-- Single Page -->
<div class="banner-bootom-w3-agileits py-5">
    <div class="container py-xl-4 py-lg-2">
        <!-- tittle heading -->
        <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
            <span>D</span>etail
            <span>D</span>u
            <span>P</span>roduit</h3>
        <!-- //tittle heading -->
            <div class="row">
                    <div class="col-lg-5 col-md-8 single-right-left ">
                        <div class="">
                            <div class="thumb-image">
                                <img src="/storage/{{ $produit->image }}" data-imagezoom="true" class="img-fluid" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 single-right-left simpleCart_shelfItem">
                        <h3 class="mb-3">{{ $produit->designation }}</h3>
                        <p class="mb-3">
                            <span class="item_price">{{ $produit->getprix() }}</span>
                        </p>
                        <div class="product-single-w3l">
                            <h3>Description:</h3>
                            <p class="my-3">
                                <div>{{ $produit->description }}</div>
                        </div>
                        <div class="occasion-cart">
                            <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                <form action="{{ route('cart.store') }}" method="post">
                                    @csrf
                                    <fieldset>
                                        <input type="hidden" name="id" value="{{ $produit->id }}"/><hr>
                                        <input type="hidden" class="form-control" value="{{ 1 }}" id="quatity" name="quatity" min="1"><br>
                                        <button class="btn btn-primary" type="submit" >Ajouter au <i class=" fa fa-cart-plus" aria-hidden="true" title="panier"></i></button><br><br>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>

              </div>
    </div>
</div>
<!-- //Single Page -->

@endsection
