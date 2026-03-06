<?php

/**
 * The News Archive File
 *
 * @package NSPA
 */

get_header();
?>

<section id="home" class="w-full relative">
    <div class="w-full h-[100vh] flex justify-center items-end mx-auto bg-cover bg-center">
        <div class="hidden md:flex w-[64px] justify-center items-end pb-36">
            <div class="flex flex-col items-center gap-4">
                <p class="[writing-mode:vertical-rl] blue-gradient-text text-[20px] xl:text-[24px] font-semibold">
                    SCROLL
                </p>
                <div class="relative w-[1px] h-[100px] bg-[#008FD2]">
                    <div class="flex items-start w-[1px] h-[30px] absolute bottom-0 translate-y-1/2 rotate-[30deg]">
                        <div class="w-full h-1/2 bg-[#008FD2]">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="relative w-full h-full">
            <div class="z-20 w-full h-full bg-[url('<?php echo T_DIRE_URI; ?>/assets/images/fv-news.webp')] bg-cover bg-center"></div>
            <p class="absolute top-1/2 -translate-y-1/2 left-1/2 -translate-x-1/2 lg:translate-x-0 lg:left-[12%] text-white font-bodoni text-center text-[44px] lg:text-[50px] xl:text-[60px] leading-[2.2] tracking-[4px] lg:tracking-[8px] font-medium z-30"
                style="text-shadow: 0px 0px 24px black;">News</p>
        </div>
    </div>
    <div class="absolute -bottom-1 z-10">
        <img src="<?php echo T_DIRE_URI; ?>/assets/images/flow-mark00.webp" class="w-full h-auto">
    </div>
    <img src="<?php echo T_DIRE_URI; ?>/assets/images/flow-mark-sm.webp"
        class="absolute -bottom-6 lg:bottom-10 right-0 max-w-[100px] lg:max-w-[150px] xl:max-w-[220px] z-20 w-full h-auto">
