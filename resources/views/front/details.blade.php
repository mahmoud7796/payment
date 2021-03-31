@extends('layouts.app')
@section('content')
    <div class="col-md-4 mb-4">

        @foreach($details as $detail)
        <div class="card">
            <div class="card-body text-center">
                <h5 class="mt-0 mb-1 mb-2">{{$detail-> title}}</h5>
                <p class="grey-text mb-2" >{{$detail-> content}}</p>
                <img
                    src="https://www.91-img.com/pictures/133432-v4-xiaomi-mi-a3-mobile-phone-large-1.jpg?tr=q-60"
                    class="my-3" alt="Angular logo">
                <br>
                <br>

                <a id="checkout" href=""
                   role="button" class="btn  btn-success px-3 waves-effect waves-light"> شراء المنتج
                </a>
            </div>

        </div>
            @endforeach

    </div>
    <div class="col-md-4 mb-4">
        <h3>اختر وسيلة الدفع المناسبة</h3>

        <div id="showPayForm"></div>

        @if(isset($success))
            <div class="alert alert-success text-center">
                تم الدفع بنجاح
            </div>
        @endif


        @if(isset($fail))
            <div class="alert alert-danger text-center">
                فشلت عملية الدفع
            </div>
        @endif

    </div>

    <!--Grid column-->

    <div class="col-md-6">


    </div>

    </div>
    </div>
@stop
