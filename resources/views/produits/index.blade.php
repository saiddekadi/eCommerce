@extends('template')

    @section('contenue')
        <div class="chit-chat-layer1">
            <div class="col-lg-12 chit-chat-layer1-left">
               <div class="work-progres">
                            <div class="chit-chat-heading">
                                  Les produits enregistrés
                            </div>
                            <div class="table-responsive">
                           <!-- L -->    
                            <br>
                            <div class="col-lg-12">
                                @if(session()->has('ok'))
                                    <div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
                                @endif
                                <div class="panel panel-primary ">
                                    <div class="panel-heading">
                                        <h3 class="panel-title" style="text-align: center;">Liste des produits</h3>
                                    </div>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Designation</th>
                                                <th>Prix Unitaire</th>
                                                <th>Quantité</th>
                                                <th>Categorie</th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($produits as $produit)
                                                <tr>
                                                    <td>{!! $produit->id !!}</td>
                                                    <td class="text-primary"><strong>{!! $produit->designation !!}</strong></td>
                                                    <td class="text-primary"><strong>{!! $produit->prix !!}</strong></td>
                                                    <td class="text-primary"><strong>{!! $produit->quantite !!}</strong></td>
                                                    <td class="text-primary"><strong>{!! $produit->categorie->type !!}</strong></td>
                                                    <td>{!! link_to_route('produit.show', 'Voir', [$produit->id], ['class' => 'btn btn-success btn-block']) !!}</td>
                                                    <td>{!! link_to_route('produit.edit', 'Modifier', [$produit->id], ['class' => 'btn btn-warning btn-block']) !!}</td>
                                                    <td>
                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['produit.destroy', $produit->id]]) !!}
                                                            {!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Vraiment supprimer ce produit ?\')']) !!}
                                                        {!! Form::close() !!}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                
                                </div>
                                {!! link_to_route('produit.create', 'Ajouter un client', [], ['class' => 'btn btn-info pull-right']) !!}
                                {!! $links !!}
                            </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"> </div>
        </div>
    @stop 
