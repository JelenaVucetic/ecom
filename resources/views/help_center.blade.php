@extends('layouts.master')
@section('changed_header')
<link rel="stylesheet" href="/css/changed_header.css">
@endsection
@section('content')
    <div class="container-fluid copyright" style="height: auto">
        <div class="row">
            <div class="col-xs-6 col-sm-3 " id="side">
                <div>
                    <a href="/about">About us</a>
                    <i class="fa fa-angle-right"></i>
                </div>
               <div>
                   <a href="/how_to_order">How to order</a>
                   <i class="fa fa-angle-right"></i>
               </div>
               <div>
                    <a href="/shipping_and_handling">Shipping & Handling</a>
                    <i class="fa fa-angle-right"></i>
               </div>
               <div>
                    <a href="/help_center">Help center</a>
                    <i class="fa fa-angle-down"></i>       
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
            <div class="col-xs-6 col-sm-9 copy-right">
                <div>
                    <h4>Returning and Cancellation</h4>
                    <p>If you have purchased a product that you believe to be defective (damaged or simply does not match
                        the product you ordered), you can report the defect within two days of delivery. To exercise these
                        rights, you must notify us in writing of the deficiency at buy@urbanone.me with a detailed description
                        and a picture of the deficiency. <br>
                        Shipping costs are borne by the buyer. If the material defect is justified, the shipping costs will be
                        compesated to the customer. The buyer will be notified of the resolution of the complaint within eight
                        days of receipt of the product, and the product will be replaced with a correct one or, if agreed
                        differently, money will be returned to the account.
                        Once you order and pay for a product, cancellation is only possible within the same day by notifying us
                        at buy@urbanone.me. In this case you will receive a confirmation mail and the money will be returned
                        to your account. </p>
                </div>
                <div>
                    <h4>Security Statement and Payment Methods</h4>
                    <p>We implement a number of technical and organizational measures to ensure the protection of personal
                        data during collection, transfer and storage. Monargo endeavors to appropriately protect your personal
                        information, but does not guarantee the complete security of the personal information you provide to
                        us and is not responsible for the theft, destruction, loss, intentional or unintentional disclosure of your
                        personal information or information about you. Monargo adheres to generally accepted standards for
                        the protection of information received during transmission as well as after receipt, but no electronic
                        transmission or storage is 100% secure, so we cannot guarantee complete security. Monargo uses SSL
                        technology (Secure Sockets Layer) to secure the encryption of personal and credit card information.
                        Monargo cooperates with a company that ensures the security of our services and your personal
                        information. Monargo users are additionally protected by changing the firewall and other technologies
                        to ensure data protection.
                        Method of payment
                        Urban One made Credit Card Payment possible. In our online store you can buy using credit cards MasterCard, Maestro, Visa .</p>
                </div>  
                <div>
                    <h4>Payment conversion statement</h4>
                    <p>Please note that all payments will be effected in the 
                        Montenegrian currency – euro (EUR). If the payment is done using 
                        foreign issuers payment cards, total amount of transaction will be 
                        converted into bank settlement currency, according to the current exchange 
                        rate of the Montenegrian National Bank. Once transaction is settled the already 
                        converted amount will be converted into your local currency according to the exchange 
                        rate of credit card associations. As a result of this conversion there is a possibility
                         of a slight difference from the original price stated in our web site. 

                    </p>
                </div>  
                <div>
                    <h4>Data protection when paying</h4>
                    <p>When entering payment card data, confidential information is transmitted via the public network in a protected (encrypted)
                         form using the SSL protocol, using the most modern methods of tokenization of sensitive data, and in accordance 
                         with PCI-DSS standards. At no time is the payment card information available to the merchant.
                        3D Secure protection for all merchants and customers - AllSecure Payment Gateway uses the highest global standards of
                         data protection and privacy. All merchants using the AllSecure Payment Gateway are automatically included in 3D-Secure 
                         protection, guaranteeing customers the security of their purchases. Customer payment card numbers are not stored on 
                         the merchant's system and the registration itself is protected by SSL data encryption.
                        PCI DSS Standards - AllSecure Payment Gateway is constantly complying with all the requirements of card organizations 
                        in order to increase the level of security of merchants and customers. From 2005 until today, without interruption,
                         the system has been certified as PCI-DSS Level 1, which is the highest standard in the industry. The PCI Data Security 
                         Standard (PCI-DSS) is a standard that defines the necessary security measures when processing, storing and transmitting
                          sensitive card data. PCI Standards protect sensitive cardholder data during the entire payment process: from the moment 
                          of entering data at the merchant's point of sale, during communications between the merchant and relevant banks and card 
                          organizations, as well as the subsequent storage of this data.
                    </p>
                </div>  
            </div>
        </div>
    </div>
    @include('layouts.subscribe')
@endsection