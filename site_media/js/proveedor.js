$(function(){
    
});

var iniciarSelects=function(){
    $(function(){
        $(".selects").each(function(){
            var seleccionado=$(this).data("selected");
            $(this).children("option").each(function(){
                console.log($(this).val());
                if($(this).val()==seleccionado){
                    $(this).prop("selected",true);
                }
            });
        });
    });   
};