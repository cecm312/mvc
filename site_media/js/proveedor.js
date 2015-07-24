$(function () {
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15, // Creates a dropdown of 15 years to control year
        formatSubmit: 'yyyy/mm/dd',
        hiddenName: true, onSet: function (context) {
            console.log('Just set stuff:', context);
            this.close();
        }
    });
    $(document).on("click", ".deleteprovider", function () {
        confirmDelete(this);
    })
});

var confirmDelete = function (selector) {
    swal({
        title: "Deseas eliminar este proveedor?",
        text: "Esta accion no se podrá deshacer",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Si, Eliminar!",
        closeOnConfirm: false
    },
    function () {
        var rfc=$(selector).data("rfc");
        $.ajax({
            url: "/mvc/proveedores/delete_ajax/",
            type:"POST",
            data: {
                rfc:rfc
            },
            success: function (data) {
                swal({title:"Hecho!", text:"El proveedor fue eliminado.", type:"success"},function(){
                    location.reload();
                });
            }
        });
    });
}

var iniciarSelects = function () {
    $(function () {
        $(".selects").each(function () {
            var seleccionado = $(this).data("selected");
            $(this).children("option").each(function () {
                console.log($(this).val());
                if ($(this).val() == seleccionado) {
                    $(this).prop("selected", true);
                }
            });
        });


    });
};