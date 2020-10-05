@extends('admin.template')

    @section('contenue')
        <div class="chit-chat-layer1">
            <div class="col-lg-12 chit-chat-layer1-left">
               <div class="work-progres">
                            <div class="chit-chat-heading">
                                  Les categories enregistrés
                            </div>
                            <div class="table-responsive">
                           <!-- L -->
                            <br>
                            <div class="col-sm-offset-1 col-lg-10">
                                @if(session()->has('ok'))
                                    <div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
                                @endif
                                <div class="panel panel-primary ">
                                    <div class="panel-heading">
                                        <h3 class="panel-title" style="text-align: center;">Liste des categories</h3>
                                    </div>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Type</th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($categories as $categorie)
                                                <tr>
                                                    <td>{!! $categorie->id !!}</td>
                                                    <td class="text-primary"><strong>{!! $categorie->type !!}</strong></td>
                                                    <td>{!! link_to_route('categorie.show', 'Voir', [$categorie->id], ['class' => 'btn btn-success btn-block']) !!}</td>
                                                    <td>{!! link_to_route('categorie.edit', 'Modifier', [$categorie->id], ['class' => 'btn btn-warning btn-block']) !!}</td>
                                                    <td>
                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['categorie.destroy', $categorie->id]]) !!}
                                                            {!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Vraiment supprimer cette categorie ?\')']) !!}
                                                        {!! Form::close() !!}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {!! link_to_route('categorie.create', 'Ajouter une categorie', [], ['class' => 'btn btn-info pull-right']) !!}
                                {!! $links !!}
                            </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"> </div>
        </div>
    @stop
