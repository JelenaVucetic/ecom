//Remove placeholder on click
$(function () {
    $('input,textarea').focus(function () {
        $(this).data('placeholder', $(this).attr('placeholder'))
            .attr('placeholder', '');
    }).blur(function () {
        $(this).attr('placeholder', $(this).data('placeholder'));
    });
});

/* Checkout page */
$('#review-and-pay').on('click', function(){
    $('#hide-review').html(' ');
});

/* Reviews and stars */


$(document).ready(function(){
    /* 1. Visualizing things on Hover - See next part for action on click */
    $('#stars li').on('mouseover', function(){
      var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

      // Now highlight all the stars that's not after the current hovered star
      $(this).parent().children('li.star').each(function(e){
        if (e < onStar) {
          $(this).addClass('hover');
        }
        else {
          $(this).removeClass('hover');
        }
      });

    }).on('mouseout', function(){
      $(this).parent().children('li.star').each(function(e){
        $(this).removeClass('hover');
      });
    });

    /* 2. Action to perform on click */
    $('#stars li').on('click', function(){
      var onStar = parseInt($(this).data('value'), 10); // The star currently selected
      var stars = $(this).parent().children('li.star');

      for (i = 0; i < stars.length; i++) {
        $(stars[i]).removeClass('selected');
      }

      for (i = 0; i < onStar; i++) {
        $(stars[i]).addClass('selected');
      }

      // JUST RESPONSE (Not needed)
      var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
      var msg = "";
      if (ratingValue > 1) {
          msg = "Thanks! You rated this " + ratingValue + " stars.";       
      }
      else {
          msg = "We will improve ourselves. You rated this " + ratingValue + " stars.";
      }
      $('#starsVal').val(ratingValue)
      responseMessage(msg);
      var proDum = $('#proDum').val();
      var userId = $('#user_id').val()
    
     /*  $.ajax({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  } ,
        type: 'post',
        dataType: 'html',
        url: '/addStar',
        data: { value:ratingValue, product_id: proDum, user_id: userId},
        success: function(response) {
            console.log(response)
        }
    }); */

    });

});

  function responseMessage(msg) {
    $('.success-box').fadeIn(200);
    $('.success-box div.text-message').html("<span>" + msg + "</span>");
  }

  $("#submit-image").click(function(e){
      e.preventDefault();
      
      email = $('#subscribe-email').val();
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       },
         type:'POST',
         dataType: 'json',
         url:'newsletter',
         data:{subscribe_email:email},
         success:function(data){
           if(data['subscribe'] == "no"){
          $('#subscribe-message').removeClass('hide');
          $('#subscribe-message').addClass('show');
         }else{
          $('#subscribe-message1').removeClass('hide');
          $('#subscribe-message1').addClass('show');
         }
        }
      });
});

$('body').on('contextmenu', 'img', function(e){ 
  return false; 
});



/*   Adding to cart */

function addToCartAjax(price, kidssize, size, color, print, phoneModel, caseStyle, customCase, posterSize, pictureSize, customSize, coasterShape, coasterDesign,maskLocation, sackType, magnetShape) {
    var proDum = $('#proDum').val();
    var parent =  $('#btn-add-to-cart');
    var parent1 =  $('#btn-add-to-cart-phone');
    var p = $('#test');
    var p1 = $('#test-phone');
    var modalAddBtn = $('#modal-add');
    $.ajax({
        headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
        type: 'post',
        dataType: 'html',
        url: '/cart/addItem/' + proDum,
        data: {
          size: size,
          kidssize: kidssize,
          color: color,
          print: print,
          phoneModel: phoneModel,
          caseStyle: caseStyle,
          customCase: customCase,
          posterSize: posterSize,
          pictureSize: pictureSize,
          customSize: customSize,
          price: price,
          coasterShape: coasterShape,
          coasterDesign:coasterDesign,
          maskLocation: maskLocation,
          sackType: sackType,
          magnetShape: magnetShape
        },
        beforeSend: function() {
              modalAddBtn.attr('data-dismiss', 'modal');
              p.html("Adding ... ");
              p1.html("Adding ... ");
          },
        success: function(response) {
          parent.css("background-color", "lightgreen");
          parent1.css("background-color", "lightgreen");
          p.html("Added");
          p1.html("Added");
          $("#number_cart_items").html(response);
          $("#number_cart_items_phone").html(response);
          setTimeout(function(){
            parent.css("background-color", '#E6003A');
            parent1.css("background-color", '#E6003A');
            p.html("Add to cart");
            p1.html("Add to cart");
          },2000);
        }
    });
  }

