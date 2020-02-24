@extends('admin.master')
@section('content')
    <form action="/admin/work" method="post" enctype="multipart/form-data">
        @csrf
        <label>Select image to upload:</label>
        <input type="file" name="file" id="file">
        <input type="submit" value="Upload" name="submit">
        <span>{{ $errors->first('file')}}</span>

    </form>



    
  
    <div class="row">

      {{-- Phone case html --}}
        <div class="product-column">
        <div class="row-product">
        <div id="proizvod" class="save-picture disabledbutton" name="Phone Case" value="1">
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
        <button id="edit-product">Edit</button>
        <button id="enabled-product">Disabled</button>


        </div>
    </div>
</div>


</div>

{{-- T-shirt html --}}
<div class="product-column">
    <div class="row-product">
        <div id="proizvod1" class="save-picture disabledbutton" name="T-shirt" value="1">
            <div class="background-div1">
        <img id="logo-canvas1" src="/image/<?php if(!empty($image)){echo $image;} ?>">
        <img class="overlay-panel" src="/images/t-shirt.png">
            </div>
        </div>
    <div class="preview-info">
        <span class="preview-name">
            T-Shirt
        </span>
        <div>
        <button id="edit-product1">Edit</button>
        <button id="enabled-product1" onclick="">Disabled</button>
        </div>
    </div>
</div>

    </div>


    {{-- Mugs html --}}
    <div class="product-column">
        <div class="row-product">
            <div id="proizvod2" class="save-picture disabledbutton" name="Mugs" value="1">
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
            <button id="edit-product2">Edit</button>
            <button id="enabled-product2" onclick="">Disabled</button>
            </div>
        </div>
    </div>

        </div>

    </div>



        {{-- Canvas edit for Phone Case --}}
