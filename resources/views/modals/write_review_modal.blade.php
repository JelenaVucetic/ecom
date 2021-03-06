<!-- Modal -->
<div class="modal fade" id="writeReviewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Write your review</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
@php 
    if(Auth::check()) {
            $userId = Auth::id();
    } else {
        $userId = 0;
    }
@endphp      
      <div>
        <!--   Rating section -->
        <section class='rating-widget'>
            <!-- Rating Stars Box -->
            <div class='rating-stars'>
              <ul id='stars'>
                <li class='star' title='Poor' data-value='1'>
                  <i class='fa fa-star fa-fw'></i>
                </li>
                <li class='star' title='Fair' data-value='2'>
                  <i class='fa fa-star fa-fw'></i>
                </li>
                <li class='star' title='Good' data-value='3'>
                  <i class='fa fa-star fa-fw'></i>
                </li>
                <li class='star' title='Excellent' data-value='4'>
                  <i class='fa fa-star fa-fw'></i>
                </li>
                <li class='star' title='WOW!!!' data-value='5'>
                  <i class='fa fa-star fa-fw'></i>
                </li>
              </ul>
            </div>
          
          <div class='success-box'>
            <div class='clearfix'></div>
            <img alt='tick image'style="width:30px" src='data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA0MjYuNjY3IDQyNi42NjciIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDQyNi42NjcgNDI2LjY2NzsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSI1MTJweCIgaGVpZ2h0PSI1MTJweCI+CjxwYXRoIHN0eWxlPSJmaWxsOiM2QUMyNTk7IiBkPSJNMjEzLjMzMywwQzk1LjUxOCwwLDAsOTUuNTE0LDAsMjEzLjMzM3M5NS41MTgsMjEzLjMzMywyMTMuMzMzLDIxMy4zMzMgIGMxMTcuODI4LDAsMjEzLjMzMy05NS41MTQsMjEzLjMzMy0yMTMuMzMzUzMzMS4xNTcsMCwyMTMuMzMzLDB6IE0xNzQuMTk5LDMyMi45MThsLTkzLjkzNS05My45MzFsMzEuMzA5LTMxLjMwOWw2Mi42MjYsNjIuNjIyICBsMTQwLjg5NC0xNDAuODk4bDMxLjMwOSwzMS4zMDlMMTc0LjE5OSwzMjIuOTE4eiIvPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K'/>
            <div class='text-message'></div>
            <div class='clearfix'></div>
          </div>
                            
              <form action="{{url('/addReview')}}" method="post" onsubmit="return validateForm();">
                @csrf          
                  <input type="hidden" id="starsVal" value="" name="starsVal">
                  <input type='hidden' name="userId"  value="{{ $userId }}">
                  <input type="hidden" name="product_id" value="{{$product->id}}">

                    <div class="form-group row login-filds">
                      <label for="person_name" class="col-form-label">{{ __('Name') }}</label>

                      <div class="">
                        <input type="text" class="form-control @error('person_name') is-invalid @enderror" name="person_name" value="{{ old('person_name') }}" required autocomplete="person_name" autofocus>

                        @error('person_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row login-filds">
                      <label for="review_title" class="col-form-label">{{ __('Title') }}</label>

                      <div class="">
                          <input  type="text" class="form-control @error('review_title') is-invalid @enderror" name="review_title" value="{{ old('review_title') }}" required autocomplete="review_title" autofocus>

                          @error('review_title')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </div>
                    </div>
                    <div class="form-group row login-filds">
                      <label for="review_content" class="col-form-label">{{ __('Content') }}</label>

                      <div class="">
                          <input type="text" class="form-control @error('review_content') is-invalid @enderror" name="review_content" value="{{ old('review_content') }}" required autocomplete="review_content" autofocus>

                          @error('review_content')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </div>
                    </div>

                    <div class="form-group button-for-login">
                      <button type="submit">
                                {{ __('Submit') }}
                            </button>
                    </div>
{{-- 
                    <input type="text"  placeholder="Your Name"/>
                    <span style="color:red">{{ $errors->first('person_name') }}</span>   
                    <input type="text", name="review_title" placeholder="Title"/>
                    <span style="color:red">{{ $errors->first('review_title') }}</span> 

                    <textarea name="review_content" ></textarea> 
                    <span style="color:red">{{ $errors->first('review_content') }}</span> 
                    <br>
                    <b>Rating: </b>  <br>
                        
                    <button type="submit" class="btn btn-success">
                        Submit
                    </button>
                    --}}
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>