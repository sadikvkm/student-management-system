(function(){

    $("#mark-form").validate({
        rules: {
            student_id : {
                required: true,
            },
            term: {
                required: true,
            },
        },
        errorPlacement : function( error, element ) {
            var elem = $(element);
            if (elem.hasClass("select2-hidden-accessible")) {
                element = $("#select2-" + elem.attr("id") + "-container").parent(); 
                error.insertAfter(element);
            } else {
                error.insertAfter(element);
            }
        }
    });
    

})();