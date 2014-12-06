<div class="row  col-xs-12" STYLE="background-color:#F8E6E0" >
    <div class="col-xs-12">
<button type="button" onclick="cerrarSession()"  class="btn btn-default glyphicon glyphicon-off" >&nbsp;Cerrar Session</button>
    </div>
    <div class="row">
        <div class="col-lg-2">
            <?php echo $menu;?>

        </div>
        <div class="col-lg-9" id="page-content" ><?php print_r($_SESSION);?>contenido interno</div>
    </div>
</div>