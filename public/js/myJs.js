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
      responseMessage(msg);
      var proDum = $('#proDum').val();
      var userId = $('#user_id').val()
  
      $.ajax({
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
    });
      
    });
  });
  
  function responseMessage(msg) {
    $('.success-box').fadeIn(200);  
    $('.success-box div.text-message').html("<span>" + msg + "</span>");
  }



/*   Adding to cart with size */

function addToCartAjax(size, color, print, phoneModel, caseStyle, customCase, posterSize, pictureSize) {
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
          color: color,
          print: print,
          phoneModel: phoneModel,
          caseStyle: caseStyle,
          customCase: customCase,
          posterSize: posterSize,
          pictureSize: pictureSize
        },
        beforeSend: function() {
              modalAddBtn.attr('data-dismiss', 'modal');
              p.html("Adding ... ");
              p1.html("Adding ... ");
              /* p.wavyText({
                prefixes: ['-ms-','-webkit-','-o-','-moz-',''],
                transition_speed:'1s',
                keyframes: {
                 '0': ['1px','inherit'],
                  '20': ['7px','inherit'], 
                  '40': ['8px','inherit'],
                  '60': ['9px','inherit'], 
                  '80': ['10px','inherit'],
                 '100': ['0','inherit'] 
                },
                });*/
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
        var parent = $(this).parent();
        var size = $('.size-class:checked').val();
        var color = $('.color-class:checked').val();
       
        var print = $('.print-class:checked').val();
        var customCase = $("#custom").val();

        var pro_cat = $('#pro_cat').val();
        var price = $('#product_price').val();

  /*       var a = $('#width').val();
        var b = $('#height').val();

        if (a.match("^([1-9][0-9]*)$") && b.match("^([1-9][0-9]*)$") ) {
          c = ((a*b) * price).toFixed(2)
        } else {
           alert("Please enter numeric with and height");
        }

 */
        if((pro_cat == "Urban clothing" && size == null) || (pro_cat == "T-shirt" && size == null) || (pro_cat == "Polo Shirt" && size == null) || (pro_cat == "Tank Tops" && size == null ) || (pro_cat == "Hoodie & Sweatshirts" && size == null)) {
          $('#btn-add-to-cart').attr('data-toggle', 'modal');
          $('#btn-add-to-cart').attr('data-target', '#exampleModal');

          $('#modal-add').css('cursor', "no-drop");
          $('#modal-add div').css('background', "lightgray");
          $('#modal-add').unbind();
          $("input[name='size']").change(function(){
            $('#modal-add').bind("click", function(){
              var size =  $("input[name='size']:checked").val();
              addToCartAjax(size, color, print); 
            });
              $('#modal-add').css('cursor', "pointer");
              $('#modal-add div').css('background', "#E6003A");
          });
        } else if(pro_cat == "Custom" && !customCase) {
          alert('unesi teks');
        } 
        else {
            addToCartAjax(size, color, print, phoneModel, caseStyle, customCase, posterSize, pictureSize);
          }  
      }); 
}); 

$(document).ready(function(){
  $('.black div').removeClass( "white-border");
  $('.black span').css('border', "none");
  $('.white test').addClass( "black-border")


  $('input[type=radio][name=color]').change(function() {

  if(this.value == 'white'){
    $('.black div').removeClass( "white-border");
    $('#black span').css('border', "none");
    $('.white div').addClass( "black-border")
  } else {
    $('.black div').addClass( "white-border");
    $('.black span').css('border', "1px solid #DEDEDE;");
    $('.white div').removeClass( "black-border")
  }

});

  $('#picture-custom').css('display', "none");
  var pro_cat = $('#pro_cat').val();
  $('.options li').on('click', function() {
    var pictureSize = $( "#picture option:selected" ).val();
    if(pro_cat == "Pictures" && pictureSize == 'custom') {
      $('#picture-custom').css('display', "block");
    }
  });
});
/* $(document).ready(function(){
  var proDum = $('#proDum').val();
  $('.options li').on('click', function() {
    $('#price_b2').html(result);
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
      url: "/product_price/" + proDum,
      method: 'post',
      data: {
          pro_id: proDum,
          sizeSelected: $(this).html()
      },
      success: function(result){
        location.reload();
      }
      }); 

  });
}); */

