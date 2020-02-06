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
            
        }else{
            $('#proizvod').addClass('disabledbutton');
            $( "#proizvod" ).attr( "value", 1 );
            $('#enabled-product').html('Disabled');
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
        }else{
            $('#proizvod1').addClass('disabledbutton');
            $( "#proizvod1" ).attr( "value" , 1 );
            $('#enabled-product1').html('Disabled');
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
        }else{
            $('#proizvod2').addClass('disabledbutton');
            $( "#proizvod2" ).attr( "value" , 1 );
            $('#enabled-product2').html('Disabled');
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
        }else{
            $('#proizvod3').addClass('disabledbutton');
            $( "#proizvod3" ).attr( "value" , 1 );
            $('#enabled-product3').html('Disabled');
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

    
});
