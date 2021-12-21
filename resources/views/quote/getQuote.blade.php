@extends('layouts.app')

@section('content')

    @auth
    <div class="container bg-light pt-3"> 
        @if(in_array("Funny", Auth::User()->getGroups()))
            <h1 class="text-center mb-3"> Funny Quote </h1>

            <p class="text-center mb-2">Written by {{ $author }}</p>
                <div class="container border-4 mt-3 pb-5">
                    <p class="text-center">{{  $body   }} </p>
                </div>
        @endif

        @if(in_array("All", Auth::User()->getGroups()))
            <h1 class="text-center mb-3 pt-5"> Winston Churchill Quote </h1>

            <p class="text-center mb-2">Written by {{ $body2 }}</p>
                <div class="container border-4 mt-3 pb-5 ">
                    <p class="text-center">{{  $author2   }} </p>
                </div>
        @endif
        
        @if(count(Auth::User()->getGroups()) == 0)
            <h1 class="text-center mb-3 pt-5 pb-5"> No Quotes! Check back later! </h1>

        @endif
    </div>
    @endauth

@endsection