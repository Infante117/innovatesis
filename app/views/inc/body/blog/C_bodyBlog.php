<?php
// Capturamos la URL
$url = $_SERVER["REQUEST_URI"];
// Separamos la URL por el caracter /
$url = explode("/", $url);
$busqued = $_SERVER["REQUEST_URI"];
$busqued = explode("=", $busqued);
if (isset($busqued[1])) {
    $busqueda = str_replace("+", " ", $busqued[1]);
} else {
    $busqueda = "";
}
use app\controllers\blogController;
$blog = new blogController();
echo $blog->blogControllerNOTE($url[3], 4, $url[2], $busqueda);
?>

</div><!-- End blog entries list -->

<div class="col-lg-4">
    <div class="sidebar">
        <h3 class="sidebar-title">Buscar</h3>
        <div class="sidebar-item search-form">
            <form method="GET">
                <input type="text" name="busqueda">
                <button type="submit"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End sidebar search formn-->

        <h3 class="sidebar-title">Posts Recientes</h3>
        <!--<div class="sidebar-item recent-posts">
            <div class="post-item clearfix">
                <img src="" alt="">
                <h4><a href="blog-single.html">Nihil blanditiis at in nihil autem</a></h4>
                <time datetime="2020-01-01">Jan 1, 2020</time>
            </div>

            <div class="post-item clearfix">
                <img src="" alt="">
                <h4><a href="blog-single.html">Quidem autem et impedit</a></h4>
                <time datetime="2020-01-01">Jan 1, 2020</time>
            </div>

            <div class="post-item clearfix">
                <img src="" alt="">
                <h4><a href="blog-single.html">Id quia et et ut maxime similique occaecati ut</a></h4>
                <time datetime="2020-01-01">Jan 1, 2020</time>
            </div>

            <div class="post-item clearfix">
                <img src="" alt="">
                <h4><a href="blog-single.html">Laborum corporis quo dara net para</a></h4>
                <time datetime="2020-01-01">Jan 1, 2020</time>
            </div>

            <div class="post-item clearfix">
                <img src="" alt="">
                <h4><a href="blog-single.html">Et dolores corrupti quae illo quod dolor</a></h4>
                <time datetime="2020-01-01">Jan 1, 2020</time>
            </div>

        </div> End sidebar recent posts-->
        <?php
        echo $blog->blogControllerNT();
        ?>

    </div><!-- End sidebar -->

</div><!-- End blog sidebar -->

</div>

</div>
</section>