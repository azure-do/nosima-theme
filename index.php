<?php

/**
 * The main template file
 *
 * @package NSPA
 */

get_header();
?>

<main id="main" class="w-full flex justify-center">
    <?php
    if (have_posts()) :
        while (have_posts()) :
            the_post();
    ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                </header>
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php
        endwhile;
    else :
        ?>
        <div class="no-content w-[90vw] h-[80vh] flex flex-col justify-center items-center gap-10">
            <h1 class="text-black text-[72px]">404</h1>
            <h1 class="text-[36px]">お探しのページは見つかりませんでした</h1>
            <p class="text-[30px]">申し訳ありませんが、ご指定のページは存在しないか、移動した可能性があります。</p>
            <p class="text-[28px] font-bold hover:bg-gray-100 duration-200"><a href="<?php echo esc_url(home_url('/')); ?>">トップページへ戻る</a></p>
        </div>
    <?php
    endif;
    ?>
</main>

<?php
get_footer();
