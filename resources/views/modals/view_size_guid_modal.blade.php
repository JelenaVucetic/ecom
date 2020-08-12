<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="display: block; border-bottom:none">
        <h5 class="modal-title" id="exampleModalLabel">Size Guide</h5>
       <!--  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <div class="modal-body">
      <?php $pro_cat = App\Product::find($product->id);?>
      @if($pro_cat->category->name == "T-Shirts" || $pro_cat->category->name == "Polo Shirts" || $pro_cat->category->name == "Tank Tops" || $pro_cat->category->name == "Hoodies & Sweatshirts")
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Size</th>
                <th scope="col">Chest</th>
                <th scope="col">Length</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>XS</td>
                    <td>94</td>
                    <td>54.5</td>
                </tr>
                <tr>
                    <td>S</td>
                    <td>98.5</td>
                    <td>55.5</td>
                </tr>
                <tr>
                    <td>M</td>
                    <td>103.5</td>
                    <td>57</td>
                </tr>
                <tr>
                    <td>L</td>
                    <td>108</td>
                    <td>58</td>
                </tr>
                <tr>
                    <td>XL</td>
                    <td>112.5</td>
                    <td>59</td>
                </tr>
                <tr>
                    <td>2XL</td>
                    <td>117.5</td>
                    <td>60</td>
                </tr>
            </tbody>
        </table>
        @else
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Size</th>
                <th scope="col">Width</th>
                <th scope="col">Height</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>A3</td>
                    <td>94</td>
                    <td>54.5</td>
                </tr>
                <tr>
                    <td>B2</td>
                    <td>98.5</td>
                    <td>55.5</td>
                </tr>
                <tr>
                    <td>B1</td>
                    <td>103.5</td>
                    <td>57</td>
                </tr>
            </tbody>
        </table>
        @endif
      </div>
      <div class="modal-footer" id="size-guide-modal-footer">
        <p>Returns are free and easy.</p>
        <p>Because you need to be happy. We all do.</p>
      </div>
    </div>
  </div>
</div>