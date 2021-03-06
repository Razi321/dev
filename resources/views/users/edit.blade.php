

@extends('layouts.app')
@section('content')

     <!-- Profile widget -->
     <div class="bg-white shadow  overflow-hidden">
        <div class="px-4 pt-0 pb-4  cover">
            <div class="media align-items-end profile-header">
                <div class="profile mr-3"><img src="/storage/cover_images/{{$user->cover_image}}"  alt="..." width="130" class="rounded mb-2 img-thumbnail"><a href="/users/{{$user->id}}/edit" class="btn btn-dark btn-sm btn-block">Modifier profil</a></div>
                <div class="media-body mb-5 text-white">
                <h4 class="mt-0 mb-0">{{$user->name}}</h4>
                    <p class="small mb-4"> <i class="fa fa-map-marker mr-2"></i>{{$user->adresse}}</p>
                </div>
            </div>
        </div>

        <div class="bg-light p-4 d-flex justify-content-end text-center">
            {!!Form::open(['action'=>['UsersController@destroy' , $user->id] , 'method' =>'POST' ,'enctype' => 'multipart/form-data'])!!}

            {{Form::hidden('_method' , 'DELETE')}}
            {{Form::submit('Supprimer' , ['class'=>'btn btn-danger'])}}
            {!!Form::close()!!}
        </div>




            <div class="container-fluid">
                <br>
                <h2 class="text-center">Information général</h2>
                <br>

                {!! Form::open(['action' => ['UsersController@update' , $user->id] , 'method' => ' Post','enctype' => 'multipart/form-data']) !!}

                <table class="table table-striped table-bordered ">
                    <thead>
                        <tr>
                            <td  class="tabspec">{{Form::label('cover_image' , 'photo de profile')}}</td>
                            <td>
                                <div class="form-group">
                                    {{Form::file('cover_image')}}
                                </div>
                            </td>

                          </tr>
                      <tr>
                        <td  class="tabspec">{{Form::label('name' , 'Nom')}}</td>
                        <td>
                            <div class ='form-group'>

                            {{Form::text('name' , $user->name, ['class' => 'form-control' , 'placeholder' => 'name'])}}
                        </div></td>

                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="tabspec" >{{Form::label('email' , 'Adresse email')}}</td>
                        <td>
                            <div class ='form-group'>

                            {{Form::text('email' , $user->email, ['class' => 'form-control' , 'placeholder' => 'name'])}} </div></td>

                      </tr>
                      <tr>
                        <td class="tabspec">{{Form::label('adresse' , 'Adresse')}}</td>
                        <td><div class ='form-group'>

                            {{Form::text('adresse' , $user->adresse, ['class' => 'form-control' , 'placeholder' => 'votre adresse '])}} </div></td>

                      </tr>
                      <tr>
                        <td class="tabspec" >{{Form::label('date_of_birth' , 'date de naissance')}}</td>
                        <td><div class ='form-group'>

                            {{Form::text('date_of_birth' , $user->date_of_birth, ['class' => 'form-control' , 'placeholder' => 'AAAA/MM/JJ'])}} </div></td>

                      </tr>
                      <tr>
                        <td class="tabspec">{{Form::label('sexe' , 'Sexe')}}</td>
                        <td><div class ='form-group'>

                            {{Form::text('sexe' , $user->sexe, ['class' => 'form-control' , 'placeholder' => 'Sexe'])}} </div></td>

                      </tr>
                      @if(auth::user()->role =='Admin')
                      <tr>
                        <td class="tabspec">{{Form::label('role' , 'Role')}}</td>
                        <td >
                            <div class ='form-group'>

                            {!! Form::select('role',['Owner' => 'Propriétaire','Manager'=>'Gérant','User'=>'Utilisateur'],null,['class'=>'form-control','placeholder'=>'Choisir le Role']) !!}
                      </tr>



@elseif(auth::user()->role =='Owner')
<tr>
    <td class="tabspec">{{Form::label('role' , 'Role')}}</td>
    <td >
        <div class ='form-group'>

        {!! Form::select('role',['Manager'=>'Gérant','User'=>'Utilisateur'],$user->role,['class'=>'form-control']) !!}
  </tr>


  <tr>
    <td class="tabspec" >{{Form::label('member_in' , 'membre a ')}}<br>
        <small>l'identifiant de votre salle de sport est : {{auth::user()->member_in}}</small></td>
    <td><div class ='form-group'>

        {{Form::text('member_in' , $user->member_in, ['class' => 'form-control' , 'placeholder' => 'identifiant du salle'])}} </div></td>

  </tr>
                      @else
                      <tr class='hidden'>
                        <td class="tabspec">{{Form::label('role' , 'Role')}}</td>
                        <td >


                            <div class ='form-group'>

                                {{Form::text('role' , $user->role, ['class' => 'form-control' , 'placeholder' => 'name'])}}</td>


                      </tr>
                      @endif
                    </tbody>
                  </table>
            </div>

            <div class="container-fluid">
                {{Form::hidden('_method' , 'PUT')}}
            {{Form::submit('Enregistrer' , ['class'=> 'btn btn-success'])}}
            {!! Form::close() !!}
            </div>




@endsection


