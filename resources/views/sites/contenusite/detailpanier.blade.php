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
                    <li>Paiement</li>
                </ul>
            </div>
        </div>
    </div>
<!-- //page -->
<!-- //page -->

@if (Cart::count()>0)
<div class="privacy py-sm-5 py-4">
    <div class="container py-xl-4 py-lg-2">
        <!-- tittle heading -->
        <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
            <span>L</span>e
            <span>P</span>anier
        </h3>
        <!-- //tittle heading -->
        <div>
            <h4 class="mb-sm-4 mb-3"> Votre panier contient:
                <span>{{ $count }}</span> Produits
            </h4>

            <form method="post" action="/panier/update"  name="updateCart">
                @csrf
                <table  class="table table-bordered"  cellspacing="0" class="table table-bordered shop-table-cart">
                    <thead>
                        <tr>
                            <th class="product-remove">&nbsp;</th>
                            <th class="product-name">Produit</th>
                            <th class="product-price">Prix</th>
                            <th class="product-quantity">Quantité</th>
                            <th class="product-thumbnail">&nbsp;</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        @foreach ($produits as $produit)
                            <tr class="cart_item">

                                <td class="product-thumbnail">
                                    <a href="{{ route('detail',$produit->id) }}"><img src="/storage/{{ $produit->model->image}}"  height="100" width="150" alt="" class=""></a>
                                </td>
                                <td class="product-name">
                                    <p>{{ $produit->name }}</p>
                                </td>
                                <td class="product-price">
                                    <span class="amount">{{number_format($produit->price, 2, ',', ', ').'GNF' }}</span>
                                </td>
                                <td class="product-quantity">
                                <input type="number" class="form-control" value="{{ $produit->qty }}" id="quantity" name="quantity{{$i}}" min="1"><br>
                                </td>
                                <td class="product-remove">
                                    <a class="fa fa-trash btn btn-danger" href="{{ route('cart.destroy',$produit->rowId) }}"></a>
                                </td>

                            </tr>
                            <?php $i  = $i + 1 ?>
                        @endforeach
                        <tfoot>
                            <tr>
                                <td colspan="2">&nbsp;</td>
                                <td>Total</td>
                                <td>{{ $total }} GNF</td>
                                <td><input type="submit" class="btn btn-info" value="Mettre a jour" onclick="valider()" /></td>
                            </tr>
                        </tfoot>
                    </tbody>
                </table>
            </form>
        </div>
        <div class="row">
            <div class="checkout-right-basket col-md-4 offset-2">
                <a href="{{ route('payement') }}">Valider La Commande
                    <span class="far fa-hand-point-right"></span>
                </a>
            </div>
            <div class="checkout-right-basket col-md-4 ">
                <a href="{{ route('site.contenu') }}">Continuer  l'achat
                    <span class="far fa-hand-point-right"></span>
                </a>
            </div>
        </div> 
    
    </div>
</div>
@else
<H2 style="text-align: center">Votre Panier est vide </H2>

@endif
<script type="text/javascript">
//<![CDATA[

    function valider() {

        document.updateCart.submit();
    }

//]]>
</script>
@endsection