$(document).ready(function(){
    $('#add').on('click', function(){
        $('#btn-add-to-cart').removeAttr('data-toggle');
        $('#btn-add-to-cart').removeAttr('data-target');

        var phoneModel = $( ".cases option:selected" ).val();
        var caseStyle = $( ".cases-style option:selected" ).val();
        var posterSize = $( ".poster-size option:selected" ).val();
        var pictureSize = $( ".picture-size option:selected" ).val();
        var customSize = $('.custom-width').val() + 'x' + $('.custom-height').val() ;
        var parent = $(this).parent();
        var size = $('.size-class:checked').val();
        var color =$('input[name="color"]:checked').val();
        var kidssize = $('.kids-size-class:checked').val();
        var print = $('.print-class:checked').val();
        var customCase = $(".custom1").val();
        var pro_cat = $('#pro_cat').val();
        price = $( ".product_price" ).val();
        if((pro_cat == "T-Shirts" && size == null) || (pro_cat == "Polo Shirts" && size == null) || (pro_cat == "Tank Tops" && size == null ) || (pro_cat == "Hoodie & Sweatshirts" && size == null)) {
          $('#btn-add-to-cart').attr('data-toggle', 'modal');
          $('#btn-add-to-cart').attr('data-target', '#exampleModal');

          $('#modal-add').css('cursor', "no-drop");
          $('#modal-add div').css('background', "lightgray");
          $('#modal-add').unbind();
          $("input[name='size']").change(function(){
            $('#modal-add').bind("click", function(){
              var size =  $("input[name='size']:checked").val();
              addToCartAjax(price, kidssize, size, color, print);
            });
              $('#modal-add').css('cursor', "pointer");
              $('#modal-add div').css('background', "#E6003A");
          });
        } else if(pro_cat == "T-Shirts" || pro_cat == "Polo Shirts" || pro_cat == "Tank Tops"  || pro_cat == "Hoodie & Sweatshirts" && size == null) {
          addToCartAjax(price, kidssize, size, color, print);
        }else if (pro_cat == "Kids T-Shirts" && kidssize == null) {
          $('#btn-add-to-cart').attr('data-toggle', 'modal');
          $('#btn-add-to-cart').attr('data-target', '#exampleModal');

          $('#modal-add').css('cursor', "no-drop");
          $('#modal-add div').css('background', "lightgray");
          $('#modal-add').unbind();
          $("input[name='kids-size']").change(function(){
            $('#modal-add').bind("click", function(){
              var kidssize =  $("input[name='kids-size']:checked").val();
              addToCartAjax(price, kidssize,  null, color, print);
            });
              $('#modal-add').css('cursor', "pointer");
              $('#modal-add div').css('background', "#E6003A");
          });
        } else if  (pro_cat == "Kids T-Shirts" || pro_cat == "Kids One-Pieces"){
          addToCartAjax(price, kidssize, null, color, print);
        }
        else if(pro_cat == "Custom" && !customCase) {
          alert('Please enter your phone model');
        } else if (pro_cat == "Wallpapers") {
          $validation = $('.custom-width').val() * $('.custom-height').val() * $('.db_price').val();

          if($('.custom-width').val() == "" || $('.custom-height').val() == "") {
            alert('Please enter your wallpaper size')
          } else if ($validation != price) {
            alert('Please save your size')
          }else {
            addToCartAjax(price, null, null, null, null, null, null, null, null, null, customSize, null);
          }
        }else if (pro_cat == "Canvas Art") {
          $validation = $('.custom-width').val() * $('.custom-height').val() * $('.db_price').val();

          if($('.custom-width').val() == "" || $('.custom-height').val() == "") {
            alert('Please enter your canvas size')
          } else if ($validation != price) {
            alert('Please save your size')
          } else {
            addToCartAjax(price, null, null, null, null, null, null, null, null, pictureSize, customSize, null);
          }      
        } else if (pro_cat == "Coasters") {
          var coasterShape = $( ".coaster-shape option:selected" ).val();
          var coasterDesign = $( ".coaster-design option:selected" ).val();
          addToCartAjax(price, null, null, null, null, null, null, null, null, null, null,coasterShape,coasterDesign, null);
        } else if (pro_cat == "Magnets") {
          var magnetShape = $( ".magnet-shape option:selected" ).val();
          addToCartAjax(price, null, null, null, null, null, null, null, null, null, null,coasterShape,coasterDesign, null, magnetShape);
        }else if (pro_cat == "Masks") {
          var maskLocation = $( ".masks option:selected" ).val();
          addToCartAjax(price, null, null, color, null, null, null, null, null, null, null,coasterShape,coasterDesign, maskLocation);
        } else if (pro_cat == "Gift Bags") {
          var sackType = $( ".sacks option:selected" ).val();
          addToCartAjax(price, null, null, color, null, null, null, null, null, null, null,coasterShape,coasterDesign, null, sackType);
        } else if (pro_cat == "Bottle Openers") {
          var coasterShape = $( ".material option:selected" ).val();
          var coasterDesign = $( ".opener-design option:selected" ).val();
          addToCartAjax(price, null, null, null, null, null, null, null, null, null, null,coasterShape,coasterDesign, null);
        } else if (pro_cat == "Mugs") {
          if (color == 'white') {
            var  price = $( ".product_price" ).val();
          } else {
            var price = $('.product_b2_price').val();
          }
          addToCartAjax(price, null, null, color, null, null, null, null, null, null, null, null, null, null);
        }else {
            addToCartAjax(price, kidssize, size, color, print, phoneModel, caseStyle, customCase, posterSize, pictureSize, null, null, null, null);
          }
      });

});
 $(document).ready(function(){
  $('.pink div').removeClass( "black-border");
  $('.blue div').removeClass( "black-border");
  $('.whitePink div').removeClass( "black-border");
  $('input[type=radio][name=color]').change(function() {
    if(this.value == 'white'){
      $('.pink div').removeClass( "black-border");
      $('.blue div').removeClass( "black-border");
      $('.white div').addClass( "black-border")
    } else if(this.value == 'pink'){
      $('.pink div').addClass( "black-border")
      $('.blue div').removeClass( "black-border");
      $('.white div').removeClass( "black-border")
    } else if(this.value == 'white and blue') {
      $('.whiteBlue div').addClass( "black-border")
      $('.whitePink div').removeClass( "black-border")
    } else {
      $('.pink div').removeClass( "black-border")
      $('.blue div').addClass( "black-border");
      $('.white div').removeClass( "black-border")
      $('.whiteBlue div').removeClass( "black-border")
      $('.whitePink div').addClass( "black-border")
    }
  });
});

/* Mugs color */
$(document).ready(function(){
  $('.neon div').removeClass( "black-border");
  var pro_cat = $('#pro_cat').val();
  if(pro_cat == 'Mugs') {
  $('input[type=radio][name=color]').change(function() {
    if(this.value == 'white'){
      $('.neon div').removeClass( "black-border");
      $('.white div').addClass( "black-border")
      $('.A3_price').css('display', 'block')
      $('.B2_price').css('display', 'none')
    }  else {
      $('.white div').removeClass( "black-border");
      $('.neon div').addClass( "black-border")
      $('.A3_price').css('display', 'none')
      $('.B2_price').css('display', 'block')
    }
  });
}
});

