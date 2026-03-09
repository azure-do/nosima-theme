<?php

/**
 * The News Archive File
 *
 * @package Usi No Sima News Archive
 */

get_header();
?>

<main id="main" class="pt-10 lg:pt-12 xl:pt-18 2xl:pt-20 xl:pb-9">
    <div
        class="lg:max-w-[800px] xl:max-w-[1200px] 2xl:max-w-[1400px] mx-auto flex gap-6 lg:gap-8 xl:gap-10 2xl:gap-[52px]">
        <div id="overlay"
            class="hidden w-[100vw] h-[100vh] fixed inset-0 z-30 bg-[#00000075] cursor-pointer transition-opacity duration-300 ease-out">
        </div>
        <?php get_template_part('templates/sidebar'); ?>
        <div id="content" class="flex-1 md:max-w-[680px] lg:max-w-full mx-auto">
            <div class="w-full px-7 md:px-0">
                <div id="search-header" class="w-full pb-4 border-b border-[#333]">
                    <div class="flex justify-between">
                        <div>
                            <select name="category" id="category"
                                class="w-[180px] lg:w-[200px] py-[2px] px-3 lg:pr-4 xl:pr-5 text-[13px] lg:text-[14px] xl:text-[16px] 2xl:text-[18px] placeholder:text-[#ccc] outline-none bg-[#5353534d] border border-[#555555] text-white focus:outline-none focus:border-[#dbdbdb] focus:bg-black focus:text-white">
                                <option value="1">並び替え</option>
                                <option value="2">新着順</option>
                                <option value="3">人気順</option>
                                <option value="4">価格の安い順</option>
                                <option value="5">価格の高い順</option>
                            </select>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-fit h-fit relative">
                                <input type="text" name="search" placeholder="商品検索"
                                    class="w-[180px] lg:w-[320px] py-[2px] px-3 lg:pr-4 xl:pr-5 text-[13px] lg:text-[14px] xl:text-[16px] 2xl:text-[18px] placeholder:text-[#ccc] outline-none bg-[#5353534d] border border-[#555555] text-white focus:outline-none focus:border-[#dbdbdb]" />
                                <span class="absolute right-0 top-0 bottom-0 flex items-center justify-center p-2"> <i
                                        class="fa-solid fa-magnifying-glass text-white"></i></span>
                            </div>
                            <div class="view-toggle">
                                <div>
                                    <label>
                                        <input type="radio" name="radio" checked="">
                                        <a class="fa-solid fa-th-large"></a>
                                    </label>
                                    <label>
                                        <input type="radio" name="radio">
                                        <a class="fa-solid fa-list-ul"></a>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- おすすめ商品 -->
                <div
                    class="w-full grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-2 gap-x-4 md:gap-x-6 lg:gap-x-8 gap-y-8 lg:gap-y-10 xl:gap-y-12 mt-6 lg:mt-8 xl:mt-10">
                    <div class="flex flex-row gap-4 xl:gap-6 group cursor-pointer">
                        <div class="w-fit overflow-hidden">
                            <img src="<?php echo T_DIRE_URI; ?>/assets/images/recommended05.webp" alt="商品画像"
                                class="w-[150px] h-auto group-hover:scale-105 transition">
                        </div>
                        <div class="flex-1 flex flex-col gap-2 text-white text-[12px] lg:text-[14px]">
                            <span
                                class="group-hover:underline underline-offset-4 group-hover:font-semibold transition text-[14px] lg:text-[16px]">
                                定番 白タオル顔料プリント 10枚
                            </span>
                            <span>17,500円～(税込)</span>
                            <span class="text-white/70 line-clamp-4">
                                ※こちらの商品は受注生産となります
                                『完成イメージをLINEまたはメールにて連絡いたします』
                                『完成イメージをLINEまたはメールにて連絡いたします』
                                『完成イメージをLINEまたはメールにて連絡いたします』
                                『完成イメージをLINEまたはメールにて連絡いたします』
                                『画像確認後に制作いたします』
                            </span>
                        </div>
                    </div>
                    <div class="flex flex-row gap-4 xl:gap-6 group cursor-pointer">
                        <div class="w-fit overflow-hidden">
                            <img src="<?php echo T_DIRE_URI; ?>/assets/images/recommended05.webp" alt="商品画像"
                                class="w-[150px] h-auto group-hover:scale-105 transition">
                        </div>
                        <div class="flex-1 flex flex-col gap-2 text-white text-[12px] lg:text-[14px]">
                            <span
                                class="group-hover:underline underline-offset-4 group-hover:font-semibold transition text-[14px] lg:text-[16px]">
                                定番 白タオル顔料プリント 10枚
                            </span>
                            <span>17,500円～(税込)</span>
                            <span class="text-white/70 line-clamp-4">
                                ※こちらの商品は受注生産となります
                                『完成イメージをLINEまたはメールにて連絡いたします』
                                『完成イメージをLINEまたはメールにて連絡いたします』
                                『完成イメージをLINEまたはメールにて連絡いたします』
                                『完成イメージをLINEまたはメールにて連絡いたします』
                                『画像確認後に制作いたします』
                            </span>
                        </div>
                    </div>
                    <div class="flex flex-row gap-4 xl:gap-6 group cursor-pointer">
                        <div class="w-fit overflow-hidden">
                            <img src="<?php echo T_DIRE_URI; ?>/assets/images/recommended05.webp" alt="商品画像"
                                class="w-[150px] h-auto group-hover:scale-105 transition">
                        </div>
                        <div class="flex-1 flex flex-col gap-2 text-white text-[12px] lg:text-[14px]">
                            <span
                                class="group-hover:underline underline-offset-4 group-hover:font-semibold transition text-[14px] lg:text-[16px]">
                                定番 白タオル顔料プリント 10枚
                            </span>
                            <span>17,500円～(税込)</span>
                            <span class="text-white/70 line-clamp-4">
                                ※こちらの商品は受注生産となります
                                『完成イメージをLINEまたはメールにて連絡いたします』
                                『完成イメージをLINEまたはメールにて連絡いたします』
                                『完成イメージをLINEまたはメールにて連絡いたします』
                                『完成イメージをLINEまたはメールにて連絡いたします』
                                『画像確認後に制作いたします』
                            </span>
                        </div>
                    </div>
                    <div class="flex flex-row gap-4 xl:gap-6 group cursor-pointer">
                        <div class="w-fit overflow-hidden">
                            <img src="<?php echo T_DIRE_URI; ?>/assets/images/recommended05.webp" alt="商品画像"
                                class="w-[150px] h-auto group-hover:scale-105 transition">
                        </div>
                        <div class="flex-1 flex flex-col gap-2 text-white text-[12px] lg:text-[14px]">
                            <span
                                class="group-hover:underline underline-offset-4 group-hover:font-semibold transition text-[14px] lg:text-[16px]">
                                定番 白タオル顔料プリント 10枚
                            </span>
                            <span>17,500円～(税込)</span>
                            <span class="text-white/70 line-clamp-4">
                                ※こちらの商品は受注生産となります
                                『完成イメージをLINEまたはメールにて連絡いたします』
                                『完成イメージをLINEまたはメールにて連絡いたします』
                                『完成イメージをLINEまたはメールにて連絡いたします』
                                『完成イメージをLINEまたはメールにて連絡いたします』
                                『画像確認後に制作いたします』
                            </span>
                        </div>
                    </div>
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
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</main>

<?php
get_footer();
