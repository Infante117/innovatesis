<section id="portfolio" class="portfolio">
    <div class="container">
        <?php  
            use app\controllers\promotionsController;
            $promotion = new promotionsController();
            echo $promotion->bodyPromotionsController();
            ?>
    </div>
</section>