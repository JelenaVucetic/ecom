@extends('admin.master')
@section('content')

  <div class="upload-work-form">
    <!-- Image loader -->
<div id='loader' style='display: none;'>
  <img src='/site-images/3.gif' width='62px' height='62px'>
</div>
<!-- Image loader -->
  <h2 class="add-work-h2">Add new work</h2>
    <form  action="/admin/work" method="post"  id="form-change"  enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" onchange="this.form.submit()" id="file">
        <label for="file" id="add-label">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg>
          <span>Choose a file…</span>
        </label>
       {{-- <input type="submit" value="Upload" name="submit"> --}}
        @include('layouts.error')

    </form>

  </div>
  
    <div class="row">

      {{-- Phone case html --}}
        <div class="product-column">
        <div class="row-product">
        <div id="proizvod" class="save-picture disabledbutton" data-category="12" name="Phone Case" data-canvas="canvas3" value="1">
            <div class="background-div">
        <img id="logo-canvas" src="/image/<?php if(!empty($image)){echo $image;} ?>">
        <img class="overlay-panel" src="/images/phonecase.png">
            </div>
        </div>
    <div class="preview-info">
        <span class="preview-name">
            PhoneCase
        </span>
        <div>
        <button id="edit-product" class="edit-button">Edit</button>
        <button id="enabled-product" class="enable-button">Disabled</button>


        </div>
    </div>
</div>


</div>

{{-- T-shirt html --}}
<div class="product-column">
    <div class="row-product">
        <div id="proizvod1" class="save-picture disabledbutton" data-category="6" name="T-shirt" data-canvas="canvas4" value="1">
            <div class="background-div1">
        <img id="logo-canvas1" src="/image/<?php if(!empty($image)){echo $image;} ?>" >
        <img class="overlay-panel" src="/images/t-shirt.png">
            </div>
        </div>
    <div class="preview-info">
        <span class="preview-name">
            T-Shirt
        </span>
        <div>
        <button id="edit-product1" class="edit-button">Edit</button>
        <button id="enabled-product1" class="enable-button" onclick="">Disabled</button>
        </div>
    </div>
</div>

    </div>


    {{-- Mugs html --}}
    <div class="product-column">
        <div class="row-product">
            <div id="proizvod2" class="save-picture disabledbutton"  data-category="20" name="Mugs" data-canvas="canvas5" value="1">
                <div class="background-div2">
            <img id="logo-canvas2" src="/image/<?php if(!empty($image)){echo $image;} ?>">
            <img class="overlay-panel" src="/images/mugs.png">
                </div>
            </div>
        <div class="preview-info">
            <span class="preview-name">
                Mug
            </span>
            <div>
            <button id="edit-product2" class="edit-button">Edit</button>
            <button id="enabled-product2" class="enable-button" onclick="">Disabled</button>
            </div>
        </div>
    </div>

        </div>

    </div>



        {{-- Canvas edit for Phone Case --}}
        
<div id="product3" class="img-div" data-value="1" style="display:none">
  <h2 class="option-title">PhoneCase options</h2>
  <div class="product-wrap">
    <div id="app3" >
        <canvas id="c3" width="250" height="300"></canvas>
    </div>
    <div class="product-options">
      
      {{--   <form method="post" id="upload-form" enctype="multipart/form-data">
         {{ csrf_field() }}
        <input type="file" name="file1" >
        <input type="submit" value="Upload" name="submit">
        </form> --}}
        <div class="color-choose">

            <div class="container">
                <div class="output" id="output"></div>

                <div class="result-wrp">
                   <p>Choose a color</p>
                  <input type="color" id="color">
                </div>
                <label class="scale-lable">
                    <span>Scale:</span>
                    <input type="range" id="scale-control"  value="1.5" min="0.005" max="1.5" step="0.005">
                </label>
                <div class="align">
                <button id="alignVertically" class="btn-option"><span class="vertical-span"><i class="fa fa-arrows-v fa-2x" aria-hidden="true"></i></span>Vertically</button>
                <button id="alignHorizontally" class="btn-option"><span class="horizontal-span"><i class="fa fa-arrows-h fa-2x" aria-hidden="true"></i></span>Horizontally</button>
                </div>
                <div class="repeat-option btn-group">
                    <button id="repeat" class="repeat-opt">Repeat</button>
                    <button id="none" class="repeat-opt">None</button>
                    <button id="repeat-vertical" class="repeat-opt">Repeat vertical</button>
                </div>
              </div>
        </div>
    </div>
    </div>