</section>
<section id="news" class="pt-10 md:pt-20 lg:pt-24 xl:pt-28 pb-[50px] lg:pb-20 xl:pb-32">
    <div class="flex flex-col justify-center items-center">
        <h3
            class="text-[24px] md:text-[28px] lg:text-[30px] xl:text-[50px] font-medium font-bodoni text-center text-[#2e2f34] tracking-wide pb-6 lg:pb-10 xl:pb-[60px]">
            NEWS
        </h3>
        <section class="accordion w-full max-w-[890px] flex flex-col gap-6 md:gap-8 lg:gap-10 xl:gap-10 px-8">
            <div class="w-full grid border-t border-[#6c6a68]">
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <?php
                        $post_id        = get_the_ID();
                        $news_main_img  = get_field('news_main_img', $post_id);
                        $news_title     = get_field('news_title', $post_id);
                        $news_main_text = get_field('news_main_content', $post_id);
                        ?>
                        <a href="<?php echo esc_url(get_permalink($post_id)); ?>" class="group">
                            <div
                                class="w-full flex items-center gap-4 lg:gpa-6 xl:gap-8 py-2 lg:py-3 xl:py-4 2xl:py-5 border-b border-[#6c6a68]">
                                <div class="w-fit overflow-hidden">
                                    <?php if ($news_main_img) : ?>
                                        <img src="<?php echo esc_url($news_main_img); ?>"
                                            class="group-hover:scale-105 transition w-[90px] lg:w-[100px] xl:w-[120px] 2xl:w-[140px] aspect-[1.3]">
                                    <?php endif; ?>
                                </div>
                                <div class="flex-1 flex flex-col justify-center gap-1">
                                    <div class="text-[14px] xl:text-[16px] text-[#6c6c6c] leading-[1.7] tracking-wide">
                                        <?php echo esc_html(get_the_date('Y.m.d', $post_id)); ?>
                                    </div>
                                    <?php if ($news_title) : ?>
                                        <p
                                            class="text-[14px] xl:text-[16px] text-[#2e2f34] group-hover:text-black group-hover:font-medium group-hover:underline underline-offset-2 transition leading-[1.5] lg:leading-[1.7] tracking-wide lg:tracking-wider line-clamp-1">
                                            <?php echo esc_html($news_title); ?>
                                        </p>
                                    <?php endif; ?>
                                    <?php if ($news_main_text) : ?>
                                        <p
                                            class="text-[14px] xl:text-[16px] text-[#a1a1a1] lg:leading-[1.7] tracking-wide lg:tracking-wider line-clamp-1">
                                            <?php echo esc_html(wp_strip_all_tags($news_main_text)); ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </a>
                    <?php endwhile; ?>
                <?php else : ?>
                    <div class="w-full py-8 text-center text-[14px] xl:text-[16px] text-[#6c6c6c]">
                        現在お知らせはありません。
                    </div>
                <?php endif; ?>
            </div>

            <?php
            global $wp_query;
            $total_pages = (int) $wp_query->max_num_pages;
            if ($total_pages > 1) :
                $current = max(1, (int) get_query_var('paged'));
                if (!$current) {
                    $current = 1;
                }

                $pages_to_show = array();
                $pages_to_show[] = 1;

                $start = max(2, $current - 1);
                $end   = min($total_pages - 1, $current + 1);

                for ($i = $start; $i <= $end; $i++) {
                    $pages_to_show[] = $i;
                }

                if ($total_pages > 1) {
                    $pages_to_show[] = $total_pages;
                }

                $pages_to_show = array_unique($pages_to_show);
                sort($pages_to_show);
            ?>
                <div class="w-full flex justify-center items-center">
                    <nav class="flex gap-4 mt-8 mb-4" aria-label="Pagination">
                        <ul class="flex gap-1 lg:gap-2 xl:gap-4 items-center items-stretch">
                            <?php foreach ($pages_to_show as $index => $page_number) : ?>
                                <?php
                                if ($index > 0) {
                                    $prev_number = $pages_to_show[$index - 1];
                                    if ($page_number > $prev_number + 1) {
                                ?>
                                        <li>
                                            <span
                                                class="block w-[32px] lg:w-[40px] xl:w-[48px] aspect-[1] flex items-center justify-center border border-[#2e2f34] text-[#2e2f34] text-[14px] lg:text-[18px] xl:text-[22px] font-serif bg-white select-none"
                                                style="letter-spacing:0.08em;">…</span>
                                        </li>
                                <?php
                                    }
                                }
                                $is_current = ($page_number === $current);
                                $page_url   = get_pagenum_link($page_number);
                                ?>
                                <li>
                                    <a href="<?php echo esc_url($page_url); ?>" <?php echo $is_current ? ' aria-current="page"' : ''; ?>
                                        class="block w-[32px] lg:w-[40px] xl:w-[48px] aspect-[1] flex items-center justify-center border border-[#2e2f34] text-[#2e2f34] text-[14px] lg:text-[18px] xl:text-[22px] font-serif transition duration-150 hover:bg-[#f5f4f2] <?php echo $is_current ? 'bg-[#fcf8f5]' : 'bg-white'; ?>"
                                        style="letter-spacing:0.08em;">
                                        <span class="leading-[1] pb-[1px] lg:pb-[2px]"><?php echo esc_html($page_number); ?></span>
                                    </a>
                                </li>
                            <?php endforeach; ?>

                            <?php if ($current < $total_pages) : ?>
                                <li>
                                    <a href="<?php echo esc_url(get_pagenum_link($current + 1)); ?>"
                                        class="block w-[32px] lg:w-[40px] xl:w-[48px] aspect-[1] flex items-center justify-center border border-[#2e2f34] text-[#2e2f34] text-[14px] lg:text-[18px] xl:text-[26px] font-serif transition duration-150 hover:bg-[#f5f4f2] bg-white"
                                        style="letter-spacing:0.08em;">&gt;</a>
                                </li>
                                <li>
                                    <a href="<?php echo esc_url(get_pagenum_link($total_pages)); ?>"
                                        class="block h-full flex items-center justify-center px-1 lg:px-2 xl:px-4 border border-[#2e2f34] text-[#2e2f34] text-[14px] lg:text-[18px] xl:text-[22px] font-serif transition duration-150 hover:bg-[#f5f4f2] bg-white"
                                        style="letter-spacing:0.13em;">Last</a>
                                </li>
                            <?php else : ?>
                                <li>
                                    <span
                                        class="block w-[32px] lg:w-[40px] xl:w-[48px] aspect-[1] flex items-center justify-center border border-[#2e2f34]/40 text-[#2e2f34]/40 text-[14px] lg:text-[18px] xl:text-[26px] font-serif bg-white select-none"
                                        style="letter-spacing:0.08em;">&gt;</span>
                                </li>
                                <li>
                                    <span
                                        class="block h-full flex items-center justify-center px-1 lg:px-2 xl:px-4 border border-[#2e2f34]/40 text-[#2e2f34]/40 text-[14px] lg:text-[18px] xl:text-[22px] font-serif bg-white select-none"
                                        style="letter-spacing:0.13em;">Last</span>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </div>
            <?php endif; ?>
        </section>
    </div>
</section>

<?php
get_footer();
