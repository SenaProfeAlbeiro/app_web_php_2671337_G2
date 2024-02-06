<!-- Contenido -->
<div class="container py-5">
    <div class="row py-5">
        <form action="" method="post" class="col-md-9 m-auto">
            <h1 class="text-center">Iniciar Sesión</h1>
            <div class="mb-3">
                <label for="inputsubject">Usuario</label>
                <input type="email" class="form-control mt-1" name="email" placeholder="Usuario">
            </div>
            <div class="mb-3">
                <label for="inputsubject">Contraseña</label>
                <input type="password" class="form-control mt-1" name="pass" placeholder="Contraseña">
            </div>
            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-success btn-lg px-3">Ingresar</button>
                </div>
            </div>
            <?php echo $message ?>
        </form>
    </div>
</div>