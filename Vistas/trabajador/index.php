<?php
echo 'oliiii trabjador';
?>

<script>
    $(document).ready(function () {
        $('#table1').dataTable({
            "pagingType": "full_numbers",
            "paging": true,
            "sPaginationType": "full_numbers",
            "bJQueryUI": true,
            "language": {
                "lengthMenu": "filas _MENU_ ",
                "zeroRecords": "No hay registros que coincidan con la busqueda",
                "info": "Mostrando _PAGE_ de _PAGES_ entradas",
                "infoEmpty": "No records available",
                "infoFiltered": "(filtered from _MAX_ total records)"}
        });
    });
</script>
<?php print_r($eventos); ?>
<br>
<br>
<div class="row  col-xs-10">
<label for="select-evento">Seleccione un evento: </label>
<select style="width:200px" name="select-evento" id="select-evento" class="kselect-tam">
    <?php
    foreach ($eventos as $key => $value) {
        echo "<option value=".$value['evento.idevento'].">".$value['descripcion']."</option>";
    }
    ?>

</select>
</div>

<!--<button class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" role="button">
    <span claid="nuevo-evento" ss="ui-button-text">Nuevo</span>
</button>-->

<table id="table1" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Nº</th>
            <th>DESCRIPCIÓN</th>
            <th>FECHA</th>
            <th>DIRECCIÓN</th>
            <th>EDITAR</th>

        </tr>
    </thead>

    <tfoot>
        <tr>
            <th>Nº</th>
            <th>DESCRIPCIÓN</th>
            <th>FECHA</th>
            <th>DIRECCIÓN</th>
            <th>EDITAR</th>
        </tr>
    </tfoot>

    <tbody>
<!--            <tr>
            <td>Tiger Nixon</td>
            <td>System Architect</td>
            <td>Edinburgh</td>
            <td>61</td>
            <td>2011/04/25</td>
            <td>$320,800</td>
        </tr>-->
        <?php
        $cont = 1;
        foreach ($eventos as $key => $value) {
//                $n="<tr>";
//                $n.=$n."<td>".$value['descripcion']."</td>";
//                $n.=$n."<td>".$value['nombres']."</td>";
//                $n.=$n."</tr>";
//            echo $n;
            echo "<tr>";
            echo "<td>$cont</td>";
            echo "<td>" . $value['descripcion'] . "</td>";
            echo "<td><a class=''>" . $value['fecha_evento'] . "</a></td>";
            echo "<td>" . $value['direccion'] . "</td>";
            echo "<td><a class=''></a></td>";
            echo "</tr>";
            $cont++;
        }
        ?>

    </tbody>
</table>

<script src="/AplicacionParrillada/Vistas/index/js/funcion.js" type="text/javascript"></script>