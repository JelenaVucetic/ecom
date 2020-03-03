

$(document).ready(function(){
    $('.cat').click(function(event){
        var id = this.getAttribute('name');
        console.log(id);
        event.preventDefault();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
      url: '/categories/'+id,
      method: "post",
      data: {id: id},
      dataType: "json",
      
      success: function(data){

        $(".container-fluid").load(".container-fluid");
        
      }
    });
});
});