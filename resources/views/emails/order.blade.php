<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div style="margin:20px 0;">
        Poštovani, <br><br>
    </div>
    
    <div>
        Hvala vam što korisitine naše usluge. <br> <br> <br>
        Vaša porudžbina će biti dostavljena u roku od 5 radnih dana.
    </div>
 
    Detalji vaše porudžbine: <br>
    <div>
        Status transakcije: <strong>{{$status}}</strong>
    </div>
   <div>
        Broj porudžbine: <strong>{{$order_number}}</strong>
   </div>
   <div>
   Autorizacioni kod: <strong>{{$extra_data}}</strong>
</div>
   <div>
    Ukupan iznos: <strong>{{$amount}}</strong>
   </div>
   
   <div>
    Tip kartice: <strong>{{$card_type}}</strong>
   </div>
    <div>
        Poslednje 4 cifre: <strong>{{$last_four_digits}}</strong>   
    </div>
   <div>
       Srdačno, <br> <br>
       Urban One
   </div>
</body>
</html>