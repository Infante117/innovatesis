<?php
use app\controllers\blogController;
$url = $_SERVER["REQUEST_URI"];
$url = explode("/", $url);
$TEMP= $url[2];
$id= $url[3];
if ($TEMP . $id == "detailsBlog" or $TEMP . $id == "detailsBlog/") {
    echo "<script>window.history.back();</script>";
}
$blog = new blogController();
echo $blog->detalleBlogController($id);

?>
<!--validamos que hay un usuario logueado para que pueda dejar un comentario, sino le pedimos que inicie sesion-->
<?php if (isset($_SESSION['id'])) : ?>    
<div class="reply-form">
    <form action="<?php echo APP_URL; ?>app/ajax/BlogAjax.php" method="POST" autocomplete="off"
        enctype="multipart/form-data" class="FormularioAjax">
        <input type="hidden" name="modulo_blog" value="NuevoComentario">
        <div class="row">
            <input type="hidden" name="commentId" value="<?php echo $id ?>">
            <div class="col form-group">
                <textarea name="comment" class="form-control" placeholder="Deja un comentario"></textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Comentar</button>
    </form>
</div>
</div>
<?php else : ?>
<div class="reply-form">
    <h6>Para dejar un comentario, por favor <a href="<?php echo APP_URL; ?>login/">inicia sesión</a></h6>
</div>
</div>
<?php endif; ?>    

<div class="col-lg-4">
    <div class="sidebar">
        <h3 class="sidebar-title">Buscar</h3>
        <div class="sidebar-item search-form">
            <form method="GET">
                <input type="text" name="busqueda">
                <button type="submit"><i class="bi bi-search"></i></button>
            </form>
        </div>
        <!-- End sidebar search formn-->

        <h3 class="sidebar-title">Posts Recientes</h3>
        <?php
        echo $blog->blogControllerNT();
        ?>

    </div><!-- End sidebar -->

</div><!-- End blog sidebar -->

</div>

</div>
</section>
<script>
function toggleComments(commentId) {
    var commentsSection = document.getElementById('additional-comments-' + commentId);
    var showButton = document.getElementById('show-comments-btn-' + commentId);
    var hideButton = document.getElementById('hide-comments-btn-' + commentId);

    if (commentsSection.style.display === 'none' || commentsSection.style.display === '') {
        commentsSection.style.display = 'block';
        showButton.style.display = 'none';
        hideButton.style.display = 'inline-block';
    } else {
        commentsSection.style.display = 'none';
        showButton.style.display = 'inline-block';
        hideButton.style.display = 'none';
    }
}
</script>

<script>
function showCommentForm(event, commentId) {
    event.preventDefault(); // Cancelar el comportamiento predeterminado del enlace
    var form = document.querySelector('.comment-form.comment-' + commentId);
    form.style.display = 'block';
}

function cancelComment(commentId) {
    var form = document.querySelector('.comment-form.comment-' + commentId);
    var textarea = form.querySelector('.form-control');
    textarea.value = ''; // Limpiar el contenido del textarea
    form.style.display = 'none'; // Ocultar el formulario
}

function submitComment(commentId) {
    var form = document.querySelector('.comment-form.comment-' + commentId);
    var textarea = form.querySelector('.form-control');
    var comment = textarea.value;
}

function showEditarCommentForm(event, commentId) {
    event.preventDefault(); // Cancelar el comportamiento predeterminado del enlace
    var form = document.querySelector('.editar_comment-form.comment-' + commentId);
    form.style.display = 'block';
}

function cancelEditarComment(commentId) {
    var form = document.querySelector('.editar_comment-form.comment-' + commentId);
    var textarea = form.querySelector('.form-control');
    form.style.display = 'none'; // Ocultar el formulario
}

function submitEditarComment(commentId) {
    var form = document.querySelector('.editar_comment-form.comment-' + commentId);
    var textarea = form.querySelector('.form-control');
    var comment = textarea.value;
}

