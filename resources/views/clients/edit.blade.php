@extends('template')

    @section('contenue')
        <div class="chit-chat-layer1">
            <div class="col-md-6 chit-chat-layer1-left">
               <div class="work-progres">
                            <div class="chit-chat-heading">
                                  Formulaire de modification des clients
                            </div>
                            <div class="table-responsive">
                               
                            <div class="col-sm-12">
                                <br>
                                <div class="panel panel-primary">	
                                    <div class="panel-heading" style="text-align: center;">Modifier un client</div>
                                    <div class="panel-body"> 
                                        <div class="col-sm-12">
                                            {!! Form::model($client, ['route' => ['client.update', $client->id], 'method' => 'put', 'class' => 'form-horizontal panel', 'enctype' => 'multipart/form-data']) !!}	
                                            <div class="form-group {!! $errors->has('nom') ? 'has-error' : '' !!}">
                                                {!! Form::text('nom', null, ['class' => 'form-control', 'placeholder' => 'Nom']) !!}
                                                {!! $errors->first('nom', '<small class="help-block">:message</small>') !!}
                                            </div>
                                            <div class="form-group {!! $errors->has('prenom') ? 'has-error' : '' !!}">
                                                {!! Form::text('prenom', null, ['class' => 'form-control', 'placeholder' => 'Prenom']) !!}
                                                {!! $errors->first('prenom', '<small class="help-block">:message</small>') !!}
                                            </div>
                                            <div class="form-group {!! $errors->has('tel') ? 'has-error' : '' !!}">
                                                {!! Form::text('tel', null, ['class' => 'form-control', 'placeholder' => 'Telephone']) !!}
                                                {!! $errors->first('tel', '<small class="help-block">:message</small>') !!}
                                            </div>
                                            <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
                                                {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                                                {!! $errors->first('email', '<small class="help-block">:message</small>') !!}
                                            </div>
                                            <div class="form-group {!! $errors->has('adresse') ? 'has-error' : '' !!}">
                                                {!! Form::text('adresse', null, ['class' => 'form-control', 'placeholder' => 'Adresse']) !!}
                                                {!! $errors->first('adresse', '<small class="help-block">:message</small>') !!}
                                            </div>
                                            <a href="{{ route('client.getFormPassword', $client->id) }}" class="">
                                               <span class="pull-left">Modifier le mot de pass</span>
                                            </a><br>
                                            <hr>
                                            {!! Form::submit('Envoyer', ['class' => 'btn btn-primary pull-right']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                                <a href="javascript:history.back()" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
                                </a>
                            </div>

                        </div>
                    </div>
                </div>

             <div class="col-md-6 chit-chat-layer1-rit">    	
                <div class="geo-chart">
                        <section id="charts1" class="charts">
                    <div class="wrapper-flex">
                    
                        <table id="myTable" class="geoChart tableChart data-table col-table" style="display:none;">
                            <caption>Student Nationalities Table</caption>
                            <tr>
                                <th scope="col" data-type="string">Country</th>
                                <th scope="col" data-type="number">Number of Students</th>
                                <th scope="col" data-role="annotation">Annotation</th>
                            </tr>
                            <tr>
                                <td>China</td>
                                <td align="right">20</td>
                                <td align="right">20</td>
                            </tr>
                            <tr>
                                <td>Colombia</td>
                                <td align="right">5</td>
                                <td align="right">5</td>
                            </tr>
                            <tr>
                                <td>France</td>
                                <td align="right">3</td>
                                <td align="right">3</td>
                            </tr>
                            <tr>
                                <td>Italy</td>
                                <td align="right">1</td>
                                <td align="right">1</td>
                            </tr>
                            <tr>
                                <td>Japan</td>
                                <td align="right">18</td>
                                <td align="right">18</td>
                            </tr>
                            <tr>
                                <td>Kazakhstan</td>
                                <td align="right">1</td>
                                <td align="right">1</td>
                            </tr>
                            <tr>
                                <td>Mexico</td>
                                <td align="right">1</td>
                                <td align="right">1</td>
                            </tr>
                            <tr>
                                <td>Poland</td>
                                <td align="right">1</td>
                                <td align="right">1</td>
                            </tr>
                            <tr>
                                <td>Russia</td>
                                <td align="right">11</td>
                                <td align="right">11</td>
                            </tr>
                            <tr>
                                <td>Spain</td>
                                <td align="right">2</td>
                                <td align="right">2</td>
                            </tr>
                            <tr>
                                <td>Tanzania</td>
                                <td align="right">1</td>
                                <td align="right">1</td>
                            </tr>
                            <tr>
                                <td>Turkey</td>
                                <td align="right">2</td>
                                <td align="right">2</td>
                            </tr>
                    
                        </table>
                    
                        <div class="col geo_main">
                            <h3 id="geoChartTitle">World Market</h3>
                            <div id="geoChart" class="chart"> </div>
                        </div>
                    
                    </div><!-- .wrapper-flex -->
                    </section>				
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>

        

    @stop 
