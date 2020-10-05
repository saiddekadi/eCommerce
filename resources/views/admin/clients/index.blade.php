@extends('admin.template')

    @section('contenue')
        <div class="chit-chat-layer1">
            <div class="col-lg-12 chit-chat-layer1-left">
               <div class="work-progres">
                            <div class="chit-chat-heading">
                                  Les clients enregistrés
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
                                        <h3 class="panel-title" style="text-align: center;">Liste des clients</h3>
                                    </div>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nom</th>
                                                <th>Prenom</th>
                                                <th>Telephone</th>
                                                <th>Email</th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($clients as $client)
                                                <tr>
                                                    <td>{!! $client->id !!}</td>
                                                    <td class="text-primary"><strong>{!! $client->nom !!}</strong></td>
                                                    <td class="text-primary"><strong>{!! $client->prenom !!}</strong></td>
                                                    <td class="text-primary"><strong>{!! $client->tel !!}</strong></td>
                                                    <td class="text-primary"><strong>{!! $client->email !!}</strong></td>
                                                    <td>{!! link_to_route('client.show', 'Voir', [$client->id], ['class' => 'btn btn-success btn-block']) !!}</td>
                                                    <td>{!! link_to_route('client.edit', 'Modifier', [$client->id], ['class' => 'btn btn-warning btn-block']) !!}</td>
                                                    <td>
                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['client.destroy', $client->id]]) !!}
                                                            {!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Vraiment supprimer cet client ?\')']) !!}
                                                        {!! Form::close() !!}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {!! link_to_route('client.create', 'Ajouter un client', [], ['class' => 'btn btn-info pull-right']) !!}
                                {!! $links !!}
                            </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"> </div>
        </div>
    @stop
