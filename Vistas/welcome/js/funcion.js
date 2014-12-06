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
    $.post('../index.php/user/logout', '', function(data)
    {
        if (data.rep == 'ok') {
            window.location = '../';
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