
    


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
        canvas3.remove(img);
        canvas3.requestRenderAll();
        canvas3.clear();
        canvas3.requestRenderAll();
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
       canvas3.remove(img);
       canvas3.requestRenderAll();
       canvas3.clear();
       canvas3.requestRenderAll();
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

<script>
  // Canvas for Poster
  var canvas18 = new fabric.Canvas('c15');
   fabric.Image.fromURL("/image/<?php if(!empty($image)){echo $image;}  ?>", function(img) {
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
  </script>