/* $(document).ready(function(){
  var pro_cat = $('#pro_cat').val();
  if(pro_cat == 'Canvas Art') {
    var newPrice = $( "#picture option:selected" ).attr('data-price');
    $(".product_price").val(newPrice)
  }
}) */

$(document).ready(function(){
  $('.black div').removeClass( "white-border");
  $('.black span').css('border', "none");
  $('.navy div').removeClass( "white-border");
  $('.navy span').css('border', "none");
  $('.white test').addClass( "black-border")
  $('.red div').removeClass( "black-border")

  $('input[type=radio][name=color]').change(function() {
  if(this.value == 'white'){
    $('.black div').removeClass( "white-border");
    $('.navy div').removeClass( "white-border");
    $('.navy span').css('border', "none");
    $('.black span').css('border', "none");
    $('.white div').addClass( "black-border")
  } else if(this.value == 'red') {
    $('.white div').removeClass( "black-border")
    $('.black div').removeClass( "white-border");
    $('.navy div').removeClass( "white-border")
    $('.red div').addClass( "black-border");
    $('.red span').css('border', "1px solid #DEDEDE;");
  } else if( this.value == 'navy' ) {
    $('.navy div').addClass( "white-border");
    $('.navy span').css('border', "1px solid #DEDEDE;");
    $('.white div').removeClass( "black-border")
    $('.red div').removeClass( "black-border")
    $('.black div').removeClass( "white-border");
    $('.black span').css('border', "none");
  } else {
    $('.black div').addClass( "white-border");
    $('.black span').css('border', "1px solid #DEDEDE;");
    $('.white div').removeClass( "black-border")
    $('.red div').removeClass( "black-border")
    $('.navy div').removeClass( "white-border");
    $('.navy span').css('border', "none");
  }

});


$('#picture-custom').css('display', "none");
  var pro_cat = $('#pro_cat').val();
  $('.options li').on('click', function() {
    var pictureSize = $( "#picture option:selected" ).val();
      if(pro_cat == "Canvas Art" && pictureSize == 'custom') {
        $('#picture-custom').css('display', "block");
        $('.B2_price').css('display', 'none')
        $('.B1_price').css('display', 'none')
        $('.A3_price').css('display', 'block')

        $("#save-picture-size").click(function(){
          var attrWidth = $('#picture-custom-width').attr('readonly');
          var attrHeight = $('#picture-custom-height').attr('readonly');
          if ((typeof attrWidth !== typeof undefined && attrWidth !== false) || (typeof attrHeight !== typeof undefined && attrHeight !== false)) {
            $("#picture-custom-width").attr("readonly", false);
            $("#picture-custom-width").css("background", 'white');
            $("#picture-custom-width").css("color", 'black');
            $("#picture-custom-height").attr("readonly", false);
            $("#picture-custom-height").css("background", 'white');
            $("#picture-custom-height").css("color", 'black');
            $("#save-picture-size").html('Save');
          } else {
            if( !$("#picture-custom-width").val() || !$("#picture-custom-height").val()) {
              alert("Please enter your picture size")
            } else if ($("#picture-custom-width").val() == 0 ) {
              alert('false')
            } else {
                $("#picture-custom-width").attr("readonly", true);
                $("#picture-custom-width").css("background", '#F5F5F5');
                $("#picture-custom-width").css("color", '#adacac');
                $("#picture-custom-height").attr("readonly", true);
                $("#picture-custom-height").css("background", '#F5F5F5');
                $("#picture-custom-height").css("color", '#adacac');
                $("#save-picture-size").html('Edit');

                var newPrice =  ($("#picture-custom-width").val() * $("#picture-custom-height").val() * $('.db_price').val()) / 100;
                $('.A3_price span').html(newPrice);
                $("#custom-option").attr('data-price', newPrice)
                $(".product_price").val(newPrice)
            }
        }
        });

      } else if( pro_cat == "Canvas Art" && pictureSize == 'B2') {
        $('#picture-custom').css('display', "none");
        $('.B2_price').css('display', 'block')
        $('.B1_price').css('display', 'none')
        $('.A3_price').css('display', 'none')
        var newPrice = $( "#picture option:selected" ).attr('data-price');
        $(".product_price").val(newPrice)
      } else if( pro_cat == "Canvas Art" && pictureSize == 'B1'){
          $('#picture-custom').css('display', "none");
          $('.B2_price').css('display', 'none')
          $('.B1_price').css('display', 'block')
          $('.A3_price').css('display', 'none')
          var newPrice = $( "#picture option:selected" ).attr('data-price');
          $(".product_price").val(newPrice)
        } else {
          console.log('ok')
        }

      if(pro_cat == 'Posters') {
        if( $( ".poster-size option:selected" ).val() == 'B2' ) {
          $('.A3_price').css('display', 'none')
          $('.B2_price').css('display', 'block')
          $('.B1_price').css('display', 'none')
        } else if( $( ".poster-size option:selected" ).val() == 'B1' ) {
          $('.A3_price').css('display', 'none')
          $('.B2_price').css('display', 'none')
          $('.B1_price').css('display', 'block')
        } else {
          $('.A3_price').css('display', 'block')
          $('.B2_price').css('display', 'none')
          $('.B1_price').css('display', 'none')
        }
        var price = $( ".poster-size option:selected" ).attr('data-price');
        $(".product_price").val(price)
      }

  });


});

