<script>
$(document).ready(function(){
<?php for($i=1;$i<20;$i++){?>
  $('#upCart<?php echo $i;?>').on('change keyup', function(){

  var newqty = $('#upCart<?php echo $i;?>').val();
  var rowId = $('#rowId<?php echo $i;?>').val();
  var proId = $('#proId<?php echo $i;?>').val();

   if(newqty <=0){ alert('enter only valid qty') }
  else {

    $.ajax({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        type: 'get',
        dataType: 'html',
        url: '<?php echo url('/cart/updateCart');?>/'+proId,
        data: "qty=" + newqty + "& rowId=" + rowId + "& proId=" + proId,
        success: function (response) {
            console.log(response);
            $('#updateDiv').html(response);
        }
    });
  }

  });
  <?php } ?>
});



</script>

@if(session('status'))
        <div class="alert alert-success">

            {{session('status')}}
        </div>
        @endif

          @if(session('error'))
        <div class="alert alert-danger">

            {{session('error')}}
        </div>
        @endif


<div class="table-responsive cart_info" style="padding-top:100px">
<table class="table table-condensed">
<thead>
<tr class="cart_menu">
<td class="image">Item</td>
<td class="description"></td>
<td class="price">Price</td>
<td class="quantity">Quantity</td>
<td class="total">Total</td>
<td></td>
</tr>
</thead>
<?php $count =1;?>
@foreach($cartItems as $cartItem)

<tbody>

<tr>
<td class="cart_product">
    <p><img  style="width:200px;" src="{{url('images',$cartItem->options->img)}}" class="card-img-top bmw" ></p>
</td>
<td class="cart_description">
    <h4><a href="{{url('/product_details')}}/{{$cartItem->id}}" style="color:blue">{{$cartItem->name}}</a></h4>
    <p>Product ID: {{$cartItem->id}}</p>
     <p>Only {{$cartItem->options->stock}} left</p>
</td>
<td class="cart_price">
    <p>${{$cartItem->price}}</p>
</td>
<td class="cart_quantity">
    <div class="cart_quantity_button">

      <input type="hidden" id="rowId<?php echo $count;?>" value="{{$cartItem->rowId}}"/>
        <input type="hidden" id="proId<?php echo $count;?>" value="{{$cartItem->id}}"/>

        <input type="number" size="2" value="{{$cartItem->qty}}" name="qty" id="upCart<?php echo $count;?>"
               autocomplete="off" style="text-align:center; max-width:50px; "  MIN="1" MAX="30">


    </div>
</td>
<td class="cart_total">
    <p class="cart_total-price">{{ $cartItem->subtotal }}</p>
</td>
<td class="cart_delete">
    <button class="btn btn-primary"><a href="{{ url('/cart/remove') }}/{{ $cartItem->rowId }}" class="cart_quantity_delete" style="background-color: red;">x</a></button>
</td>
</tr>

<?php $count++;?>
</tbody>  @endforeach
</table>
</div>