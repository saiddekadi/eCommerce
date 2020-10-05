@extends('sites.mastersite')
@section('content')

<!-- top Products -->
<div class="ads-grid py-sm-5 py-4">
    <div class="container py-xl-4 py-lg-2">
        <!-- tittle heading -->
        <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3 " style="margin-right: 30%">
            <span></span>{{ $categorie->type }}</h3>
        <!-- //tittle heading -->
        <div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
                <div class="row">
                    <div class="agileinfo-ads-display col-lg-12">
                        <div class="wrapper">
                            <div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
                                <div class="row">
                                    @foreach ($produitparcategorie as $produit)
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
