<div class="subscribe">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
     <div class="alert alert-success alert-dismissible fade hide" style="width: 50%; margin:auto;" id="subscribe-message" role="alert">
        <strong>Please check your email to confirm subscription.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> 
      <div class="alert alert-success alert-dismissible fade hide" style="width: 50%; margin:auto;" id="subscribe-message1" role="alert">
        <strong>You are alredy subscribed.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> 
      <div class="subscribe-box">
        <div class="subscribe-info">
            <img src="/site-images/Subscribe1.svg" alt="">
            <h5>10% off, promos and the latest <br> news and designs!</h5>
        </div>
         <form id="subscribeForm">
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


    