/* $(document).ready(function(){
  var proDum = $('#proDum').val();

    $('#posters').change(function() {
alert('fds');
    $.ajax({
      url: "/product_details" + proDum,
      method: 'post',
      data: {
          sizeSelected: $(this).val(),
      },
      success: function(result){
          $('.alert').show();
          $('.alert').html(result.success);
      }
      }); 

  });
});  */

/* 
$(document).ready(function(){
  $('#phone-add').on('click', function(){
     var parent = $(this).parent();
      var size = $('.size-class:checked').val();
      var color = $('.color-class:checked').val();
      var print = $('.print-class:checked').val();
      $('#btn-add-to-cart').removeAttr('data-toggle');
      $('#btn-add-to-cart').removeAttr('data-target');
      var pro_cat = $('#pro_cat').val();
      if((pro_cat == "Urban clothing" && size == null) || (pro_cat == "T-shirt" && size == null) || (pro_cat == "Polo Shirt" && size == null) || (pro_cat == "Tank Tops" && size == null ) || (pro_cat == "Hoodie & Sweatshirts" && size == null)) {
        $('#btn-add-to-cart').attr('data-toggle', 'modal');
        $('#btn-add-to-cart').attr('data-target', '#exampleModal');

        $('#modal-add').css('cursor', "no-drop");
        $('#modal-add div').css('background', "lightgray");
        $('#modal-add').unbind();
        $("input[name='size']").change(function(){
          $('#modal-add').bind("click", function(){
            var size =  $("input[name='size']:checked").val();
            addToCartAjax(size, color, print); 
          });
            $('#modal-add').css('cursor', "pointer");
            $('#modal-add div').css('background', "#E6003A");
        });
      } else {
          addToCartAjax(size, color, print);
        }  
    }); 
}); 

 */


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
      'class': 'options'
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
      starWidth: "40px",
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
      var color = $('.color-class:checked').val();
      var print = $('.print-class:checked').val();
      var customCase = $("#custom").val();

      var pro_cat = $('#pro_cat').val();
      var price = $('#product_price').val();

/*       var a = $('#width').val();
      var b = $('#height').val();

      if (a.match("^([1-9][0-9]*)$") && b.match("^([1-9][0-9]*)$") ) {
        c = ((a*b) * price).toFixed(2)
      } else {
         alert("Please enter numeric with and height");
      }

*/
      if((pro_cat == "Urban clothing" && size == null) || (pro_cat == "T-shirt" && size == null) || (pro_cat == "Polo Shirt" && size == null) || (pro_cat == "Tank Tops" && size == null ) || (pro_cat == "Hoodie & Sweatshirts" && size == null)) {
        $('#btn-add-to-cart-phone').attr('data-toggle', 'modal');
        $('#btn-add-to-cart-phone').attr('data-target', '#exampleModal');

        $('#modal-add').css('cursor', "no-drop");
        $('#modal-add div').css('background', "lightgray");
        $('#modal-add').unbind();
        $("input[name='size']").change(function(){
          $('#modal-add').bind("click", function(){
            var size =  $("input[name='size']:checked").val();
            addToCartAjax(size, color, print); 
          });
            $('#modal-add').css('cursor', "pointer");
            $('#modal-add div').css('background', "#E6003A");
        });
      } else if(pro_cat == "Custom" && !customCase) {
        alert('unesi teks');
      } 
      else {
          addToCartAjax(size, color, print, phoneModel, caseStyle, customCase, posterSize, pictureSize);
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

  var myFunction = function() {
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

    $("#sendWishList").on("click", function(){
      var id = $("#productID").val();
     
      $.ajax({
        headers: {  
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  
                } ,
      type: 'post',
      dataType: 'html',
      url: '/addToWishlist',
      data: { id:id},
      success: function(response) {
      if(response == "OK"){
        $("#sendWishList").addClass("hoverd");
      }
      }
  });
    });


