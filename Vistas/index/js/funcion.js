function cargar_pages(page)
{ 
    url(page);
}
function paginacion(page, datos, DivPrint) {
    $.get(page, datos, function(data)
    {
        if (DivPrint != undefined) { $("#"+DivPrint).empty().append(data);
        } else {
            $("#page-content").empty().append(data);
        }
    });
}
var cerrarSession = function() {
    $.post('usuarios/logout', '', function(data)
    {
        if (data.rep == 'ok') {
            window.location = data.url;
        }
    }, 'json');
}
var url = function(page)
{
    $.post(page, '', function(data)
    {
        $("#page-content").empty().append(data);
    });
} 
$(function () {
                    $("#datepicker").datepicker();      
                });
                
$( "#select-evento" ).selectmenu();