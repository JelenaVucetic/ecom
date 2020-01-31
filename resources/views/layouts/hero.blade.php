<section class="jumbotron text-center">
    <div class="container">
      <h1>Album example</h1>
      <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
    <div style="display: flex;justify-content: space-around;">
    @foreach($categories as $category)
        <div class="dropdown">
        
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <a href="" style="color:white;"> {{ ucwords($category->name) }}</a> 
            </button>
            @if ($category->children)
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            @foreach ($category->children as $child)
                <a class="dropdown-item" href="{{url('/show_category_product')}}/{{$child->id}}">{{ ucwords($child->name) }}</a>
                @endforeach
            </div>
            @endif
        </div>
        @endforeach 
    </div>
    </div>
  </section>