<div id="product3" class="img-div" data-value="1" style="display:none">

    <div id="app3" >
        <canvas id="c3" width="250" height="300"></canvas>
    </div>
    <div class="product-options">
        <p>PhoneCase options</p>
        <form method="post" id="upload-form" enctype="multipart/form-data">
         {{ csrf_field() }}
        <input type="file" name="file1" >
        <input type="submit" value="Upload" name="submit">
        </form>
        <div class="color-choose">

            <div class="container">
                <div class="output" id="output"></div>

                <div class="result-wrp">
                   <p>Choose a color</p>
                  <input type="color" id="color">
                </div>
                <label>
                    <span>Scale:</span>
                    <input type="range" id="scale-control"  value="1.5" min="0.005" max="1.5" step="0.005">
                </label>
                <button id="alignVertically">Vertically</button>
                <button id="alignHorizontally">Horizontally</button>
                <div class="repeat-option">
                    <button id="repeat">Repeat</button>
                    <button id="none">None</button>
                    <button id="repeat-vertical">Repeat vertical</button>
                    <button id="delete">Delete</button>
                </div>
              </div>
        </div>
    </div>
    </div>









              {{-- Canvas edit for T-shirt --}}
    <div id="product4" class="img-div" data-value="1" style="display:none">
        <div id="app4" >
            <canvas id="c4" width="250" height="300"></canvas>
        </div>
        <div class="product-options1">
            <p>T-shirt options</p>

            <form method="post" id="upload-form1" enctype="multipart/form-data">
              {{ csrf_field() }}
             <input type="file" name="file1" >
             <input type="submit" value="Upload" name="submit">
             </form>

            <div class="color-choose">

                <div class="container">
                    <div class="output" id="output"></div>

                    <div class="result-wrp">
                       <p>Choose a color</p>
                      <input type="color" id="color1">
                    </div>
                    <label>
                        <span>Scale:</span>
                        <input type="range" id="scale-control1"   value="1.5" min="0.005" max="2" step="0.005">
                    </label>
                    <button id="alignVertically1">Vertically</button>
                    <button id="alignHorizontally1">Horizontally</button>
                  </div>
            </div>
        </div>
    </div>




         {{-- Canvas edit for Mugs --}}
         <div id="product5" class="img-div" data-value="1" style="display:none">
            <div id="app5" >
                <canvas id="c5" width="250" height="300"></canvas>
            </div>
            <div class="product-options2">
                <p>Mug options</p>

                <form method="post" id="upload-form2" enctype="multipart/form-data">
                  {{ csrf_field() }}
                 <input type="file" name="file1" >
                 <input type="submit" value="Upload" name="submit">
                 </form>

                <div class="color-choose">

                    <div class="container">
                        <div class="output" id="output"></div>

                        <div class="result-wrp">
                           <p>Choose a color</p>
                          <input type="color" id="color2">
                        </div>
                        <label>
                            <span>Scale:</span>
                            <input type="range" id="scale-control2"  value="1.5" min="0.005" max="1.5" step="0.005">
                        </label>
                        <button id="alignVertically2">Vertically</button>
                        <button id="alignHorizontally2">Horizontally</button>
                        <div class="repeat-option">
                          <button id="repeat1">Repeat</button>
                          <button id="none1">None</button>
                          <button id="repeat-vertical1">Repeat vertical</button>
                      </div>
                      </div>
                </div>
            </div>
        </div>


        {{-- Hoodie html --}}
        <div class="product-column">
          <div class="row-product">
              <div id="proizvod3" class="save-picture disabledbutton" name="Hoodie" value="1">
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
              <button id="edit-product3">Edit</button>
              <button id="enabled-product3">Disabled</button>
              </div>
          </div>
      </div>
          </div>

             {{-- Long Sleeve html --}}
        <div class="product-column">
          <div class="row-product">
              <div id="proizvod4" class="save-picture disabledbutton" name="Long Sleeve" value="1">
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
              <button id="edit-product4">Edit</button>
              <button id="enabled-product4">Disabled</button>
              </div>
          </div>
      </div>
          </div>

              {{-- Graphic T-Shirt Dresses html --}}
        <div class="product-column">
          <div class="row-product">
              <div id="proizvod5" class="save-picture disabledbutton" name="Graphic T-Shirt Dresses" value="1">
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
              <button id="edit-product5">Edit</button>
              <button id="enabled-product5">Disabled</button>
              </div>
          </div>
      </div>
          </div>

          {{-- Canvas edit for Hoodie --}}
          <div id="product6" class="img-div" data-value="1" style="display:none">
            <div id="app6" >
                <canvas id="c6" width="250" height="300"></canvas>
            </div>
            <div class="product-options3">
                <p>Hoodie options</p>
                <form method="post" id="upload-form3" enctype="multipart/form-data">
                  {{ csrf_field() }}
                 <input type="file" name="file1" >
                 <input type="submit" value="Upload" name="submit">
                 </form>
                <div class="color-choose">

                    <div class="container">
                        <div class="output" id="output"></div>

                        <div class="result-wrp">
                           <p>Choose a color</p>
                          <input type="color" id="color3">
                        </div>
                        <label>
                            <span>Scale:</span>
                            <input type="range" id="scale-control3"  value="1.5" min="0.005" max="1.5" step="0.005">
                        </label>
                        <button id="alignVertically3">Vertically</button>
                        <button id="alignHorizontally3">Horizontally</button>
                      </div>
                </div>
            </div>
        </div>

         {{-- Canvas edit for Long Sleeve --}}
         <div id="product7" class="img-div" data-value="1" style="display:none">
          <div id="app7" >
              <canvas id="c7" width="250" height="300"></canvas>
          </div>
          <div class="product-options4">
              <p>Long Sleeve options</p>
              <form method="post" id="upload-form4" enctype="multipart/form-data">
                {{ csrf_field() }}
               <input type="file" name="file1" >
               <input type="submit" value="Upload" name="submit">
               </form>
              <div class="color-choose">

                  <div class="container">
                      <div class="output" id="output"></div>

                      <div class="result-wrp">
                         <p>Choose a color</p>
                        <input type="color" id="color4">
                      </div>
                      <label>
                          <span>Scale:</span>
                          <input type="range" id="scale-control4"   value="1.5" min="0.005" max="1.5" step="0.005">
                      </label>
                      <button id="alignVertically4">Vertically</button>
                      <button id="alignHorizontally4">Horizontally</button>
                    </div>
              </div>
          </div>
      </div>

      
         {{-- Canvas edit for Graphic T-Shirt Dresses --}}
         <div id="product8" class="img-div" data-value="1" style="display:none">
          <div id="app8" >
              <canvas id="c8" width="250" height="300"></canvas>
          </div>
          <div class="product-options5">
              <p> Graphic T-Shirt Dresses options</p>
              <form method="post" id="upload-form5" enctype="multipart/form-data">
                {{ csrf_field() }}
               <input type="file" name="file1">
               <input type="submit" value="Upload" name="submit">
               </form>
              <div class="color-choose">

                  <div class="container">
                      <div class="output" id="output"></div>

                      <div class="result-wrp">
                         <p>Choose a color</p>
                        <input type="color" id="color5">
                      </div>
                      <label>
                          <span>Scale:</span>
                          <input type="range" id="scale-control5"   value="1.5" min="0.005" max="1.5" step="0.005">
                      </label>
                      <button id="alignVertically5">Vertically</button>
                      <button id="alignHorizontally5">Horizontally</button>
                    </div>
              </div>
          </div>
      </div>

               {{-- Stickers html --}}
               <div class="product-column">
                <div class="row-product">
                    <div id="proizvod6" class="save-picture disabledbutton" name="Stickers" value="1">
                        <div class="background-div5">
                    <img id="logo-canvas6" src="/image/<?php if(!empty($image)){echo $image;} ?>">
                    
                        </div>
                    </div>
                <div class="preview-info">
                    <span class="preview-name">
                      Stickers
                    </span>
                    <div>
                    <button id="edit-product6">Edit</button>
                    <button id="enabled-product6">Disabled</button>
                    </div>
                </div>
            </div>
                </div>

                  {{-- Notes html --}}
        <div class="product-column">
          <div class="row-product">
              <div id="proizvod7" class="save-picture disabledbutton" name="Notes" value="1">
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
              <button id="edit-product7">Edit</button>
              <button id="enabled-product7">Disabled</button>
              </div>
          </div>
      </div>
          </div>


                      {{-- Clock html --}}
        <div class="product-column">
          <div class="row-product">
              <div id="proizvod8" class="save-picture disabledbutton" name="Clock" value="1">
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
              <button id="edit-product8">Edit</button>
              <button id="enabled-product8">Disabled</button>
              </div>
          </div>
      </div>
          </div>





                  {{-- Canvas edit for Stickers --}}
         <div id="product9" class="img-div" data-value="1" style="display:none">
          <div id="app9" >
              <canvas id="c9" width="300" height="300"></canvas>
          </div>
          <div class="product-options6">
              <p>Stickers options</p>
              <form method="post" id="upload-form6" enctype="multipart/form-data">
                {{ csrf_field() }}
               <input type="file" name="file1">
               <input type="submit" value="Upload" name="submit">
               </form>
      </div>
         </div>

          {{-- Canvas edit for Notes --}}
