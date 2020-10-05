@extends('template')

    @section('contenue')
        <div class="chit-chat-layer1">
            <div class="col-lg-12 chit-chat-layer1-left">
               <div class="work-progres">
                            <div class="chit-chat-heading">
                                  Les commandes enregistrés
                            </div>
                            <div class="table-responsive">
                           <!-- L -->    
                            <br>
                            <div class="col-lg-offset-1 col-lg-10">
                                @if(session()->has('ok'))
                                    <div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
                                @endif
                                <div class="panel panel-primary ">
                                    <div class="panel-heading">
                                        <h3 class="panel-title" style="text-align: center;">Liste des commandes</h3>
                                    </div>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Date de creation</th>
                                                <th>Client concerné</th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($commandes as $commande)
                                                <tr>
                                                    <td>{{ $commande->id }}</td>
                                                    <td class="text-primary"><strong>{{ $commande->getdate($commande->created_at) }}</strong></td>
                                                    <td class="text-primary"><strong>{{ $commande->client->nom }}</strong></td>
                                                    <td class="text-primary"><strong>{{ $commande->client->prenom }}</strong></td>
                                                    <td class="text-primary"><strong>{{ $commande->client->tel }}</strong></td>
                                                    <td>{{ link_to_route('commande.show', 'Voir', [$commande->id], ['class' => 'btn btn-success btn-block']) }}</td>
                                                    <td>
                                                        {{ Form::open(['method' => 'DELETE', 'route' => ['commande.destroy', $commande->id]]) }}
                                                            {{ Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Vraiment supprimer ce produit ?\')']) }}
                                                        {{ Form::close() }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {{ link_to_route('commande.create', 'Ajouter une commande', [], ['class' => 'btn btn-info pull-right']) }}
                                {!! $links !!}
                            </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"> </div>
        </div>
    @stop 
