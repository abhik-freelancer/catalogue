$(document).ready(function(){
    
    var basepath = $("#basepath").val();
    $('#banner_list').DataTable({
    "ordering": true,
    language: {
        search: "_INPUT_",
        searchPlaceholder: "Search..."
    },
    'aoColumnDefs': [{
        'bSortable': false,
        'aTargets': [-1,-2] /* 1st one, start by the right */
    }]
    });
    
    
    $(document).on('click','.bannerimage',function(){
        
        var source = $(this).attr('src');
        var alttext = $(this).attr('alt');
        $("#imagemodal").css('display','block');
        $('#img01').attr('src',source);
        $('#caption').html(alttext);
    });
    
    $(document).on('click','.closeimg',function(){
         $("#imagemodal").css('display','none');
    });
    
    
    // Get the modal

});

