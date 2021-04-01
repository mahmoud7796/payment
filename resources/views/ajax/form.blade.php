@section('main')

    <script src="https://test.oppwa.com/v1/paymentWidgets.js?checkoutId={{$res['id']}}"></script>

    <form action="{{route('offers.details', $id)}}" class="paymentWidgets" data-brands="VISA MASTER MADA PAYPAL"></form>

@stop
