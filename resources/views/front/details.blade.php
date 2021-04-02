@extends('layouts.app')

@section('content')
    <div class="container row d-flex justify-content-center">
    <div class="col-md-4 mb-4 float-left">
        @if($details)
        <div class="card">
            <div class="card-body text-center">
                <h5 class="mt-0 mb-1 mb-2">{{$details-> title}}</h5>
                <p class="grey-text mb-2" >{{$details-> description}}</p>
                <p class="grey-text mb-2" id="price" >{{$details-> price}}</p>
                <img
                    src="https://www.91-img.com/pictures/133432-v4-xiaomi-mi-a3-mobile-phone-large-1.jpg?tr=q-60"
                    class="my-3" alt="Angular logo">
                <br>
                <br>

                <a id="checkout"
                   role="button" class="btn  btn-success px-3 waves-effect waves-light"> شراء المنتج
                </a>
            </div>

        </div>
            @endif

    </div>

    <div class="col-md-4 mb-4 float-left">
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
        <div class="clearfix">...</div>


        <!--Grid column-->

    <div class="col-md-6">


    </div>
    </div>
    @stop

    @section('scripts')
        <script>


            $(document).on('click', '#checkout', function(e){
                e.preventDefault();

                     /*  $.ajaxSetup({
                            data: {
                                _token: $('meta[name="csrf-token"]').attr('content')
                            }
                        });
*/
                $.ajax({
                    type: 'get',
                    url: "{{route('offers.checkout')}}",
                    data: {
                        price: $('#price').text(),
                        offer_id: "{{$details -> id}}",
                    },

                    success: function (data){
                        if(data.status == true){
                            $('#showPayForm').empty().html(data.content);

                        }else{

                        }


                    }, error: function (reject){

                    }
                });

            })

        </script>
@stop
