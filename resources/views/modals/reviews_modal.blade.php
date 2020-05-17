<!-- Modal -->
<div class="modal fade" id="reviews-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body" >
          <h5 style="text-align: center;margin-bottom: 40px;">Reviews</h5>
            @php 
                $reviews = DB::table('reviews')->orderBy('id', 'desc')->where('product_id', $product->id)->get(); 
            @endphp 
            @foreach ($reviews as $review)
                <div style="margin: 50px 0;" >
                    <p>stars icon</p>
                    <h6>{{ $review->review_title }}</h6>
                    <p>by {{$review->person_name}}, on {{date('F j, Y', strtotime($review->created_at))}}</p>
                    <p>{{$review->review_content}}</p>
                </div>
            @endforeach
        </div>
      </div>
    </div>
  </div>