<div id="product10" class="img-div" data-value="1" style="display:none">

  <div id="app10" >
      <canvas id="c10" width="250" height="300"></canvas>
  </div>
  <div class="product-options7">
      <p>Notes options</p>
      <div class="color-choose">

          <div class="container">
              <div class="output" id="output"></div>

              <div class="result-wrp">
                 <p>Choose a color</p>
                <input type="color" id="color6">
              </div>
              <label>
                  <span>Scale:</span>
                  <input type="range" id="scale-control6"   value="1.5" min="0.005" max="1.5" step="0.005">
              </label>
              <button id="alignVertically6">Vertically</button>
              <button id="alignHorizontally6">Horizontally</button>
              <div class="repeat-option">
                  <button id="repeat2">Repeat</button>
                  <button id="none2">None</button>
                  <button id="repeat-vertical2">Repeat vertical</button>
                  <button id="delete">Delete</button>
              </div>
            </div>
      </div>
  </div>
  </div>



          {{-- Canvas edit for Clock --}}
<div id="product11" class="img-div" data-value="1" style="display:none">

  <div id="app11" >
      <canvas id="c11" width="250" height="300"></canvas>
  </div>
  <div class="product-options8">
      <p>Clock options</p>
      <div class="color-choose">

          <div class="container">
              <div class="output" id="output"></div>

              <div class="result-wrp">
                 <p>Choose a color</p>
                <input type="color" id="color7">
              </div>
              <label>
                  <span>Scale:</span>
                  <input type="range" id="scale-control7"  value="1.5" min="0.005" max="1.5" step="0.005">
              </label>
              <button id="alignVertically7">Vertically</button>
              <button id="alignHorizontally7">Horizontally</button>
              <div class="repeat-option">
                  <button id="repeat3">Repeat</button>
                  <button id="none3">None</button>
                  <button id="repeat-vertical3">Repeat vertical</button>
                  <button id="delete">Delete</button>
              </div>
            </div>
      </div>
  </div>
  </div>



                     {{-- Termos html --}}
                     <div class="product-column">
                      <div class="row-product">
                          <div id="proizvod9" class="save-picture disabledbutton" name="Termos" value="1">
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
                          <button id="edit-product9">Edit</button>
                          <button id="enabled-product9">Disabled</button>
                          </div>
                      </div>
                  </div>
                      </div>

                         {{-- Ceger html --}}
                     <div class="product-column">
                      <div class="row-product">
                          <div id="proizvod10" class="save-picture disabledbutton" name="Ceger" value="1">
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
                          <button id="edit-product10">Edit</button>
                          <button id="enabled-product10">Disabled</button>
                          </div>
                      </div>
                  </div>
                      </div>

                                    {{-- Poster html --}}
                     <div class="product-column">
                      <div class="row-product">
                          <div id="proizvod11" class="save-picture disabledbutton" name="Poster" value="1">
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
                          <button id="edit-product11">Edit</button>
                          <button id="enabled-product11">Disabled</button>
                          </div>
                      </div>
                  </div>
                      </div>




                                {{-- Canvas edit for Termos --}}
