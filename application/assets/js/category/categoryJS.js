$(document).ready(function(){
    
    var basepath = $("#basepath").val();
    $('#categorylist').DataTable({
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
});