$(document).ready(function() {
  $("#save-wallpaper-size").click(function(){
    var attrWidth = $('#wallpaper-custom-width').attr('readonly');
    var attrHeight = $('#wallpaper-custom-height').attr('readonly');
    if ((typeof attrWidth !== typeof undefined && attrWidth !== false) || (typeof attrHeight !== typeof undefined && attrHeight !== false)) {
      $("#wallpaper-custom-width").attr("readonly", false);
      $("#wallpaper-custom-width").css("background", 'white');
      $("#wallpaper-custom-width").css("color", 'black');
      $("#wallpaper-custom-height").attr("readonly", false);
      $("#wallpaper-custom-height").css("background", 'white');
      $("#wallpaper-custom-height").css("color", 'black');
      $("#save-wallpaper-size").html('Save');
    } else {
      if( !$("#wallpaper-custom-width").val() || !$("#wallpaper-custom-height").val()) {
        alert("Please enter your wallpaper size")
      } else {
          $("#wallpaper-custom-width").attr("readonly", true);
          $("#wallpaper-custom-width").css("background", '#F5F5F5');
          $("#wallpaper-custom-width").css("color", '#adacac');
          $("#wallpaper-custom-height").attr("readonly", true);
          $("#wallpaper-custom-height").css("background", '#F5F5F5');
          $("#wallpaper-custom-height").css("color", '#adacac');
          $("#save-wallpaper-size").html('Edit');

          var newPrice =  ($("#wallpaper-custom-width").val() * $("#wallpaper-custom-height").val() * $('.db_price').val());
          $('.A3_price span').html(newPrice);
          $(".product_price").val(newPrice)
      }
  }
  });
});

$(document).ready(function(){
  var pro_cat = $('#pro_cat').val();
  if(pro_cat == "Canvas Art") {
    $('.A3_price').css('display', 'none')
    $('.B2_price').css('display', 'block')
  }
  if(pro_cat == "Clocks") {
    $('.black-border').css('border', 'none')   
    $('input[type=radio][name=color]').change(function() {
      if(this.value == 'white'){
        $('.black-border span').css('border', '1px solid black')  
        $('.black div').removeClass( "white-border");
      } else {
        $('.black-border span').css('border', 'none')  
        $('.black div').addClass( "white-border");
    }
  })
  }
});

$(document).ready(function(){
  $("#custom-phone-model").click(function(){
    var attr = $('#input-custom-phone').attr('readonly');
    if (typeof attr !== typeof undefined && attr !== false) {
      $("#input-custom-phone").attr("readonly", false);
      $("#input-custom-phone").css("background", 'transparent');
      $("#input-custom-phone").css("color", 'black');
      $("#custom-phone-model").html('Save');
   } else {
     if( !$("#input-custom-phone").val()) {
       alert("Please enter your size")
     } else {
        $("#input-custom-phone").attr("readonly", true);
        $("#input-custom-phone").css("background", '#F5F5F5');
        $("#input-custom-phone").css("color", '#adacac');
        $("#custom-phone-model").html('Edit');
     }
   }
  });
});



$(document).ready(function(){
    $("input[name='print").change(function(){
      if($('.print-class:checked').val() == 'back') {
      $('.front span ').css( {'background' :'white', 'color':'black'});
      } else {
        $('.front span ').css( {'background' :'black', 'color':'white'});
      }
    });
});

$(document).ready(function(){
  $('.whiteBlack div').removeClass( "black-border");
  $('input[type=radio][name=color]').change(function() {
    if(this.value == 'white and black'){
      $('.whiteRed div').removeClass( "black-border");
      $('.whiteBlack div').addClass( "black-border")
    }  else {
      $('.whiteRed div').addClass( "black-border");
      $('.whiteBlack div').removeClass( "black-border")
    }
  });
});

/* Backpacks color */
$(document).ready(function(){

  var pro_cat = $('#pro_cat').val();
  if(pro_cat == 'Backpacks') {
    $('.black div').addClass( "white-border");
    $('.black span').css('border', "none");
  $('input[type=radio][name=color]').change(function() {
    if(this.value == 'black'){
      $('.black div').addClass( "white-border");
      $('.black span').css('border', "1px solid #DEDEDE;");
      $('.red div').removeClass( "black-border")
    }  else {
      $('.black div').removeClass( "white-border");
      $('.black span').css('border', "none");
      $('.red div').addClass( "black-border")
    }
  });
}
});

/* Style of select  */

// Iterate over each select element
$('select').each(function () {

  // Cache the number of options
  var $this = $(this),
      numberOfOptions = $(this).children('option').length;

  // Hides the select element
  $this.addClass('s-hidden');

  // Wrap the select element in a div
  $this.wrap('<div class="select"></div>');

  // Insert a styled div to sit over the top of the hidden select element
  $this.after('<div class="styledSelect"></div>');

  // Cache the styled div
  var $styledSelect = $this.next('div.styledSelect');

  // Show the first select option in the styled div
  $styledSelect.text($this.children('option').eq(0).text());

  // Insert an unordered list after the styled div and also cache the list
  var $list = $('<ul />', {
      'class': 'options',

  }).insertAfter($styledSelect);

  // Insert a list item into the unordered list for each select option
  for (var i = 0; i < numberOfOptions; i++) {
      $('<li />', {
          text: $this.children('option').eq(i).text(),
          rel: $this.children('option').eq(i).val()
      }).appendTo($list);
  }

  // Cache the list items
  var $listItems = $list.children('li');

  // Show the unordered list when the styled div is clicked (also hides it if the div is clicked again)
  $styledSelect.click(function (e) {
      e.stopPropagation();
      $('div.styledSelect.active').each(function () {
          $(this).removeClass('active').next('ul.options').hide();
      });
      $(this).toggleClass('active').next('ul.options').toggle();
  });

  // Hides the unordered list when a list item is clicked and updates the styled div to show the selected list item
  // Updates the select element to have the value of the equivalent option
  $listItems.click(function (e) {
      e.stopPropagation();
      $styledSelect.text($(this).text()).removeClass('active');
      $this.val($(this).attr('rel'));
      $list.hide();
      /* alert($this.val()); Uncomment this for demonstration! */
  });

  // Hides the unordered list when clicking outside of it
  $(document).click(function () {
      $styledSelect.removeClass('active');
      $list.hide();
  });

});



