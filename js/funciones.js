//boton de activar editar

$(document).ready(function() {
    $("#edit").on("click", function() {

        $('*').prop('disabled', false);
        $("#atras").addClass("hidden");
        $("#edit2").addClass("hidden");
        $("#btnedit").removeClass("hidden");
    });

});

$(document).ready(function() {
    $("#edit2").on("click", function() {

        $('*').prop('disabled', false);
        $("#atras").addClass("hidden");
        $("#edit2").addClass("hidden");
        $("#btnedit").removeClass("hidden");
    });

});


//boton agregar y eliminar fila    ----------------------------------------------------------------

$(document).ready(function() {
    $("#add_row").on("click", function() {
        // Código dinámico de filas
        // Obtener la identificación máxima de la fila y establecer una nueva identificación
        var newid = 1;
        $.each($("#tab_logic tr"), function() {
            if (parseInt($(this).data("id")) > newid) {
                newid = parseInt($(this).data("id"));
            }
        });
        newid++;
        // se crea la estructura tr
        var tr = $("<tr></tr>", {
            id: "addr"+newid,
            "data-id": newid
        });
        // recorrer cada td y crear nuevos elementos con el nombre de newid
        // por cada elemento td lo guarda en ua variable
        $.each($("#tab_logic tbody tr:nth(0) td"), function() {
            var cur_td = $(this);
            var children = cur_td.children();
            // agregar nuevo td y elemento si tiene un name
            // crea una nueva estructura td y mete la variable
            if ($(this).data("name") != undefined) {
                var td = $("<td></td>", {
                    "data-name": $(cur_td).data("name")
                });
                // crea un clon de la estructura que tenga dentro el td (por ejemplo: <p name=1>asd</p>)
                // gregar al final un .text("") para que los elementos que clone esten vasios
                var c = $(cur_td).find($(children[0]).prop('tagName')).clone();
                c.attr("name", $(cur_td).data("name") + newid);
                c.appendTo($(td));
                td.appendTo($(tr));
            } else {
                var td = $("<td></td>", {
                    'text': $('#tab_logic tr').length
                }).appendTo($(tr));
            }
        });
        // agregue la nueva fila
        $(tr).appendTo($('#tab_logic'));
        $(tr).find("a.row-remove").on("click", function() {
            var aca = $(this);
            $("#botonsi").click(function(){
                $(aca).closest("tr").remove();
            });
        });
    });
    // Código ordenable
    var fixHelperModified = function(e, tr) {
        var $originals = tr.children();
        var $helper = tr.clone();
    
        $helper.children().each(function(index) {
            $(this).width($originals.eq(index).width())
        });
        return $helper;
    };
    /*$(".table-sortable tbody").sortable({
        helper: fixHelperModified      
    }).disableSelection();
    $(".table-sortable thead").disableSelection();
    $("#add_row").trigger("click");*/
});


$("#select_pais").load("buscar_pais.php")

$("#select_idioma").load("buscar_idioma.php")