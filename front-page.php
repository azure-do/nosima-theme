<?php

/**
 * The Front Page File
 *
 * @package Usi No Sima
 */

get_header();

// ニュース（newsカスタム投稿タイプ）の最新3件を取得
$news_args = array(
    'post_type'      => 'news',
    'posts_per_page' => 3,
    'orderby'        => 'date',
    'order'          => 'DESC'
);


$news_query = new WP_Query($news_args);
?>
<?php get_template_part('templates/fv-top'); ?>
<main id="main" class="pt-10 lg:pt-12 xl:pt-18 2xl:pt-20 xl:pb-9">
    <div
        class="lg:max-w-[800px] xl:max-w-[1200px] 2xl:max-w-[1400px] mx-auto flex gap-6 lg:gap-8 xl:gap-10 2xl:gap-[52px]">
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
                    <?php if ($news_query->have_posts()) : ?>
                        <?php while ($news_query->have_posts()) : $news_query->the_post(); ?>
                            <?php
                            $post_id = get_the_ID();
                            $post_date = get_the_date('Y.m.d', $post_id);
                            $post_title = get_the_title($post_id);
                            ?>
                            <a href="<?php echo esc_url(get_permalink($post_id)); ?>">
                                <div
                                    class="w-full flex flex-col md:flex-row gap-1 md:gap-2 xl:gap-4 py-4 xl:py-8 border-b border-[#818181]">
                                    <div class="text-[14px] xl:text-[16px] text-[#818181] leading-[1.7] tracking-wide">
                                        <span><?php echo $post_date; ?></span>
                                    </div>
                                    <div>
                                        <p
                                            class="text-[14px] xl:text-[16px] text-white leading-[1.4] md:leading-[1.7] tracking-wide hover:underline hover:font-semibold underline-offset-4 cursor-pointer transition">
                                            <?php echo $post_title; ?>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                <div class="w-full flex justify-center items-center mt-6 lg:mt-8 xl:mt-10">
                    <a href="<?php echo esc_url(home_url('/news')); ?>">
                        <button type="button" class="btn-line hover:text-white/70 duration-200 border border-[#818181] bg-black/40 hover:bg-black/80 transition text-white text-[14px] lg:text-[16px] xl:text-[18px] py-2 lg:py-3 xl:py-4 px-3 xl:px-5 flex items-center gap-2">
                            <span>
                                お知らせをもっと見る
                            </span>
                            <i class="fa-solid fa-chevron-right text-[10px] lg:text-[12px] xl:text-[14px]"></i>
                        </button>
                    </a>
                </div>
            </div>
            <div class="w-full px-7 md:px-0 pt-12 lg:pt-16 xl:pt-20">
                <div class="flex flex-col items-center gap-1">
                    <img src="<?php echo T_DIRE_URI; ?>/assets/images/mark01.webp" alt="マーク"
                        class="w-[40px] lg:w-[50px] xl:w-[60px] pointer-events-none select-none">
                    <h3 class="text-[24px] lg:text-[28px] xl:text-[32px] 2xl:text-[36px] text-white font-medium tracking-wide">
                        おすすめ商品</h3>
                </div>
                <div
                    class="w-full grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-x-4 md:gap-x-6 lg:gap-x-8 gap-y-8 lg:gap-y-10 xl:gap-y-12 mt-6 lg:mt-8 xl:mt-10">
                    <div class="flex flex-col gap-4 group cursor-pointer">
                        <div class="w-fit overflow-hidden">
                            <img src="<?php echo T_DIRE_URI; ?>/assets/images/recommended01.webp" alt="商品画像"
                                class="w-full h-auto group-hover:scale-105 transition">
                        </div>
                        <div class="flex flex-col gap-2 text-white text-[12px] lg:text-[14px]">
                            <span class="group-hover:underline underline-offset-4 group-hover:font-semibold transition">定番 白タオル
                                顔料プリント 10枚</span>
                            <span>17,500円～(税込)</span>
                        </div>
                    </div>
                    <div class="flex flex-col gap-4 group cursor-pointer">
                        <div class="w-fit overflow-hidden">
                            <img src="<?php echo T_DIRE_URI; ?>/assets/images/recommended02.webp" alt="商品画像"
                                class="w-full h-auto group-hover:scale-105 transition">
                        </div>
                        <div class="flex flex-col gap-2 text-white text-[12px] lg:text-[14px]">
                            <span class="group-hover:underline underline-offset-4 group-hover:font-semibold transition">定番 白タオル
                                顔料プリント 10枚</span>
                            <span>17,500円～(税込)</span>
                        </div>
                    </div>
                    <div class="flex flex-col gap-4 group cursor-pointer">
                        <div class="w-fit overflow-hidden">
                            <img src="<?php echo T_DIRE_URI; ?>/assets/images/recommended03.webp" alt="商品画像"
                                class="w-full h-auto group-hover:scale-105 transition">
                        </div>
                        <div class="flex flex-col gap-2 text-white text-[12px] lg:text-[14px]">
                            <span class="group-hover:underline underline-offset-4 group-hover:font-semibold transition">定番 白タオル
                                顔料プリント 10枚</span>
                            <span>17,500円～(税込)</span>
                        </div>
                    </div>
                    <div class="flex flex-col gap-4 group cursor-pointer">
                        <div class="w-fit overflow-hidden">
                            <img src="<?php echo T_DIRE_URI; ?>/assets/images/recommended04.webp" alt="商品画像"
                                class="w-full h-auto group-hover:scale-105 transition">
                        </div>
                        <div class="flex flex-col gap-2 text-white text-[12px] lg:text-[14px]">
                            <span class="group-hover:underline underline-offset-4 group-hover:font-semibold transition">定番 白タオル
                                顔料プリント 10枚</span>
                            <span>17,500円～(税込)</span>
                        </div>
                    </div>
                    <div class="flex flex-col gap-4 group cursor-pointer">
                        <div class="w-fit overflow-hidden">
                            <img src="<?php echo T_DIRE_URI; ?>/assets/images/recommended05.webp" alt="商品画像"
                                class="w-full h-auto group-hover:scale-105 transition">
                        </div>
                        <div class="flex flex-col gap-2 text-white text-[12px] lg:text-[14px]">
                            <span class="group-hover:underline underline-offset-4 group-hover:font-semibold transition">定番 白タオル
                                顔料プリント 10枚</span>
                            <span>17,500円～(税込)</span>
                        </div>
                    </div>
                    <div class="flex flex-col gap-4 group cursor-pointer">
                        <div class="w-fit overflow-hidden">
                            <img src="<?php echo T_DIRE_URI; ?>/assets/images/recommended06.webp" alt="商品画像"
                                class="w-full h-auto group-hover:scale-105 transition">
                        </div>
                        <div class="flex flex-col gap-2 text-white text-[12px] lg:text-[14px]">
                            <span class="group-hover:underline underline-offset-4 group-hover:font-semibold transition">定番 白タオル
                                顔料プリント 10枚</span>
                            <span>17,500円～(税込)</span>
                        </div>
                    </div>
                    <div class="flex flex-col gap-4 group cursor-pointer">
                        <div class="w-fit overflow-hidden">
                            <img src="<?php echo T_DIRE_URI; ?>/assets/images/recommended07.webp" alt="商品画像"
                                class="w-full h-auto group-hover:scale-105 transition">
                        </div>
                        <div class="flex flex-col gap-2 text-white text-[12px] lg:text-[14px]">
                            <span class="group-hover:underline underline-offset-4 group-hover:font-semibold transition">定番 白タオル
                                顔料プリント 10枚</span>
                            <span>17,500円～(税込)</span>
                        </div>
                    </div>
                    <div class="flex flex-col gap-4 group cursor-pointer">
                        <div class="w-fit overflow-hidden">
                            <img src="<?php echo T_DIRE_URI; ?>/assets/images/recommended08.webp" alt="商品画像"
                                class="w-full h-auto group-hover:scale-105 transition">
                        </div>
                        <div class="flex flex-col gap-2 text-white text-[12px] lg:text-[14px]">
                            <span class="group-hover:underline underline-offset-4 group-hover:font-semibold transition">定番 白タオル
                                顔料プリント 10枚</span>
                            <span>17,500円～(税込)</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full pt-12 lg:pt-16 xl:pt-20">
                <div class="flex flex-col items-center gap-1">
                    <img src="<?php echo T_DIRE_URI; ?>/assets/images/mark01.webp" alt="マーク"
                        class="w-[40px] lg:w-[50px] xl:w-[60px] pointer-events-none select-none">
                    <h3 class="text-[24px] lg:text-[28px] xl:text-[32px] 2xl:text-[36px] text-white font-medium tracking-wide">
                        制作例</h3>
                </div>
                <div
                    class="w-full grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 mt-6 lg:mt-8 xl:mt-10 p-4 lg:p-6 xl:p-10 bg-[url('<?php echo T_DIRE_URI; ?>/assets/images/bg-product-example.webp')] bg-cover bg-center">
                    <button
                        class="flex items-center gap-2 xl:gap-3 text-white text-[12px] lg:text-[14px] xl:text-[16px] py-2 lg:py-4 xl:py-6 px-3 xl:px-5 border border-[#818181] bg-black/40 hover:bg-black/80 transition">
                        <svg class="w-[9px] text-[#b40000]" viewBox="0 0 10 16" xmlns="http://www.w3.org/2000/svg">
                            <polyline points="0,2 6,8 0,14" fill="none" stroke="currentColor" stroke-width="3"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        闘牛タオル 2025年
                    </button>
                    <button
                        class="flex items-center gap-2 xl:gap-3 text-white text-[12px] lg:text-[14px] xl:text-[16px] py-2 lg:py-4 xl:py-6 px-3 xl:px-5 border border-[#818181] bg-black/40 hover:bg-black/80 transition">
                        <svg class="w-[9px] text-[#b40000]" viewBox="0 0 10 16" xmlns="http://www.w3.org/2000/svg">
                            <polyline points="0,2 6,8 0,14" fill="none" stroke="currentColor" stroke-width="3"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        闘牛タオル 2024年
                    </button>
                    <button
                        class="flex items-center gap-2 xl:gap-3 text-white text-[12px] lg:text-[14px] xl:text-[16px] py-2 lg:py-4 xl:py-6 px-3 xl:px-5 border border-[#818181] bg-black/40 hover:bg-black/80 transition">
                        <svg class="w-[9px] text-[#b40000]" viewBox="0 0 10 16" xmlns="http://www.w3.org/2000/svg">
                            <polyline points="0,2 6,8 0,14" fill="none" stroke="currentColor" stroke-width="3"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        闘牛タオル 2023年
                    </button>
                    <button
                        class="flex items-center gap-2 xl:gap-3 text-white text-[12px] lg:text-[14px] xl:text-[16px] py-2 lg:py-4 xl:py-6 px-3 xl:px-5 border border-[#818181] bg-black/40 hover:bg-black/80 transition">
                        <svg class="w-[9px] text-[#b40000]" viewBox="0 0 10 16" xmlns="http://www.w3.org/2000/svg">
                            <polyline points="0,2 6,8 0,14" fill="none" stroke="currentColor" stroke-width="3"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        闘牛タオル 2022年
                    </button>
                    <button
                        class="flex items-center gap-2 xl:gap-3 text-white text-[12px] lg:text-[14px] xl:text-[16px] py-2 lg:py-4 xl:py-6 px-3 xl:px-5 border border-[#818181] bg-black/40 hover:bg-black/80 transition">
                        <svg class="w-[9px] text-[#b40000]" viewBox="0 0 10 16" xmlns="http://www.w3.org/2000/svg">
                            <polyline points="0,2 6,8 0,14" fill="none" stroke="currentColor" stroke-width="3"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        闘牛タオル 2021年
                    </button>
                    <button
                        class="flex items-center gap-2 xl:gap-3 text-white text-[12px] lg:text-[14px] xl:text-[16px] py-2 lg:py-4 xl:py-6 px-3 xl:px-5 border border-[#818181] bg-black/40 hover:bg-black/80 transition">
                        <svg class="w-[9px] text-[#b40000]" viewBox="0 0 10 16" xmlns="http://www.w3.org/2000/svg">
                            <polyline points="0,2 6,8 0,14" fill="none" stroke="currentColor" stroke-width="3"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        闘牛タオル 2020年
                    </button>
                    <button
                        class="flex items-center gap-2 xl:gap-3 text-white text-[12px] lg:text-[14px] xl:text-[16px] py-2 lg:py-4 xl:py-6 px-3 xl:px-5 border border-[#818181] bg-black/40 hover:bg-black/80 transition">
                        <svg class="w-[9px] text-[#b40000]" viewBox="0 0 10 16" xmlns="http://www.w3.org/2000/svg">
                            <polyline points="0,2 6,8 0,14" fill="none" stroke="currentColor" stroke-width="3"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        闘牛タオル 2019年
                    </button>
                    <button
                        class="flex items-center gap-2 xl:gap-3 text-white text-[12px] lg:text-[14px] xl:text-[16px] py-2 lg:py-4 xl:py-6 px-3 xl:px-5 border border-[#818181] bg-black/40 hover:bg-black/80 transition">
                        <svg class="w-[9px] text-[#b40000]" viewBox="0 0 10 16" xmlns="http://www.w3.org/2000/svg">
                            <polyline points="0,2 6,8 0,14" fill="none" stroke="currentColor" stroke-width="3"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        闘牛タオル 2018年
                    </button>
                    <button
                        class="flex items-center gap-2 xl:gap-3 text-white text-[12px] lg:text-[14px] xl:text-[16px] py-2 lg:py-4 xl:py-6 px-3 xl:px-5 border border-[#818181] bg-black/40 hover:bg-black/80 transition">
                        <svg class="w-[9px] text-[#b40000]" viewBox="0 0 10 16" xmlns="http://www.w3.org/2000/svg">
                            <polyline points="0,2 6,8 0,14" fill="none" stroke="currentColor" stroke-width="3"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        闘牛タオル 2017年
                    </button>
                    <button
                        class="flex items-center gap-2 xl:gap-3 text-white text-[12px] lg:text-[14px] xl:text-[16px] py-2 lg:py-4 xl:py-6 px-3 xl:px-5 border border-[#818181] bg-black/40 hover:bg-black/80 transition">
                        <svg class="w-[9px] text-[#b40000]" viewBox="0 0 10 16" xmlns="http://www.w3.org/2000/svg">
                            <polyline points="0,2 6,8 0,14" fill="none" stroke="currentColor" stroke-width="3"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        闘牛タオル 2016年
                    </button>
                    <button
                        class="flex items-center gap-2 xl:gap-3 text-white text-[12px] lg:text-[14px] xl:text-[16px] py-2 lg:py-4 xl:py-6 px-3 xl:px-5 border border-[#818181] bg-black/40 hover:bg-black/80 transition">
                        <svg class="w-[9px] text-[#b40000]" viewBox="0 0 10 16" xmlns="http://www.w3.org/2000/svg">
                            <polyline points="0,2 6,8 0,14" fill="none" stroke="currentColor" stroke-width="3"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        勝鬨ガウン
                    </button>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