/* average rating star */

$(document).ready(function(){
    $(".rateyo").rateYo({
      starWidth: "30px",
      ratedFill: "#000000",
      spacing: "10px",
    }).rateYo('option', 'readOnly', true);
})



$(document).ready(function(){
  $(".rateyoPhone").rateYo({
    starWidth: "15px",
    ratedFill: "#000000",
    spacing: "5px",
  }).rateYo('option', 'readOnly', true);
})

$(document).ready(function(){
  $(".rateyoo").rateYo({
    starWidth: "15px",
    ratedFill: "#000000",
    spacing: "5px",
  }).rateYo('option', 'readOnly', true);
})



/* Phone js */

$(document).ready(function(){
  $('#phone-add').on('click', function(){
      $('#btn-add-to-cart-phone').removeAttr('data-toggle');
      $('#btn-add-to-cart-phone').removeAttr('data-target');

      var phoneModel = $( ".cases option:selected" ).val();
      var caseStyle = $( ".cases-style option:selected" ).val();
      var posterSize = $( ".poster-size option:selected" ).val();
      var pictureSize = $( ".picture-size option:selected" ).val();
      var parent = $(this).parent();
      var size = $('.size-class:checked').val();
      var customSize = $('.custom-width').val() + 'x' + $('.custom-height').val() ;
      var kidssize = $('.kids-size-class:checked').val();
      var color =$('input[name="color"]:checked').val();
      var print = $('.print-class:checked').val();
      var customCase = $("#custom").val();

      var pro_cat = $('#pro_cat').val();
      price = $( ".product_price" ).val();

      if((pro_cat == "T-Shirts" && size == null) || (pro_cat == "Polo Shirts" && size == null) || (pro_cat == "Tank Tops" && size == null ) || (pro_cat == "Hoodie & Sweatshirts" && size == null)) {
        $('#btn-add-to-cart-phone').attr('data-toggle', 'modal');
        $('#btn-add-to-cart-phone').attr('data-target', '#exampleModal');

        $('#modal-add').css('cursor', "no-drop");
        $('#modal-add div').css('background', "lightgray");
        $('#modal-add').unbind();
        $("input[name='size']").change(function(){
          $('#modal-add').bind("click", function(){
            var size =  $("input[name='size']:checked").val();
            addToCartAjax(price, kidssize, size, color, print, null, null, null, null, null, null);
          });
            $('#modal-add').css('cursor', "pointer");
            $('#modal-add div').css('background', "#E6003A");
        });
      } else if(pro_cat == "T-Shirts" || pro_cat == "Polo Shirts" || pro_cat == "Tank Tops"  || pro_cat == "Hoodie & Sweatshirts" && size == null) {
        addToCartAjax(price, kidssize, size, color, print, null, null, null, null, null, null);
      } else if (pro_cat == "Kids T-Shirts" && kidssize == null) {
        $('#btn-add-to-cart-phone').attr('data-toggle', 'modal');
        $('#btn-add-to-cart-phone').attr('data-target', '#exampleModal');

        $('#modal-add').css('cursor', "no-drop");
        $('#modal-add div').css('background', "lightgray");
        $('#modal-add').unbind();
        $("input[name='kids-size']").change(function(){
          $('#modal-add').bind("click", function(){
            var kidssize =  $("input[name='kids-size']:checked").val();
            addToCartAjax(price, kidssize,  null, color, print, null, null, null, null, null, null);
          });
            $('#modal-add').css('cursor', "pointer");
            $('#modal-add div').css('background', "#E6003A");
        });
      }  else if  (pro_cat == "Kids T-Shirts" || pro_cat == "Kids One-Pieces"){
        addToCartAjax(price, kidssize, null, color, print, null, null, null, null, null, null);
      }  else if(pro_cat == 'Posters') {
        var price = $( ".poster-size option:selected" ).attr('data-price');
        addToCartAjax(price, kidssize, size, color, print, phoneModel, caseStyle, customCase, posterSize, pictureSize, null, price);
      }  else if(pro_cat == "Custom" && !customCase) {
        alert('Please enter your phone model');
      } else if (pro_cat == "Wallpapers") {
        addToCartAjax(price, kidssize, size, color, print, phoneModel, caseStyle, customCase, posterSize, pictureSize, customSize);
      } else if (pro_cat == "Pictures") {
        addToCartAjax(price, null, null, null, null, null, null, null, null, pictureSize, customSize);
      } else if (pro_cat == "Coasters") {
        var coasterShape = $( ".coaster-shape option:selected" ).val();
        var coasterDesign = $( ".coaster-design option:selected" ).val();
        addToCartAjax(price, null, null, null, null, null, null, null, null, null, null,coasterShape,coasterDesign);
      } else if (pro_cat == "Bottle Openers") {
        var coasterShape = $( ".material option:selected" ).val();
        var coasterDesign = $( ".opener-design option:selected" ).val();
        addToCartAjax(price, null, null, null, null, null, null, null, null, null, null,coasterShape,coasterDesign);
      } else if (pro_cat == "Mugs") {
        if (color == 'white') {
          var  price = $( ".product_price" ).val();
        } else {
          var price = $('.product_b2_price').val();
        }
        addToCartAjax(price, null, null, color, null, null, null, null, null, null, null, null, null);
      }else {
          addToCartAjax(price, kidssize, size, color, print, phoneModel, caseStyle, customCase, posterSize, pictureSize,null, null, null);
        }
    });
});



