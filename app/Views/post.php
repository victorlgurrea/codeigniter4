
   <!-- s-content
    ================================================== -->
    <section class="s-content s-content--top-padding s-content--narrow">

        <article class="row entry format-standard">

            <div class="entry__media col-full">
                <div class="entry__post-thumb text-center">
                    <img src="<?php echo base_url('uploads/posts/images/' . trim($post->banner));?>" 
                         sizes="(max-width: 2000px) 100vw, 2000px" alt="<?php echo $post->slug; ?>">
                </div>
            </div>

            <div class="entry__header col-full">
                <h1 class="entry__header-title display-1">
                    <?php echo $post->title ?>
                </h1>
                <ul class="entry__header-meta">
                    <li class="date"><?php echo iconv('ISO-8859-2', 'UTF-8', strftime("%A, %d de %B de %Y", strtotime($post->created_at)));?></li>
                    <li class="byline">
                        Por
                        <a href="#0">Jonathan Doe</a>
                    </li>
                </ul>
            </div>

            <div class="col-full entry__main">

                <p class="lead drop-cap"><?php echo substr($post->intro,0,100) . "...";?></p>
                
                <p><?php echo $post->intro?>
                </p>


                <h2>Contenido</h2>

                <p>
                    <?php echo $post->content; ?>
                </p>

                <blockquote><p><?php echo $post->content ?></p></blockquote>


                <div class="entry__taxonomies">
                    <div class="entry__cat">
                        <h5>Posted In: </h5>
                        <span class="entry__tax-list"> 
                            <a href="<?php echo base_url() . '/dashboard/category/' . $post->category_id ?>" style="cursor:pointer;"><?php echo $post->category_name ?></a>
                        </span>
                    </div> <!-- end entry__cat -->

                    <div class="entry__tags">
                        <h5>Tags: </h5>
                        <span class="entry__tax-list entry__tax-list--pill">
                            <?php  $tags = explode(",", $post->tags); ?>
                            <?php  foreach ($tags as $tag ) {?>
                                <a href="#"><?php echo $tag; ?></a>
                            <?php } ?>
                           
                        </span>
                    </div> <!-- end entry__tags -->
                </div> <!-- end s-content__taxonomies -->

                <div class="entry__author">
                    <img src="images/avatars/user-03.jpg" alt="">

                    <div class="entry__author-about">
                        <h5 class="entry__author-name">
                            <span>Postead Por</span>
                            <a href="#0">Jonathan Doe</a>
                        </h5>

                        <div class="entry__author-desc">
                            <p>
                            Alias aperiam at debitis deserunt dignissimos dolorem doloribus, fuga fugiat 
                            impedit laudantium magni maxime nihil nisi quidem quisquam sed ullam voluptas 
                            voluptatum. Lorem ipsum dolor sit.
                            </p>
                        </div>
                    </div>
                </div>

            </div> <!-- s-entry__main -->

        </article> <!-- end entry/article -->


        <div class="s-content__entry-nav">
            <div class="row s-content__nav">
                <div class="col-six s-content__prev">
                    <a href="#0" rel="prev">
                        <span>Post Previo:</span>
                        <a href="<?php echo base_url() . "/dashboard/post/" . $post_random_previous->id ?>" class="popular__thumb"><?= $post_random_previous->title?></a>
                    </a>
                </div>
                <div class="col-six s-content__next">
                    <a href="#0" rel="next">
                        <span>Siguiente Post:</span>
                        <a href="<?php echo base_url() . "/dashboard/post/" . $post_random_next->id ?>" class="popular__thumb"><?= $post_random_next->title?></a>
                    </a>
                </div>
            </div>
        </div> <!-- end s-content__pagenav -->

        <div class="comments-wrap">

            <div id="comments" class="row">
                <div class="col-full">

                    <h3 class="h2"><?php echo count($comments);?> Comentarios</h3>

                    <!-- START commentlist -->
                    <ol class="commentlist">

                       <?php  foreach ($comments as $comment) {?>
                            <li class="depth-1 comment">

                            <div class="comment__avatar">
                                <img class="avatar" src="<?php echo base_url() . '/assets/images/avatars/user-0' . rand(1,5) .'.jpg'; ?>" alt="" width="50" height="50">
                            </div>

                            <div class="comment__content">

                                <div class="comment__info">
                                    <div class="comment__author"><?php echo $comment['name'] ?> </div>

                                    <div class="comment__meta">
                                        <div class="comment__time"><?php echo iconv('ISO-8859-2', 'UTF-8', strftime("%A, %d de %B de %Y", strtotime($comment['date'])));?></div>
                                        <!--<div class="comment__reply">
                                            <a class="comment-reply-link" href="#0">Reply</a>
                                        </div>-->
                                    </div>
                                </div>

                                <div class="comment__text">
                                    <?php echo $comment['comment']?>
                                </div>

                            </div>

                        </li> <!-- end comment level 1 -->
                       <?php } ?>

                    </ol>
                    <!-- END commentlist -->           

                </div> <!-- end col-full -->
            </div> <!-- end comments -->

            <div class="row comment-respond">

                <!-- START respond -->
                <div id="respond" class="col-full">

                    <h3 class="h2">Añadir comentarios: <span>Tu email no será publicado</span></h3>

                    <form name="contactForm" id="contactForm" method="post" action="" autocomplete="off">
                        <fieldset>

                            <div class="form-field">
                                <input name="name" id="name" class="full-width" placeholder="Tu Nombre*" value="" type="text">
                            </div>

                            <div class="form-field">
                                <input name="email" id="email" class="full-width" placeholder="Tu Email*" value="" type="text">
                            </div><br>


                            <div class="message form-field">
                                <textarea name="comment" id="editor" class="full-width" placeholder="Tu comentario*"></textarea>
                            </div>

                            <input name="submit" id="submit" class="btn btn--primary btn-wide btn--large full-width" value="Añadir comentario" type="submit">

                        </fieldset>
                    </form> <!-- end form -->

                </div>
                <!-- END respond-->

            </div> <!-- end comment-respond -->

        </div> <!-- end comments-wrap -->

    </section> <!-- end s-content -->


<script>
$(document).ready(function() {
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        });
});

</script>