<div id="product12" class="img-div" data-value="1" style="display:none">

  <div id="app12" >
      <canvas id="c12" width="250" height="300"></canvas>
  </div>
  <div class="product-options8">
      <p>Termos options</p>
      <div class="color-choose">

          <div class="container">
              <div class="output" id="output"></div>

              <div class="result-wrp">
                 <p>Choose a color</p>
                <input type="color" id="color8">
              </div>
              <label>
                  <span>Scale:</span>
                  <input type="range" id="scale-control8"   value="1.5" min="0.005" max="1.5" step="0.005">
              </label>
              <button id="alignVertically8">Vertically</button>
              <button id="alignHorizontally8">Horizontally</button>
            </div>
      </div>
  </div>
  </div>



   {{-- Canvas edit for Ceger --}}
<div id="product13" class="img-div" data-value="1" style="display:none">

  <div id="app13" >
      <canvas id="c13" width="250" height="300"></canvas>
  </div>
  <div class="product-options9">
      <p>Ceger options</p>
      <div class="color-choose">

          <div class="container">
              <div class="output" id="output"></div>

              <div class="result-wrp">
                 <p>Choose a color</p>
                <input type="color" id="color9">
              </div>
              <label>
                  <span>Scale:</span>
                  <input type="range" id="scale-control9"  value="1.5" min="0.005" max="1.5" step="0.005">
              </label>
              <button id="alignVertically9">Vertically</button>
              <button id="alignHorizontally9">Horizontally</button>
            </div>
      </div>
  </div>
  </div>



    {{-- Canvas edit for Poster --}}
<div id="product14" class="img-div" data-value="1" style="display:none">

  <div id="app14" >
      <canvas id="c14" width="250" height="300"></canvas>
  </div>
  <div class="product-options10">
      <p>Poster options</p>
      <div class="color-choose">

          <div class="container">
              <div class="output" id="output"></div>

              <div class="result-wrp">
                 <p>Choose a color</p>
                <input type="color" id="color10">
              </div>
              <label>
                  <span>Scale:</span>
                  <input type="range" id="scale-control10"   value="1.5" min="0.005" max="1.5" step="0.005">
              </label>
              <button id="alignVertically10">Vertically</button>
              <button id="alignHorizontally10">Horizontally</button>
            </div>
      </div>
  </div>
  </div>

    </div>



    <div class="save-work">
 
        <div class="add-work">
          <div class="add-work-title">
            <label>Title</label>
            <input type="text" placeholder="Title" id="title">
          </div>
  
          <div class="add-work-tags">
            <label>Tags</label>
            <input type="text" placeholder="Tags" id="tags">
          </div>
  
          <div class="add-work-description">
            <label>Description</label>
            <input type="text" placeholder="Description" id="description">
          </div>
        </div>
        <button id="capture" onclick="doCapture();">Sacuvaj</button>
    
       
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script>
   
   
    </script>
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
var canvas = new fabric.Canvas('c');
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
});
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
      offsetX:  imageForCanvas.getScaledWidth() + imageForCanvas.getScaledWidth()/8,
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
      offsetX:  imageForCanvas.getScaledWidth() + imageForCanvas.getScaledWidth()/8,
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
    canvas3.remove(imageForCanvas);
    canvas3.requestRenderAll();
    canvas3.clear();
    canvas3.dispose();
    canvas3 = new fabric.Canvas('c3');
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
      offsetX:  img.getScaledWidth() + img.getScaledWidth()/8,
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
      offsetX:  img.getScaledWidth() + img.getScaledWidth()/8,
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
    /* canvas5.remove(rect);
    canvas5.remove(rect1);
    canvas5.remove(rect2);
    canvas5.remove(rect3); */
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
function doCapture(){
    window.scrollTo(0,0);
    var title = document.getElementById('title').value;
    var tags = document.getElementById('tags').value;
    var description = document.getElementById('description').value;
    var els = document.getElementsByClassName("save-picture");
    Array.prototype.forEach.call(els, function(el) {
    if( el.getAttribute('value')=='0'){
        html2canvas(el).then(function (canvas){
            var imgData = canvas.toDataURL("image/png" , 0.9);
            var originalName = el.getAttribute('name');
           // alert(imgData);
            var nameProduct = title + " " + el.getAttribute('name');
            $.ajax({
                    url: '{{route("ajaxupload.save")}}',
                    type: 'post',
                  
                    dataType: "JSON",
                    data: {
                        image : imgData,
                        name: nameProduct,
                        tag : tags,
                        description1 : description,
                        originalName1 : originalName,
                        "_token":"{{csrf_token()}}",
                    },
                    success:function(msg){
                        console.log(msg);
                    }
                });
        });

    }
})
}  </script>

@endsection
