@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="d-flex justify-content-center">

            @if(isset($offers) && $offers -> count()> 0)
                @foreach($offers as $offer)
                    <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body text-center">
                    <h4>{{$offer -> title}}</h4>
                    <p>{{$offer -> contnet}}</p>

                    <img src="https://www.91-img.com/pictures/133432-v4-xiaomi-mi-a3-mobile-phone-large-1.jpg?tr=q-60">
                    <br> <br>
                    <a id="home-updates-angular" href="{{route('test_object.details', $offer -> id)}}" role="button" class="btn btn-success px-3 waves-effect waves-light">التفاصيل</a>
                </div>
            </div>
                    </div>

                @endforeach
            @endisset


        </div>

    </div>
@stop
