<section class="s-content s-content--top-padding">

<div class="row narrow">
    <div class="col-full s-content__header" data-aos="fade-up">
        <h1 class="display-1 display-1--with-line-sep">Category: <?php echo $category_name; ?></h1>
        <p class="lead">Dolor similique vitae. Exercitationem quidem occaecati iusto. Id non vitae enim quas error dolor maiores ut. Exercitationem earum ut repudiandae optio veritatis animi nulla qui dolores.</p>
    </div>
</div>

<div class="row entries-wrap add-top-padding wide">
    <div class="entries">

        <?php foreach($posts as $post) {?>
                <article class="col-block">
                
                <div class="item-entry" data-aos="zoom-in">
                    <div class="item-entry__thumb">
                        <a href="<?php echo base_url() . "/dashboard/post/" . $post['id'] ?>" class="item-entry__thumb-link">
                            <img class="mt-2"
                                src="<?php echo base_url() . '/uploads/posts/images/' . $post['banner']; ?>" width="150px" height="150px">
                        </a>
                    </div>

                    <div class="item-entry__text">
                        <div class="item-entry__cat">
                        <a href="<?php echo base_url() . "/dashboard/category/" . $post['category'] ?>"><?php echo $category_name ?></a>
                        </div>

                        <h1 class="item-entry__title"><a href="<?php echo base_url() . "/dashboard/post/" . $post['id'] ?>"><?php echo $post['title'] ?></a></h1>
                            
                        <div class="item-entry__date">
                            <a href="<?php echo base_url() . "/dashboard/post/" . $post['id'] ?>"><?php echo iconv('ISO-8859-2', 'UTF-8', strftime("%A, %d de %B de %Y", strtotime($post['created_at'])));?></a>
                        </div>
                    </div>
                </div> <!-- item-entry -->

            </article> <!-- end article -->

        <?php } ?>

    </div> <!-- end entries -->
</div> <!-- end entries-wrap -->
<!--
<div class="row pagination-wrap">
    <div class="col-full">
        <nav class="pgn" data-aos="fade-up">
            <ul>
                <li><a class="pgn__prev" href="#0">Prev</a></li>
                <li><a class="pgn__num" href="#0">1</a></li>
                <li><span class="pgn__num current">2</span></li>
                <li><a class="pgn__num" href="#0">3</a></li>
                <li><a class="pgn__num" href="#0">4</a></li>
                <li><a class="pgn__num" href="#0">5</a></li>
                <li><span class="pgn__num dots">…</span></li>
                <li><a class="pgn__num" href="#0">8</a></li>
                <li><a class="pgn__next" href="#0">Next</a></li>
            </ul>
        </nav>
    </div>
</div>
        -->
        <div class="row pagination-wrap">
            <div class="col-full">
                    <nav class="pgn" data-aos="fade-up">
             <?= $pager->links() ?>
             </nav>
    </div>
</div>
</section> <!-- end s-content -->