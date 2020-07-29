
    


<script>
     // Canvas for Notes
     var oldWidth1 = 0;
     var checkForScale1 = false;
     var padding1 = 0;
     var imageChange1 = false;
     var image11 = document.getElementById("logo-canvas7");
     var canvas13 = new fabric.Canvas('c10');
    var imgElement = document.getElementById('myImage');
    var object1 = "/image/<?php if(!empty($image)){echo $image;}  ?>";
    load(object1);
    
    function load(objects){
     fabric.Image.fromURL(objects, function(img) {    
        canvas13.add(img);
        img.center();
        image11.src = canvas13.toDataURL();
        canvas13.requestRenderAll();
        $('#repeat2').on('click', function(){
          checkForScale1 = false;
        img.set({
                'top': 0
            });
            img.set({
                'left': 0
            });
        canvas13.clear();
        canvas13.requestRenderAll();
        sleep(100).then(() => {
        img.scaleToWidth(100);
    
        var patternSourceCanvas = new fabric.StaticCanvas();
        patternSourceCanvas.add(img);
    
        patternSourceCanvas.renderAll();
        var pattern = new fabric.Pattern({
          source: function() {
            patternSourceCanvas.setDimensions({
              width: img.getScaledWidth() + padding1,
              height: img.getScaledHeight() + padding1
    
            });
            patternSourceCanvas.renderAll();
            return patternSourceCanvas.getElement();
          },
          repeat: 'repeat',
    
        });
    
    var rect = new fabric.Rect({
            width: 5000,
            height: 5000,
            left: 0,
            fill: pattern,
            objectCaching: false
        });
        canvas13.add(rect);
    
        rect.center().setCoords();
        image11.src = canvas13.toDataURL();
        canvas13.requestRenderAll();
       })
        });
    
    
        $('#repeat-vertical2').on('click', function(){
          checkForScale1 = true;
          img.set({
                'top': 0
            });
            img.set({
                'left': 0
            });
        canvas13.clear();
        canvas13.requestRenderAll();
       sleep(100).then(() => {
        img.scaleToWidth(100);
    
        var patternSourceCanvas = new fabric.StaticCanvas();
        patternSourceCanvas.add(img);
    
        patternSourceCanvas.renderAll();
        var pattern = new fabric.Pattern({
          source: function() {
            patternSourceCanvas.setDimensions({
              width: img.getScaledWidth() + img.getScaledWidth(),
              height: img.getScaledHeight() + padding1
    
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
              height: img.getScaledHeight() + padding1
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
    
        canvas13.add(rect);
    
          var rect1 = new fabric.Rect({
            width: 5000,
            height: 5000,
            left:0,
            fill: pattern1,
            objectCaching: false
        });
    
    
    
        canvas13.add(rect1);
        rect.center().setCoords();
        rect1.center().setCoords();
        image11.src = canvas13.toDataURL();
        canvas13.requestRenderAll();
              var sel = new fabric.ActiveSelection(canvas13.getObjects(), {
              canvas: canvas13,
            });
            canvas13.setActiveObject(sel);
            canvas13.requestRenderAll();
       })
    
    
    });
    
        $('#delete').on('click', function(){
    
        });
    

        $('#none2').on('click', function(){
    
            checkForScale1 = false;
            canvas13.clear();
            img.scaleToWidth(100);
            canvas13.add(img);
            image11.src = canvas13.toDataURL();
            canvas13.requestRenderAll();
        });
  
        $('#scale-control6').on('input', function () {
          $(this).trigger('change');
          sleep(100).then(() => {
          img.scale(parseFloat($(this).val())).setCoords();
          //  Repeat Vertical
    
            if(checkForScale1==true){
    
           canvas13.clear();
            console.log($(this).val());
    
            if(oldWidth1==img.getScaledWidth()){
             canvas13.requestRenderAll();
            }else{
              oldWidth1=img.getScaledWidth();
          img.set({
                'top': 0
            });
            img.set({
                'left': 0
            });
    
    
        canvas13.requestRenderAll();
       sleep(100).then(() => {
        var patternSourceCanvas = new fabric.StaticCanvas();
        patternSourceCanvas.add(img);
        patternSourceCanvas.renderAll();
        var pattern = new fabric.Pattern({
          source: function() {
            patternSourceCanvas.setDimensions({
              width: img.getScaledWidth() + img.getScaledWidth(),
              height: img.getScaledHeight() + padding1
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
              height: img.getScaledHeight() + padding1
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
        canvas13.add(rect);
    
          var rect1 = new fabric.Rect({
            width: 5000,
            height: 5000,
            left:0,
            fill: pattern1,
            objectCaching: false
        });
        canvas13.add(rect1);
    
        rect.center().setCoords();
        rect1.center().setCoords();
        image11.src = canvas13.toDataURL();
        canvas13.requestRenderAll();
    
              var sel = new fabric.ActiveSelection(canvas13.getObjects(), {
              canvas: canvas13,
            });
            canvas13.setActiveObject(sel);
            canvas13.requestRenderAll();
       })
            }
    
    
            }else{
              canvas13.requestRenderAll();
            }
           
          })
        });
         //  Close repeat vertical
    
   
      $('#alignVertically6').on('click', function(){
        img.centerV();
        sleep(100).then(() => {
        img.setCoords();
        image11.src = canvas13.toDataURL();
        })
      });
    
   
      $('#alignHorizontally6').on('click', function(){
        img.centerH();
        sleep(100).then(() => {
        img.setCoords();
        image11.src = canvas13.toDataURL();
    })
      });
    
    /*   $('#upload-form').on('submit' , function(event){
        checkForScale = false;
        imageChange = true;
        img.scaleToWidth(0);
        canvas19.remove(img);
        canvas19.requestRenderAll();
        canvas19.clear();
        canvas19.requestRenderAll();
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
    
    
           var object1 = "";
           object1 ="/image/" + data.upload_image;
            load(object1);
    
          }
        });
      }); */
    
    });
    
    }
    
    
    </script>


<script>
    // Canvas for Clock
    var oldWidth2 = 0;
    var checkForScale2 = false;
    var padding2 = 0;
    var imageChange2 = false;
    var image12 = document.getElementById("logo-canvas8");
    var canvas14 = new fabric.Canvas('c11');
   var imgElement = document.getElementById('myImage');
   var object2 = "/image/<?php if(!empty($image)){echo $image;}  ?>";
   load(object2);
   
   function load(objects){
    fabric.Image.fromURL(objects, function(img) {
       img.set({
   
       });
      // img.scaleToWidth(250);
   
       canvas14.add(img);
       img.center();
      image12.src = canvas14.toDataURL();
      canvas14.requestRenderAll();
       $('#repeat3').on('click', function(){
         checkForScale2 = false;
       img.set({
               'top': 0
           });
           img.set({
               'left': 0
           });
       canvas14.clear();
       canvas14.requestRenderAll();
       sleep(100).then(() => {
       img.scaleToWidth(100);
   
       var patternSourceCanvas = new fabric.StaticCanvas();
       patternSourceCanvas.add(img);
   
       patternSourceCanvas.renderAll();
       var pattern = new fabric.Pattern({
         source: function() {
           patternSourceCanvas.setDimensions({
             width: img.getScaledWidth() + padding2,
             height: img.getScaledHeight() + padding2
   
           });
           patternSourceCanvas.renderAll();
           return patternSourceCanvas.getElement();
         },
         repeat: 'repeat',
   
       });
   
   var rect = new fabric.Rect({
           width: 5000,
           height: 5000,
           left: 0,
           fill: pattern,
           objectCaching: false
       });
       canvas14.add(rect);
   
       rect.center().setCoords();
       image12.src = canvas14.toDataURL();
       canvas14.requestRenderAll();
      })
       });
   
   
       $('#repeat-vertical3').on('click', function(){
         checkForScale2 = true;
         img.set({
               'top': 0
           });
           img.set({
               'left': 0
           });
       canvas14.clear();
       canvas14.requestRenderAll();
      sleep(100).then(() => {
       img.scaleToWidth(100);
   
       var patternSourceCanvas = new fabric.StaticCanvas();
       patternSourceCanvas.add(img);
   
       patternSourceCanvas.renderAll();
       var pattern = new fabric.Pattern({
         source: function() {
           patternSourceCanvas.setDimensions({
             width: img.getScaledWidth() + img.getScaledWidth(),
             height: img.getScaledHeight() + padding2
   
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
             height: img.getScaledHeight() + padding2
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
   
       canvas14.add(rect);
   
         var rect1 = new fabric.Rect({
           width: 5000,
           height: 5000,
           left:0,
           fill: pattern1,
           objectCaching: false
       });
   
   
   
       canvas14.add(rect1);
       rect.center().setCoords();
       rect1.center().setCoords();
       image12.src = canvas14.toDataURL();
       canvas14.requestRenderAll();
             var sel = new fabric.ActiveSelection(canvas14.getObjects(), {
             canvas: canvas14,
           });
           canvas14.setActiveObject(sel);
           canvas14.requestRenderAll();
      })
   
   
   });
   
       $('#delete').on('click', function(){
   
       });
   
    
       $('#none3').on('click', function(){
   
           checkForScale2 = false;
           canvas14.clear();
           img.scaleToWidth(100);
           canvas14.add(img);
           image12.src = canvas14.toDataURL();
           canvas14.requestRenderAll();
       });

       $('#scale-control7').on('input', function () {
         $(this).trigger('change');
         sleep(100).then(() => {
         img.scale(parseFloat($(this).val())).setCoords();
         //  Repeat Vertical
   
           if(checkForScale2==true){
   
          canvas14.clear();
           
   
           if(oldWidth2==img.getScaledWidth()){
            canvas14.requestRenderAll();
           }else{
             oldWidth2=img.getScaledWidth();
         img.set({
               'top': 0
           });
           img.set({
               'left': 0
           });
   
   
       canvas14.requestRenderAll();
      sleep(100).then(() => {
       var patternSourceCanvas = new fabric.StaticCanvas();
       patternSourceCanvas.add(img);
       patternSourceCanvas.renderAll();
       var pattern = new fabric.Pattern({
         source: function() {
           patternSourceCanvas.setDimensions({
             width: img.getScaledWidth() + img.getScaledWidth(),
             height: img.getScaledHeight() + padding2
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
             height: img.getScaledHeight() + padding1
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
       canvas14.add(rect);
   
         var rect1 = new fabric.Rect({
           width: 5000,
           height: 5000,
           left:0,
           fill: pattern1,
           objectCaching: false
       });
       canvas14.add(rect1);
   
       rect.center().setCoords();
       rect1.center().setCoords();
       image12.src = canvas14.toDataURL();
       canvas14.requestRenderAll();
   
             var sel = new fabric.ActiveSelection(canvas14.getObjects(), {
             canvas: canvas14,
           });
           canvas14.setActiveObject(sel);
           canvas14.requestRenderAll();
      })
           }
   
   
           }else{
             canvas14.requestRenderAll();
           }
          
         })
       });
        //  Close repeat vertical
   

     $('#alignVertically7').on('click', function(){
       img.centerV();
       sleep(100).then(() => {
       img.setCoords();
       image12.src = canvas14.toDataURL();
       })
     });
   

     $('#alignHorizontally7').on('click', function(){
       img.centerH();
       sleep(100).then(() => {
       img.setCoords();
       image12.src = canvas14.toDataURL();
   })
     });
   
   /*   $('#upload-form').on('submit' , function(event){
       checkForScale = false;
       imageChange = true;
       img.scaleToWidth(0);
       canvas19.remove(img);
       canvas19.requestRenderAll();
       canvas19.clear();
       canvas19.requestRenderAll();
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
   
   
          var object1 = "";
          object1 ="/image/" + data.upload_image;
           load(object1);
   
         }
       });
     }); */
   
   });
   
   }
   
   </script>
   
   <script>
    // Canvas for Termos
    var canvas15 = new fabric.Canvas('c12');
     fabric.Image.fromURL("/image/<?php if(!empty($image)){echo $image;}  ?>", function(img) {
        img.set({
    
        });
    
      //  img.scaleToWidth(250);
        canvas15.add(img);
        
        var image13 = document.getElementById("logo-canvas9");
        img.center();
        image13.src = canvas15.toDataURL();
        canvas15.requestRenderAll();
        $('#scale-control8').on('input', function () {
          $(this).trigger('change');
          img.scale(parseFloat($(this).val())).setCoords();
          canvas15.requestRenderAll();
      });
    
 
      $('#alignVertically8').on('click', function(){
        img.centerV();
        sleep(100).then(() => {
        img.setCoords();
        image13.src = canvas15.toDataURL();
        })
      });

      $('#alignHorizontally8').on('click', function(){
        img.centerH();
        sleep(100).then(() => {
        img.setCoords();
        image13.src = canvas15.toDataURL();
    })
      });
    });
    </script>


<script>
  // Canvas for Ceger
  var canvas16 = new fabric.Canvas('c13');
   fabric.Image.fromURL("/image/<?php if(!empty($image)){echo $image;}  ?>", function(img) {
      img.set({
  
      });
  
     // img.scaleToWidth(250);
      canvas16.add(img);
      
      var image14 = document.getElementById("logo-canvas10");
      img.center();
      image14.src = canvas16.toDataURL();
      canvas16.requestRenderAll();
      $('#scale-control9').on('input', function () {
        $(this).trigger('change');
        img.scale(parseFloat($(this).val())).setCoords();
        canvas16.requestRenderAll();
    });
  

    $('#alignVertically9').on('click', function(){
      img.centerV();
      sleep(100).then(() => {
      img.setCoords();
      image14.src = canvas16.toDataURL();
      })
    });

    $('#alignHorizontally9').on('click', function(){
      img.centerH();
      sleep(100).then(() => {
      img.setCoords();
      image14.src = canvas16.toDataURL();
  })
    });
  });
  </script>

<script>
  // Canvas for Poster
  var canvas17 = new fabric.Canvas('c14');
   fabric.Image.fromURL("/image/<?php if(!empty($image)){echo $image;}  ?>", function(img) {
      img.set({
  
      });
  
      //img.scaleToWidth(250);
      canvas17.add(img);
      
      var image15 = document.getElementById("logo-canvas11");
      img.center();
      image15.src = canvas17.toDataURL();
      canvas17.requestRenderAll();
      $('#scale-control10').on('input', function () {
        $(this).trigger('change');
        img.scale(parseFloat($(this).val())).setCoords();
        canvas17.requestRenderAll();
    });
  

    $('#alignVertically10').on('click', function(){
      img.centerV();
      sleep(100).then(() => {
      img.setCoords();
      image15.src = canvas17.toDataURL();
      })
    });

    $('#alignHorizontally10').on('click', function(){
      img.centerH();
      sleep(100).then(() => {
      img.setCoords();
      image15.src = canvas17.toDataURL();
  })
    });
  });
  </script>

{{-- <script>
  // Canvas for Poster
  var canvas18 = new fabric.Canvas('c15');
   fabric.Image.fromURL("/image/", function(img) {
      img.set({
  
      });
  
      //img.scaleToWidth(250);
      canvas18.add(img);
      
      var image16 = document.getElementById("logo-canvas12");
      img.center();
      image16.src = canvas18.toDataURL();
      canvas18.requestRenderAll();
      $('#scale-control11').on('input', function () {
        $(this).trigger('change');
        img.scale(parseFloat($(this).val())).setCoords();
        canvas18.requestRenderAll();
    });
  

    $('#alignVertically11').on('click', function(){
      img.centerV();
      sleep(100).then(() => {
      img.setCoords();
      image16.src = canvas18.toDataURL();
      })
    });

    $('#alignHorizontally11').on('click', function(){
      img.centerH();
      sleep(100).then(() => {
      img.setCoords();
      image16.src = canvas18.toDataURL();
  })
    });
  });
  </script> --}}

  <script>
    // Canvas for Samsung
     var oldWidth3 = 0;
     var checkForScale = false;
     var padding = 0;
     var imageChange = false;
     var image16 = document.getElementById("logo-canvas15");
    var canvas19 = new fabric.Canvas('c17');
    var imgElement = document.getElementById('myImage');
    var object = "/image/<?php if(!empty($image)){echo $image;}  ?>";
    var imageForCanvas;
    var sel;
    
    
      load(object);
    
    
    
    
    function load(objects){
     fabric.Image.fromURL(objects, function(img) {
      
        imageForCanvas = img;
        canvas19.setWidth(250);
        canvas19.setHeight(300);
        canvas19.add(imageForCanvas);
        imageForCanvas.center();
        image16.src = canvas19.toDataURL();
        canvas19.requestRenderAll();
        
         // Repeat option for Phone case
        $('#repeat').on('click', function(){
          checkForScale = false;
          imageForCanvas.set({
                'top': 0
            });
            imageForCanvas.set({
                'left': 0
            });
            canvas19.clear();
            canvas19.requestRenderAll();
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
        canvas19.add(rect);
    
        rect.center().setCoords();
        image16.src = canvas19.toDataURL();
        canvas19.requestRenderAll();
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
            canvas19.clear();
            canvas19.requestRenderAll();
        
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
    
        canvas19.add(rect);
    
          var rect1 = new fabric.Rect({
            width: 10000,
            height: 10000,
            left:0,
            fill: pattern1,
            objectCaching: false
        });
    
    
    
        canvas19.add(rect1);
        rect.center().setCoords();
        rect1.center().setCoords();
        image16.src = canvas19.toDataURL();
        canvas19.requestRenderAll();
              var sel = new fabric.ActiveSelection(canvas19.getObjects(), {
              canvas: canvas19,
            });
            canvas19.setActiveObject(sel);
            canvas19.requestRenderAll();
       })
    
    
    
    });
    
    
    
        
    
        // None option for Phone case
        $('#none').on('click', function(){
    
            checkForScale = false;
            canvas19.clear();
            img.scaleToWidth(100);
            canvas19.add(imageForCanvas);
    
            
            image16.src = canvas19.toDataURL();
            canvas19.requestRenderAll();
        });
        // Scale option for Samsung
        $('#scale-control13').on('input', function () {
          $(this).trigger('change');
          sleep(100).then(() => {
            imageForCanvas.scale(parseFloat($(this).val())).setCoords();
          //  Repeat Vertical
    
            if(checkForScale==true){
    
              canvas19.clear();
    
            if(oldWidth3==imageForCanvas.getScaledWidth()){
             canvas19.requestRenderAll();
            }else{
              oldWidth3=imageForCanvas.getScaledWidth();
              imageForCanvas.set({
                'top': 0
            });
            imageForCanvas.set({
                'left': 0
            });
    
    
            canvas19.requestRenderAll();
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
        canvas19.add(rect);
    
          var rect1 = new fabric.Rect({
            width: 10000,
            height: 10000,
            left:0,
            fill: pattern1,
            objectCaching: false
        });
        canvas19.add(rect1);
    
        rect.center().setCoords();
        rect1.center().setCoords();
        image16.src = canvas19.toDataURL();
        canvas19.requestRenderAll();
    
               sel = new fabric.ActiveSelection(canvas19.getObjects(), {
              canvas: canvas19,
            });
            canvas19.setActiveObject(sel);
            canvas19.requestRenderAll();
       })
            }
    
    
            }else{
              canvas19.requestRenderAll();
            }
           
          })
        });
         //  Close repeat vertical
    
      // Align Vertical option for Phone case
      $('#alignVertically13').on('click', function(){
        img.centerV();
        sleep(100).then(() => {
        img.setCoords();
        image16.src = canvas19.toDataURL();
        })
      });
    
      // Align Horizontal option for Phone case
      $('#alignHorizontally13').on('click', function(){
        img.centerH();
        sleep(100).then(() => {
        img.setCoords();
        image16.src = canvas19.toDataURL();
    })
      });
    
      $('#upload-form').one('submit' , function(event){
        checkForScale = false;
        imageChange = true;
        canvas19.remove(canvas19.getObjects());
        canvas19 = null;
        $('#c3').hide();
        if(canvas19){
          canvas19.clear();
          canvas19 = null;
        }
        $('#c17').siblings('.upper-canvas').remove();
        $('#c17').parent('.canvas-container').before($('#c3'));
       // $('.canvas-container').remove();
    
        //
      /*   canvas19.requestRenderAll();
        canvas19.clear();
        canvas19.dispose(); */
        canvas19 = new fabric.Canvas('c3');
        $('#c3').show();
        canvas19.requestRenderAll();
        alert(canvas19.getObjects());
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
  // Canvas for Huawei
   var oldWidth3 = 0;
   var checkForScale = false;
   var padding = 0;
   var imageChange = false;
   var image17 = document.getElementById("logo-canvas16");
  var canvas20 = new fabric.Canvas('c18');
  var imgElement = document.getElementById('myImage');
  var object = "/image/<?php if(!empty($image)){echo $image;}  ?>";
  var imageForCanvas;
  var sel;
  
  
    load(object);
  
  
  
  
  function load(objects){
   fabric.Image.fromURL(objects, function(img) {
    
      imageForCanvas = img;
      canvas20.setWidth(250);
      canvas20.setHeight(300);
      canvas20.add(imageForCanvas);
      imageForCanvas.center();
      image17.src = canvas20.toDataURL();
      canvas20.requestRenderAll();
      
       // Repeat option for Phone case
      $('#repeat').on('click', function(){
        checkForScale = false;
        imageForCanvas.set({
              'top': 0
          });
          imageForCanvas.set({
              'left': 0
          });
          canvas20.clear();
          canvas20.requestRenderAll();
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
      canvas20.add(rect);
  
      rect.center().setCoords();
      image17.src = canvas20.toDataURL();
      canvas20.requestRenderAll();
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
          canvas20.clear();
          canvas20.requestRenderAll();
      
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
  
      canvas20.add(rect);
  
        var rect1 = new fabric.Rect({
          width: 10000,
          height: 10000,
          left:0,
          fill: pattern1,
          objectCaching: false
      });
  
  
  
      canvas20.add(rect1);
      rect.center().setCoords();
      rect1.center().setCoords();
      image17.src = canvas20.toDataURL();
      canvas20.requestRenderAll();
            var sel = new fabric.ActiveSelection(canvas20.getObjects(), {
            canvas: canvas20,
          });
          canvas20.setActiveObject(sel);
          canvas20.requestRenderAll();
     })
  
  
  
  });
  
  
  
      
  
      // None option for Phone case
      $('#none').on('click', function(){
  
          checkForScale = false;
          canvas20.clear();
          img.scaleToWidth(100);
          canvas20.add(imageForCanvas);
  
          
          image17.src = canvas20.toDataURL();
          canvas20.requestRenderAll();
      });
      // Scale option for Phone case
      $('#scale-control14').on('input', function () {
        $(this).trigger('change');
        sleep(100).then(() => {
          imageForCanvas.scale(parseFloat($(this).val())).setCoords();
        //  Repeat Vertical
  
          if(checkForScale==true){
  
            canvas20.clear();
  
          if(oldWidth3==imageForCanvas.getScaledWidth()){
            canvas20.requestRenderAll();
          }else{
            oldWidth3=imageForCanvas.getScaledWidth();
            imageForCanvas.set({
              'top': 0
          });
          imageForCanvas.set({
              'left': 0
          });
  
  
          canvas20.requestRenderAll();
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
      canvas20.add(rect);
  
        var rect1 = new fabric.Rect({
          width: 10000,
          height: 10000,
          left:0,
          fill: pattern1,
          objectCaching: false
      });
      canvas20.add(rect1);
  
      rect.center().setCoords();
      rect1.center().setCoords();
      image17.src = canvas20.toDataURL();
      canvas20.requestRenderAll();
  
             sel = new fabric.ActiveSelection(canvas20.getObjects(), {
            canvas: canvas20,
          });
          canvas20.setActiveObject(sel);
          canvas20.requestRenderAll();
     })
          }
  
  
          }else{
            canvas20.requestRenderAll();
          }
         
        })
      });
       //  Close repeat vertical
  
    // Align Vertical option for Phone case
    $('#alignVertically14').on('click', function(){
      img.centerV();
      sleep(100).then(() => {
      img.setCoords();
      image17.src = canvas20.toDataURL();
      })
    });
  
    // Align Horizontal option for Phone case
    $('#alignHorizontally14').on('click', function(){
      img.centerH();
      sleep(100).then(() => {
      img.setCoords();
      image17.src = canvas20.toDataURL();
  })
    });
  
    $('#upload-form').one('submit' , function(event){
      checkForScale = false;
      imageChange = true;
      canvas20.remove(canvas20.getObjects());
      canvas20 = null;
      $('#c18').hide();
      if(canvas20){
        canvas20.clear();
        canvas20 = null;
      }
      $('#c18').siblings('.upper-canvas').remove();
      $('#c18').parent('.canvas-container').before($('#c18'));
     // $('.canvas-container').remove();
  
      //
    /*   canvas19.requestRenderAll();
      canvas19.clear();
      canvas19.dispose(); */
      canvas20 = new fabric.Canvas('c18');
      $('#c18').show();
      canvas20.requestRenderAll();
      alert(canvas20.getObjects());
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
  // Canvas for Wallpapers
   var oldWidth3 = 0;
   var checkForScale = false;
   var padding = 0;
   var imageChange = false;
   var image18 = document.getElementById("logo-canvas17");
  var canvas21 = new fabric.Canvas('c19');
  var imgElement = document.getElementById('myImage');
  var object = "/image/<?php if(!empty($image)){echo $image;}  ?>";
  var imageForCanvas;
  var sel;
  
  
    load(object);
  
  
  
  
  function load(objects){
   fabric.Image.fromURL(objects, function(img) {
    
      imageForCanvas = img;
      canvas21.setWidth(250);
      canvas21.setHeight(300);
      canvas21.add(imageForCanvas);
      imageForCanvas.center();
      image18.src = canvas21.toDataURL();
      canvas21.requestRenderAll();
      
       // Repeat option for Phone case
      $('#repeat').on('click', function(){
        checkForScale = false;
        imageForCanvas.set({
              'top': 0
          });
          imageForCanvas.set({
              'left': 0
          });
          canvas21.clear();
          canvas21.requestRenderAll();
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
      canvas21.add(rect);
  
      rect.center().setCoords();
      image18.src = canvas21.toDataURL();
      canvas21.requestRenderAll();
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
          canvas21.clear();
          canvas21.requestRenderAll();
      
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
  
      canvas21.add(rect);
  
        var rect1 = new fabric.Rect({
          width: 10000,
          height: 10000,
          left:0,
          fill: pattern1,
          objectCaching: false
      });
  
  
  
      canvas21.add(rect1);
      rect.center().setCoords();
      rect1.center().setCoords();
      image18.src = canvas21.toDataURL();
      canvas21.requestRenderAll();
            var sel = new fabric.ActiveSelection(canvas21.getObjects(), {
            canvas: canvas21,
          });
          canvas21.setActiveObject(sel);
          canvas21.requestRenderAll();
     })
  
  
  
  });
  
  
  
      
  
      // None option for Phone case
      $('#none').on('click', function(){
  
          checkForScale = false;
          canvas21.clear();
          img.scaleToWidth(100);
          canvas21.add(imageForCanvas);
  
          
          image18.src = canvas21.toDataURL();
          canvas21.requestRenderAll();
      });
      // Scale option for Phone case
      $('#scale-control15').on('input', function () {
        $(this).trigger('change');
        sleep(100).then(() => {
          imageForCanvas.scale(parseFloat($(this).val())).setCoords();
        //  Repeat Vertical
  
          if(checkForScale==true){
  
            canvas21.clear();
  
          if(oldWidth3==imageForCanvas.getScaledWidth()){
            canvas21.requestRenderAll();
          }else{
            oldWidth3=imageForCanvas.getScaledWidth();
            imageForCanvas.set({
              'top': 0
          });
          imageForCanvas.set({
              'left': 0
          });
  
  
          canvas21.requestRenderAll();
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
      canvas21.add(rect);
  
        var rect1 = new fabric.Rect({
          width: 10000,
          height: 10000,
          left:0,
          fill: pattern1,
          objectCaching: false
      });
      canvas21.add(rect1);
  
      rect.center().setCoords();
      rect1.center().setCoords();
      image18.src = canvas21.toDataURL();
      canvas21.requestRenderAll();
  
             sel = new fabric.ActiveSelection(canvas21.getObjects(), {
            canvas: canvas21,
          });
          canvas21.setActiveObject(sel);
          canvas21.requestRenderAll();
     })
          }
  
  
          }else{
            canvas21.requestRenderAll();
          }
         
        })
      });
       //  Close repeat vertical
  
    // Align Vertical option for Phone case
    $('#alignVertically15').on('click', function(){
      img.centerV();
      sleep(100).then(() => {
      img.setCoords();
      image18.src = canvas21.toDataURL();
      })
    });
  
    // Align Horizontal option for Phone case
    $('#alignHorizontally15').on('click', function(){
      img.centerH();
      sleep(100).then(() => {
      img.setCoords();
      image18.src = canvas21.toDataURL();
  })
    });
  
    $('#upload-form').one('submit' , function(event){
      checkForScale = false;
      imageChange = true;
      canvas21.remove(canvas21.getObjects());
      canvas21 = null;
      $('#c19').hide();
      if(canvas21){
        canvas21.clear();
        canvas21 = null;
      }
      $('#c19').siblings('.upper-canvas').remove();
      $('#c19').parent('.canvas-container').before($('#c19'));
     // $('.canvas-container').remove();
  
      //
    /*   canvas19.requestRenderAll();
      canvas19.clear();
      canvas19.dispose(); */
      canvas21 = new fabric.Canvas('c19');
      $('#c19').show();
      canvas21.requestRenderAll();
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
  // Canvas for Canvas
   var oldWidth3 = 0;
   var checkForScale = false;
   var padding = 0;
   var imageChange = false;
   var image19 = document.getElementById("logo-canvas18");
  var canvas22 = new fabric.Canvas('c20');
  var imgElement = document.getElementById('myImage');
  var object = "/image/<?php if(!empty($image)){echo $image;}  ?>";
  var imageForCanvas;
  var sel;
  
  
    load(object);
  
  
  
  
  function load(objects){
   fabric.Image.fromURL(objects, function(img) {
    
      imageForCanvas = img;
      canvas22.setWidth(250);
      canvas22.setHeight(300);
      canvas22.add(imageForCanvas);
      imageForCanvas.center();
      image19.src = canvas22.toDataURL();
      canvas22.requestRenderAll();
      
       // Repeat option for Phone case
      $('#repeat').on('click', function(){
        checkForScale = false;
        imageForCanvas.set({
              'top': 0
          });
          imageForCanvas.set({
              'left': 0
          });
          canvas22.clear();
          canvas22.requestRenderAll();
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
      canvas22.add(rect);
  
      rect.center().setCoords();
      image19.src = canvas22.toDataURL();
      canvas22.requestRenderAll();
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
          canvas22.clear();
          canvas22.requestRenderAll();
      
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
  
      canvas22.add(rect);
  
        var rect1 = new fabric.Rect({
          width: 10000,
          height: 10000,
          left:0,
          fill: pattern1,
          objectCaching: false
      });
  
  
  
      canvas22.add(rect1);
      rect.center().setCoords();
      rect1.center().setCoords();
      image19.src = canvas22.toDataURL();
      canvas22.requestRenderAll();
            var sel = new fabric.ActiveSelection(canvas22.getObjects(), {
            canvas: canvas22,
          });
          canvas22.setActiveObject(sel);
          canvas22.requestRenderAll();
     })
  
  
  
  });
  
  
  
      
  
      // None option for Phone case
      $('#none').on('click', function(){
  
          checkForScale = false;
          canvas22.clear();
          img.scaleToWidth(100);
          canvas22.add(imageForCanvas);
  
          
          image19.src = canvas22.toDataURL();
          canvas22.requestRenderAll();
      });
      // Scale option for Phone case
      $('#scale-control16').on('input', function () {
        $(this).trigger('change');
        sleep(100).then(() => {
          imageForCanvas.scale(parseFloat($(this).val())).setCoords();
        //  Repeat Vertical
  
          if(checkForScale==true){
  
            canvas22.clear();
  
          if(oldWidth3==imageForCanvas.getScaledWidth()){
            canvas22.requestRenderAll();
          }else{
            oldWidth3=imageForCanvas.getScaledWidth();
            imageForCanvas.set({
              'top': 0
          });
          imageForCanvas.set({
              'left': 0
          });
  
  
          canvas22.requestRenderAll();
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
      canvas22.add(rect);
  
        var rect1 = new fabric.Rect({
          width: 10000,
          height: 10000,
          left:0,
          fill: pattern1,
          objectCaching: false
      });
      canvas22.add(rect1);
  
      rect.center().setCoords();
      rect1.center().setCoords();
      image19.src = canvas22.toDataURL();
      canvas22.requestRenderAll();
  
             sel = new fabric.ActiveSelection(canvas22.getObjects(), {
            canvas: canvas22,
          });
          canvas22.setActiveObject(sel);
          canvas22.requestRenderAll();
     })
          }
  
  
          }else{
            canvas22.requestRenderAll();
          }
         
        })
      });
       //  Close repeat vertical
  
    // Align Vertical option for Phone case
    $('#alignVertically16').on('click', function(){
      img.centerV();
      sleep(100).then(() => {
      img.setCoords();
      image19.src = canvas22.toDataURL();
      })
    });
  
    // Align Horizontal option for Phone case
    $('#alignHorizontally16').on('click', function(){
      img.centerH();
      sleep(100).then(() => {
      img.setCoords();
      image19.src = canvas22.toDataURL();
  })
    });
  
    $('#upload-form').one('submit' , function(event){
      checkForScale = false;
      imageChange = true;
      canvas22.remove(canvas22.getObjects());
      canvas22 = null;
      $('#c20').hide();
      if(canvas22){
        canvas22.clear();
        canvas22 = null;
      }
      $('#c20').siblings('.upper-canvas').remove();
      $('#c20').parent('.canvas-container').before($('#c20'));
     // $('.canvas-container').remove();
  
      //
    /*   canvas19.requestRenderAll();
      canvas19.clear();
      canvas19.dispose(); */
      canvas22 = new fabric.Canvas('c20');
      $('#c20').show();
      canvas22.requestRenderAll();
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