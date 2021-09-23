<aside class="sidebar">
    <div class="popular-posts">
        <h3 class="popular-posts__title">Популярные новости</h3>
        <ul class="popular-posts__list list-reset">

            <?php 
                $args = array('posts_per_page' => 3, 'meta_key' => 'post_view', 'orderby' => 'meta_value_num', 'order' => 'DESC');
                query_posts($args);
                while (have_posts()) : the_post();
            ?>

            <li class="popular-posts__item">
                <article class="blog-post popular-posts__article">
                    <h3 class="blog-post__title blog-title">
                        <a href="<?php the_permalink(); ?>" class="blog-post__link"><?php the_title(); ?></a>
                    </h3>
                    <time class="blog-post__date"><?php the_date('j M Y'); ?></time>
                </article>
            </li>

            <?php endwhile; wp_reset_query(); ?>
        </ul>
    </div>
    <div class="subscribe">
        <h3 class="subscribe__title blog-title">Подписка на рассылку</h3>
        <form action="#" class="subscribe__form sub-form">
            <input type="email" class="sub-form__input form-input" placeholder="Email@gmail.com">
            <button class="sub-form__btn form-btn btn-reset">
                <span>Подписаться</span>
                <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19.5857 8.85046L1.01474 0.279244C0.719033 0.144962 0.366184 0.22496 0.160475 0.479239C-0.046663 0.733519 -0.0538057 1.09494 0.143332 1.35636L6.25033 9.49902L0.143332 17.6417C-0.0538057 17.9031 -0.046663 18.2659 0.159046 18.5188C0.297614 18.6917 0.504752 18.7845 0.714747 18.7845C0.816173 18.7845 0.917599 18.7631 1.01331 18.7188L19.5843 10.1476C19.8386 10.0304 20 9.77758 20 9.49902C20 9.22045 19.8386 8.9676 19.5857 8.85046Z" fill="white" />
                </svg>
            </button>
        </form>
    </div>
</aside>