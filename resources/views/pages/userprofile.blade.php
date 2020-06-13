@extends('layouts.app')
@section('content')


        <!-- Profile widget -->
        <div class="bg-white shadow  overflow-hidden">
            <div class="px-4 pt-0 pb-4  cover">
                <div class="media align-items-end profile-header">
                    <div class="profile mr-3"><img src="/storage/cover_images/{{auth::user()->cover_image}}"  alt="..." width="130" class="rounded mb-2 img-thumbnail"><a href="/users/{{auth::user()->id}}/edit" class="btn btn-dark btn-sm btn-block">Edit profile</a></div>
                    <div class="media-body mb-5 text-white">
                    <h4 class="mt-0 mb-0">{{auth::user()->name}}</h4>
                        <p class="small mb-4"> <i class="fa fa-map-marker mr-2"></i>{{auth::user()->adresse}}</p>
                    </div>
                </div>
            </div>

            <div class="bg-light p-4 d-flex justify-content-end text-center">
                {!!Form::open(['action'=>['UsersController@destroy' , auth::user()->id] , 'method' =>'POST' , 'onsubmit' => 'return confirm("voulez-vous vraiment supprimer le compte?");'])!!}

                {{Form::hidden('_method' , 'DELETE')}}
                {{Form::submit('Supprimer' , ['class'=>'btn btn-danger'] )}}
                {!!Form::close()!!}
            </div>

            <div class="container-fluid">
                <br>
                <h2 class="text-center">Information général</h2>
                <br>


                <table class="table table-striped table-bordered ">
                    <thead>
                      <tr>
                        <td  class="tabspec">Nom</td>
                        <td>{{auth::user()->name}}</td>

                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="tabspec" >Adresse email</td>
                        <td>{{auth::user()->email}}</td>

                      </tr>

                        <tr>
                            <td class="tabspec">Sexe</td>
                            <td >{{auth::user()->sexe}}</td>

                          </tr>


                      <tr>
                        <td class="tabspec">Date de naissance</td>
                        <td >{{auth::user()->date_of_birth}}</td>

                      </tr>
                      <tr>
                        <td class="tabspec">Adresse</td>
                        <td >{{auth::user()->adresse}}</td>

                      </tr>
                      <tr>
                        <td class="tabspec">Role</td>
                        <td >        @if(auth::user()->role =='User')
                            Utilisateur
                        @elseif ( auth::user()->role =='Manager')
                    Gérant
                    @elseif ( auth::user()->role =='Owner')
                Propriétaire
            @else
        Administrateur
        @endif</td>

                      </tr>
                    </tbody>
                  </table>
            </div>
            <div class="container-fluid">

                <h2 class="text-center">votre abonnement</h2> <br>
                  @foreach ($user->memberships as $memberships)
                  <div class="container">
                      <img src="/storage/courses_images/{{$memberships->memberIncourse->image}} "alt="Avatar" class="image">
                      <div class="text-block">
                          <p>Abonné à : {{$memberships->memberIncourse->name}}</p>
                          <p>Prix par mois : {{$memberships->memberIncourse->price_month}} DT</p>
                          <p> Durée : {{$memberships->memberIncourse->duration}}</p>
                          <p>Fréquence : {{$memberships->memberIncourse->frequency}}</p>
                          <p>Date d'expiration : {{$memberships->end_at}}</p></div>
                      </div>
                      @endforeach
                    </div>

@endsection
