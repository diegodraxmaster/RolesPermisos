<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post" enctype="multipart/form-data">

<div class="form-group has-feedback" bis_skin_checked="1">
    <input type="text" class="form-control" name="nom_usuarios" placeholder="nombre">
    <span class="glyphicon glyphicon-user form-control-feedback"></span>
</div>

<div class="form-group has-feedback" bis_skin_checked="1">
    <input type="text" class="form-control" name="nom_user" placeholder="usuario">
    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
</div>

<div class="form-group has-feedback" bis_skin_checked="1">
    <input type="password" class="form-control" name="pass_user" placeholder="password">
    <span class="glyphicon glyphicon-eye-close form-control-feedback"></span>
</div>

<div class="form-group has-feedback" bis_skin_checked="1">
    <div class="btn btn-default btn-file" bis_skin_checked="1">
        <i class="fas fa-paperclip"></i> Adjuntar Imagen de usuarios
        <input type="file" name="subirImgusuarios">
    </div>
    <img class="previsualizarImgusuarios img-fluid py-2" width='200' height='200'>
    <p class="help-block small"> Dimensiones: 480px * 382px | Peso Max. 2MB | Formato: JPG o PNG</p>
</div>





<div class="form-group has-feedback">


    <label>rol</label>
    <select class="form-control" name="rol_user" required>

        <?php
        $roles = ctrRoles::ctrMostrarRoles2();
        
        foreach($roles as $rol){
            
?>
        <option value="<?php echo $rol["id_roles"] ?>"><?php echo $rol["nom_rol"] ?></option>
        <?php
       }
?>

    </select>

</div>

<div class="modal-footer">
    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">cerrar</button>
    <button type="submit" class="btn btn-primary">guardar</button>
</div>

<?php 

$guardarusuarios = new ctrUsuarios();
$guardarusuarios->ctrGuardarusuarios();


?>


</form>
</body>
</html>

