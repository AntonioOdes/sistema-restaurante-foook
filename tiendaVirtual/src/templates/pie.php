</div>
<br>
<br>
<br>

<footer >
<hr>

<section class="section-map">
<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d19826.150932429748!2d-73.09534932059239!3d-36.78481224470193!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9669ca973a6f5007%3A0x15da628f93e853c4!2sFood%20Ok!5e0!3m2!1sen!2scl!4v1701184531351!5m2!1sen!2scl" width="600" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>

<section class="contenido" >
    
<div class="col-12 text-center">local - foodok </div>
<a href="../admin/login.php">admin</a>
<br>
<a href="../client/listarProducto.php" id="enlaceCliente">Cliente</a>
</section>
<script>
        // Espera a que el documento esté listo
        $(document).ready(function() {
            // Agrega un controlador de eventos al enlace
            $("#enlaceCliente").on("click", function(e) {
                // Previene el comportamiento predeterminado del enlace (navegación)
                e.preventDefault();

                // Realiza tu acción o condición aquí
                if(confirm("al salir del carrito se eliminaran los productos seleccionados. ¿esta seguro?")){
                    window.location.href = "../client/listarProducto.php";
                }else{}
                

               
               
            });
        });
    </script>
</body>
</html>
