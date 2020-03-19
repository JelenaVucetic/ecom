<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="/css/5star.css">
       
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="/js/jQuery.js"></script>
        <link rel="stylesheet" href="/css/header.css">
        <link rel="stylesheet" href="/css/welcome.css">
        <link rel="stylesheet" href="/css/cardDesign.css">
        <link rel="stylesheet" href="/css/footer.css">

       <!--  Payment script -->
       <script data-main="payment-js" src="https://asxgw.com/js/integrated/payment.1.2.min.js"></script>

    </head>
    <body>
    @include('layouts.header')
    @include('layouts.hero')
    @yield('content')
    @include('layouts.footer')

    <script type="text/javascript">
    var payment = new PaymentJs();
    var publicIntegrationKey = 'Etl3lMjFydB0a2tloU09';
    /* var numberDiv = document.getElementById('number_div').innerHTML;
    var cvvDiv = document.getElementById('cvv_div').innerHTML; */
    payment.init(publicIntegrationKey, 'number_div','cvv_div', function(payment) {
        payment.setNumberStyle({ 
            'border': '1px solid red', 
            'width': '150px' 
        });
        payment.setCvvStyle({ 
            'border': '1px solid red', 
            'width': '150px' 
         });
        payment.numberOn('input', function(data) {
            alert('A number was entered');
        });
        payment.initRiskScript({type:'kount'});
    });


    function interceptSubmit() {
    var data = {
        first_name: $('#firstname').val(),
        last_name: $('#lastname').val(),
        month: $('#exp_month').val(),
        year: $('#exp_year').val(),
        email: $('#email').val()
    };
    payment.tokenize(
        data, //additional data, MUST include card_holder (or first_name & last_name), month and year
        function(token, cardData) { //success callback function
            $('#transaction_token').val(token); //store the transaction token
            $('#payment_form').get(0).submit(); //submit the form
        }, 
        function(errors) { //error callback function
            alert('Errors occurred');
            //render error information here
        }
    );
}
    </script>

    

    </body>
    
</html>
