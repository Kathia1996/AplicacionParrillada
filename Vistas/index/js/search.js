$(function() {

controller=$('#c').val();

$("#_buscar").click(function(){ 
var q=$('#q').val();
var p=$('#p').val();
str=controller+"/index&q="+q+"&p="+p; 
$.get(str,function(data){
 $("#page-content").empty().append(data);
 $('#q').val(q);
});
 
});
 $( "#q" ).autocomplete({
   minLength: 0,
   source: controller+"/search",
   focus: function( event, ui ) {
            $( "#q" ).val( ui.item.name );
            return false;
        },
    select: function( event, ui ) {
            $( "#q" ).val( ui.item.name );
            //$( "#q" ).val( ui.item.id );
			var q=$('#q').val();
			var p=$('#p').val();
                $.ajax({
                    type: "GET",
                    url: controller+'/'+'index',
                    data: "q="+q+"&p="+p,
                    success: function(data){
                        $("#page-content").empty().append(data);
                        //$("#cont").show("blind");
			document.getElementById("page-content").style.display="none";
			             $("#page-content").slideDown("slow");
                    },
		    	   error:function()
	                {
		                alert("ocurrio un error con ajax");
	                }
                });
            return false;
	   }
 }).data( "autocomplete" )._renderItem = function( ul, item ) {
            return $( "<li></li>" )
			
            .data( "item.autocomplete", item)
            .append( "<a>" + item.name+ "</a>" )
	    .appendTo( ul );
        };
});