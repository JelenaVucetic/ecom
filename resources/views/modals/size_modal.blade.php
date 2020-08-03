
  <div id="my-modal-form" >
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Please choose a size</h5>
            </div>
            <div class="modal-body">
                @php $pro_cat = App\Product::find($product->id); @endphp
                @if ($pro_cat->category->name == "Kids T-Shirts")
                <div class="select-size">
                    <h5>Size</h5>
                      <label class="size2">
                          <input type="radio" name="kids-size" id="s2" value="2" class="kids-size-class">
                          <span>2</span>
                      </label>
                      <label class="size4">
                          <input type="radio" name="kids-size" id="s4" value="4" class="kids-size-class">
                          <span>4</span>
                      </label>
                      <label class="size6">
                          <input type="radio" name="kids-size" id="s6" value="6" class="kids-size-class">
                          <span>6</span>
                      </label>
                      <label class="size8">
                          <input type="radio" name="kids-size" id="s8" value="8" class="kids-size-class">
                          <span>8</span>
                      </label>
                      <label class="size10">
                          <input type="radio" name="kids-size" id="s10" value="10" class="kids-size-class">
                          <span>10</span>
                      </label>
                      <label class="size12">
                          <input type="radio" name="kids-size" id="s12" value="12" class="kids-size-class">
                          <span>12</span>
                      </label>
                  </div>
                @else
            <div class="select-size" style="margin: 0px 65px;">
                <label class="xs-size">
                    <input type="radio" name="size" id="xs" value="XS" class="size-modal">
                    <span>XS</span>
                </label>
                <label class="s-size">
                    <input type="radio" name="size" id='s' value="S" class="size-modal">
                    <span>S</span>
                </label>
                <label class="m-size">
                    <input type="radio" name="size" id="m" value="M" class="size-modal">
                    <span>M</span>
                </label>
                <label class="l-size">
                    <input type="radio" name="size" id='l' value="L" class="size-modal">
                    <span>L</span>
                </label>
                <label class="xl-size">
                    <input type="radio" name="size" id='xl' value="XL" class="size-modal">
                    <span>XL</span>
                </label>
                <label class="xxl-size">
                    <input type="radio" name="size" id="xxl" value="2XL" class="size-modal">
                    <span>2XL</span>
                </label>
            </div>
            @endif
            </div>
            
            <div class="modal-footer">
            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
            <a id="modal-add" style="cursor:pointer;"> 
                <div>
                <p>Add to cart</p>
                </div>
            </a>
            <p>
            Returns are free and easy. <br>
            Because you need to be happy. We all do.
            </p>
        </div>
        </div>
    </div>
</div>