</div>
        








              {{-- Canvas edit for T-shirt --}}
    <div id="product4" class="img-div" data-value="1" style="display:none">
      <h2 class="option-title">T-shirt options</h2>
      <div class="product-wrap">
        <div id="app4" >
            <canvas id="c4" width="250" height="300"></canvas>
        </div>
        <div class="product-options1">
            

          {{--   <form method="post" id="upload-form1" enctype="multipart/form-data">
              {{ csrf_field() }}
             <input type="file" name="file1" >
             <input type="submit" value="Upload" name="submit">
             </form>
 --}}
            <div class="color-choose">

                <div class="container">
                    <div class="output" id="output"></div>

                    <div class="result-wrp">
                       <p>Choose a color</p>
                      <input type="color" id="color1">
                    </div>
                    <label  class="scale-lable">
                        <span>Scale:</span>
                        <input type="range" id="scale-control1"   value="1.5" min="0.005" max="2" step="0.005">
                    </label>
                    <div class="align">
                    <button id="alignVertically1" class="btn-option"><span class="vertical-span"><i class="fa fa-arrows-v fa-2x" aria-hidden="true"></i></span>Vertically</button>
                    <button id="alignHorizontally1" class="btn-option"><span class="horizontal-span"><i class="fa fa-arrows-h fa-2x" aria-hidden="true"></i></span>Horizontally</button>
                    </div>
                  </div>
            </div>
        </div>
    </div>

    </div>


         {{-- Canvas edit for Mugs --}}
         <div id="product5" class="img-div" data-value="1" style="display:none">
          <h2 class="option-title">Mug options</h2>
          <div class="product-wrap">
            <div id="app5" >
                <canvas id="c5" width="250" height="300"></canvas>
            </div>
            <div class="product-options2">

               {{--  <form method="post" id="upload-form2" enctype="multipart/form-data">
                  {{ csrf_field() }}
                 <input type="file" name="file1" >
                 <input type="submit" value="Upload" name="submit">
                 </form> --}}

                <div class="color-choose">

                    <div class="container">
                        <div class="output" id="output"></div>

                        <div class="result-wrp">
                           <p>Choose a color</p>
                          <input type="color" id="color2">
                        </div>
                        <label  class="scale-lable">
                            <span>Scale:</span>
                            <input type="range" id="scale-control2"  value="1.5" min="0.005" max="1.5" step="0.005">
                        </label>
                        <div class="align">
                        <button id="alignVertically2" class="btn-option"><span class="vertical-span"><i class="fa fa-arrows-v fa-2x" aria-hidden="true"></i></span>Vertically</button>
                        <button id="alignHorizontally2" class="btn-option"><span class="horizontal-span"><i class="fa fa-arrows-h fa-2x" aria-hidden="true"></i></span>Horizontally</button>
                        </div>
                        <div class="repeat-option">
                          <button id="repeat1" class="repeat-opt">Repeat</button>
                          <button id="none1" class="repeat-opt">None</button>
                          <button id="repeat-vertical1" class="repeat-opt">Repeat vertical</button>
                      </div>
                      </div>
                </div>
            </div>
        </div>
         </div>

        {{-- Hoodie html --}}
        <div class="product-column">
          <div class="row-product">
              <div id="proizvod3" class="save-picture disabledbutton"  data-category="9" name="Hoodie" data-canvas="canvas6" value="1">
                  <div class="background-div3">
              <img id="logo-canvas3" src="/image/<?php if(!empty($image)){echo $image;} ?>">
              <img class="overlay-panel" src="/images/hoodie.jpg">
                  </div>
              </div>
          <div class="preview-info">
              <span class="preview-name">
                  Hoodie
              </span>
              <div>
              <button id="edit-product3" class="edit-button">Edit</button>
              <button id="enabled-product3" class="enable-button">Disabled</button>
              </div>
          </div>
      </div>
          </div>

             {{-- Long Sleeve html --}}
        <div class="product-column">
          <div class="row-product">
              <div id="proizvod4" class="save-picture disabledbutton"  data-category="8" name="Long Sleeve" data-canvas="canvas7" value="1">
                  <div class="background-div4">
              <img id="logo-canvas4" src="/image/<?php if(!empty($image)){echo $image;} ?>">
              <img class="overlay-panel" src="/images/longSleeve.jpg">
                  </div>
              </div>
          <div class="preview-info">
              <span class="preview-name">
                  Long Sleeve
              </span>
              <div>
              <button id="edit-product4" class="edit-button">Edit</button>
              <button id="enabled-product4" class="enable-button">Disabled</button>
              </div>
          </div>
      </div>
          </div>

              {{-- Graphic T-Shirt Dresses html --}}
        <div class="product-column">
          <div class="row-product">
              <div id="proizvod5" class="save-picture disabledbutton"  data-category="7" name="Graphic T-Shirt Dresses" data-canvas="canvas8" value="1">
                  <div class="background-div4">
              <img id="logo-canvas5" src="/image/<?php if(!empty($image)){echo $image;} ?>">
              <img class="overlay-panel" src="/images/noSleeveShirt.png">
                  </div>
              </div>
          <div class="preview-info">
              <span class="preview-name">
                Graphic T-Shirt Dresses
              </span>
              <div>
              <button id="edit-product5" class="edit-button">Edit</button>
              <button id="enabled-product5" class="enable-button">Disabled</button>
              </div>
          </div>
      </div>
          </div>

          {{-- Canvas edit for Hoodie --}}
          <div id="product6" class="img-div" data-value="1" style="display:none">
            <h2 class="option-title">Hoodie options</h2>
            <div class="product-wrap">
            <div id="app6" >
                <canvas id="c6" width="250" height="300"></canvas>
            </div>
            <div class="product-options3">
                {{-- <form method="post" id="upload-form3" enctype="multipart/form-data">
                  {{ csrf_field() }}
                 <input type="file" name="file1" >
                 <input type="submit" value="Upload" name="submit">
                 </form> --}}
                <div class="color-choose">

                    <div class="container">
                        <div class="output" id="output"></div>

                        <div class="result-wrp">
                           <p>Choose a color</p>
                          <input type="color" id="color3">
                        </div>
                        <label class="scale-lable">
                            <span>Scale:</span>
                            <input type="range" id="scale-control3"  value="1.5" min="0.005" max="1.5" step="0.005">
                        </label>
                        <div class="align">
                        <button id="alignVertically3" class="btn-option"><span class="vertical-span"><i class="fa fa-arrows-v fa-2x" aria-hidden="true"></i></span>Vertically</button>
                        <button id="alignHorizontally3" class="btn-option"><span class="horizontal-span"><i class="fa fa-arrows-h fa-2x" aria-hidden="true"></i></span>Horizontally</button>
                        </div>
                      </div>
                </div>
            </div>
        </div>
          </div>

         {{-- Canvas edit for Long Sleeve --}}
         <div id="product7" class="img-div" data-value="1" style="display:none">
          <h2 class="option-title">Long Sleeve options</h2>
          <div class="product-wrap">
          <div id="app7" >
              <canvas id="c7" width="250" height="300"></canvas>
          </div>
          <div class="product-options4">
            {{--   <form method="post" id="upload-form4" enctype="multipart/form-data">
                {{ csrf_field() }}
               <input type="file" name="file1" >
               <input type="submit" value="Upload" name="submit">
               </form> --}}
              <div class="color-choose">

                  <div class="container">
                      <div class="output" id="output"></div>

                      <div class="result-wrp">
                         <p>Choose a color</p>
                        <input type="color" id="color4">
                      </div>
                      <label  class="scale-lable">
                          <span>Scale:</span>
                          <input type="range" id="scale-control4"   value="1.5" min="0.005" max="1.5" step="0.005">
                      </label>
                      <div class="align">
                      <button id="alignVertically4" class="btn-option"><span class="vertical-span"><i class="fa fa-arrows-v fa-2x" aria-hidden="true"></i></span>Vertically</button>
                      <button id="alignHorizontally4" class="btn-option"><span class="horizontal-span"><i class="fa fa-arrows-h fa-2x" aria-hidden="true"></i></span>Horizontally</button>
                      </div>
                    </div>
              </div>
          </div>
      </div>
         </div>

      
         {{-- Canvas edit for Graphic T-Shirt Dresses --}}
         <div id="product8" class="img-div" data-value="1" style="display:none">
          <h2 class="option-title">Graphic T-shirt Dresses options</h2>
          <div class="product-wrap">
          <div id="app8" >
              <canvas id="c8" width="250" height="300"></canvas>
          </div>
          <div class="product-options5">
           {{--    <form method="post" id="upload-form5" enctype="multipart/form-data">
                {{ csrf_field() }}
               <input type="file" name="file1">
               <input type="submit" value="Upload" name="submit">
               </form> --}}
              <div class="color-choose">

                  <div class="container">
                      <div class="output" id="output"></div>

                      <div class="result-wrp">
                         <p>Choose a color</p>
                        <input type="color" id="color5">
                      </div>
                      <label class="scale-lable">
                          <span>Scale:</span>
                          <input type="range" id="scale-control5"   value="1.5" min="0.005" max="1.5" step="0.005">
                      </label>
                      <div class="align">
                      <button id="alignVertically5" class="btn-option"><span class="vertical-span"><i class="fa fa-arrows-v fa-2x" aria-hidden="true"></i></span>Vertically</button>
                      <button id="alignHorizontally5" class="btn-option"><span class="horizontal-span"><i class="fa fa-arrows-h fa-2x" aria-hidden="true"></i></span>Horizontally</button>
                      </div>
                    </div>
              </div>
          </div>
      </div>
         </div>
               {{-- Stickers html --}}
               <div class="product-column">
                <div class="row-product">
                    <div id="proizvod6" class="save-picture disabledbutton"  data-category="26" name="Stickers" data-canvas="canvas9" value="1">
                        <div class="background-div5">
                    <img id="logo-canvas6" src="/image/<?php if(!empty($image)){echo $image;} ?>">
                    
                        </div>
                    </div>
                <div class="preview-info">
                    <span class="preview-name">
                      Stickers
                    </span>
                    <div>
                    <button id="edit-product6" class="edit-button">Edit</button>
                    <button id="enabled-product6" class="enable-button">Disabled</button>
                    </div>
                </div>
            </div>
                </div>

                  {{-- Notes html --}}
        <div class="product-column">
          <div class="row-product">
              <div id="proizvod7" class="save-picture disabledbutton"  data-category="25" name="Notes" data-canvas="canvas10" value="1">
                  <div class="background-div6">
              <img id="logo-canvas7" src="/image/<?php if(!empty($image)){echo $image;} ?>">
              <img class="overlay-panel" src="/images/notes.png">
                  </div>
              </div>
          <div class="preview-info">
              <span class="preview-name">
                  Notes
              </span>
              <div>
              <button id="edit-product7" class="edit-button">Edit</button>
              <button id="enabled-product7" class="enable-button">Disabled</button>
              </div>
          </div>
      </div>
          </div>


                      {{-- Clock html --}}
        <div class="product-column">
          <div class="row-product">
              <div id="proizvod8" class="save-picture disabledbutton"  data-category="23" name="Clock" data-canvas="canvas11" value="1">
                  <div class="background-div7">
              <img id="logo-canvas8" src="/image/<?php if(!empty($image)){echo $image;} ?>">
              <img class="overlay-panel" src="/images/clock.png">
                  </div>
              </div>
          <div class="preview-info">
              <span class="preview-name">
                  Clock
              </span>
              <div>
              <button id="edit-product8" class="edit-button">Edit</button>
              <button id="enabled-product8" class="enable-button">Disabled</button>
              </div>
          </div>
      </div>
          </div>





                  {{-- Canvas edit for Stickers --}}
         <div id="product9" class="img-div" data-value="1" style="display:none">
          <div class="product-wrap">
          <div id="app9" >
              <canvas id="c9" width="300" height="300"></canvas>
          </div>
          <div class="product-options6">
              <p>Stickers options</p>
             {{--  <form method="post" id="upload-form6" enctype="multipart/form-data">
                {{ csrf_field() }}
               <input type="file" name="file1">
               <input type="submit" value="Upload" name="submit">
               </form> --}}
      </div>
         </div>
         </div>

          {{-- Canvas edit for Notes --}}
