   <!-- s-extra
    ================================================== -->
    <section class="s-extra">

        <div class="row">

            <div class="col-seven md-six tab-full popular">
                <h3>Popular Posts</h3>

                <div class="block-1-2 block-m-full popular__posts">
                    <!--
                    <article class="col-block popular__post">
                        <a href="#0" class="popular__thumb">
                            <img src="<?php echo base_url('assets/images/thumbs/small/tulips-150.jpg');?>" alt="">
                        </a>
                        <h5>10 Interesting Facts About Caffeine.</h5>
                        <section class="popular__meta">
                            <span class="popular__author"><span>By</span> <a href="#0">John Doe</a></span>
                            <span class="popular__date"><span>on</span> <time datetime="2018-06-14">Jun 14, 2018</time></span>
                        </section>
                    </article>
                    -->
                    <?php
                            setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
                            $db = \Config\Database::connect();
                            $query="SELECT * FROM posts WHERE show_home=1";
                            $query = $db->query($query);
                            $result = $query->getResult();

                            foreach ($result as $post) { ?>
                                <article class="col-block popular__post">
                                    <a href="<?php echo base_url() . "/dashboard/post/" . $post->slug . "/" . $post->id ?>" class="popular__thumb">
                                        <img src="<?php echo base_url('uploads/posts/images/' . $post->banner);?>" alt="">
                                    </a>
                                    <h5><?php echo $post->title?></h5>
                                    <section class="popular__meta">
                                        <span class="popular__author"><span>Por</span> <a href="#0">Usuario</a></span>
                                        <span class="popular__date"><span>en</span> <time datetime="<?php echo $post->created_at?>"><?php echo iconv('ISO-8859-2', 'UTF-8', strftime("%A, %d de %B de %Y", strtotime($post->created_at)));?></time></span>
                                    </section>
                                </article>
                        <?php    } ?>


                </div> <!-- end popular_posts -->
            </div> <!-- end popular -->

            <div class="col-four md-six tab-full end">
                <div class="row">
                    <div class="col-six md-six mob-full categories">
                        <h3>Categories</h3>
        
                        <ul class="linklist">
                        <?php
                            $db = \Config\Database::connect();
                            $query="SELECT * FROM categories";
                            $query = $db->query($query);
                            $result = $query->getResult();

                            foreach ($result as $category) { ?>
                                <li><a href="<?php echo base_url() . "/dashboard/category/" . $category->id ?>"><?php echo $category->name ?></a></li>
                        <?php    } ?>
                        </ul>
                    </div> <!-- end categories -->
        
                    <div class="col-six md-six mob-full sitelinks">
                        <h3>Site Links</h3>
        
                        <ul class="linklist">
                            <li><a href="<?php echo base_url() ?>">Home</a></li>
                            <li><a href="<?php echo base_url(). "/dashboard/blog" ?>">Blog</a></li>
                        </ul>
                    </div> <!-- end sitelinks -->
                </div>
            </div>
        </div> <!-- end row -->

    </section> <!-- end s-extra -->


    <!-- s-footer
    ================================================== -->
    <footer class="s-footer">

        <div class="s-footer__main">
            <div class="row">
                
                <div class="col-six tab-full s-footer__about">
                        
                    <h4>About Wordsmith</h4>

                    <p>Fugiat quas eveniet voluptatem natus. Placeat error temporibus magnam sunt optio aliquam. Ut ut occaecati placeat at. 
                    Fuga fugit ea autem. Dignissimos voluptate repellat occaecati minima dignissimos mollitia consequatur.
                    Sit vel delectus amet officiis repudiandae est voluptatem. Tempora maxime provident nisi et fuga et enim exercitationem ipsam. Culpa error 
                    temporibus magnam est voluptatem.</p>

                </div> <!-- end s-footer__about -->

                <div class="col-six tab-full s-footer__subscribe">
                        
                    <h4>Our Newsletter</h4>

                    <p>Sit vel delectus amet officiis repudiandae est voluptatem. Tempora maxime provident nisi et fuga et enim exercitationem ipsam. Culpa consequatur occaecati.</p>

                    <div class="message">

                    </div>
                    <div class="subscribe-form">
                        <form id="mc-form" class="group" novalidate="true" >

                            <input type="email" value="" name="email" class="email" id="email" placeholder="Email Address" required="">
                
                            <input type="submit" name="subscribe" id="subscribe" value="Send">
                
                            <label for="mc-email" class="subscribe-message"></label>
                
                        </form>
                    </div>

                </div> <!-- end s-footer__subscribe -->

            </div>
        </div> <!-- end s-footer__main -->

        <div class="s-footer__bottom">
            <div class="row">

                <div class="col-six">
                    <ul class="footer-social">
                        <li>
                            <a href="#0"><i class="fab fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#0"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#0"><i class="fab fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href="#0"><i class="fab fa-youtube"></i></a>
                        </li>
                        <li>
                            <a href="#0"><i class="fab fa-pinterest"></i></a>
                        </li>
                    </ul>
                </div>

                <div class="col-six">
                    <div class="s-footer__copyright">
                        <span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</span>
                    </div>
                </div>
                
            </div>
        </div> <!-- end s-footer__bottom -->

        <div class="go-top">
            <a class="smoothscroll" title="Back to Top" href="#top"></a>
        </div>

    </footer> <!-- end s-footer -->


    <!-- Java Script
    ================================================== -->
  <!--  <script src="<?php echo base_url('assets/js/jquery-3.2.1.min.js'); ?>"></script> -->
    <script src="<?php echo base_url('assets/js/plugins.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/main.js'); ?>"></script>

    <script type="text/javascript">
 

             $(document).ready(function(){
                $("#subscribe").click(function(event){
                    event.preventDefault();

                    var confirmText = "esta seguro de subscribirse a la newsletter?";
                        if(! confirm(confirmText)) {
                            return;
                        }

                        $.ajax({  
                            url: '<?php echo base_url() . '/dashboard/add_newsletter'; ?>',
                            type: 'POST',
                            dataType:'json',
                            data:{email:$("#email").val()},
                            success:function(data){
                                console.log(data);
                                if(data) {
                                    $(".message").html(`
                                    <div class="alert-box alert-box--success alert-dismissible fade show" role="alert">
                                        <strong>Hey! </strong> te has suscrito a la newsletter.
                                        <span class="alert-box__close cerrar" aria-hidden="true">&times;</span>
                                    </div>
                                    `);
                                } else {
                                    $(".message").html(`
                                    <div class="alert-box alert-box--notice alert-dismissible fade show" role="alert">
                                        <strong>Error! </strong> no te has suscrito a la newsletter.
                                        <span class="alert-box__close cerrar"  aria-hidden="true">&times;</span>
                                    </div>
                                    `);
                                }
                                setTimeout(function(){ $(".cerrar").trigger("click"); }, 3000);
                            
                            }  
                        });
                });

                $(document).on("click",".cerrar",function() {
                    $(".message").empty();
                });

            });
            
            
            
            
    </script>
</body>

</html>