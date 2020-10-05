@extends('template')

    @section('contenue')
        <div class="chit-chat-layer1">
            <div class="col-md-5 chit-chat-layer1-left">
               <div class="work-progres">
                            <div class="chit-chat-heading">
                                  Formulaire de detail d'une commande
                            </div>
                            <div class="table-responsive">
                               
                            <div class="col-sm-12">
                                <br>
                                <div class="panel panel-primary">	
                                    <div class="panel-heading" style="text-align: center;">Fiche de commande</div>
                                    <div class="panel-body"> 
                                        <p><h4 class="col-sm-offset-1"><b>Date :</b> {{ $commande->getdate($commande->created_at) }}</h4></p><br>
                                        <p><h4><b class="col-sm-offset-2">Client Concerné</b></h4></p>
                                        <div class="col-sm-offset-2"><img src="/storage/{{$commande->client->image}}" height="100" width="150" ></div><br>
                                        <ul>
                                            <li><h4><b>Nom : </b>{{ $commande->client->nom }}</h4></li>
                                            <li><h4><b>Prenom : </b>{{ $commande->client->prenom }}</h4></li>
                                            <li><h4><b>Telephone : </b>{{ $commande->client->tel }}</h4></li>
                                            <li><h4><b>Email : </b>{{ $commande->client->email }}</h4></li>
                                            <li><h4><b>Adresse : </b>{{ $commande->client->adresse }}</h4></li>
                                        </ul>
                                    </div>
                                </div>				
                                <a href="javascript:history.back()" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
                                </a>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="chit-chat-layer1">
                    <div class="col-lg-7 chit-chat-layer1-right">
                    <div class="work-progres">
                                    
                                    <div class="table-responsive">
                                <!-- L -->    
                                    <br>
                                    <div class="col-lg-12">
                                        <div class="panel panel-primary ">
                                            <div class="panel-heading">
                                                <h3 class="panel-title" style="text-align: center;">Liste des produits commandés</h3>
                                            </div>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Designation</th>
                                                        <th>Prix Unitaire</th>
                                                        <th>Quantité</th>
                                                        <th></th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($prods as $prod)
                                                        <tr>
                                                            <td></td>
                                                            <td class="text-primary"><strong>{!! $prod->designation !!}</strong></td>
                                                            <td class="text-primary"><strong>{!! $prod->prix !!}</strong></td>
                                                            <td class="text-primary"><strong>{!! $quantiteCmd[$prod->designation] !!}</strong></td>
                                                            <td>{{ link_to_route('produitCmd.edit', 'Modifier', [$commande->id, $prod->id], ['class' => 'btn btn-warning btn-block']) }}</td>
                                                            <td>
                                                                {{ Form::open(['method' => 'DELETE', 'route' => ['produitCmd.destroy', $commande->id, $prod->id]]) }}
                                                                    {{ Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Vraiment supprimer ce produit de la commande ?\')']) }}
                                                                {{ Form::close() }}
                                                            </td>
                                                        
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        {!! link_to_route('produit_commande', 'Ajouter un produit', [$commande->id], ['class' => 'btn btn-info pull-right']) !!}
                                    </div>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"> </div>
                </div>

             
            <div class="clearfix"> </div>
        </div>
    @stop 