<div id="product10" class="img-div" data-value="1" style="display:none">
  <h2 class="option-title">Notes options</h2>
  <div class="product-wrap">
  <div id="app10" >
      <canvas id="c10" width="250" height="300"></canvas>
  </div>
  <div class="product-options7">
      <div class="color-choose">

          <div class="container">
              <div class="output" id="output"></div>

              <div class="result-wrp">
                 <p>Choose a color</p>
                <input type="color" id="color6">
              </div>
              <label class="scale-lable">
                  <span>Scale:</span>
                  <input type="range" id="scale-control6"   value="1.5" min="0.005" max="1.5" step="0.005">
              </label>
              <div class="align">
              <button id="alignVertically6" class="btn-option"><span class="vertical-span"><i class="fa fa-arrows-v fa-2x" aria-hidden="true"></i></span>Vertically</button>
              <button id="alignHorizontally6" class="btn-option"><span class="horizontal-span"><i class="fa fa-arrows-h fa-2x" aria-hidden="true"></i></span>Horizontally</button>
              </div>
              <div class="repeat-option">
                  <button id="repeat2" class="repeat-opt">Repeat</button>
                  <button id="none2" class="repeat-opt">None</button>
                  <button id="repeat-vertical2" class="repeat-opt">Repeat vertical</button>
              </div>
            </div>
      </div>
  </div>
  </div>
</div>



          {{-- Canvas edit for Clock --}}
<div id="product11" class="img-div" data-value="1" style="display:none">
  <h2 class="option-title">Clock options</h2>
  <div class="product-wrap">
  <div id="app11" >
      <canvas id="c11" width="250" height="300"></canvas>
  </div>
  <div class="product-options8">
      <div class="color-choose">

          <div class="container">
              <div class="output" id="output"></div>

              <div class="result-wrp">
                 <p>Choose a color</p>
                <input type="color" id="color7">
              </div>
              <label class="scale-lable">
                  <span>Scale:</span>
                  <input type="range" id="scale-control7"  value="1.5" min="0.005" max="1.5" step="0.005">
              </label>
              <div class="align">
              <button id="alignVertically7" class="btn-option"><span class="vertical-span"><i class="fa fa-arrows-v fa-2x" aria-hidden="true"></i></span>Vertically</button>
              <button id="alignHorizontally7" class="btn-option"><span class="horizontal-span"><i class="fa fa-arrows-h fa-2x" aria-hidden="true"></i></span>Horizontally</button>
              </div>
              <div class="repeat-option">
                  <button id="repeat3" class="repeat-opt">Repeat</button>
                  <button id="none3" class="repeat-opt">None</button>
                  <button id="repeat-vertical3" class="repeat-opt">Repeat vertical</button>
              </div>
            </div>
      </div>
  </div>
  </div>
</div>



                     {{-- Termos html --}}
                     <div class="product-column">
                      <div class="row-product">
                          <div id="proizvod9" class="save-picture disabledbutton"  data-category="19" name="Termos"  data-canvas="canvas12" value="1">
                              <div class="background-div8">
                          <img id="logo-canvas9" src="/image/<?php if(!empty($image)){echo $image;} ?>">
                          <img class="overlay-panel" src="/images/termos.png">
                              </div>
                          </div>
                      <div class="preview-info">
                          <span class="preview-name">
                              Termos
                          </span>
                          <div>
                          <button id="edit-product9" class="edit-button">Edit</button>
                          <button id="enabled-product9" class="enable-button">Disabled</button>
                          </div>
                      </div>
                  </div>
                      </div>

                         {{-- Ceger html --}}
                     <div class="product-column">
                      <div class="row-product">
                          <div id="proizvod10" class="save-picture disabledbutton"  data-category="24" name="Ceger"  data-canvas="canvas13" value="1">
                              <div class="background-div9">
                          <img id="logo-canvas10" src="/image/<?php if(!empty($image)){echo $image;} ?>">
                          <img class="overlay-panel" src="/images/ceger.png">
                              </div>
                          </div>
                      <div class="preview-info">
                          <span class="preview-name">
                              Ceger
                          </span>
                          <div>
                          <button id="edit-product10" class="edit-button">Edit</button>
                          <button id="enabled-product10" class="enable-button">Disabled</button>
                          </div>
                      </div>
                  </div>
                      </div>

                                    {{-- Poster html --}}
                     <div class="product-column">
                      <div class="row-product">
                          <div id="proizvod11" class="save-picture disabledbutton"  data-category="14" name="Poster"  data-canvas="canvas14" value="1">
                              <div class="background-div10">
                          <img id="logo-canvas11" src="/image/<?php if(!empty($image)){echo $image;} ?>">
                          <img class="overlay-panel" src="/images/poster.png">
                              </div>
                          </div>
                      <div class="preview-info">
                          <span class="preview-name">
                              Poster
                          </span>
                          <div>
                          <button id="edit-product11" class="edit-button">Edit</button>
                          <button id="enabled-product11" class="enable-button"><i class="rb-font-icon icon-cancel-circled2"></i>Disabled</button>
                          </div>
                      </div>
                  </div>
                      </div>




                                {{-- Canvas edit for Termos --}}
<div id="product12" class="img-div" data-value="1" style="display:none">
  <h2 class="option-title">Termos options</h2>
  <div class="product-wrap">
  <div id="app12" >
      <canvas id="c12" width="250" height="300"></canvas>
  </div>
  <div class="product-options8">
      <div class="color-choose">

          <div class="container">
              <div class="output" id="output"></div>

              <div class="result-wrp">
                 <p>Choose a color</p>
                <input type="color" id="color8">
              </div>
              <label class="scale-lable">
                  <span>Scale:</span>
                  <input type="range" id="scale-control8"   value="1.5" min="0.005" max="1.5" step="0.005">
              </label>
              <div class="align">
              <button id="alignVertically8" class="btn-option"><span class="vertical-span"><i class="fa fa-arrows-v fa-2x" aria-hidden="true"></i></span>Vertically</button>
              <button id="alignHorizontally8" class="btn-option"><span class="horizontal-span"><i class="fa fa-arrows-h fa-2x" aria-hidden="true"></i></span>Horizontally</button>
              </div>
            </div>
      </div>
  </div>
  </div>
