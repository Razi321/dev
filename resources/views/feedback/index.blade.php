


@extends('layouts.dashboardAdmin')
@section('content')
<h1>les avis</h1>

  @if(count($feedbacks) > 0)



  @foreach($feedbacks as $feedback)
@if (auth::user()->member_in == $feedback->belongs_to)
    <div class ='card p-3 mt-3 mb-3'>
            <h2 >   <a href="/gyms/{{$feedback->belongs_to}}">{{$feedback->body}}</a></h2>
            <small> <span class="txt_bold"> Client</span> :   {{$feedback->usersfeed->name}} </small><br>
            <small> <span  class="txt_bold"> salle de sport  </span>: {{$feedback->gym->name}} </small> <br>
            <small> <span  class="txt_bold"> Créé le </span> : {{$feedback->created_at}} </small>


    </div>@endif
@endforeach
{{$feedbacks->links()}}


@else
<p>aucun avis</p>
@endif



@endsection

