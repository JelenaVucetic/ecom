var payment = new PaymentJs();
var publicIntegrationKey = 'Etl3lMjFydB0a2tloU09'; 
//var numberDiv = document.getElementById('number_div');
//var cvvDiv = document.getElementById('cvv_div');  
payment.init('Etl3lMjFydB0a2tloU09', 'number_div', 'cvv_div', function(payment) {
    payment.setNumberStyle({ 
        'border': '1px solid red', 
        'width': '150px' 
    });
    payment.setCvvStyle({
        'border': '1px solid red', 
        'width': '150px' 
     });
    payment.numberOn('input', function(data) {
        console.log(data);
    })
    payment.cvvOn('input', function(data) {
        console.log(data);
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
               alert('Success occurred');
           }, 
           function(errors) { //error callback function
            console.log(errors);
               alert('Errors occurred');
         }
       );
   }


