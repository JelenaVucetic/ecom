@extends('admin.master')

@section('content')

<section id="cart_items" class="mx-auto my-5 shadow-sm col-8">
<div class="initial">
        <div class="card-header">
            <h3>
                    <span style="color:green">PRVA VERZIJA </span>, 
                   Dobrodosli
                </h3>
            </div>
           
            <div class="table-responsive">
                <table border="0" cellpadding="1" cellspacing="1" class="general-table" style="width:100%">
                    <tbody>
                        <tr>
                            <th>v1.0</th>
                            <th>10.26.2020</th>
                        </tr>
                        <tr>
                            <td>Novosti</td>
                            <td>
                            <ul>
                            <li><h5>ADMIN PAGE</h5></li>
                            <li><b>Dodavanje proizvoda:</b>
                                <ul>

                            <li> Uplodovanjem dizajna na "Work" stranu prikazuju se svi proizvodi sa dodatim dizajnom.</li>
                            <li>  Za svaki proizvod ima opcija "Edit" i "Enable", klikom na edit prikazuje se canvas sa dizajnom i moguce je pomjerati i mjenjati velicinu dizajna kako vama odgovara, kreirati paterne i vertikalne paterne.</li> 
                            <li>  Klikom na enable, proizvod je spreman za cuvanje u bazu. Na dnu stranice potrebno je unijeti naziv proizvoda, tagove, opis i cekirati opciju za pol (man/woman/unisex). </li>
                            <li>  Nakon ispunjavanja forme i odabranih proizvoda klikom na dugme Save, kreiraju se proizvodi i na serveru program zaduzen za kreiranje mockupova "ImageMagick". </li>
                            <li>   ImageMagick generise slike za odredjene proizvode i cuva ih u foldere, nakon toga ih povezuje u tabeli sa proizvodima.</li>
                            </ul>
                            <b>  Dodavanje kategorija:</b>
                            <ul>
                            <li>   Ulaskom na stranicu "Add category" iz opadajuceg menija bira se glavna kategorija kojoj pripada podkategorija koja se unosi. </li>
                            <li>   Ispod tog menija se unosi naziv podkategorije koju zelimo da dodamo. Takodje treba dodati sliku za tu kategoriju.</li>
                            </ul>
                            <b>  Editovanje kategorija:</b>
                            <ul>
                            <li>    Na stranicu "Categories" prikazuju se sve kategorije i pored svakog naziva kategorije pise da li je kategorija aktivna ili neaktivna. </li>
                            <li>     Za svaku kategoriju imamo tri opcije: Edit, Enable, Disable. Klikom na Edit otvara se nova strana dje se moze promjeniti naziv i slika kategorije. </li>
                            <li>   Klikoma na Enable aktivira se kategorija, dok na klikom Disable se deaktivira i ta kategorija nece biti vidljiva na sajt.</li>
                            </ul>
                            <b>  Editovanje proizvoda:</b>
                            <ul>
                            <li>  Na stranicu "Products" izlistavaju se svi proizvodi.</li>
                            <li>  Za svaki proizvod ima opcija Edit i Delete, klikom na Edit otvara se nova stranica i prikazuju se sve informacije za taj proizvod i mogucnost mjenjanja svih njegovih atributa. </li>
                            <li>   Klikom na Delete taj proizvod se brise iz baze i nije vise vidljiv na sajtu.</li>
                            </ul>
                            <b>  Editovanje Dizajna:</b>
                            <ul>
                            <li>    Na stranicu "Designs" izlistavaju se svi dizajni i ispod svakog dizanja nalazi se dugme delete, klikom na to dugme brise se sam dizajn i svi proizvodi koji pripadaju tom dizajnu. </li>
                            <li>   Moguce je uci na dizajn klikom na njegovu sliku i otvara se strana koja prikazuje sve proizvode tog dizajna i na dnu stranice moguce je promjeniti ime, tagove, opis i pol za sve proizvode koje pripadaju tom dizajnu. </li>

                            </ul>
                            </li>
                            <hr/>
                            <li><h5>WEBSITE</h5></li>
                            <li><b>Search opcija:</b>
                                <ul>
                            <li> Unosom teksta na "Search design and products" polje provjerava se svaki proizvod i dizajn iz baze podataka da li njegovo ime, tagovi ili opis sadrzi unijeti tekst i otvara se nova stranica gdje se prikazuju proizvodi koji sadrze unesene parametre za pretragu.</li> 
                            </ul>
                            <b> Kategorije:</b>
                            <ul>
                            <li>  U hederu sajta izlistavaju se sve aktivne kategorije.</li>
                            </ul>
                            <b>Proizvodi:</b>
                            <ul>
                            <li>  Klikom na proizvod otvara se nova stranica sa tim proizvodom. </li>
                            <li> Prikaz dizajna kojoj proizvod pripada(dizajn je zasticen sa watermarkom), prikaz mockup proizvoda, i prikaz samog proizvoda bez dizajna.</li>
                            <li>  Sa desne strane se nalaze opcije u zavisnosti od kategorije tog proizvoda (velicina/boja/model) i prikazuje se cijena tog proizvoda.</li>
                            <li> Odabirom tih opcija mjenja se mockup proizvoda i te opcije su potrebne kako bi korisnik mogao da doda taj proizvod u svoju korpu. </li>
                          </ul>
                            <b> Korpa:</b>
                            <ul>
                            <li> Na svaku stranicu proizvoda nalazi se dugme "Add to cart", klikom na to dugme dodaje se proizvod u korpu.</li>
                            <li> Klikom na ikonicu korpe u gornjem desnom uglu otvara se strana dje se prikazuju svi proizvodi koji su dodati u korpu. </li>
                            <li>   Prikazuju se osnovne informacije o proizvodu i njegova cijena. Mozete povecati kolicinu proizvoda kojeg zelite da porucite a takodje mozete ukloniti proizvod iz korpe.</li>
                            </ul>
                            <b> Checkout:
                            </b>
                            <ul>
                            <li> Checkout stranica se nalazi na istu stranicu kao i Korpa, nakon unijetih proizvoda u korpu, unose se informacije o korisniku(ime,preizme,email,adresa itd..).</li>
                            <li>  Na dnu stranice nakon ispunjenih podataka o korisniku potrebno je unijeti podatke o kartici. </li>   
                            <li> Klikom na dugme "Pay" forma se salje na server dje se provjerava validnost unijetih podataka i na osnovu tih podataka transakcija se odbrava. </li>   
                            <li>  U zavisnosti od prolaska transakcije ili odbijanja transakcije korisniku se prikazuje odgovarajuca strana. </li>   
                            </ul>
                            <b> Wishlist:
                            </b>
                            <ul>
                            <li> Na stranici proizvoda je opcija za dodavanje proizvoda u listu omiljenih.</li>
                            <li> U gornjem desnom uglu sajta nalazi se ikonica "srce" kako bi mogli korisnici da vide koje su proizvode sacuvali u listu.</li>   
                            </ul>
                            </li>
                            </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>Upcoming</td>
                            <td>
                            <ul>
                                <li>Small revamp to the top half section of city homepage</li>
                                <li>Re-writing of meeting modules front and back-end</li>
                                <li>Mayor's Cabinet Page</li>
                            </ul>
                            </td>
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>

</section>

@endsection
 