</div>


   {{-- Canvas edit for Ceger --}}
<div id="product13" class="img-div" data-value="1" style="display:none">
  <h2 class="option-title">Ceger options</h2>
  <div class="product-wrap">
  <div id="app13" >
      <canvas id="c13" width="250" height="300"></canvas>
  </div>
  <div class="product-options9">
      <div class="color-choose">

          <div class="container">
              <div class="output" id="output"></div>

              <div class="result-wrp">
                 <p>Choose a color</p>
                <input type="color" id="color9">
              </div>
              <label class="scale-lable">
                  <span>Scale:</span>
                  <input type="range" id="scale-control9"  value="1.5" min="0.005" max="1.5" step="0.005">
              </label>
              <div class="align">
              <button id="alignVertically9" class="btn-option"><span class="vertical-span"><i class="fa fa-arrows-v fa-2x" aria-hidden="true"></i></span>Vertically</button>
              <button id="alignHorizontally9" class="btn-option"><span class="horizontal-span"><i class="fa fa-arrows-h fa-2x" aria-hidden="true"></i></span>Horizontally</button>
              </div>
            </div>
      </div>
  </div>
  </div>
</div>


    {{-- Canvas edit for Poster --}}
<div id="product14" class="img-div" data-value="1" style="display:none">
  <h2 class="option-title">Poster options</h2>
  <div class="product-wrap">
  <div id="app14" >
      <canvas id="c14" width="250" height="300"></canvas>
  </div>
  <div class="product-options10">
      <div class="color-choose">

          <div class="container">
              <div class="output" id="output"></div>

              <div class="result-wrp">
                 <p>Choose a color</p>
                <input type="color" id="color10">
              </div>
              <label class="scale-lable">
                  <span>Scale:</span>
                  <input type="range" id="scale-control10"   value="1.5" min="0.005" max="1.5" step="0.005">
              </label>
              <div class="align">
              <button id="alignVertically10" class="btn-option"><span class="vertical-span"><i class="fa fa-arrows-v fa-2x" aria-hidden="true"></i></span>Vertically</button>
              <button id="alignHorizontally10" class="btn-option"><span class="horizontal-span"><i class="fa fa-arrows-h fa-2x" aria-hidden="true"></i></span>Horizontally</button>
              <div>
            </div>
      </div>
  </div>
  </div>
  </div>
</div>
</div>

  
                                    {{-- New T-shirt Girl html --}}
                                   {{--  <canvas id="canvasProduct" width=620 height=400></canvas> 
                                      <div class="product-column" style="width:70%;">
                                      <div class="row-product" style="width:100%;">
                                          <div id="proizvod12" class="save-picture disabledbutton" name="Poster" value="1">
                                              <div class="background-div11 containerMask">
                                          <img id="logo-canvas12 " class="transform" src="/image/ ">
                                          <img class="overlay-panel " src="/images/Maska.png">
                                              </div>
                                          </div>
                                      <div class="preview-info">
                                          <span class="preview-name">
                                              Poster
                                          </span>
                                          <div>
                                          <button id="edit-product12">Edit</button>
                                          <button id="enabled-product12">Disabled</button>
                                          </div>
                                      </div>
                                      </div>
                                      </div>

--}}

                                          {{-- Canvas edit for Poster --}}
{{-- <div id="product15" class="img-div" data-value="1" style="display:none">

  <div id="app15" >
      <canvas id="c15" width="250" height="300"></canvas>
  </div>
  <div class="product-options11">
      <p>Poster options</p>
      <div class="color-choose">

          <div class="container">
              <div class="output" id="output"></div>

              <div class="result-wrp">
                 <p>Choose a color</p>
                <input type="color" id="color11">
              </div>
              <label>
                  <span>Scale:</span>
                  <input type="range" id="scale-control11"   value="1.5" min="0.005" max="1.5" step="0.005">
              </label>
              <button id="alignVertically11">Vertically</button>
              <button id="alignHorizontally11">Horizontally</button>
            </div>
      </div>
  </div>
  </div> --}}



    </div>
    @if(!empty($image))
    <div id="proizvod13" class="save-picture disabledbutton" name="Ceger"  data-canvas="canvas13" value="1" style="display:none;">
    <div id="background-div12" style=" height: 300px; width: 300px;">
        <img id="logo-canvas13" src="{{$image}}">  
      <img class="overlay-panel" src="/images/Majica-zenska-mockup.png" style="top:0px!important; width: 800px; height: 800px;">
  </div>
</div>
    @endif

    <div class="save-work">
        <div class="add-work">
          <div class="add-work-title">
            <label>Title <i class="fas fa-info-circle"></i></label>
            <input type="text" placeholder="Title" id="title">
          </div>
          <div class="add-work-tags">
            <label>Tags</label>
            <textarea type="text" placeholder="Tags" id="tags"></textarea>
          </div>
          <div class="add-work-description">
            <label>Description</label>
            <textarea type="text" placeholder="Description" id="description"></textarea>
          </div>
          
        </div>
        <div class="ram-checkbox">
          <input type="radio" id="female-check" name="gender"  value="female">
          <label for="vehicle1"> Female</label><br>
          <input type="radio"  id="male-check"   name="gender" value="male">
          <label for="vehicle2"> Male</label><br>
          <input type="radio" id="unisex-check"  name="gender" value="unisex">
          <label for="vehicle3"> Unisex</label><br>
          </div>
        <button id="capture" {{-- onclick="doCapture();" --}}>Save work</button>
    
       
    </div>

