<?php

/**
 * The News Archive File
 *
 * @package Usi No Sima News Archive
 */

get_header();
?>

<?php get_template_part('templates/fv-all'); ?>
<?php get_template_part('templates/breadcrumb'); ?>
<main
    id="main" class="pt-0 xl:pb-9">
    <div
        class="lg:max-w-[920px] xl:max-w-[1200px] 2xl:max-w-[1400px] mx-auto flex gap-6 lg:gap-8 xl:gap-10 2xl:gap-[52px]">
        <div id="overlay"
            class="hidden w-[100vw] h-[100vh] fixed inset-0 z-30 bg-[#00000075] cursor-pointer transition-opacity duration-300 ease-out">
        </div>
        <?php get_template_part('templates/sidebar'); ?>
        <div id="content" class="flex-1 md:max-w-[680px] lg:max-w-full mx-auto">
            <div class="w-full px-7 md:px-0">
                <div class="flex flex-col items-center gap-1">
                    <img src="<?php echo T_DIRE_URI; ?>/assets/images/mark01.webp" alt="マーク"
                        class="w-[40px] lg:w-[50px] xl:w-[60px] pointer-events-none select-none">
                    <h3 class="text-[24px] lg:text-[28px] xl:text-[32px] 2xl:text-[36px] text-white font-medium tracking-wide">
                        お知らせ
                    </h3>
                </div>
                <div class="w-full grid mt-6 lg:mt-8 xl:mt-10 border-t border-[#818181]">
                    <?php if (have_posts()) : ?>
                        <?php while (have_posts()) : the_post(); ?>
                            <?php
                            $post_id = get_the_ID();
                            $post_date = get_the_date('Y.m.d', $post_id);
                            $post_title = get_the_title($post_id);
                            $post_content = get_field('news_content', $post_id);
                            ?>
                            <a href="<?php echo esc_url(get_permalink($post_id)); ?>">
                                <div class="w-full flex flex-col md:flex-row gap-1 md:gap-2 xl:gap-4 py-4 xl:py-8 border-b border-[#818181]">
                                    <div class="text-[14px] xl:text-[16px] text-[#818181] leading-[1.7] tracking-wide">
                                        <span><?php echo $post_date; ?></span>
                                    </div>
                                    <div>
                                        <p class="text-[14px] xl:text-[16px] text-white leading-[1.4] md:leading-[1.7] tracking-wide hover:underline hover:font-semibold underline-offset-4 cursor-pointer transition">
                                            <?php echo $post_title; ?>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="w-full">
                <?php get_template_part('templates/pagination'); ?>
            </div>
        </div>
    </div>
    </div>
    </div>
</main>

<?php
get_footer();
