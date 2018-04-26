$(document).ready(function () {

    var basepath = $('#basepath').val();
    
     $('#itemlist').DataTable( {
         
         
          "ordering": true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search..."
        },
        'aoColumnDefs': [{
                'bSortable': false,
                'aTargets': [-1,-2] /* 1st one, start by the right */
            }],
        initComplete: function () {
            this.api().columns([0,1,2,3]).every( function () {
                var column = this;
                var select = $('<select><option value="">Show all</option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    } );
    
    
    
    
    


    $(document).on('click', '.browse', function () {
        var file = $(this).parent().parent().parent().find('.file');
        file.trigger('click');
    });
    $(document).on('change', '.file', function () {
        $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
    });

    $(document).on('click', '.imglst', function () {
        var itemid = $(this).attr('id');
        $.ajax({
            type: "POST",
            url: basepath + 'item/getImagesById',
            datatype: "html",
            data: {"itemId": itemid},
            success: function (result) {
                $('.cntimg').html(result);
                $('.cntimg').html(result);
            }

        });
    });

     $(document).on('change', '#category', function () {
        var categoryId = $(this).val();
        $.ajax({
            type: "POST",
            url: basepath + 'item/getsubcategory',
            datatype: "html",
            data: {"categoryId": categoryId},
            success: function (result) {
                $('.subcatg').html(result);
            }

        });
    });




   $("#frmitem").on("submit",function(e){
       e.preventDefault();
       var formData =  new FormData($(this)[0]);
       $.ajax({
           type:"POST",
           url: basepath + 'item/saveitem',
           dataType: "json",
           contentType: false,//"application/x-www-form-urlencoded; charset=UTF-8",
           processData: false,
           data:formData, 
           success :function(result)
           {
               if(result.msg_code==0)
               {
                   $("#successmsgText").html(result.msg_data);
                   $("#item_opt_msg").modal('show');
                }else if(result.msg_code==1)
                {
                   $("#successmsgText").html(result.msg_data);
                   $("#item_opt_msg").modal('show');
                }else if(result.msg_code==3)
                {
                    $("#validation-item-msg").show();
                }else if(result.msg_code==5)
                {
                   $("#itemimage-upld-msg").show();
                   $("#fileerrmsg").html(result.msg_data);
                }else if(result.msg_code==500){
                    window.location.href = basepath + 'memberlogin'; 
                }
           }
       });
       
   });


$(".mdclose-item").click(function(){
         window.location.href = basepath + 'item';
 });
    
$(".xcrossitem").click(
        function(){
        window.location.href = basepath + 'item';
});
});

