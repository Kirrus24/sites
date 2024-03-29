<?php 

get_header(); ?>

<main class="main">
        <section class="not-found">
            <h1 class="visually-hidden">Страница не найдена</h1>
            <div class="container not-found__container">
                <img class="not-found__img" src="<?php echo get_template_directory_uri(); ?>/assets/img/404.png" alt="404" aria-hidden="true">
                <h2 class="not-found__title blog-title">Что-то пошло не так...</h2>
                <a href="<?php echo home_url(); ?>" class="not-found__back">
                    <svg width="6" height="11" viewBox="0 0 6 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.413444 5.22558L5.03874 0.613083C5.19028 0.462049 5.43563 0.462303 5.58692 0.613865C5.73809 0.765407 5.7377 1.01089 5.58614 1.16205L1.23616 5.50002L5.58629 9.83797C5.73784 9.98914 5.73823 10.2345 5.58708 10.386C5.51124 10.462 5.41188 10.5 5.31253 10.5C5.21342 10.5 5.11446 10.4623 5.03876 10.3868L0.413444 5.77443C0.340456 5.70181 0.299499 5.60299 0.299499 5.50002C0.299499 5.39705 0.340573 5.29834 0.413444 5.22558Z" fill="#5D71DD"/>
                    </svg>   
                    <span>Вернуться назад</span> 
                </a>
            </div>
        </section>
    </main>

<?php get_footer(); ?>

