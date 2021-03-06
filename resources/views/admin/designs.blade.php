@extends('admin.master')

@section('content')


  <div class="col-md-10">
    <main role="main" >
      <div class="row">
          @foreach ($designs as $design)
          <div class="col-3 my-4">
              <div class="design-box">
              <a href="/admin/showDesign/{{$design->id}}">
                  <div class="design-image desiImg">
                    <img src="/design/{{$design->name}}" style="max-witdh:100%;max-height:100%;margin:auto">
                  </div>
                </a>
                <form action="{{ route('destroy.design', $design->id) }}" method="POST">
                  @csrf
                  <button type="submit" class="btn btn-sm btn-danger">Delete</button>
              </form> 
                <div class="count-product">
                  <p style="text-align:center;">
                  <?php
                      $count = DB::table('product')->where('design_id', $design->id)->groupBy('design_id')->count(); ?>
                    <span>{{$count}}</span>
                    Products with this design
                  </p>
                 
                </div>
              </div>
            </div>
          @endforeach
        </div>
    </main>
  </div>
@endsection