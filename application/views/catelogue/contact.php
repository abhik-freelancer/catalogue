<div class="row itemcontainer">

    <div class="col-lg-12">
      
        <div class="alert alert-danger email-validation-msg" style="display: none;">
                    <button type="button" class="close valid-alert-close">&times;</button>
                       Not a valid email address.
        </div>
        
        <div class="alert alert-danger validation-msg" style="display: none;">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>*</strong> Indicates a mandatory fields.
        </div>
        
        
        <div class="alert alert-danger gcaptcha-validation-msg" style="display: none;">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Error!!</strong> Captcha validation fail.
        </div>
        
        
        
        <form name="">
            <div class="form-group">
                <label for="name">Name *</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Your name">
            </div>
            
            <div class="form-group">
                <label for="name">Email *</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" name="message" rows="3"></textarea>
            </div>
            
            <div class="g-recaptcha" data-sitekey="6LdiBUcUAAAAAOcBi5G1C_68djptHt92p_5Qfzf6"></div>
            
            <button type="button" class="btn btn-primary" id="contactbtn">Submit</button>
            
            
        </form>
        
    </div>


</div>

