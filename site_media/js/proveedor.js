$(function(){
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15, // Creates a dropdown of 15 years to control year
        formatSubmit: 'yyyy/mm/dd',
        hiddenName: true
    });
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