@extends('layouts.master')
@section('changed_header')
<link rel="stylesheet" href="/css/changed_header.css">
@endsection
@section('content')
    <div class="container-fluid shipping">
        <div class="row">
            <div class="col-xs-6 col-sm-3 " id="side">
               <div>
                   <a href="/how_to_order">How to order</a>
                   <i class="fa fa-angle-right"></i>
               </div>
               <div>
                    <a href="/shipping_and_handling">Shipping & Handling</a>
                    <i class="fa fa-angle-down"></i>
               </div>
               <div>
                    <a href="/help_center">Help center</a>
                    <i class="fa fa-angle-right"></i>
               </div>
               <div>
                    <a href="/copyright">Copyright</a>
                    <i class="fa fa-angle-right"></i>
               </div>
               <div>
                    <a href="/contact_us">Contact us</a>
                    <i class="fa fa-angle-right"></i>
               </div>
            </div>
            <div class="col-xs-6 col-sm-9 shipping-right">
                <div>
                    <h4>Can I track my package?</h4>
                    <p>Da. Kada potvrdite i pošaljete narudžbinu, dobićete e-mail poruku sa potvrdom koja će vam omogućiti pristup podacima o statusu vaše pošiljke.</p>
                </div>
                <div>
                    <h4>How can I change my order?</h4>
                    <p>Ako ste potvrdili narudžbinu i već ste dobili potvrdu putem e-pošte, narudžbinu više nije moguće promijeniti. Ako smatrate da je došlo do greške, predomislili ste se ili želite zamijeniti, ukloniti ili dodati proizvod u narudžbini, kontaktirajte nas na buy@urbanone.me i zatim ćemo, ukoliko bude moguce tj ukoliko nas obavijestite pravovremeno, pokrenuti postupak promjene u narudžbini</p>
                </div>
                <div>
                    <h4>Am I able to change shipping adress after my order has been confirmed?</h4>
                    <p>Ako ste već primili poruku potvrde e-poštom, više ne možete promijeniti adresu za dostavu. To možemo mi učiniti za vas ali samo ako nas obavjestite o ovoj promjeni pravovremeno, odnosno isti dan kada ste primili poruku potvrde. U tom slučaju, molimo da nas kontaktirate na buy@urbanone.me</p>
                </div>
                <div>
                    <h4>How has my package been delivered?</h4>
                    <p>Dostava je na adresi koju ste naleli u narudzbenici kurirskom sluzbom ili postom</p>
                </div>
                <div>
                    <h4>Shipping cost?</h4>
                    <p>Troskovi dostave iznose 2.5e za sve gradove Crne Gore. <br> Ukoliko ukupna cifra Vase porudzbine prelazi 35e dostava je besplatna.</p>
                </div>
                <div>
                    <h4>What is an average delivery time?</h4>
                    <p>Rok dostave za robu kupljenu u internet prodavnici je dva do tri radna dana. Rok počinje kada narudžbinu potvrdi internet prodavnica ili prvog radnog dana nakon podnošenja naloga</p>
                </div>
                <div>
                    <h4>What do I need to know about delivery at the willing adress?</h4>
                    <p>Na primer, ako naručujete dostavu proizvoda na kućnu adresu a: <br> narudžbinu ste već platili, ali u trenutku dostave niste kod kuće, prevoznik je dužan da obavijesti Pošiljaoca o nemogućnosti uručenja pošiljke, u kom slučaju je Pošiljalac dužan da Prevozniku izda dodatna uputstva. <br> U slučaju da kupac ne preuzme robu u dogovorenom vremenskom roku, a želi ponovo dostavu, kupcu se obračunavaju dvostruki troškovi dostave.</p>
                </div>

            </div>
        </div>
    </div>
    @include('layouts.subscribe')
@endsection