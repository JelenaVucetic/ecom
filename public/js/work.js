$(document).ready(function(){
    // Enable and edit Phone Case
    $('#edit-product').click(function() {
       
        if(document.getElementById('product3').style.display == 'none'){
            closeCanvas();
            document.getElementById('product3').style.display = 'flex';
        }else{
            document.getElementById('product3').style.display = 'none';
        }
    });
     $('#enabled-product').click(function(){
        if($('#proizvod').hasClass('disabledbutton')){
            $('#proizvod').removeClass('disabledbutton');
            $( "#proizvod" ).attr( "value" , 0 );
            $('#enabled-product').html('Enabled');
            $('#enabled-product').addClass('enable');
        }else{
            $('#proizvod').addClass('disabledbutton');
            $( "#proizvod" ).attr( "value", 1 );
            $('#enabled-product').html('Disabled');
            $('#enabled-product').removeClass('enable');
        }
    }); 
    // Enable and edit T-Shirt
    $('#edit-product1').click(function() {
        if(document.getElementById('product4').style.display == 'none'){
            closeCanvas();
            document.getElementById('product4').style.display = 'flex';
        }else{
            document.getElementById('product4').style.display = 'none';
        }
    });
    $('#enabled-product1').click(function(){
        if($('#proizvod1').hasClass('disabledbutton')){
            $('#proizvod1').removeClass('disabledbutton');
            $( "#proizvod1" ).attr( "value" , 0 );
            $('#enabled-product1').html('Enabled');
            $('#enabled-product1').addClass('enable');
        }else{
            $('#proizvod1').addClass('disabledbutton');
            $( "#proizvod1" ).attr( "value" , 1 );
            $('#enabled-product1').html('Disabled');
            $('#enabled-product1').removeClass('enable');
        }
    });

    // Enable and edit Mugs
    $('#edit-product2').click(function() {
        if(document.getElementById('product5').style.display == 'none'){
            closeCanvas();
            document.getElementById('product5').style.display = 'flex';
        }else{
            document.getElementById('product5').style.display = 'none';
        }
    });
    $('#enabled-product2').click(function(){
        if($('#proizvod2').hasClass('disabledbutton')){
            $('#proizvod2').removeClass('disabledbutton');
            $( "#proizvod2" ).attr( "value" , 0 );
            $('#enabled-product2').html('Enabled');
            $('#enabled-product2').addClass('enable');
        }else{
            $('#proizvod2').addClass('disabledbutton');
            $( "#proizvod2" ).attr( "value" , 1 );
            $('#enabled-product2').html('Disabled');
            $('#enabled-product2').removeClass('enable');
        }
    });
    
      // Enable and edit Hoodie
      $('#edit-product3').click(function() {
        if(document.getElementById('product6').style.display == 'none'){
            closeCanvas();
            document.getElementById('product6').style.display = 'flex';
        }else{
            document.getElementById('product6').style.display = 'none';
        }
    });
    $('#enabled-product3').click(function(){
        if($('#proizvod3').hasClass('disabledbutton')){
            $('#proizvod3').removeClass('disabledbutton');
            $( "#proizvod3" ).attr( "value" , 0 );
            $('#enabled-product3').html('Enabled');
            $('#enabled-product3').addClass('enable');
        }else{
            $('#proizvod3').addClass('disabledbutton');
            $( "#proizvod3" ).attr( "value" , 1 );
            $('#enabled-product3').html('Disabled');
            $('#enabled-product3').removeClass('enable');
        }
    });


          // Enable and edit Long Sleeve
          $('#edit-product4').click(function() {
            if(document.getElementById('product7').style.display == 'none'){
                closeCanvas();
                document.getElementById('product7').style.display = 'flex';
            }else{
                document.getElementById('product7').style.display = 'none';
            }
        });
        $('#enabled-product4').click(function(){
            if($('#proizvod4').hasClass('disabledbutton')){
                $('#proizvod4').removeClass('disabledbutton');
                $( "#proizvod4" ).attr( "value" , 0 );
                $('#enabled-product4').html('Enabled');
                $('#enabled-product4').addClass('enable');
            }else{
                $('#proizvod4').addClass('disabledbutton');
                $( "#proizvod4" ).attr( "value" , 1 );
                $('#enabled-product4').html('Disabled');
                $('#enabled-product4').removeClass('enable');
            }
        });

         // Enable and edit Graphic T-Shirt Dresses
         $('#edit-product5').click(function() {
            if(document.getElementById('product8').style.display == 'none'){
                closeCanvas();
                document.getElementById('product8').style.display = 'flex';
            }else{
                document.getElementById('product8').style.display = 'none';
            }
        });
        $('#enabled-product5').click(function(){
            if($('#proizvod5').hasClass('disabledbutton')){
                $('#proizvod5').removeClass('disabledbutton');
                $( "#proizvod5" ).attr( "value" , 0 );
                $('#enabled-product5').html('Enabled');
                $('#enabled-product5').addClass('enable');
            }else{
                $('#proizvod5').addClass('disabledbutton');
                $( "#proizvod5" ).attr( "value" , 1 );
                $('#enabled-product5').html('Disabled');
                $('#enabled-product5').removeClass('enable');
            }
        });

         // Enable and edit Stickers
         $('#edit-product6').click(function() {
            if(document.getElementById('product9').style.display == 'none'){
                closeCanvas();
                document.getElementById('product9').style.display = 'flex';
            }else{
                document.getElementById('product9').style.display = 'none';
            }
        });
        $('#enabled-product6').click(function(){
            if($('#proizvod6').hasClass('disabledbutton')){
                $('#proizvod6').removeClass('disabledbutton');
                $( "#proizvod6" ).attr( "value" , 0 );
                $('#enabled-product6').html('Enabled');
                $('#enabled-product6').addClass('enable');
            }else{
                $('#proizvod6').addClass('disabledbutton');
                $( "#proizvod6" ).attr( "value" , 1 );
                $('#enabled-product6').html('Disabled');
                $('#enabled-product6').removeClass('enable');
            }
        });


         // Enable and edit Notes
         $('#edit-product7').click(function() {
            if(document.getElementById('product10').style.display == 'none'){
                closeCanvas();
                document.getElementById('product10').style.display = 'flex';
            }else{
                document.getElementById('product10').style.display = 'none';
            }
        });
        $('#enabled-product7').click(function(){
            if($('#proizvod7').hasClass('disabledbutton')){
                $('#proizvod7').removeClass('disabledbutton');
                $( "#proizvod7" ).attr( "value" , 0 );
                $('#enabled-product7').html('Enabled');
                $('#enabled-product7').addClass('enable');
            }else{
                $('#proizvod7').addClass('disabledbutton');
                $( "#proizvod7" ).attr( "value" , 1 );
                $('#enabled-product7').html('Disabled');
                $('#enabled-product7').removeClass('enable');
            }
        });

          // Enable and edit Clock
          $('#edit-product8').click(function() {
            if(document.getElementById('product11').style.display == 'none'){
                closeCanvas();
                document.getElementById('product11').style.display = 'flex';
            }else{
                document.getElementById('product11').style.display = 'none';
            }
        });
        $('#enabled-product8').click(function(){
            if($('#proizvod8').hasClass('disabledbutton')){
                $('#proizvod8').removeClass('disabledbutton');
                $( "#proizvod8" ).attr( "value" , 0 );
                $('#enabled-product8').html('Enabled');
                $('#enabled-product8').addClass('enable');
            }else{
                $('#proizvod8').addClass('disabledbutton');
                $( "#proizvod8" ).attr( "value" , 1 );
                $('#enabled-product8').html('Disabled');
                $('#enabled-product8').removeClass('enable');
            }
        });

          // Enable and edit Termos
          $('#edit-product9').click(function() {
            if(document.getElementById('product12').style.display == 'none'){
                closeCanvas();
                document.getElementById('product12').style.display = 'flex';
            }else{
                document.getElementById('product12').style.display = 'none';
            }
        });
        $('#enabled-product9').click(function(){
            if($('#proizvod9').hasClass('disabledbutton')){
                $('#proizvod9').removeClass('disabledbutton');
                $( "#proizvod9" ).attr( "value" , 0 );
                $('#enabled-product9').html('Enabled');
                $('#enabled-product9').addClass('enable');
            }else{
                $('#proizvod9').addClass('disabledbutton');
                $( "#proizvod9" ).attr( "value" , 1 );
                $('#enabled-product9').html('Disabled');
                $('#enabled-product9').removeClass('enable');
            }
        });

            // Enable and edit Ceger
            $('#edit-product10').click(function() {
                if(document.getElementById('product13').style.display == 'none'){
                    closeCanvas();
                    document.getElementById('product13').style.display = 'flex';
                }else{
                    document.getElementById('product13').style.display = 'none';
                }
            });
            $('#enabled-product10').click(function(){
                if($('#proizvod10').hasClass('disabledbutton')){
                    $('#proizvod10').removeClass('disabledbutton');
                    $( "#proizvod10" ).attr( "value" , 0 );
                    $('#enabled-product10').html('Enabled');
                    $('#enabled-product10').addClass('enable');
                }else{
                    $('#proizvod10').addClass('disabledbutton');
                    $( "#proizvod10" ).attr( "value" , 1 );
                    $('#enabled-product10').html('Disabled');
                    $('#enabled-product10').removeClass('enable');
                }
            });

              // Enable and edit Poster
              $('#edit-product11').click(function() {
                if(document.getElementById('product14').style.display == 'none'){
                    closeCanvas();
                    document.getElementById('product14').style.display = 'flex';
                }else{
                    document.getElementById('product14').style.display = 'none';
                }
            });
            $('#enabled-product11').click(function(){
                if($('#proizvod11').hasClass('disabledbutton')){
                    $('#proizvod11').removeClass('disabledbutton');
                    $( "#proizvod11" ).attr( "value" , 0 );
                    $('#enabled-product11').html('Enabled');
                    $('#enabled-product11').addClass('enable');
                }else{
                    $('#proizvod11').addClass('disabledbutton');
                    $( "#proizvod11" ).attr( "value" , 1 );
                    $('#enabled-product11').html('Disabled');
                    $('#enabled-product11').removeClass('enable');
                }
            });

             // Enable and edit New T-shirt
             $('#edit-product12').click(function() {
                if(document.getElementById('product15').style.display == 'none'){
                    closeCanvas();
                    document.getElementById('product15').style.display = 'flex';
                }else{
                    document.getElementById('product15').style.display = 'none';
                }
            });
            $('#enabled-product12').click(function(){
                if($('#proizvod12').hasClass('disabledbutton')){
                    $('#proizvod12').removeClass('disabledbutton');
                    $( "#proizvod12" ).attr( "value" , 0 );
                    $('#enabled-product12').html('Enabled');
                    $('#enabled-product12').addClass('enable');
                }else{
                    $('#proizvod12').addClass('disabledbutton');
                    $( "#proizvod12" ).attr( "value" , 1 );
                    $('#enabled-product12').html('Disabled');
                    $('#enabled-product12').removeClass('enable');
                }
            });

                         // Enable and edit Samsung
                         $('#edit-product14').click(function() {
                            if(document.getElementById('product16').style.display == 'none'){
                                closeCanvas();
                                document.getElementById('product16').style.display = 'flex';
                            }else{
                                document.getElementById('product16').style.display = 'none';
                            }
                        });
                        $('#enabled-product14').click(function(){
                            if($('#proizvod15').hasClass('disabledbutton')){
                                $('#proizvod15').removeClass('disabledbutton');
                                $( "#proizvod15" ).attr( "value" , 0 );
                                $('#enabled-product14').html('Enabled');
                                $('#enabled-product14').addClass('enable');
                            }else{
                                $('#proizvod15').addClass('disabledbutton');
                                $( "#proizvod15" ).attr( "value" , 1 );
                                $('#enabled-product14').html('Disabled');
                                $('#enabled-product14').removeClass('enable');
                            }
                        });




           
 


    // Close other canvas edit options
    function closeCanvas(){
        var els = document.getElementsByClassName("img-div");
        Array.prototype.forEach.call(els, function(el) {
            el.style.display = 'none';
            });
    }


    // canvas on change show phone case product
    $('#product3').mouseup(function(){
        var image = document.getElementById("logo-canvas");
        image.src = canvas3.toDataURL();
    });
     // canvas on change show t-shirt product
    $('#product4').mouseup(function(){
        var image1 = document.getElementById("logo-canvas1");
        image1.src = canvas4.toDataURL();
    });
     // canvas on change show mugs product
    $('#product5').mouseup(function(){
        var image2 = document.getElementById("logo-canvas2");
        image2.src = canvas5.toDataURL();
    });
     // canvas on change show hoodie product
     $('#product6').mouseup(function(){
        var image4 = document.getElementById("logo-canvas3");
        image4.src = canvas6.toDataURL();
    });
      // canvas on change show hoodie product
      $('#product7').mouseup(function(){
        var image5 = document.getElementById("logo-canvas4");
        image5.src = canvas7.toDataURL();
    });
        // canvas on change show Graphic T-Shirt Dresses product
        $('#product8').mouseup(function(){
            var image6 = document.getElementById("logo-canvas5");
            image6.src = canvas8.toDataURL();
        });
        // canvas on change show Notes
        $('#product10').mouseup(function(){
            var image11 = document.getElementById("logo-canvas7");
            image11.src = canvas13.toDataURL();
        });

         // canvas on change show Clock
         $('#product11').mouseup(function(){
            var image12 = document.getElementById("logo-canvas8");
            image12.src = canvas14.toDataURL();
        });

          // canvas on change show Termos
          $('#product12').mouseup(function(){
            var image13 = document.getElementById("logo-canvas9");
            image13.src = canvas15.toDataURL();
        });

         // canvas on change show Ceger
         $('#product13').mouseup(function(){
            var image14 = document.getElementById("logo-canvas10");
            image14.src = canvas16.toDataURL();
        });

         // canvas on change show Poster
         $('#product14').mouseup(function(){
            var image15 = document.getElementById("logo-canvas11");
            image15.src = canvas17.toDataURL();
        });

          // canvas on change show Poster
          $('#product15').mouseup(function(){
            var image16 = document.getElementById("logo-canvas12");
            image16.src = canvas18.toDataURL();
        });

        $('#product16').mouseup(function(){
            var image17 = document.getElementById("logo-canvas15");
            image17.src = canvas19.toDataURL();
        });



    // Change phone case color
    var colorInput = document.querySelector('#color');
    colorInput.addEventListener('input', ()=>{
      $('.background-div').css("background-color", colorInput.value);
    });
    // Change T-Shirt color
    var colorInput1 = document.querySelector('#color1');
    colorInput1.addEventListener('input', ()=>{
      $('.background-div1').css("background-color", colorInput1.value);
    });
    // Change Mug color
    var colorInput2 = document.querySelector('#color2');
    colorInput2.addEventListener('input', ()=>{
      $('.background-div2').css("background-color", colorInput2.value);
    });
    // Change Hoodie color
    var colorInput3 = document.querySelector('#color3');
    colorInput3.addEventListener('input', ()=>{
      $('.background-div3').css("background-color", colorInput3.value);
    });

     // Change Long Sleeve color
     var colorInput4 = document.querySelector('#color4');
     colorInput4.addEventListener('input', ()=>{
       $('.background-div4').css("background-color", colorInput4.value);
     });
      // Change Graphic T-Shirt Dresses color
      var colorInput5 = document.querySelector('#color5');
      colorInput5.addEventListener('input', ()=>{
        $('.background-div5').css("background-color", colorInput5.value);
      });

      // Change Graphic T-Shirt Dresses color
      var colorInput6 = document.querySelector('#color6');
      colorInput6.addEventListener('input', ()=>{
        $('.background-div6').css("background-color", colorInput6.value);
      });

        // Change Clock color
        var colorInput7 = document.querySelector('#color7');
        colorInput7.addEventListener('input', ()=>{
          $('.background-div7').css("background-color", colorInput7.value);
        });

         // Change Termos color
         var colorInput8 = document.querySelector('#color8');
         colorInput8.addEventListener('input', ()=>{
           $('.background-div8').css("background-color", colorInput8.value);
         });

         
         // Change Ceger color
         var colorInput9 = document.querySelector('#color9');
         colorInput9.addEventListener('input', ()=>{
           $('.background-div9').css("background-color", colorInput9.value);
         });

          // Change Poster color
          var colorInput10 = document.querySelector('#color10');
          colorInput10.addEventListener('input', ()=>{
            $('.background-div10').css("background-color", colorInput10.value);
          });

            // Change Poster color
            var colorInput13 = document.querySelector('#color13');
            colorInput13.addEventListener('input', ()=>{
              $('.background-div14').css("background-color", colorInput10.value);
            });


          $(document).on("change", "#file", function(e){
            var label	 = document.getElementById("add-label"),
			labelVal = label.innerHTML;
          var fileName = '';
           if( this.files && this.files.length > 1 )
               fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
           else
               fileName = e.target.value.split( '\\' ).pop();

           if( fileName )
               label.querySelector( 'span' ).innerHTML = fileName;
           else
               label.innerHTML = labelVal;
          });
    
});
