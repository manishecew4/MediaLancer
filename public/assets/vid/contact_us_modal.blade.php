<div class="modal fade signupModal" id="signupModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog col-6 p-0">
        <div class="modal-content">
            <button type="button" class="btn-close modalClose" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body d-flex contactModal p-0">
                <div class="contactImg col-6 p-0">
                    <iframe width="100%" height="100%" src="https://www.youtube.com/embed/eFftRxVMea4?controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <form action="javascript:void(0);" class="contactForm col-6 p-4 contact_form" id="contact_form">
                    @csrf
                    <div class="">
                        <div class="form-floating mb-3">
                            <input type="text" name="name" class="form-control" id="conuName" placeholder="Name">
                            <label for="userfullname">Full Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" name="mobile" class="form-control" id="conuNumber" placeholder="Mobile">
                            <label for="useremail">Email address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control" id="conuEmail" placeholder="Email">
                            <label for="usermobile">Mobile no.</label>
                        </div>

                        <div class="form-floating mb-3">
                            <textarea name="purpose" class="form-control" id="conuPorpose" placeholder="Purpose" cols="30" rows="10"></textarea>
                            <label for="floatingTextarea">Purpose</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn_theme cmn_btn contact_us_btn" id="">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ads img -->
<div class="modal fade adsModal" id="adsModal" tabindex="-1" aria-labelledby="adsModalLabel" aria-hidden="true">
    <div class="modal-dialog col-6 p-0">
        <div class="modal-content pr">
            <button type="button" class="btn-close modalClose" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body d-flex contactModal p-0" >
                <!-- <img src="{{asset('images/car.png')}}" /> -->
            </div>
            <div class="ads_offer d-flex jcc flex-wrap aic">
                <div class="adsImage col-sm-8 col-md-4 col-lg-3" id="ad_image_div">
                    <img src="{{asset('images/car.png')}}"  />
                </div>
                <div class="adsText col-sm-8 col-md-4 col-lg-3">
                    <div class="ad_text">
                        <h3></h3>
                        <h6></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>