var payment = new PaymentJs();
var publicIntegrationKey = 'Etl3lMjFydB0a2tloU09'; 
//var numberDiv = document.getElementById('number_div');
//var cvvDiv = document.getElementById('cvv_div');  
payment.init('Etl3lMjFydB0a2tloU09', 'number_div', 'cvv_div', function(payment) {
    payment.setNumberStyle({ 
        //'border': '1px solid red', 
        'width': '178px',
        'height': '30px'
    });
    payment.setCvvStyle({
       // 'border': '1px solid red', 
       'width': '178px',
       'height': '30px'
     });
    payment.numberOn('input', function(data) {
       // console.log(data);
    })
    payment.cvvOn('input', function(data) {
        //console.log(data);
    })
   
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
            console.log(cardData);
               $('#transaction_token').val(token); //store the transaction token
               $('#payment_form').get(0).submit(); //submit the form
           }, 
           function(errors) { //error callback function
            console.log(errors);
            $('#monthError').html(' ');
            $('#yearError').html(' ');
            $('#cardError').html(' ');
            $('#cvvError').html(' ');
            for (let i = 0; i < errors.length; i++) {
                if(errors[i].attribute== 'month') {
                    if(errors[i].message) {
                        $('#monthError').html(errors[i].message);
                    } else {
                        $('#monthError').html(' ');
                    }
                } else if(errors[i].attribute== 'year') {
                    if(errors[i].message) {
                        $('#yearError').html(errors[i].message);
                    } else {
                        $('#yearError').html(' ');
                    }
                } else if(errors[i].attribute== 'number') {
                    if(errors[i].message) {
                        $('#cardError').html(errors[i].message);
                    } else {
                        $('#cardError').html(' ');
                    }
                }else if (errors[i].attribute== 'cvv') {
                    if(errors[i].message) {
                        $('#cvvError').html(errors[i].message);
                    } else {
                        $('#cvvError').html(' ');
                    }
                } else {
                    console.log('ok')
                }
            }
         }
       );
   }


