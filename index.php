<?php $opt = get_option('twin_opt'); ?>
<?php get_header(); ?>
<div class="init-page-load">
    <div class="penta-2">
        <?php
            if($opt['txtloading']['url']!=''):
                ?>
                    <img src="<?php echo $opt['txtloading']['url']; ?>" width="273" class="logo-circ">
                <?php
            else:
                ?>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/index/logo-circ.png" class="logo-circ">
                <?php
            endif;
        ?>
    </div>
    <div class="enter-btn">Loading . . .</div>
    <div class="spinner"><div class="line-1"></div><div class="line-2"></div></div>
</div>
<div class="navbar">
    <div class="container">
        <div class="logo-container">
            <?php
                if($opt['txtlogo']['url']!=''):
                    ?>
                        <img src="<?php echo $opt['txtlogo']['url']; ?>" height="78">
                    <?php
                else:
                    ?>
                        <span class="title-text">Twin Monkey</span>
                    <?php
                endif;
            ?>
        </div>
        <div class="nav-ul"><?php wp_nav_menu (array('theme_location' => 'header-menu', 'menu_class' => 'headerMenu')); ?></div>
        <div class="mobile-handle"><div class="mobile-lines"></div><div class="mobile-lines"></div><div class="mobile-lines"></div></div>
    </div>
</div>
<div class="popup-parent"><div class="popup-img-container"><img src="" alt="" class="popup-img"></div></div>
<div class="parent-container">
    <section class="fill-section" id="Home">
        <div class="penta">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/index/hand.png" alt="" class="hand">
            <div class="hand-text">
                TWIN<span class="gap"></span>MONKEYS
            </div>
            <div class="est-text">
                - SINCE - <span class="gap"></span> - 1998 -
            </div>
        </div>
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/index/props-1.png" alt="" class="prop-1">
        <a href="#Story"><div class="down-arrow"></div></a>
    </section>
    <section class="fill-section" id="Story">
        <?php
            if($opt['txtvideo']!=''):
                ?>
                    <video class="video" src="<?php echo $opt['txtvideo']; ?>" playsinline autoplay muted loop></video>
                <?php
            else:
                ?>
                    <video class="video" src="<?php echo get_stylesheet_directory_uri(); ?>/img/vid.mp4" playsinline autoplay muted loop></video>
                <?php
            endif;
        ?>
        <div class="story-container">
            <div class="ocra-small gold">- the story of -</div>
            <div class="friz">TWIN MONKEY</div>
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/index/story-geo.png" alt="">
            <div class="paragraph"><?php echo nl2br($opt['txtstory']); ?></div>
        </div>
        <a href="#Work"><div class="down-arrow"></div></a>
    </section>
    <section class="fill-section" id="Work">
        <div class="ocra-small gold">- Latest Work -</div>
        <div class="friz">Masterpiece</div>
        <div class="filter">
            <ul>
                <li class="active" data-category-handle="All">All</li>
                <li data-category-handle="tattoo">Tattoo</li>
                <li data-category-handle="painting">Painting</li>
            </ul>
        </div>
        <div class="gallery" id="gallerycontent">
            <?php
                global $wpdb;
                $results = $wpdb->get_results($wpdb->prepare("SELECT * FROM ".$wpdb->prefix."posts WHERE `post_type` = %s AND `post_status` = %s ORDER BY `ID` DESC LIMIT 0,8",'work','publish'));
                if(count($results)>0):
                    foreach ($results as $post):
                        ?>
                            <div class="thumbs-parent <?php echo get_field('type'); ?>" data-category="<?php echo get_field('type'); ?>">
                                <img src="<?php echo get_field('image'); ?>" class="thumb-img">
                                <div class="hover-tint">
                                    <div class="border">
                                        <div class="img-caption"><?php echo the_title(); ?></div>
                                        <div class="magnifier">View</div>
                                    </div>
                                </div>
                            </div>
                        <?php
                    endforeach;
                endif;
            ?>
        </div>
        <?php
            $resultscount = $wpdb->get_results($wpdb->prepare("SELECT ID FROM ".$wpdb->prefix."posts WHERE `post_type` = %s AND `post_status` = %s ORDER BY `ID` DESC",'work','publish'));
            $totaldata = count($resultscount);
            $totalpage = ceil($totaldata/8);
            if($totalpage>1):
                ?>
                    <div class="load-more-btn" style="color:white;">load more</div>
                <?php
            endif;
        ?>
        <a href="#Book"><div class="down-arrow"></div></a>
    </section>
    <section class="fill-section" id="Book">
        <div class="ocra-small gold">- Get in touch -</div>
        <div class="friz">How To Book</div>
        <div class="book-container">
            <div class="book-module">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/index/Book-1.png" alt="" />
                <div class="book-caption">Consultation</div>
                <div class="book-subcaption">We Will Advise</div>
            </div>
            <div class="book-module">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/index/Book-2.png" alt="" />
                <div class="book-caption">Design</div>
                <div class="book-subcaption">Draw A sketch</div>
            </div>
            <div class="book-module">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/index/Book-3.png" alt="" />
                <div class="book-caption">Modifications</div>
                <div class="book-subcaption">We Will Advise</div>
            </div>
        </div>
        <a href="#Footer"><div class="down-arrow"></div></a>
    </section>
    <section class="fill-section" id="Footer">
        <div class="ocra-small gold">- Get in touch -</div>
        <div class="friz">Contact Us</div>
        <?php echo do_shortcode('[contact-form-7 id="7" title="Contact form 1"]'); ?>
        <div class="footer-caption"><?php echo nl2br($opt['txtcontact']); ?></div>
        <div class="footer-copyright"><?php echo $opt['txtfooter']; ?></div>
    </section>
</div>
<?php get_footer(); ?>
<script type="text/javascript">
    var tpage = <?php echo $totalpage; ?>;
    var cpage = 1;
    var lpage = 2;
    jQuery('.load-more-btn').click(function(e){
        e.preventDefault();
        jQuery.ajax({
            type: "POST",
            url: "<?php echo get_stylesheet_directory_uri(); ?>/loadmore.php",
            data: {page: lpage},
            success: function(y) {
                console.log(y);
                var x = JSON.parse(y);
                for (var i =  0; i < x.length; i++) {
                    jQuery('#gallerycontent').append('<div class="thumbs-parent '+x[i]['type']+'" data-category="'+x[i]['type']+'"><img src="'+x[i]['image']+'" class="thumb-img"><div class="hover-tint"><div class="border"><div class="img-caption">'+x[i]['title']+'</div><div class="magnifier">View</div></div></div></div>');
                }
                cpage++;
                lpage++;
                if(cpage==tpage) jQuery('.load-more-btn').hide();
            }
        });
    });
</script>