/* Close dropdown on click */

$("#closeDropdown").click(function(event) {
  event.preventDefault();
  $(this).closest(".dropdown-menu").prev().dropdown("toggle");
});




jQuery('<div class="quantity-nav"><div class="quantity-button quantity-up">+</div><div class="quantity-button quantity-down">-</div></div>').insertAfter('.quantity input');
jQuery('.quantity').each(function() {
  var spinner = jQuery(this),
    input = spinner.find('input[type="number"]'),
    btnUp = spinner.find('.quantity-up'),
    btnDown = spinner.find('.quantity-down'),
    min = input.attr('min'),
    max = input.attr('max');

  btnUp.click(function() {
    var oldValue = parseFloat(input.val());
    if (oldValue >= max) {
      var newVal = oldValue;
    } else {
      var newVal = oldValue + 1;
    }
    spinner.find("input").val(newVal);
    spinner.find("input").trigger("change");
  });

  btnDown.click(function() {
    var oldValue = parseFloat(input.val());
    if (oldValue <= min) {
      var newVal = oldValue;
    } else {
      var newVal = oldValue - 1;
    }
    spinner.find("input").val(newVal);
    spinner.find("input").trigger("change");
  });

});


/* Categories sidebar */

  var bold = $(".id-hidden").val();
  boldCategory(bold);
  function boldCategory(id){
    var category_bold = document.getElementsByClassName("side-category");
    for(var i=0;i<category_bold.length;i++){
      if(id == category_bold[i].getAttribute("data-category")){
        category_bold[i].style.fontWeight = "bold";
      }else{
        category_bold[i].style.fontWeight = "400";
      }

    }
  }

  var url = window.location.href;
  var number = url.charAt(url.length-1);
  $("#"+number).attr("aria-expanded","true");
  if($("#"+number).hasClass("collapsed")){
    $("#"+number).removeClass("collapsed");
  }
  $("#"+number).next("ul").addClass("show");



$(".side-category-gender").on("click" ,function(){
  var genders_div = document.getElementsByClassName("gender");
  for(var i = 0;i<genders_div.length;i++){
    if(genders_div[i].getAttribute("data-value") == this.getAttribute("data-value")){
      genders_div[i].style.display = "block";
      sendGender( this.getAttribute("data-value"));
    }else{
      genders_div[i].style.display = "none";
    }
  }
});

$("#man-mobile").on("click", function(){

  if($("#category-paragraph").attr("data-gender") == "male"){
    sendGender(null);
    $(this).prop("checked", false);
    $("#span-man").css("background", "white")
    $("#span-man").css("color", "black")
  }else{
    sendGenderMobile("male");
    $(this).prop("checked", true);
    $("#span-woman").css("background", "white")
    $("#span-woman").css("color", "black")
    $("#span-man").css("background", "black")
    $("#span-man").css("color", "white")
  }
});

$("#woman-mobile").on("click", function(){
  if($("#category-paragraph").attr("data-gender") == "female"){
    sendGender(null);
    $(this).prop("checked", false);
    $("#span-woman").css("background", "white")
    $("#span-woman").css("color", "black")
  }else{
    sendGenderMobile("female");
    $(this).prop("checked", true);
    $("#span-man").css("background", "white")
    $("#span-man").css("color", "black")
    $("#span-woman").css("background", "black")
    $("#span-woman").css("color", "white")
  }
});

 $("#male-x").on("click", function(){
  document.getElementById("male-div").style.display = "none";
  sendGender(null);
});

$("#female-x").on("click", function(){
  document.getElementById("female-div").style.display = "none";
  sendGender(null);
});


  function sendGenderMobile(gender){
    var attribute = $("#category-paragraph").attr("data-myattribute");
    var number = $("#category-paragraph").attr("data-id");
    $.ajax({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              } ,
    type: 'post',
    dataType: 'html',
    url: '/category_search',
    data: { category:attribute, number:number, gender:gender},
    success: function(response) {
        $("#content").html(response);
        $("#category-paragraph").attr("data-gender", gender);
    }
});
  }

 function sendGender(gender){
      var attribute = $("#category-paragraph").attr("data-myattribute");
      var number = $("#category-paragraph").attr("data-id");
      $("#category-paragraph").text("");
      $("#category-paragraph").text(attribute);
      $("#category-paragraph").attr("data-myattribute",attribute);
      $("#category-paragraph").attr("data-id",number);
      $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                } ,
      type: 'post',
      dataType: 'html',
      url: '/category_search',
      data: { category:attribute, number:number, gender:gender},
      success: function(response) {
          $("#content").html(response);
          $("#category-paragraph").attr("data-gender", gender);
      }
  });
}




  var elements = document.getElementsByClassName("side-category");

  var myFunction = function(event) {
    event.preventDefault();
      var attribute = this.getAttribute("data-myattribute");
      var number = this.getAttribute("data-id");
      var category = this.getAttribute("data-category");

      $("#category-paragraph").text("");
      $("#category-paragraph").text(attribute);
      $("#category-paragraph").attr("data-myattribute",attribute);
      $("#category-paragraph").attr("data-id",category);
      $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                } ,
      type: 'post',
      dataType: 'html',
      url: '/category_search',
      data: { category:attribute, number:number},
      success: function(response) {

          $("#content").html(response);
          attribute = attribute.replace(/ /g,"");
           history.replaceState({page: window.location.hostname+"/category/"}, "", category + "?" + attribute +"="  + number);
           boldCategory(category);

      }
  });
  };

  for (var i = 0; i < elements.length; i++) {
      elements[i].addEventListener('click', myFunction, false);

  }


    $("#query1").keyup(function (){
      var data = $("#query1").val();
      $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                } ,
      type: 'post',
      dataType: 'html',
      url: '/search',
      data: { data:data},
      success: function(response) {
        $(".row").html(response);
        history.replaceState({page: window.location.hostname+"/search"}, "", "/search?query="  + data);
      }
  });
    })

    $(".remove-wishlist").on("click", function(){
    var pro_id = $(this).attr("data-id");
    alert(pro_id);
    $.ajax({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              } ,
    type: 'get',
    dataType: 'html',
    url: '/removeWishList/' + pro_id,
    data: { data:pro_id},
    success: function(response) {
      $("#wishlist-load").html(response);
    }
});
    });


    function sendWishList(){
      var id = $("#productID").val();
      $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                } ,
      method: 'POST',
      dataType: 'html',
      url: "/addToWishlist",
      data: { id:id},
      success: function(response) {
      if(response == "OK"){
        $("#sendWishList").addClass("hoverd");
      }else if(response == "BAD"){
      alert("Connection error!");
      }else{
        window.location.href = '/login'
      }
      }/* ,error : function (jqXHR, textStatus, errorThrown) {
        window.location.href = '/login';
    } */
  });
    }

    $("#sendWishList").on("click", function(){
      sendWishList();
    });

    $("#phoneSendWishList").on("click", function(){
      sendWishList();
    });

