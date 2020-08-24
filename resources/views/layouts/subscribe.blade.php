<div class="subscribe">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="subscribe-box">
        <div class="subscribe-info">
            <img src="/site-images/Subscribe1.svg" alt="">
            <h5>10% off, promos and the latest <br> news and designs!</h5>
        </div>
        <form  method="post" action="{{url('newsletter')}}" id="subscribeForm">
            @csrf
            <input id="subscribe-email" name="subscribe_email" type="emial" placeholder="Your E-Mail adress" >
            <input id="submit-image" type="image" onmouseover="this.src='/site-images/Send-ikonica-HOVER.svg'" onmouseout="this.src='/site-images/Send-ikonica.svg'" src="/site-images/Send-ikonica.svg" alt="Submit Form"  />
        </form>
    </div>
    <div class="subscribe-bottom">
        <div>
            <p>EUR - English</p>
            <p>Mature content: Visible</p>
        </div>
    </div>
</div>


    