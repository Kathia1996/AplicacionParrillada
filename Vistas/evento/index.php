<?php
echo $evento;
echo 'oliiii';
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
<button type="button" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" data-toggle="modal" data-target="#myModal">
    Nuevo
</button>
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



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Nuevo Evento</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Tipo de Pago: </label>
                    <label for="select-evento">Seleccione un evento: </label>
                    <select style="width:200px" name="select-evento" id="select-evento" class="kselect-tam">
                        <?php
//                        foreach ($tipo_pago as $key => $value) {
//                            echo "<option value=" . $value['idtipopago'] . ">" . $value['descripcion'] . "</option>";
//                        }
                        ?>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>olaaa</option>

                    </select>
                    
 
                </div>
                <div class="form-group">
                    <label>Numero de Tarjeta: </label>
                    <input type="text" class="form-control" placeholder="Nombre">
                </div>
                <div class="form-group">
                    <label>Nombre: </label>
                    <input type="text" class="form-control" placeholder="Nombre">
                </div>
                <div class="form-group">
                    <label>Direcciòn de Evento: </label>
                    <input type="text" class="form-control" placeholder="Nombre">
                </div>
                <div class="form-group">
                    <label>Fecha de Evento: </label>
                    <p>Fecha de Nacimiento: <input type="text" id="datepicker" class="form-control" size="30"></p>
                    <script>
                        $("#datepicker").datepicker();
                    </script>
                </div>
                <div class="form-group">
                    <label>Descripción: </label>
                    <textarea type="text" class="form-control" placeholder="Descripción"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success">Crear</button>
            </div>
        </div>
    </div>
</div>

<script src="/AplicacionParrillada/Vistas/index/js/funcion.js" type="text/javascript"></script>