// Za majicu print
    $('input[type=radio][name=print]').change(function() {
     var position = this.value;
     var color = $("#productColor").val();
     var id = $("#productID").val();
     var gender = $("#productGender").val();
     $.ajax({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              } ,
    type: 'post',
    dataType: 'json',
    url: '/load_images',
    data: { position:position, color:color, id:id, gender:gender},
    beforeSend: function(){
      $("#loading-overlay").show();
  },
    success: function(response) {
      $("#loading-overlay").hide();
       var blank = response['blankImage'];
       var name = response['image']['name'];
      $("#main-image").attr("src","../image/" +name);
      if(response['gender']!="unisex"){
        $("#blank-image").attr("src","../site-images/" + blank);
      }else{
        $("#blank-image").attr("src","../image/" + blank);
      }
      if(response['gender']!="unisex"){
        $("#blank-image-mobile").attr("src","../site-images/" + blank);
      }else{
        $("#blank-image-mobile").attr("src","../image/" + blank);
      }
      $("#main-image-mobile").attr("src","../image/" +name);

      $("#productColor").val(response['image']['color']);
    },
    error: function (jqXHR, textStatus, errorThrown) {
      $("#loading-overlay").hide();
      alert("something went wrong");
  }
  });
  });

  // Za majicu boja
  $('input[type=radio][name=color]').change(function() {
    var pro_cat = $('#pro_cat').val();
    if(pro_cat=="Posters"){
      var id = $("#productID").val();
      var size = $("#posters option:selected" ).val();
      var color = this.value;
      $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                } ,
      type: 'post',
      dataType: 'json',
      url: '/load_images_posters',
      data: { color:color, pro_cat:pro_cat, size:size, id:id},
      beforeSend: function(){
        $("#loading-overlay").show();
    },
      success: function(response) {
        $("#loading-overlay").hide();
         var blank = response['blankImage'];
         var name = response['image']['name'];
        $("#main-image").attr("src","../image/" +name);
        $("#blank-image").attr("src","../site-images/" + blank);
        $("#main-image-mobile").attr("src","../image/" +name);
        $("#blank-image-mobile").attr("src","../site-images/" + blank);
        $("#productColor").val(response['image']['color']);
      },
      error: function (jqXHR, textStatus, errorThrown) {
        $("#loading-overlay").hide();
        alert("something went wrong");
    }
    });
    }else if(pro_cat=="Tote Bags" || pro_cat=="Clocks" || pro_cat=="Notebooks" || pro_cat=="Makeup Bags" ||  pro_cat=="Backpacks"){
      var id = $("#productID").val();
      var color = this.value;
      $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                } ,
      type: 'post',
      dataType: 'json',
      url: '/load_images_color',
      data: { color:color, pro_cat:pro_cat, id:id},
      beforeSend: function(){
        $("#loading-overlay").show();
    },
      success: function(response) {
        $("#loading-overlay").hide();
         var blank = response['blankImage'];
         var name = response['image']['name'];
        $("#main-image").attr("src","../image/" +name);
        $("#blank-image").attr("src","../site-images/" + blank);
        $("#main-image-mobile").attr("src","../image/" +name);
        $("#blank-image-mobile").attr("src","../site-images/" + blank);
        $("#productColor").val(response['image']['color']);
      },
      error: function (jqXHR, textStatus, errorThrown) {
        $("#loading-overlay").hide();
        alert("something went wrong");
    }
    });
    }else if(pro_cat=="Masks"){
      var id = $("#productID").val();
      var color = this.value;
      $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                } ,
      type: 'post',
      dataType: 'json',
      url: '/load_images_masks',
      data: { color:color, pro_cat:pro_cat, id:id},
      beforeSend: function(){
        $("#loading-overlay").show();
    },
      success: function(response) {
        $("#loading-overlay").hide();
         var blank = response['blankImage'];
         var name = response['image']['name'];
        $("#main-image").attr("src","../image/" +name);
        $("#blank-image").attr("src","../site-images/" + blank);
        $("#main-image-mobile").attr("src","../image/" +name);
        $("#blank-image-mobile").attr("src","../site-images/" + blank);
        $("#productColor").val(response['image']['color']);
      },
      error: function (jqXHR, textStatus, errorThrown) {
        $("#loading-overlay").hide();
        alert("something went wrong");
    }
    });
    }else{
    var position = $('input[type=radio][name=print]:checked').val();
    var color = this.value;
    var gender = $("#productGender").val();
    var id = $("#productID").val();
    $.ajax({
     headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             } ,
   type: 'post',
   dataType: 'json',
   url: '/load_images',
   data: { position:position, color:color, id:id, gender:gender},
   beforeSend: function(){
    $("#loading-overlay").show();
},
   success: function(response) {
    $("#loading-overlay").hide();
      var blank = response['blankImage'];
      var name = response['image']['name'];
     $("#main-image").attr("src","../image/" +name);
     if(response['gender']!="unisex"){
      $("#blank-image").attr("src","../site-images/" + blank);
    }else{
      $("#blank-image").attr("src","../image/" + blank);
    }
    if(response['gender']!="unisex"){
      $("#blank-image-mobile").attr("src","../site-images/" + blank);
    }else{
      $("#blank-image-mobile").attr("src","../image/" + blank);
    }
     $("#main-image-mobile").attr("src","../image/" +name);

     $("#productColor").val(response['image']['color']);
   },
   error: function (jqXHR, textStatus, errorThrown) {
     $("#loading-overlay").hide();
     alert("something went wrong");
 }
 });


    }
 });

 //Za telefon





 $('.options li').on('click', function() {
    var pro_cat = $('#pro_cat').val();
    var id = $("#productID").val();
    if(pro_cat=="Posters"){
      var color = $('input[name="color"]:checked').val();
      var size = $("#posters option:selected" ).val();
      $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                } ,
      type: 'post',
      dataType: 'json',
      url: '/load_images_posters',
      data: { color:color, pro_cat:pro_cat, size:size, id:id},
      beforeSend: function(){
        $("#loading-overlay").show();
      },
      success: function(response) {
        $("#loading-overlay").hide();
         var blank = response['blankImage'];
         var name = response['image']['name'];
        $("#main-image").attr("src","../image/" +name);
        $("#blank-image").attr("src","../site-images/" + blank);
       
        $("#main-image-mobile").attr("src","../image/" +name);
        $("#blank-image-mobile").attr("src","../site-images/" + blank);
        $("#productColor").val(response['image']['color']);
      },
      error: function (jqXHR, textStatus, errorThrown) {
        $("#loading-overlay").hide();
        alert("something went wrong");
    }
    });
    }else if(pro_cat=="Coasters" || pro_cat=="Magnets"){
      var size = $("option:selected" ).val();
      $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                } ,
      type: 'post',
      dataType: 'json',
      url: '/load_images_size',
      data: {  pro_cat:pro_cat, size:size, id:id},
      beforeSend: function(){
        $("#loading-overlay").show();
    },
      success: function(response) {
        $("#loading-overlay").hide();
         var blank = response['blankImage'];
         var name = response['image']['name'];
        $("#main-image").attr("src","../image/" +name);
        $("#blank-image").attr("src","../site-images/" + blank);
       
        $("#main-image-mobile").attr("src","../image/" +name);
        $("#blank-image-mobile").attr("src","../site-images/" + blank);
        $("#productColor").val(response['image']['color']);
      },
      error: function (jqXHR, textStatus, errorThrown) {
        $("#loading-overlay").hide();
        alert("something went wrong");
    }
    });
    } else if(pro_cat=="Canvas Art"){ 
      var newPrice = $( "#picture option:selected" ).attr('data-price');
      $(".product_price").val(newPrice)
    } else if(pro_cat=="Custom" || pro_cat=="Huawei Cases" || pro_cat=="Samsung Cases" || pro_cat=="Iphone Cases" ){
      var color = $( ".cases-style option:selected" ).val();
      var id = $("#productID").val();
      var pro_cat = $("#pro_cat").val();
      var phoneModel = $( ".cases option:selected" ).val();
      console.log(color, id, pro_cat, phoneModel);
      $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                } ,
      type: 'post',
      dataType: 'json',
      url: '/load_images_phone',
      data: { color:color, id:id, pro_cat:pro_cat, phoneModel:phoneModel},
      beforeSend: function(){
        $("#loading-overlay").show();
    },
    success: function(response) {
      $("#loading-overlay").hide();
      var blank = response['blankImage'];
      var name = response['image']['name'];
      $("#main-image").attr("src","../image/" +name);
      $("#blank-image").attr("src","../site-images/" + blank);
      $("#main-image-mobile").attr("src","../image/" +name);
      $("#blank-image-mobile").attr("src","../site-images/" + blank);
      $("#productColor").val(response['image']['color']);
    },
    error: function (jqXHR, textStatus, errorThrown) {
      $("#loading-overlay").hide();
      alert("something went wrong");
    } 
  });
  } else {
     
  }
});

$('.cart_select li').on('click', function() {
  var city = $('.cart_select select').find(":selected").val();
  var subtotal = $('#cartTotal1Second').html();

  if(city == "Podgorica"){
   $("#shipping_price").val("2");
   $("#strong_shipping").html("&euro;2");
  }else{
   $("#shipping_price").val("3");
   $("#strong_shipping").html("&euro;3");
  }
 
  $.ajax({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            } ,
  type: 'post',
  dataType: 'json',
  url: '/shipping_city',
  data: { city : city, subtotal: subtotal },
success: function(response) {
  $('#cartTotalSecond').html("&euro;"+response['subtotal']);
  $('#amount').val(response['subtotal']);
},
error: function (jqXHR, textStatus, errorThrown) {
  alert("something went wrong");
} 
});

})

/*  $('.cases').change(function(){
  alert($( "cases option:selected" ).val());
 }); */




/*  Newsletter */


  /*   $.ajaxSetup({
      
    }); */



  

$(document).ready(function(){
    $('input[type="file"]').change(function(e){
      alert('fdsfs');
        var fileName = e.target.files[0].name;
        alert('The file "' + fileName +  '" has been selected.');
    });

  
});