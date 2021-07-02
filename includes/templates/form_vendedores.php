<fieldset>
    <legend>Informacion General</legend>
    <label for="nombre">Nombre:</label>
    <input type="text" name="vendedor[nombre]" id="vendedor" placeholder="Nombre Vendedor(a)" value="<?php echo s($vendedores->nombre); ?>">

    <label for="apellido">Apellido:</label>
    <input type="text" name="vendedor[apellido]" id="apellido" placeholder="Apellido Vendedor(a)" value="<?php echo s($vendedores->apellido); ?>">
    
</fieldset>
<fieldset>
    <legend>Información extra</legend>

    <label for="telefono">Telefono:</label>
    <input type="text" name="vendedor[telefono]" id="telefono" placeholder="Teléfono Vendedor(a)" value="<?php echo s($vendedores->telefono); ?>">

</fieldset>