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
                   <i class="fa fa-angle-down"></i>
               </div>
               <div>
                    <a href="/shipping_and_handling">Shipping & Handling</a>
                    <i class="fa fa-angle-right"></i>
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
                    <h4>How to make a purchuse?</h4>
                    <p>Once you’ve clicked through to Secure Checkout, you can enter your delivery address and choose a shipping method. Shipping costs are then calculated and tacked on to your subtotal at the bottom of the page.</p>
                </div>
                <div>
                    <h4>Mogu li naručiti proizvode putem kompanije ili kao kompanija?</h4>
                    <p>Da, jednostavno možete naručiti proizvode putem kompanije ili kao kompanija (pravna osoba). U postupku narudžbine obavezno upišite podatke o kompanijji u polje podaci, i u sledećem koraku odaberite način plaćanja. U slučaju kupovine u ime kompanije, dužni ste kao ovlašćena osoba koja može kupovati u ime kompanije unijeti ispravne podatke kao garancija za njihovu tačnost.</p>
                </div>
                <div>
                    <h4>Do I have to register to be able to buy products on Urban One website?</h4>
                    <p>We rely on a global network of shipping services (UPS, FedEx, DHL) as well as local postal services (USPS) to get your order to your doorstep as soon as possible. For this reason, tracking is not always available</p>
                </div>
                <div>
                    <h4>Am I able to cancel my order?</h4>
                   <p>Ako ste potvrdili narudžbinu i već ste dobili potvrdu putem e-pošte, narudžbina semože otkazati samo do kraja istog dana porudzbine na buy@urbanone.me</p>
                </div>
                <div>
                    <h4>How could I know if my order has been confirmed?</h4>
                    <p>Nakon što potvrdite narudžbinu, provjerite svoju e-poštu koju ste naveli prilikom naručivanja proizvoda jer ćete na navedenu adresu primiti poruku potvrde. Ako poruku ne primite, preporučujemo da proverite odjeljak "Neželjena pošta". Zbog različitih postavki mreže ili računara tamo se može nalaziti potvrda vaše narudžbine. Ako u tom odjeljku ne možete pronaći poruku potvrde, kontaktirajte nas putem e-maila na buy@urbanone.me Ukoliko ste se registrovali za kupovinu u internet prodavnici, možete jednostavno pregledati svoje narudžbine na profilu koji ste kreirali.</p>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.subscribe')
@endsection