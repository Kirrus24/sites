<footer class="footer">
        <div class="container footer__container">
            
            <?php

                if (is_front_page()){
                    ?>
                        <a href="#" class="logo footer__logo">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.svg" alt="Logo">
                        </a>

                        <?php
                }
                else {
                    ?>

                        <a href="<?php echo home_url(); ?>" class="logo header__logo">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.svg" alt="Logo">
                        </a>
                    <?php
                }

            ?>

                <nav class="nav menu-nav">
                    <?php wp_nav_menu(['container' => '']); ?>
                </nav>
            <small class="footer__copy">ООО “Организация” 2020. Все права защищены</small>
        </div>
    </footer>
    <?php
        if(is_search() or is_404()){
            ?>
            </div>
            <?php
        }
    ?>
    <?php wp_footer(); ?>
</body>
</html>