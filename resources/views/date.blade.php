@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <label for="from">From</label>
            <input type="text" id="from1" name="from">
            <label for="to">to</label>
            <input type="text" id="to1" name="to">

        </div>
    </div>
@endsection

@section('scriptForm')
    <script>
        $( function() {
            var dateFormat = "mm/dd/yy",
                from = $( "#from1" )
                    .datepicker({
                        defaultDate: "+1w",
                        changeMonth: true,
                        numberOfMonths: 3
                    })
                    .on( "change", function() {
                        to.datepicker( "option", "minDate", getDate( this ) );
                    }),
                to = $( "#to1" ).datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    numberOfMonths: 3
                })
                    .on( "change", function() {
                        from.datepicker( "option", "maxDate", getDate( this ) );
                    });

            function getDate( element ) {
                var date;
                try {
                    date = $.datepicker.parseDate( dateFormat, element.value );
                } catch( error ) {
                    date = null;
                }

                return date;
            }
        } );
    </script>


    @stop
