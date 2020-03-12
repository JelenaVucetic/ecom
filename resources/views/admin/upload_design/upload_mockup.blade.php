@extends('admin.master')
@section('content')

<div id="background-div11" style="    height: 300px; width: 300px;">
    <img id="logo-canvas12" src="{{$image}}">
    <img class="overlay-panel" src="/images/Majica-zenska-mockup.png">
</div>
    <script>
        
            var el = document.getElementById("background-div11");
        html2canvas(el).then(function (canvas){
            var final = canvas.toDataURL("image/png" , 0.9);
            
            $.ajax({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{ route("upload_final") }}',
                type: 'post',
                dataType: 'text',
                data: {
                image: final
                },
                success:function(msg){
                console.log(msg);
                }, 
            error: function(msg) {
                console.log(msg);
            }
            });

        });


      
    </script>
 
         
       
       
@endsection