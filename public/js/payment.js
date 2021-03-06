var payment = new PaymentJs();
var publicIntegrationKey = 'NfvQALTGA3lmJxQbzDeR'; 
//var numberDiv = document.getElementById('number_div');
//var cvvDiv = document.getElementById('cvv_div');  
payment.init('NfvQALTGA3lmJxQbzDeR', 'number_div', 'cvv_div', function(payment) {
    var focusStyle = {
        'outline': 'none',
        'box-shadow': 'none',
        'border-bottom': '1px solid #404040'
      };

    payment.setNumberStyle({ 
        //'border': '1px solid red', 
        'width': '100%',
        'height': '30px',
        'border-top': 'none',
        'border-left': 'none',
        'border-right': 'none'
    });
    payment.setCvvStyle({
       // 'border': '1px solid red', 
       'width': '100%',
       'height': '30px',
       'border-top': 'none',
       'border-left': 'none',
       'border-right': 'none'
     });
  
     // Focus events
        payment.numberOn('focus', function() {
            numberFocused = true;
            payment.setNumberStyle(focusStyle);
        });
        payment.cvvOn('focus', function() {
            cvvFocused = true;
            payment.setCvvStyle(focusStyle);
        });
   
});
function interceptSubmit() {
            var data = {
                first_name: $('#firstname').val(),
                last_name: $('#lastname').val(),
                email: $('#email').val(),
                phone: $('#phone').val(),
                street: $('#street').val(),
                zip: $('#zip').val(),
                city: $('#city').val(),
                card_holder: $('#card_holder').val(),
                month: $('#exp_month').val(),
                year: $('#exp_year').val(),
            
            };
       payment.tokenize(
           data, //additional data, MUST include card_holder (or first_name & last_name), month and year
           function(token, cardData) { //success callback function
            console.log(cardData);
               $('#transaction_token').val(token); //store the transaction token
                $('#payment_form').append('<input type="hidden" name="firstname" value="'+ data.first_name +' " /> ');
                $('#payment_form').append('<input type="hidden" name="lastname" value="'+ data.last_name +' " /> ');
                $('#payment_form').append('<input type="hidden" name="email" value="'+ data.email +' " /> ');
                $('#payment_form').append('<input type="hidden" name="phone" value="'+ data.phone +' " /> ');
                $('#payment_form').append('<input type="hidden" name="street" value="'+ data.street +' " /> ');
                $('#payment_form').append('<input type="hidden" name="zip" value="'+ data.zip +' " /> ');
                $('#payment_form').append('<input type="hidden" name="city" value="'+ data.city +' " /> ');
               $('#payment_form').get(0).submit(); //submit the form
           }, 
           function(errors) { //error callback function
            console.log(errors);
            $('#cardHolderError').html(' ');
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
                } else if (errors[i].attribute== 'card_holder') {
                    if(errors[i].message) {
                        $('#cardHolderError').html(errors[i].message);
                    } else {
                        $('#cardHolderError').html(' ');
                    }
                } else {
                    console.log('ok')
                }
            }
         }
       );
   }
