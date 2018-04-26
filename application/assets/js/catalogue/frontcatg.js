$(document).ready(function(){
   var frontbasepath = $("#frontbasepath").val();
    
    $(".itemcatg").click(function(){
        var categoryId = $(this).attr("value")||0;
        //alert(frontbasepath);
        if(categoryId!=0){
                $.ajax({
                    type: 'GET',
                    url: frontbasepath+'catelogue/getProductByCategoryId/'+categoryId,
                    datatype: 'html',
                    success: function (result) {
                        $('.itemcontainer').html(result);
                    }

                });
            }
        
    });
    
    $(document).on('change','.catgorder',function(){
        var categoryId = $(this).attr("id")||0;
        var ordering = $(this).val();
        if(categoryId!=0){
                $.ajax({
                    type: 'GET',
                    url: frontbasepath+'catelogue/getProductByCategoryId/'+categoryId+'/'+ordering,
                    datatype: 'html',
                    success: function (result) {
                        $('.itemcontainer').html("");
                        $('.itemcontainer').html(result);
                    }

                });
            }
        
    });
    
    $(document).on('click','.subcatg',function(){
        
        var subcatgId = $(this).attr("value")||0;
        //alert(frontbasepath);
        if(subcatgId!=0){
                $.ajax({
                    type: 'GET',
                    url: frontbasepath+'catelogue/getProductBySubcatId/'+subcatgId,
                    datatype: 'html',
                    success: function (result) {
                        $('.itemcontainer').html(result);
                    }

                });
            }
    });
    
    
    $(document).on('change','.subcatgorder',function(){
        var subcatgId = $(this).attr("id")||0;
        var ordering = $(this).val();
        if(subcatgId!=0){
                $.ajax({
                    type: 'GET',
                    url: frontbasepath+'catelogue/getProductBySubcatId/'+subcatgId+'/'+ordering,
                    datatype: 'html',
                    success: function (result) {
                        $('.itemcontainer').html("");
                        $('.itemcontainer').html(result);
                    }

                });
            }
        
    });
    $(document).on('keypress','#srch-item',function(e){
        if(e.which == 13) {
            var items =$(this).val()||"";
            //alert('You pressed enter!');
            searchresult(items,frontbasepath);
        }
    });
    $(document).on('click','#srch-btn',function(e){
        var srchText = $("#srch-item").val()||"";
        if(srchText!=""){
            searchresult(srchText,frontbasepath);
        }
    });
    
    
    $('#qtyorder').keyup(function (e)
    {
        if (/\D/g.test(this.value))
        {
            // Filter non-digits from input value.
            this.value = this.value.replace(/\D/g, '');
        }
    });
    
    $(document).on('click','#addtocart',function(){
        var itemId  = $("#hditemid").val()||"";
        var qty = $("#qtyorder").val()||"";
        if(qty!=""){
            
             $.ajax({
                    type: 'POST',
                    url: frontbasepath + 'catelogue/addToCart',
                    dataType: "json",
                    contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                    data:{"itemId":itemId,"qty":qty},   
                    success: function (result) {
                        //#carttot
                        if(result.msg_code==1){
                             window.location.href = frontbasepath + 'catelogue';
                        }
                        
                    }

                });
        }
    });
    
    
    $(document).on('click','#contactbtn',function()
    {

        var name = $("#name").val() || "";
        var email = $("#email").val() || "";
        var message = $("#message").val() || "";


        $.ajax({
            type: "POST",
            url: frontbasepath + 'contact/addContacts',
            dataType: "json",
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            data: {"name": name, "email": email, "message": message, "g-recaptcha-response": grecaptcha.getResponse()},
            success: function (result) {
                if (result.msg_code == 1) {
                    alert("Thanks for contact us");
                    window.location.href = frontbasepath + 'contact';
                }
                else if (result.msg_code == 2) {
                    alert("mandatory");
                    $(".validation-msg").show(); //mandatory fields
                }
                else if (result.msg_code == 3) {
                    alert("Email wrong");
                    $(".email-validation-msg").show(); //email-validation message
                }
                else if (result.msg_code == 4) {
                    alert('captcha');
                    $(".gcaptcha-validation-msg").show(); //captcha validation

                }

            },
            error: function (jqXHR, exception) {
                var msg = '';
                if (jqXHR.status === 0) {
                    msg = 'Not connect.\n Verify Network.';
                } else if (jqXHR.status == 404) {
                    msg = 'Requested page not found. [404]';
                } else if (jqXHR.status == 500) {
                    msg = 'Internal Server Error [500].';
                } else if (exception === 'parsererror') {
                    msg = 'Requested JSON parse failed.';
                } else if (exception === 'timeout') {
                    msg = 'Time out error.';
                } else if (exception === 'abort') {
                    msg = 'Ajax request aborted.';
                } else {
                    msg = 'Uncaught Error.\n' + jqXHR.responseText;
                }
                //  alert(msg);  
            }
        });
    });
    
});
function searchresult(searchstring,basepath){
    if(searchstring!=""){
        var searchdata = searchstring.trim();
           $.ajax({
                    type: 'POST',
                    url: basepath+'catelogue/getItemBySearch',
                    data:{'searchcriteria':searchdata},
                    datatype: 'html',
                    success: function (result) {
                        $('.itemcontainer').html("");
                        $('.itemcontainer').html(result);
                    }

                });
    }
    
}

