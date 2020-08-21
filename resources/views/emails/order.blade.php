<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    Poštovani, <br>

    Hvala vam što korisitine naše usluge. <br>
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
   
</body>
</html>