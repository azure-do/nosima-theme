<?php
$args = array(
  'taxonomy' => 'product_category',
  'hide_empty' => false,
  'orderby' => 'term_id',
  'order' => 'ASC',
);
$terms = get_terms($args);
// Preserve product list query (view, sort, find) when switching categories
$product_query_preserve = array_filter(array(
  'view'  => isset($_GET['view']) ? sanitize_text_field(wp_unslash($_GET['view'])) : '',
  'sort'  => isset($_GET['sort']) ? sanitize_text_field(wp_unslash($_GET['sort'])) : '',
  'find'  => isset($_GET['find']) ? sanitize_text_field(wp_unslash($_GET['find'])) : '',
));
?>
<div id="sidebar"
  class="fixed lg:static -translate-x-full lg:translate-x-0 w-[200px] h-full top-0 z-40 pt-16 pb-4 lg:py-0 w-[200px] lg:w-[220px] xl:w-[260px] 2xl:w-[280px] bg-black lg:bg-transparent transition-transform duration-300 ease-out">
  <button id="handleSidebarBtn" type="button"
    class="absolute block lg:hidden top-3/4 right-0 translate-x-full p-1 bg-white flex items-center justify-center w-8 h-8">
    <i id="sidebarBtnIconOpen" class="fa-solid fa-gear text-black text-[15px]" aria-hidden="true"></i>
    <i id="sidebarBtnIconClose" class="fa-solid fa-xmark text-black text-[17px] hidden" aria-hidden="true"></i>
    <span id="sidebarBtnLabel" class="sr-only">カテゴリを開く</span>
  </button>
  <div class="flex flex-col px-4 lg:px-0 overflow-y-auto h-full">
    <div
      class="flex items-center justify-between bg-gradient-to-r from-[#a50000] to-[#5f0000] py-1 px-6 relative">
      <span
        class="text-white text-[16px] lg:text-[18px] xl:text-[20px] xl:text-[22px] font-bold tracking-wide z-10">闘牛タオル</span>
      <img src="<?php echo T_DIRE_URI; ?>/assets/images/mark00.webp" alt="牛のシルエット"
        class="hidden md:block w-[60px] lg:w-[70px] xl:w-[80px] 2xl:w-[90px] pointer-events-none select-none">
    </div>
    <div class="flex flex-col">
      <div class="flex items-center justify-between bg-[#222222] py-2 px-6 relative overflow-hidden">
        <span
          class="text-white text-[14px] lg:text-[14px] xl:text-[16px] 2xl:text-[18px] font-bold tracking-wide z-10">定番タオル</span>
      </div>
      <ul class="py-3 xl:py-4 flex flex-col gap-3">
        <?php foreach ($terms as $term): ?>
          <?php if ($term->custom_towel_type == 'standard_towel'): ?>
            <?php
            $term_url = get_term_link($term);
            if (!is_wp_error($term_url) && !empty($product_query_preserve)) {
              $term_url = add_query_arg($product_query_preserve, $term_url);
            }
            $term_url = is_wp_error($term_url) ? '#' : $term_url;
            ?>
            <a href="<?php echo esc_url($term_url); ?>">
              <li
                class="flex items-center gap-2 xl:gap-3 text-white text-[11px] lg:text-[12px] xl:text-[14px] 2xl:text-[16px] px-2 xl:pl-4 cursor-pointer group hover:underline underline-offset-4 transition">
                <svg class="w-[9px] text-[#b40000] group-hover:hidden" viewBox="0 0 10 16"
                  xmlns="http://www.w3.org/2000/svg">
                  <polyline points="0,2 6,8 0,14" fill="none" stroke="currentColor" stroke-width="3"
                    stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <img src="<?php echo T_DIRE_URI; ?>/assets/images/mark01.webp" alt="マーク"
                  class="w-[16px] lg:w-[18px] xl:w-[22px] 2xl:w-[24px] hidden pointer-events-none select-none group-hover:opacity-100 opacity-0 group-hover:block transition-opacity duration-300"
                  style="transform: rotateY(180deg);">
                <?php echo $term->name; ?>
              </li>
            </a>
          <?php endif; ?>
        <?php endforeach; ?>
      </ul>
    </div>
    <div class="flex flex-col">
      <div class="flex items-center justify-between bg-[#222222] py-2 px-6 relative overflow-hidden">
        <span
          class="text-white text-[14px] lg:text-[14px] xl:text-[16px] 2xl:text-[18px] font-bold tracking-wide z-10">SPカラータオル</span>
      </div>
      <ul class="py-3 xl:py-4 flex flex-col gap-3">
        <?php foreach ($terms as $term): ?>
          <?php if ($term->custom_towel_type == 'sp_color_towel'): ?>
            <?php
            $term_url = get_term_link($term);
            if (!is_wp_error($term_url) && !empty($product_query_preserve)) {
              $term_url = add_query_arg($product_query_preserve, $term_url);
            }
            $term_url = is_wp_error($term_url) ? '#' : $term_url;
            ?>
            <a href="<?php echo esc_url($term_url); ?>">
              <li
                class="flex items-center gap-2 xl:gap-3 text-white text-[11px] lg:text-[12px] xl:text-[14px] 2xl:text-[16px] px-2 xl:pl-4 cursor-pointer group hover:underline underline-offset-4 transition">
                <svg class="w-[9px] text-[#b40000] group-hover:hidden" viewBox="0 0 10 16"
                  xmlns="http://www.w3.org/2000/svg">
                  <polyline points="0,2 6,8 0,14" fill="none" stroke="currentColor" stroke-width="3"
                    stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <img src="<?php echo T_DIRE_URI; ?>/assets/images/mark01.webp" alt="マーク"
                  class="w-[16px] lg:w-[18px] xl:w-[22px] 2xl:w-[24px] hidden pointer-events-none select-none group-hover:opacity-100 opacity-0 group-hover:block transition-opacity duration-300"
                  style="transform: rotateY(180deg);">
                <?php echo $term->name; ?>
              </li>
            </a>
          <?php endif; ?>
        <?php endforeach; ?>
      </ul>
    </div>
    <div class="flex flex-col">
      <div class="flex items-center justify-between bg-[#222222] py-2 px-6 relative overflow-hidden">
        <span
          class="text-white text-[14px] lg:text-[14px] xl:text-[16px] 2xl:text-[18px] font-bold tracking-wide z-10">平織りタオル</span>
      </div>
      <ul class="py-3 xl:py-4 flex flex-col gap-3">
        <?php foreach ($terms as $term): ?>
          <?php if ($term->custom_towel_type == 'flat_weave_towel'): ?>
            <?php
            $term_url = get_term_link($term);
            if (!is_wp_error($term_url) && !empty($product_query_preserve)) {
              $term_url = add_query_arg($product_query_preserve, $term_url);
            }
            $term_url = is_wp_error($term_url) ? '#' : $term_url;
            ?>
            <a href="<?php echo esc_url($term_url); ?>">
              <li
                class="flex items-center gap-2 xl:gap-3 text-white text-[11px] lg:text-[12px] xl:text-[14px] 2xl:text-[16px] px-2 xl:pl-4 cursor-pointer group hover:underline underline-offset-4 transition">
                <svg class="w-[9px] text-[#b40000] group-hover:hidden" viewBox="0 0 10 16"
                  xmlns="http://www.w3.org/2000/svg">
                  <polyline points="0,2 6,8 0,14" fill="none" stroke="currentColor" stroke-width="3"
                    stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <img src="<?php echo T_DIRE_URI; ?>/assets/images/mark01.webp" alt="マーク"
                  class="w-[16px] lg:w-[18px] xl:w-[22px] 2xl:w-[24px] hidden pointer-events-none select-none group-hover:opacity-100 opacity-0 group-hover:block transition-opacity duration-300"
                  style="transform: rotateY(180deg);">
                <?php echo $term->name; ?>
              </li>
            </a>
          <?php endif; ?>
        <?php endforeach; ?>
      </ul>
    </div>
    <div class="flex flex-col pt-4 lg:pt-8">
      <div
        class="flex items-center justify-between bg-gradient-to-r from-[#a50000] to-[#5f0000] py-1 px-6 relative">
        <span
          class="text-white text-[16px] lg:text-[18px] xl:text-[20px] xl:text-[22px] font-bold tracking-wide z-10">応援グッズ</span>
        <img src="<?php echo T_DIRE_URI; ?>/assets/images/mark00.webp" alt="牛のシルエット"
          class="hidden md:block w-[60px] lg:w-[70px] xl:w-[80px] 2xl:w-[90px] pointer-events-none select-none">
      </div>
      <div class="flex flex-col">
        <ul class="py-3 xl:py-4 flex flex-col gap-3">
          <?php foreach ($terms as $term): ?>
            <?php if ($term->custom_towel_type == 'cheering_goods'): ?>
              <?php
              $term_url = get_term_link($term);
              if (!is_wp_error($term_url) && !empty($product_query_preserve)) {
                $term_url = add_query_arg($product_query_preserve, $term_url);
              }
              $term_url = is_wp_error($term_url) ? '#' : $term_url;
              ?>
              <a href="<?php echo esc_url($term_url); ?>">
                <li
                  class="flex items-center gap-2 xl:gap-3 text-white text-[11px] lg:text-[12px] xl:text-[14px] 2xl:text-[16px] px-2 xl:pl-4 cursor-pointer group hover:underline underline-offset-4 transition">
                  <svg class="w-[9px] text-[#b40000] group-hover:hidden" viewBox="0 0 10 16"
                    xmlns="http://www.w3.org/2000/svg">
                    <polyline points="0,2 6,8 0,14" fill="none" stroke="currentColor" stroke-width="3"
                      stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                  <img src="<?php echo T_DIRE_URI; ?>/assets/images/mark01.webp" alt="マーク"
                    class="w-[16px] lg:w-[18px] xl:w-[22px] 2xl:w-[24px] hidden pointer-events-none select-none group-hover:opacity-100 opacity-0 group-hover:block transition-opacity duration-300"
                    style="transform: rotateY(180deg);">
                  <?php echo $term->name; ?>
                </li>
              </a>
            <?php endif; ?>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
    <div class="flex flex-col pt-4 lg:pt-8">
      <div
        class="flex items-center justify-between bg-gradient-to-r from-[#a50000] to-[#5f0000] py-1 px-6 relative">
        <span
          class="text-white text-[16px] lg:text-[18px] xl:text-[20px] xl:text-[22px] font-bold tracking-wide z-10">勝鬨衣装</span>
        <img src="<?php echo T_DIRE_URI; ?>/assets/images/mark00.webp" alt="牛のシルエット"
          class="hidden md:block w-[60px] lg:w-[70px] xl:w-[80px] 2xl:w-[90px] pointer-events-none select-none">
      </div>
      <div class="flex flex-col">
        <ul class="py-3 xl:py-4 flex flex-col gap-3">
          <?php foreach ($terms as $term): ?>
            <?php if ($term->custom_towel_type == 'victory_costume'): ?>
              <?php
              $term_url = get_term_link($term);
              if (!is_wp_error($term_url) && !empty($product_query_preserve)) {
                $term_url = add_query_arg($product_query_preserve, $term_url);
              }
              $term_url = is_wp_error($term_url) ? '#' : $term_url;
              ?>
              <a href="<?php echo esc_url($term_url); ?>">
                <li
                  class="flex items-center gap-2 xl:gap-3 text-white text-[11px] lg:text-[12px] xl:text-[14px] 2xl:text-[16px] px-2 xl:pl-4 cursor-pointer group hover:underline underline-offset-4 transition">
                  <svg class="w-[9px] text-[#b40000] group-hover:hidden" viewBox="0 0 10 16"
                    xmlns="http://www.w3.org/2000/svg">
                    <polyline points="0,2 6,8 0,14" fill="none" stroke="currentColor" stroke-width="3"
                      stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                  <img src="<?php echo T_DIRE_URI; ?>/assets/images/mark01.webp" alt="マーク"
                    class="w-[16px] lg:w-[18px] xl:w-[22px] 2xl:w-[24px] hidden pointer-events-none select-none group-hover:opacity-100 opacity-0 group-hover:block transition-opacity duration-300"
                    style="transform: rotateY(180deg);">
                  <?php echo $term->name; ?>
                </li>
              </a>
            <?php endif; ?>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
    <div class="flex flex-col pt-4 lg:pt-8">
      <button
        class="btn-line flex items-center justify-center gap-3 bg-[#06C755] text-white text-[16px] lg:text-[18px] xl:text-[20px] 2xl:text-[20px] pr-2 py-[6px] md:py-2 lg:py-2 xl:py-[10px] hover:bg-white hover:text-[#06C755] duration-200 group relative overflow-hidden">
        <span class="relative w-[30px] lg:w-[35px] xl:w-[40px] 2xl:w-[45px] aspect-[10/9] flex items-center">
          <img src="<?php echo T_DIRE_URI; ?>/assets/images/line-mark.webp"
            class="absolute inset-0 w-[28px] md:w-[30px] lg:w-[35px] xl:w-[40px] 2xl:w-[45px] transition-opacity duration-300 opacity-100 group-hover:opacity-0"
            alt="Line Mark">
          <img src="<?php echo T_DIRE_URI; ?>/assets/images/line-mark-green.webp"
            class="absolute inset-0 w-[28px] md:w-[30px] lg:w-[35px] xl:w-[40px] 2xl:w-[45px] transition-opacity duration-300 opacity-0 group-hover:opacity-100"
            alt="Line Mark Green">
        </span>
        友達追加
      </button>
    </div>
    <div id="intro-video" class="flex flex-col pt-4 lg:pt-8 gap-4 lg:gap-6">
      <iframe width="100%" height="auto" src="https://www.youtube.com/embed/oItEUbAXao8?si=deMS9729x01SuVGm"
        title="YouTube video player" frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen="">
      </iframe>
      <iframe width="100%" height="auto" src="https://www.youtube.com/embed/PRqFMf84vpQ?si=SqyOTsipBIJQfuiD"
        title="YouTube video player" frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen="">
      </iframe>
    </div>
  </div>
</div>