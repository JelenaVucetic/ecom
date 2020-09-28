@extends('admin.master')

@section('content')
<script>
    $(document).ready(function() {
        <?php for($i=1;$i<60;$i++) {?>
        $('#amountDiv<?php echo $i;?>').hide();
        $('#checkSale<?php echo $i;?>').show();

        $('#onSale<?php echo $i?>').click(function() {
            $('#amountDiv<?php echo $i;?>').show();
            $('#checkSale<?php echo $i;?>').hide();

            $('#saveAmount<?php echo $i;?>').click(function() {
                var salePrice<?php echo $i;?> = $('#spl_price<?php echo $i;?>').val();
                var pro_id<?php echo $i?> = $('#pro_id<?php echo $i;?>').val();
                $.ajax({
                    type: 'get',
                    dataType: 'html',
                    url: '<?php echo url('/admin/addSale');?>',
                    data: "salePrice=" + salePrice<?php echo $i;?> + "& pro_id=" + pro_id<?php echo $i;?>,
                    success: function(response) {
                        console.log(response);
                    }
                });
            });
        });
        $('#noSale<?php echo $i; ?>').click(function() {
            $('#amountDiv<?php echo $i;?>').hide();
            $('#checkSale<?php echo $i;?>').show();
        });
        <?php } ?>
    });
</script>
<div class="row" style="width: 80%; margin: auto;">
    <table class="table table-striped table-light">
        <thead>
        <tr>
            <th scope="col">Product id</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Image</th>
            <th scope="col">Price</th>
            <th scope="col">Category</th>
            <th scope="col">Tags</th>
            <th scope="col">On Sale</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php $count=1; ?>
        @forelse($products as $product)
        <tr>
            <th scope="row"> {{$product->id}}</th>
            <td> {{ $product->name }} </td>
            <td>{{ $product->description }}</td>
            <td><img src="{{url('images', $product->image)}}" alt="" style="width:100px;height:100px;"></td>
            <td>{{ $product->price }}&euro;</td>
            <td> {{$product->category_id}}</td>
            <td>  @foreach($product->tags as $tag)
                    <a href="/admin/product?tag={{$tag->name}}">{{ $tag->name }}</a>
                @endforeach
            </td>
            <td>
                <div id="checkSale<?php echo $count; ?>">
                    <input type="checkbox" id="onSale<?php echo $count; ?>">Yes
                </div>
                <div id="amountDiv<?php echo $count; ?>">
                    <input type="hidden" id="pro_id<?php echo $count; ?>" value="{{$product->id}}">
                    <input type="checkbox" id="noSale<?php echo $count; ?>">No <br>
                    <input type="text" id="spl_price<?php echo $count; ?>" size="12" value="12" placeholder="Sale Price"> <br>
                    <button type="submit" id="saveAmount<?php echo $count; ?>" class="btn btn-success">Save Amount</button>
                </div>
            </td>
            <td><a href="{{route('product.edit', $product->id)}}" class="btn btn-success btn small">Edit</a></td>
            {!! Form::open(['method' => 'DELETE', 'action' => ['ProductsController@destroy', $product->id ]]) !!}
            <td> <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger ">Delete</button></td>
            {!! Form::close() !!}
        </tr>
            <?php $count++ ?>
        @empty
            <h3>No products</h3>

        @endforelse
        </tbody>
    </table>
</div>
@endsection
