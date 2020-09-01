@extends('layouts.master')

@section('content')
<div class="container-fluid shipping">
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
                <i class="fa fa-angle-right"></i>
           </div>
           <div>
                <a href="/copyright">Copyright</a>
                <i class="fa fa-angle-right"></i>
           </div>
           <div>
                <a href="/privacy-policy">Privacy Policy</a>
                <i class="fa fa-angle-right"></i>
            </div>
            <div>
                <a href="/terms-and-conditions">Terms and Conditions</a>
                <i class="fa fa-angle-down"></i>
            </div>
           <div>
                <a href="/contact_us">Contact us</a>
                <i class="fa fa-angle-right"></i>
           </div>
        </div>
        <div class="col-xs-6 col-sm-9 shipping-right">
       <div>
           <h4>1. Delivery policy</h4>
           <div>
                <p> 
                    <span>1.1. Delivery time</span> <br> <br>                   
                    The average delivery time is 3 to 5 working days.
                </p> 
            </div>
            <div>
                <p><span>1.2. Delivery delay</span> <br>
                    In case of delayed delivery, the buyer has the right to cancel the purchase, 
                    in which case all money will be refunded.
                </p>
            </div>
            <div>
                <p><span>1.3.Delivery price</span> <br>
                    Shipping cost is 2.00 € for Podgrica and 3.00 € for every other city in Montenegro. <br>
                    If the total number of your order exceeds 35.00 € delivery is free.
                </p>
            </div>
            <div>
                <p><span>1.4. Delivery procedure</span> <br>
                    If you order product delivery to your home address and: <br>
                    you have already paid for the order, but at the time of
                     delivery you are not at home, the carrier is obliged to inform the 
                     sender of the inability to deliver the shipment, in which case the sender is
                      obliged to give the carrier additional instructions. <br> <br>
                    In case the buyer does not pick up the goods within the agreed time,
                     and wants delivery again, the buyer will be charged double shipping costs.                 
                </p>
            </div>
         </div>
         <div>
             <h4>2. Payment policy</h4>
             <div>
                <p> 
                    <span>2.1. Security Statement and Payment Methods</span> <br> <br>                   
                    We implement a number of technical and organizational measures to ensure 
                    the protection of personal data during collection, transfer and storage. Monargo endeavors to
                    appropriately protect your personal information, but does not guarantee the complete security of
                    the personal information you provide to us and is not responsible for the theft, destruction, loss, 
                    intentional or unintentional disclosure of your personal information or information about you. 
                    Monargo adheres to generally accepted standards for the protection of information received during 
                    transmission as well as after receipt, but no electronic transmission or storage is 100% secure,
                    so we cannot guarantee complete security. Monargo uses SSL technology (Secure Sockets Layer)
                    to secure the encryption of personal and credit card information. Monargo cooperates with a 
                    company that ensures the security of our services and your personal information. Monargo users
                    are additionally protected by changing the firewall and other technologies to ensure data protection.
                    Method of payment Urban One made Credit Card Payment possible.
                    In our online store you can buy using credit cards MasterCard, Maestro, Visa.
                </p> 
             </div>
             <div>
                <p> 
                    <span>2.2. Payment conversion statement</span> <br> <br>                   
                    Please note that all payments will be effected in Euro (EUR). If the payment is done using foreign issuers payment cards, total amount of transaction will be converted into bank settlement currency, according to the current exchange rate of Visa/Mastercard.
                </p> 
            </div>
            <div>
                <p> 
                    <span>2.3. Data protection when paying</span> <br> <br>                   
                        When entering payment card data, confidential information is transmitted via the public network
                        in a protected (encrypted) form using the SSL protocol, using the most modern methods of tokenization 
                        of sensitive data, and in accordance with PCI-DSS standards. At no time is the payment card information
                        available to the merchant. 3D Secure protection for all merchants and customers - AllSecure Payment 
                        Gateway uses the highest global standards of data protection and privacy. All merchants using the
                        AllSecure Payment Gateway are automatically included in 3D-Secure protection, guaranteeing customers 
                        the security of their purchases. Customer payment card numbers are not stored on the merchant's system
                        and the registration itself is protected by SSL data encryption. PCI DSS Standards - AllSecure Payment 
                        Gateway is constantly complying with all the requirements of card organizations in order to increase
                        the level of security of merchants and customers. From 2005 until today, without interruption,
                        the system has been certified as PCI-DSS Level 1, which is the highest standard in the industry.
                        The PCI Data Security Standard (PCI-DSS) is a standard that defines the necessary security measures 
                        when processing, storing and transmitting sensitive card data. PCI Standards protect sensitive 
                        cardholder data during the entire payment process: from the moment of entering data at the 
                        merchant's point of sale, during communications between the merchant and relevant banks and 
                        card organizations,as well as the subsequent storage of this data.
                </p> 
            </div>
            <div>
                <p> 
                    <span>2.4. Refund policy</span> <br> <br>                   
                    In the case of a refund to a customer who has previously paid with one of the payment cards,
                     in part or in full, and regardless of the reason for the refund, the refund is made exclusively 
                     through the same VISA, Maestro or MasterCard card used for payment. 
                    This means that our bank will, at our request, refund the funds to the cardholder's account.
                </p> 
            </div>
         </div>
         <div>
             <h4>3. Complaint policy</h4>     
             <div>
                <p>
                    Urban One assumes no responsibility for customer mistakes, wrongly purchased products or any other 
                    mistake related to your purchasing procedures on the Website. If you have any irregularities in the 
                    purchase of the product on the Website or you have not received the purchased product, please contact 
                    customer service (buy@urbanone.me)
                    and we will do our best to eliminate the irregularities in order to obtain the purchased product. 
                </p>
             </div>
             <div>
                <p><span>3.1.   The right to a refund or exchange of goods</span> <br>
                In case of withdrawal from the contract, the consumer has the right to a refund or 
                exchange for another product. The amount is returned to the customer upon receipt of the product,
                and after it is determined that the product was returned undamaged and correct.
                </p>
            </div>
         </div>
         
       </div>
        </div>
   </div>
   @include('layouts.subscribe')
@endsection