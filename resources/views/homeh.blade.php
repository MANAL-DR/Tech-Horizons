@extends('main')

@section('title',' | Home')

@section('body')
   <div id="slogan">"For Tech Enthusiasts, By Tech <br> Enthusiasts"<br>Get Your Daily Dose of Insights, Innovation, and Empowerment</div>
   <div class="boxcontainer">
      <h1 class="box-title">Discover Our Public Editions</h1>
      <div class="boxwrapper">
      @foreach($publicNum as $num)
      <div class="box">
         <a href="/numero/{{$num->id}}" target="_blank"><h3>{{$num->title}}</h3></a>
         <p>{{$num->description}}</p>
      </div>
      @endforeach
      </div>
      <div id="inscrire">
         <span id="exit" onclick="exit()">⨯</span>
         <h1>VOULEZ VOUS VOIR PLUS D'ARTICLES</h1><br>   
         <p style="font-weight: 600;">Inscrivez vous pour decouvrir les autres numéros</p><br>
         <a href="{{route('register')}}"><button>S'inscrire</button></a>
      </div>
      <button class="load" onclick="inscrire()">Load more</button>
   </div>
@endsection

@section('script')
<script type="text/javascript" src="{{asset('js/home.js') }}"></script>
@endsection