function deleteCommentForm(event, commentId) {
    event.preventDefault(); // Cancelar el comportamiento predeterminado del enlace
    var form = document.querySelector('.delete_comment-form.comment-' + commentId);
    form.style.display = 'block';
}

document.addEventListener('DOMContentLoaded', function() {
    var cancelarButtons = document.querySelectorAll('.cancelar-btn');
    cancelarButtons.forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            var commentId = this.getAttribute('data-comment-id');
            cancelEditarComment(commentId);
        });
    });
});

</script>

<script>
    function deleteCommentForm(event, idComentario) {
        event.preventDefault(); // Cancela el comportamiento predeterminado del enlace
        // Realiza una solicitud AJAX para eliminar el comentario
        $.ajax({
            type: 'POST',
            url: '<?php echo APP_URL; ?>app/ajax/BlogAjax.php', // Ruta al controlador que maneja la eliminación del comentario
            data: {
                modulo_blog: 'EliminarComentario',
                id_comentario: idComentario
            },
            success: function(response) {
                // Parsea la respuesta JSON
                var data = JSON.parse(response);
                // Verifica el tipo de alerta y muestra Sweet Alert en consecuencia
                if (data.tipo === 'limpiar') {
                    // Muestra Sweet Alert con mensaje de éxito y recarga la página después de cerrar
                    Swal.fire({
                        title: data.titulo,
                        text: data.texto,
                        icon: data.icono
                    }).then(function() {
                        location.reload(); // Recarga la página
                    });
                } else {
                    // Muestra Sweet Alert con mensaje de error
                    Swal.fire({
                        title: data.titulo,
                        text: data.texto,
                        icon: data.icono
                    });
                }
            },
            error: function(xhr, status, error) {
                // Maneja errores si es necesario
                console.error(error);
            }
        });
    }
    function deleteReplyCommentForm(event, idComentario) {
        event.preventDefault(); // Cancela el comportamiento predeterminado del enlace
        // Realiza una solicitud AJAX para eliminar el comentario
        $.ajax({
            type: 'POST',
            url: '<?php echo APP_URL; ?>app/ajax/BlogAjax.php', // Ruta al controlador que maneja la eliminación del comentario
            data: {
                modulo_blog: 'EliminarReplyComentario',
                id_comentario: idComentario
            },
            success: function(response) {
                // Parsea la respuesta JSON
                var data = JSON.parse(response);
                // Verifica el tipo de alerta y muestra Sweet Alert en consecuencia
                if (data.tipo === 'limpiar') {
                    // Muestra Sweet Alert con mensaje de éxito y recarga la página después de cerrar
                    Swal.fire({
                        title: data.titulo,
                        text: data.texto,
                        icon: data.icono
                    }).then(function() {
                        location.reload(); // Recarga la página
                    });
                } else {
                    // Muestra Sweet Alert con mensaje de error
                    Swal.fire({
                        title: data.titulo,
                        text: data.texto,
                        icon: data.icono
                    });
                }
            },
            error: function(xhr, status, error) {
                // Maneja errores si es necesario
                console.error(error);
            }
        });
    }
</script>
<script>
    function editReplyCommentForm(event, replyId) {
    event.preventDefault(); // Cancela el comportamiento predeterminado del enlace
    var form = document.querySelector('.reply_comment-form.comment-' + replyId);
    form.style.display = 'block';
}
function cancelReplyCommentForm(replyId) {
    var form = document.querySelector('.reply_comment-form.comment-' + replyId);
    var textarea = form.querySelector('.form-control');
    form.style.display = 'none'; // Ocultar el formulario
}
function submitReplyCommentForm(replyId) {
    var form = document.querySelector('.reply_comment-form.comment-' + replyId);
    var textarea = form.querySelector('.form-control');
    var comment = textarea.value;
    // Aquí puedes enviar el formulario utilizando AJAX o realizar cualquier otra acción necesaria
}

    </script>