</div>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> 

    
`   @include('admin.upload_design.product_canvas')
<script>
  var canvas10 = new fabric.Canvas('c9');

var img1 = new Image();

img1.onload=start;
img1.src="../image/<?php if(!empty($image)){echo $image;}  ?>";
var image10 = document.getElementById("logo-canvas6");

function start(){
  var stickerCanvas=stickerEffect(img1,20);
  var imgInstance = new fabric.Image(stickerCanvas,{})
  canvas10.add(imgInstance);
  image10.src = canvas10.toDataURL();
  canvas10.requestRenderAll();

}

function stickerEffect(img1,grow){
  var canvas11=document.createElement("canvas");
  var ctx1=canvas11.getContext("2d");
  var canvas12=document.createElement("canvas");
  var ctx2=canvas12.getContext("2d");
  canvas11.width=canvas12.width=img1.width+grow*2;
  canvas11.height=canvas12.height=img1.height+grow*2;
  ctx1.drawImage(img1,grow,grow);
  ctx2.shadowColor='red';
  ctx2.shadowBlur=2;
  for(var i=0;i<grow;i++){
    ctx2.drawImage(canvas11,0,0);
    ctx1.drawImage(canvas12,0,0);
  }
  ctx2.shadowColor='rgba(0,0,0,0)';   
  ctx2.drawImage(img1,grow,grow);
  return(canvas12);
}

$('#upload-form6').on('submit' , function(event){
    canvas10.clear();
    canvas10.dispose();
    canvas10 = new fabric.Canvas('c9');
    canvas10.requestRenderAll();
    event.preventDefault();
    $.ajax({
      url: "{{route('ajaxupload.action')}}",
      method: "post",
      data: new FormData(this),
      dataType: "JSON",
      contentType: false,
      cache: false,
      processData: false,
      success: function(data){
       
       img1.src = "";
       img1.src ="/image/" + data.upload_image;
       img1.onload = start;
      }
    });
  });




</script>




<script>
/* var canvas = new fabric.Canvas('c');
var imgElement = document.getElementById('myImage');
 var extension = "<?php if(!empty($ext)){echo $ext;} ?>";
    if( extension !="svg"){
 fabric.Image.fromURL("/image/<?php if(!empty($image)){echo $image;} ?>"  , function(img) {
    img.set({

    });
    img.scaleToHeight(200);
    img.scaleToWidth(200);
    canvas.add(img);
});
    }else{
fabric.loadSVGFromURL("/image/<?php if(!empty($image)){echo $image;} ?>", function(img, options) {
  var img = fabric.util.groupSVGElements(img, options);
  //img.scaleToWidth(250);
  canvas.add(img).renderAll();
});
}
var canvas1 = new fabric.Canvas('c1');
var imgElement = document.getElementById('myImage');
 fabric.Image.fromURL("/image/<?php if(!empty($image)){echo $image;}  ?>", function(img) {
    img.set({

    });
    img.scaleToHeight(200);
    img.scaleToWidth(200);
    canvas1.add(img);
});
var canvas2 = new fabric.Canvas('c2');
var imgElement = document.getElementById('myImage');
 fabric.Image.fromURL("/image/<?php if(!empty($image)){echo $image;}  ?>", function(img) {
    img.set({

    });

    img.scaleToHeight(200);
    img.scaleToWidth(200);
    canvas2.add(img);
}); */
</script>



<script>
// Canvas for Phone Case
 var oldWidth = 0;
 var checkForScale = false;
 var padding = 0;
 var imageChange = false;
 var image1 = document.getElementById("logo-canvas");
var canvas3 = new fabric.Canvas('c3');
var imgElement = document.getElementById('myImage');
var object = "/image/<?php if(!empty($image)){echo $image;}  ?>";
var imageForCanvas;
var sel;


  load(object);




function load(objects){
 fabric.Image.fromURL(objects, function(img) {
  
    imageForCanvas = img;
    canvas3.setWidth(250);
    canvas3.setHeight(300);
    canvas3.add(imageForCanvas);
    imageForCanvas.center();
    image1.src = canvas3.toDataURL();
    canvas3.requestRenderAll();
    
     // Repeat option for Phone case
    $('#repeat').on('click', function(){
      checkForScale = false;
      imageForCanvas.set({
            'top': 0
        });
        imageForCanvas.set({
            'left': 0
        });
    canvas3.clear();
    canvas3.requestRenderAll();
    sleep(100).then(() => {
      imageForCanvas.scaleToWidth(100);

    var patternSourceCanvas = new fabric.StaticCanvas();
    patternSourceCanvas.add(imageForCanvas);

    patternSourceCanvas.renderAll();
    var pattern = new fabric.Pattern({
      source: function() {
        patternSourceCanvas.setDimensions({
          width: imageForCanvas.getScaledWidth() + padding,
          height: imageForCanvas.getScaledHeight() + padding

        });
        patternSourceCanvas.renderAll();
        return patternSourceCanvas.getElement();
      },
      repeat: 'repeat',

    });

var rect = new fabric.Rect({
        width: 10000,
        height: 10000,
        left: 0,
        fill: pattern,
        objectCaching: false
    });
    canvas3.add(rect);

    rect.center().setCoords();
    image1.src = canvas3.toDataURL();
    canvas3.requestRenderAll();
   })
    });


    $('#repeat-vertical').on('click', function(){
      checkForScale = true;
      imageForCanvas.set({
            'top': 0
        });
        imageForCanvas.set({
            'left': 0
        });
    canvas3.clear();
    canvas3.requestRenderAll();
    
   sleep(100).then(() => {
    imageForCanvas.scaleToWidth(100);

    var patternSourceCanvas = new fabric.StaticCanvas();
    patternSourceCanvas.add(imageForCanvas);

    patternSourceCanvas.renderAll();
    var pattern = new fabric.Pattern({
      source: function() {
        patternSourceCanvas.setDimensions({
          width: imageForCanvas.getScaledWidth() + imageForCanvas.getScaledWidth(),
          height: imageForCanvas.getScaledHeight() + padding

        });
        patternSourceCanvas.renderAll();
        return patternSourceCanvas.getElement();
      },
      repeat: 'repeat',

    });

     var pattern1 = new fabric.Pattern({
      source: function() {
        patternSourceCanvas.setDimensions({
          width: imageForCanvas.getScaledWidth() + imageForCanvas.getScaledWidth(),
          height: imageForCanvas.getScaledHeight() + padding
        });

        patternSourceCanvas.renderAll();
        return patternSourceCanvas.getElement();
      },
      repeat: 'repeat',
      offsetX:  imageForCanvas.getScaledWidth() + imageForCanvas.getScaledWidth()/4,
      offsetY: imageForCanvas.getScaledHeight()/2
    });

var rect = new fabric.Rect({
        width: 10000,
        height: 10000,
        left: imageForCanvas.getScaledWidth(),
        fill: pattern,
        objectCaching: false
    });

    canvas3.add(rect);

      var rect1 = new fabric.Rect({
        width: 10000,
        height: 10000,
        left:0,
        fill: pattern1,
        objectCaching: false
    });



    canvas3.add(rect1);
    rect.center().setCoords();
    rect1.center().setCoords();
    image1.src = canvas3.toDataURL();
    canvas3.requestRenderAll();
          var sel = new fabric.ActiveSelection(canvas3.getObjects(), {
          canvas: canvas3,
        });
        canvas3.setActiveObject(sel);
        canvas3.requestRenderAll();
   })



});



    

    // None option for Phone case
    $('#none').on('click', function(){

        checkForScale = false;
        canvas3.clear();
        img.scaleToWidth(100);
        canvas3.add(imageForCanvas);

        
        image1.src = canvas3.toDataURL();
        canvas3.requestRenderAll();
    });
    // Scale option for Phone case
    $('#scale-control').on('input', function () {
      $(this).trigger('change');
      alert($(this).val());
      sleep(100).then(() => {
        imageForCanvas.scale(parseFloat($(this).val())).setCoords();
      //  Repeat Vertical

        if(checkForScale==true){

       canvas3.clear();

        if(oldWidth==imageForCanvas.getScaledWidth()){
         canvas3.requestRenderAll();
        }else{
          oldWidth=imageForCanvas.getScaledWidth();
          imageForCanvas.set({
            'top': 0
        });
        imageForCanvas.set({
            'left': 0
        });


    canvas3.requestRenderAll();
   sleep(100).then(() => {
    var patternSourceCanvas = new fabric.StaticCanvas();
    patternSourceCanvas.add(imageForCanvas);
    patternSourceCanvas.renderAll();
    var pattern = new fabric.Pattern({
      source: function() {
        patternSourceCanvas.setDimensions({
          width: imageForCanvas.getScaledWidth() + imageForCanvas.getScaledWidth(),
          height: imageForCanvas.getScaledHeight() + padding
        });
        patternSourceCanvas.renderAll();
        return patternSourceCanvas.getElement();
      },
      repeat: 'repeat',
    });
     var pattern1 = new fabric.Pattern({
      source: function() {
        patternSourceCanvas.setDimensions({
          width: imageForCanvas.getScaledWidth() + imageForCanvas.getScaledWidth(),
          height: imageForCanvas.getScaledHeight() + padding
        });
        patternSourceCanvas.renderAll();
        return patternSourceCanvas.getElement();
      },
      repeat: 'repeat',
      offsetX:  imageForCanvas.getScaledWidth() + imageForCanvas.getScaledWidth()/4,
      offsetY: imageForCanvas.getScaledHeight()/2
    });

var rect = new fabric.Rect({
        width: 10000,
        height: 10000,
        left: imageForCanvas.getScaledWidth(),
        fill: pattern,
        objectCaching: false
    });
    canvas3.add(rect);

      var rect1 = new fabric.Rect({
        width: 10000,
        height: 10000,
        left:0,
        fill: pattern1,
        objectCaching: false
    });
    canvas3.add(rect1);

    rect.center().setCoords();
    rect1.center().setCoords();
    image1.src = canvas3.toDataURL();
    canvas3.requestRenderAll();

           sel = new fabric.ActiveSelection(canvas3.getObjects(), {
          canvas: canvas3,
        });
        canvas3.setActiveObject(sel);
        canvas3.requestRenderAll();
   })
        }


        }else{
          canvas3.requestRenderAll();
        }
       
      })
    });
     //  Close repeat vertical

  // Align Vertical option for Phone case
  $('#alignVertically').on('click', function(){
    img.centerV();
    sleep(100).then(() => {
    img.setCoords();
    image1.src = canvas3.toDataURL();
    })
  });

  // Align Horizontal option for Phone case
  $('#alignHorizontally').on('click', function(){
    img.centerH();
    sleep(100).then(() => {
    img.setCoords();
    image1.src = canvas3.toDataURL();
})
  });

  $('#upload-form').one('submit' , function(event){
    checkForScale = false;
    imageChange = true;
    canvas3.remove(canvas3.getObjects());
    canvas3 = null;
    $('#c3').hide();
    if(canvas3){
      canvas3.clear();
      canvas3 = null;
    }
    $('#c3').siblings('.upper-canvas').remove();
    $('#c3').parent('.canvas-container').before($('#c3'));
   // $('.canvas-container').remove();

    //
  /*   canvas3.requestRenderAll();
    canvas3.clear();
    canvas3.dispose(); */
    canvas3 = new fabric.Canvas('c3');
    $('#c3').show();
    canvas3.requestRenderAll();
    alert(canvas3.getObjects());
    event.preventDefault();
    $.ajax({
      url: "{{route('ajaxupload.action')}}",
      method: "post",
      data: new FormData(this),
      dataType: "JSON",
      contentType: false,
      cache: false,
      processData: false,
      success: function(data){
       var object2 = "";
       console.log(data.upload_image);
       object2 ="/image/" + data.upload_image;
        load(object2);
      }
    });
  });

});



}





</script>

<script>
// Canvas for T-Shirt
var canvas4 = new fabric.Canvas('c4');
var TshirtObject = "/image/<?php if(!empty($image)){echo $image;}  ?>";
var image2 = document.getElementById("logo-canvas1");
loadTshirt(TshirtObject);


function loadTshirt(objects){
 fabric.Image.fromURL(objects, function(img) {
    canvas4.setWidth(250);
    canvas4.setHeight(300);
    canvas4.add(img);
    img.center();
    image2.src = canvas4.toDataURL();
    canvas4.requestRenderAll();
    // Scale option for T-shirt
    $('#scale-control1').on('input', function () {
      $(this).trigger('change');
      alert($(this).val());
      img.scale(parseFloat($(this).val())).setCoords();
      canvas4.requestRenderAll();
  });

    // Align Vertical option for T-shirt
  $('#alignVertically1').on('click', function(){
    img.centerV();
    sleep(100).then(() => {
    //img.setCoords();
    image2.src = canvas4.toDataURL();
    })
  });
  // Align Horizontal option for T-shirt
  $('#alignHorizontally1').on('click', function(){
    img.centerH();
    sleep(100).then(() => {
   // img.setCoords();
    image2.src = canvas4.toDataURL();
})
  });


  $('#upload-form1').one('submit' , function(event){
    canvas4.remove(img);
    canvas4.clear();
    canvas4.dispose();
    canvas4 = new fabric.Canvas('c4');
    canvas4.requestRenderAll();
    
    event.preventDefault();
    $.ajax({
      url: "{{route('ajaxupload.action')}}",
      method: "post",
      data: new FormData(this),
      dataType: "JSON",
      contentType: false,
      cache: false,
      processData: false,
      success: function(data){
       var object2 = "";
       object2 ="/image/" + data.upload_image;
        loadTshirt(object2);
      }
    });
  });



});
}
</script>
<script>
// Canvas for Mugs
var canvas5 = new fabric.Canvas('c5');
var oldWidth1 = 0;
var object3 = "/image/<?php if(!empty($image)){echo $image;}  ?>";
 var checkForScale1 = false;
 loadMugs(object3);
 function loadMugs(objects){
 fabric.Image.fromURL(objects, function(img) {
    canvas5.setWidth(250);
    canvas5.setHeight(300);
    canvas5.add(img);
    var image3 = document.getElementById("logo-canvas2");
    img.center();
    image3.src = canvas5.toDataURL();
    canvas5.requestRenderAll();
    // None option for Mugs
    $('#none1').on('click', function(){
        checkForScale1 = false;
        canvas5.clear();
        img.scaleToWidth(100);
        canvas5.add(img);
        image3.src = canvas5.toDataURL();
        canvas5.requestRenderAll();
    });
    // Repeat option for Mugs
    $('#repeat1').on('click', function(){
      checkForScale1 = false;
      img.set({ 'top' : 0});
      img.set({ 'left' : 0});
      canvas5.clear();
    var patternSourceCanvas = new fabric.StaticCanvas();
    patternSourceCanvas.add(img);
    patternSourceCanvas.renderAll();
    var pattern = new fabric.Pattern({
      source: function() {
        patternSourceCanvas.setDimensions({
          width: img.getScaledWidth() + padding,
          height: img.getScaledHeight() + padding
        });
        patternSourceCanvas.renderAll();
        return patternSourceCanvas.getElement();
      },
      repeat: 'repeat'
    });
    var rect = new fabric.Rect({
        width: 5000,
        height: 5000,
        fill: pattern,
        objectCaching: false
    });
    canvas5.add(rect);
    rect.center().setCoords();
    image3.src = canvas5.toDataURL();
    canvas5.requestRenderAll();
    });

    // Repeat vertical for Mugs
    $('#repeat-vertical1').on('click', function(){
      checkForScale1 = true;
      img.set({
            'top': 0
        });
        img.set({
            'left': 0
        });
    canvas5.clear();
    canvas5.requestRenderAll();
   sleep(100).then(() => {
    img.scaleToWidth(100);

    var patternSourceCanvas = new fabric.StaticCanvas();
    patternSourceCanvas.add(img);

    patternSourceCanvas.renderAll();
    var pattern = new fabric.Pattern({
      source: function() {
        patternSourceCanvas.setDimensions({
          width: img.getScaledWidth() + img.getScaledWidth(),
          height: img.getScaledHeight() + padding

        });
        patternSourceCanvas.renderAll();
        return patternSourceCanvas.getElement();
      },
      repeat: 'repeat',

    });

     var pattern1 = new fabric.Pattern({
      source: function() {
        patternSourceCanvas.setDimensions({
          width: img.getScaledWidth() + img.getScaledWidth(),
          height: img.getScaledHeight() + padding
        });

        patternSourceCanvas.renderAll();
        return patternSourceCanvas.getElement();
      },
      repeat: 'repeat',
      offsetX:  img.getScaledWidth() + img.getScaledWidth()/4,
      offsetY: img.getScaledHeight()/2
    });

var rect = new fabric.Rect({
        width: 5000,
        height: 5000,
        left: img.getScaledWidth(),
        fill: pattern,
        objectCaching: false
    });

    canvas5.add(rect);

      var rect1 = new fabric.Rect({
        width: 5000,
        height: 5000,
        left:0,
        fill: pattern1,
        objectCaching: false
    });



    canvas5.add(rect1);
    rect.center().setCoords();
    rect1.center().setCoords();
    image3.src = canvas5.toDataURL();
    canvas5.requestRenderAll();
          var sel = new fabric.ActiveSelection(canvas5.getObjects(), {
          canvas: canvas5,
        });
        canvas5.setActiveObject(sel);
        canvas5.requestRenderAll();
   })

    });



    // Scale option for Mugs
    $('#scale-control2').on('input', function () {
      $(this).trigger('change');
      sleep(100).then(() => {
      img.scale(parseFloat($(this).val())).setCoords();
      //  Repeat Vertical

        if(checkForScale1==true){
       canvas5.clear();
        if(oldWidth1==img.getScaledWidth()){

        }else{
          oldWidth1=img.getScaledWidth();
      img.set({
            'top': 0
        });
        img.set({
            'left': 0
        });


    canvas5.requestRenderAll();
   sleep(100).then(() => {
    var patternSourceCanvas = new fabric.StaticCanvas();
    patternSourceCanvas.add(img);
    patternSourceCanvas.renderAll();
    var pattern2 = new fabric.Pattern({
      source: function() {
        patternSourceCanvas.setDimensions({
          width: img.getScaledWidth() + img.getScaledWidth(),
          height: img.getScaledHeight() + padding
        });
        patternSourceCanvas.renderAll();
        return patternSourceCanvas.getElement();
      },
      repeat: 'repeat',
    });
     var pattern3 = new fabric.Pattern({
      source: function() {
        patternSourceCanvas.setDimensions({
          width: img.getScaledWidth() + img.getScaledWidth(),
          height: img.getScaledHeight() + padding
        });
        patternSourceCanvas.renderAll();
        return patternSourceCanvas.getElement();
      },
      repeat: 'repeat',
      offsetX:  img.getScaledWidth() + img.getScaledWidth()/4,
      offsetY: img.getScaledHeight()/2
    });

var rect2 = new fabric.Rect({
        width: 5000,
        height: 5000,
        left: img.getScaledWidth(),
        fill: pattern2,
        objectCaching: false
    });
    canvas5.add(rect2);

      var rect3 = new fabric.Rect({
        width: 5000,
        height: 5000,
        left:0,
        fill: pattern3,
        objectCaching: false
    });
    canvas5.add(rect3);

    rect2.center().setCoords();
    rect3.center().setCoords();
    image3.src = canvas5.toDataURL();
    canvas5.requestRenderAll();

          var sel = new fabric.ActiveSelection(canvas5.getObjects(), {
          canvas: canvas5,
        });
        canvas5.setActiveObject(sel);
        canvas5.requestRenderAll();
   })
        }


        }else{
          canvas5.requestRenderAll();
        }
        
      })
  });

    // Align Vertical option for Mugs
  $('#alignVertically2').on('click', function(){
    img.centerV();
    sleep(100).then(() => {
    img.setCoords();
    image3.src = canvas5.toDataURL();
    })
  });
  // Align Horizontal option for Mugs
  $('#alignHorizontally2').on('click', function(){
    img.centerH();
    sleep(100).then(() => {
    img.setCoords();
    image3.src = canvas5.toDataURL();
})
  });

  $('#upload-form2').one('submit' , function(event){
    canvas5.remove(img);
    canvas5.clear();
    canvas5.dispose();
    canvas5 = new fabric.Canvas('c5');
    canvas5.requestRenderAll();
    
    event.preventDefault();
    $.ajax({
      url: "{{route('ajaxupload.action')}}",
      method: "post",
      data: new FormData(this),
      dataType: "JSON",
      contentType: false,
      cache: false,
      processData: false,
      success: function(data){
       var object4 = "";
       object4 ="/image/" + data.upload_image;
        loadMugs(object4);
      }
    });
  });

});
 }
</script>

<script>
// Canvas for Hoodie
var canvas6 = new fabric.Canvas('c6');
var object5 = "/image/<?php if(!empty($image)){echo $image;}  ?>";
loadHoodie(object5);

function loadHoodie(objects){
 fabric.Image.fromURL(objects, function(img) {
    canvas6.setWidth(250);
    canvas6.setHeight(300);
    canvas6.add(img);
    var image4 = document.getElementById("logo-canvas3");
    img.center();
    image4.src = canvas6.toDataURL();
    canvas6.requestRenderAll();
    // Scale option for T-shirt
    $('#scale-control3').on('input', function () {
      $(this).trigger('change');
      img.scale(parseFloat($(this).val())).setCoords();
      canvas6.requestRenderAll();
  });

    // Align Vertical option for Hoodie
  $('#alignVertically3').on('click', function(){
    img.centerV();
    sleep(100).then(() => {
    img.setCoords();
    image4.src = canvas6.toDataURL();
    })
  });
  // Align Horizontal option for Hoodie
  $('#alignHorizontally3').on('click', function(){
    img.centerH();
    sleep(100).then(() => {
    img.setCoords();
    image4.src = canvas6.toDataURL();
})
  });

  $('#upload-form3').one('submit' , function(event){
    canvas6.remove(img);
    canvas6.clear();
    canvas6.dispose();
    canvas6 = new fabric.Canvas('c6');
    canvas6.requestRenderAll();
    
    event.preventDefault();
    $.ajax({
      url: "{{route('ajaxupload.action')}}",
      method: "post",
      data: new FormData(this),
      dataType: "JSON",
      contentType: false,
      cache: false,
      processData: false,
      success: function(data){
       object5 = "";
       object5 ="/image/" + data.upload_image;
        loadHoodie(object5);
      }
    });
  });
});
}
</script>


<script>
  // Canvas for Long Sleeve
  var canvas7 = new fabric.Canvas('c7');
  var object6 = "/image/<?php if(!empty($image)){echo $image;}  ?>";
  loadLongSleeve(object6);


  function loadLongSleeve(objects){
   fabric.Image.fromURL(objects, function(img) {
      canvas7.setWidth(250);
      canvas7.setHeight(300);
      canvas7.add(img);
      var image5 = document.getElementById("logo-canvas4");
      img.center();
      image5.src = canvas7.toDataURL();
      canvas7.requestRenderAll();
      // Scale option for T-shirt
      $('#scale-control4').on('input', function () {
        $(this).trigger('change');
        img.scale(parseFloat($(this).val())).setCoords();
        canvas7.requestRenderAll();
    });
  
      // Align Vertical option for Hoodie
    $('#alignVertically4').on('click', function(){
      img.centerV();
      sleep(100).then(() => {
      img.setCoords();
      image5.src = canvas7.toDataURL();
      })
    });
    // Align Horizontal option for Hoodie
    $('#alignHorizontally4').on('click', function(){
      img.centerH();
      sleep(100).then(() => {
      img.setCoords();
      image5.src = canvas7.toDataURL();
  })
    });
    $('#upload-form4').one('submit' , function(event){
    canvas7.remove(img);
    canvas7.clear();
    canvas7.dispose();
    canvas7 = new fabric.Canvas('c7');
    canvas7.requestRenderAll();
    
    event.preventDefault();
    $.ajax({
      url: "{{route('ajaxupload.action')}}",
      method: "post",
      data: new FormData(this),
      dataType: "JSON",
      contentType: false,
      cache: false,
      processData: false,
      success: function(data){
       object6 = "";
       object6 ="/image/" + data.upload_image;
        loadLongSleeve(object6);
      }
    });
  });

  });
  
}
  </script>

<script>
  // Canvas for Graphic T-Shirt Dresses
  
  var object7 = "/image/<?php if(!empty($image)){echo $image;}  ?>";
  var canvas8 = new fabric.Canvas('c8');
  loadGraphicTshirtDresses(object7);

  function loadGraphicTshirtDresses(objects){
   fabric.Image.fromURL(objects, function(img) {
      
      canvas8.setWidth(250);
      canvas8.setHeight(300);
      
      canvas8.add(img);
      var image6 = document.getElementById("logo-canvas5");
      img.center();
      image6.src = canvas8.toDataURL();
      canvas8.requestRenderAll();
      // Scale option for T-shirt
      $('#scale-control5').on('input', function () {
        $(this).trigger('change');
        img.scale(parseFloat($(this).val())).setCoords();
        canvas8.requestRenderAll();
    });
  
      // Align Vertical option for Hoodie
    $('#alignVertically5').on('click', function(){
      img.centerV();
      sleep(100).then(() => {
      img.setCoords();
      image6.src = canvas8.toDataURL();
      })
    });
    // Align Horizontal option for Hoodie
    $('#alignHorizontally5').on('click', function(){
      img.centerH();
      sleep(100).then(() => {
      img.setCoords();
      image6.src = canvas8.toDataURL();
  })
    });

    $('#upload-form5').one('submit' , function(event){
    canvas8.remove(img);
    canvas8.clear();
    canvas8.dispose();
    canvas8 = new fabric.Canvas('c8');
    canvas8.requestRenderAll();
    event.preventDefault();
    $.ajax({
      url: "{{route('ajaxupload.action')}}",
      method: "post",
      data: new FormData(this),
      dataType: "JSON",
      contentType: false,
      cache: false,
      processData: false,
      success: function(data){
       object7 = "";
       object7 ="/image/" + data.upload_image;
        loadGraphicTshirtDresses(object7);
      }
    });
  });

  });
  }
  </script>

<script>
function enable(num, divValue){
    var br = num;
    var myEle = document.getElementById(divValue);
    if(myEle){
        var myEleValue= myEle.getAttribute('data-value');
    }
    if(myEleValue == '0'){
       myEle.setAttribute('data-value', '1');
       $(myEle).addClass("disabledbutton");
        document.getElementById(br).innerHTML = 'Enable';
    } else{
        myEle.setAttribute('data-value', '0');
        $(myEle).removeClass("disabledbutton");
        document.getElementById(br).innerHTML = 'Disable';
    }
}
const sleep = (milliseconds) => {
  return new Promise(resolve => setTimeout(resolve, milliseconds))
}

function finalMockup(prodId){
  window.scrollTo(0,0);
  var els = document.getElementsByClassName("save-picture");
  Array.prototype.forEach.call(els, function(el) {
  var canvasAtr  = el.getAttribute('data-canvas');
  if(canvasAtr=="canvas4"){
          canvasImage = canvas4.toDataURL();
          $("#logo-canvas13").attr("src", canvasImage);
          var mockupGirl = document.getElementById('proizvod13');
          mockupGirl.style.display = "block";
          html2canvas(mockupGirl).then(function (canvas){
            var imgData = canvas.toDataURL("image/png" , 0.9);
            $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/admin/upload_mockup',
            type: 'post',
            dataType: 'text',
            data: {
              image: imgData,
              id : prodId,
            },
            success:function(msg){
              console.log("oks");
            }
          });
          });
        
        }else{
          canvasImage = "0";
        }
  });
}
  
$("#capture").click(function(event){
  
    window.scrollTo(0,0);
    time = 500;
    var title = document.getElementById('title').value;
    var tags = document.getElementById('tags').value;
    var description = document.getElementById('description').value;
    var els = document.getElementsByClassName("save-picture");
    var mockUpCanvas = document.getElementById("canvasMockUp");
    var gender = $('input[name=gender]:checked').val();
    var count = 0;
    var originalImagePath = "<?php if(!empty($image)){echo $image;} ?>";
   
    Array.prototype.forEach.call(els, function(el) {
      if( el.getAttribute('value')=='0'){
        count++;
      }
    });
  
    $("#loader").show();
    $('body').css("opacity" , 0.3);
    $('body').css("pointer-events" , "none");
   var number = 0;
    Array.prototype.forEach.call(els, function(el) {
      
      event.preventDefault();
     
     setTimeout(function(){

     
      var canvasImage = "0";
    if( el.getAttribute('value')=='0'){
        html2canvas(el).then(function (canvas){
            var imgData = canvas.toDataURL("image/png" , 0.9);
            var originalName = el.getAttribute('name');
            var category = el.getAttribute('data-category');
            var nameProduct = title + " " + el.getAttribute('name');
            $.ajax({
                     headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '{{route("ajaxupload.save")}}',
                    type: 'post',
                    dataType: "text",
                    data: {
                        image : imgData,
                        name: nameProduct,
                        tag : tags,
                        description1 : description,
                        originalName1 : originalName,
                        originalImagePath: originalImagePath,
                        canvasImage : canvasImage,
                       gedner : gender,
                       category : category
                    },
                    beforeSend: function(){
                      // Show image container
                     
                    },
                    success:function(msg){
                      console.log(msg);
                       // finalMockup(msg);
                       
                    }, 
                    error: function(msg) {
                      console.log(msg);
                    
                    },
                    complete: function(msg){
                      
                    }
                });
        });
    }
    number++;
    if(count==number){
      $("#loader").hide(); 
      $('body').css("opacity" , 1);
      $('body').css("pointer-events" , "all");
    }
  
},time)
time += 3000;

});


  
});

/* function doCapture(){
    window.scrollTo(0,0);
    var title = document.getElementById('title').value;
    var tags = document.getElementById('tags').value;
    var description = document.getElementById('description').value;
    var els = document.getElementsByClassName("save-picture");
    var mockUpCanvas = document.getElementById("canvasMockUp");
    
    var originalImagePath = "<?php if(!empty($image)){echo $image;} ?>";
    Array.prototype.forEach.call(els, function(el) {
      sleep(2000).then(() => {

      })
      var canvasImage = "0";
    if( el.getAttribute('value')=='0'){
        html2canvas(el).then(function (canvas){
            var imgData = canvas.toDataURL("image/png" , 0.9);
            var originalName = el.getAttribute('name');
            var nameProduct = title + " " + el.getAttribute('name');
            $.ajax({
                     headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '{{route("ajaxupload.save")}}',
                    type: 'post',
                    dataType: "text",
                    data: {
                        image : imgData,
                        name: nameProduct,
                        tag : tags,
                        description1 : description,
                        originalName1 : originalName,
                        originalImagePath: originalImagePath,
                        canvasImage : canvasImage,
                       
                    },
                    success:function(msg){
                      console.log(msg);
                       // finalMockup(msg);
                    }, 
                    error: function(msg) {
                      console.log(msg);
                    }
                });
        });

    }
  
})
} */  </script>

@endsection
