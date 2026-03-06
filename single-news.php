<?php

/**
 * The Single News Page File
 *
 * @package NSPA
 */

get_header();
$post_id = get_the_ID();
$post_date = get_the_date('Y.m.d', $post_id);
$post_title = get_field('news_title', $post_id);
$post_main_content = get_field('news_main_content', $post_id);
$post_sub_content = get_field('news_sub_content', $post_id);
$post_main_img = get_field('news_main_img', $post_id);
$post_img1 = get_field('news_img_1', $post_id);
$post_img2 = get_field('news_img_2', $post_id);
$post_img3 = get_field('news_img_3', $post_id);
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
      class="text-[24px] md:text-[28px] lg:text-[30px] xl:text-[50px] font-medium font-bodoni text-center text-[#2e2f34] tracking-wide pb-3 lg:pb-5 xl:pb-8">
      NEWS
    </h3>
    <section class="accordion w-full max-w-[890px] flex flex-col gap-6 md:gap-8 lg:gap-10 xl:gap-10 px-8">
      <div class="w-full grid border-t border-[#6c6a68]">
        <div
          class="w-full flex items-center gap-4 lg:gpa-6 xl:gap-8 py-2 lg:py-3 xl:py-4 2xl:py-5 border-b border-[#6c6a68]">
          <div class="w-fit">
            <?php if ($post_main_img) : ?>
              <img src="<?php echo $post_main_img; ?>"
                class="w-[90px] lg:w-[100px] xl:w-[120px] 2xl:w-[140px] aspect-[1.3]">
            <?php endif; ?>
          </div>
          <div class="flex-1 flex flex-col justify-center gap-1">
            <div class="text-[14px] xl:text-[16px] text-[#6c6c6c] leading-[1.7] tracking-wide"><?php echo $post_date; ?></div>
            <p
              class="text-[14px] xl:text-[16px] text-[#2e2f34] leading-[1.5] lg:leading-[1.7] tracking-wide lg:tracking-wider line-clamp-2">
              <?php echo $post_title; ?>
            </p>
          </div>
        </div>
      </div>
      <div class="w-full grid justify-center items-center lg:px-8 xl:px-16 gap-4 lg:gap-6 xl:gap-10">
        <?php if ($post_main_img) : ?>
          <div class="flex gap-4 mt-8">
            <img src="<?php echo $post_main_img; ?>" alt="Previous" class="w-full h-auto">
          </div>
        <?php endif; ?>
        <div class="news-wysiwyg text-[14px] xl:text-[16px] text-[#2e2f34] leading-[1.5] lg:leading-[1.7] tracking-wide lg:tracking-wider">
          <?php echo apply_filters( 'the_content', $post_main_content ); ?>
        </div>
        <?php if ($post_img1 || $post_img2) : ?>
          <div class="flex flex-col gap-4 lg:gap-8 xl:gap-12">
            <?php if ($post_img1) : ?>
              <img src="<?php echo $post_img1; ?>" alt="Previous" class="w-full h-auto">
            <?php endif; ?>
            <?php if ($post_img2) : ?>
              <img src="<?php echo $post_img2; ?>" alt="Previous" class="w-full h-auto">
            <?php endif; ?>
          </div>
        <?php endif; ?>
        <?php if ($post_sub_content) : ?>
          <div class="news-wysiwyg text-[14px] xl:text-[16px] text-[#2e2f34] leading-[1.5] lg:leading-[1.7] tracking-wide lg:tracking-wider">
            <?php echo apply_filters( 'the_content', $post_sub_content ); ?>
          </div>
        <?php endif; ?>
        <?php if ($post_img3) : ?>
          <div class="flex flex-col gap-4">
            <img src="<?php echo $post_img3; ?>" alt="Previous" class="w-full h-auto">
          </div>
          <div class="flex justify-center items-center my-4 lg:my-8 xl:my-12">
            <img src="<?php echo T_DIRE_URI; ?>/assets/images/flow-mark02.svg" class="w-full max-w-[20px] h-auto">
          </div>
        <?php endif; ?>
      </div>
      <?php
      $prev_post = get_previous_post();
      $next_post = get_next_post();
      ?>
      <div class="w-full flex justify-between items-center">
        <?php if ($prev_post) : ?>
          <a href="<?php echo esc_url(get_permalink($prev_post)); ?>"
            class="flex w-fit items-center relative px-3 xl:px-6 py-2 lg:py-2 border border-black/60 text-black font-light tracking-wider lg:tracking-widest lg:text-[16px] xl:text-[18px] transition hover:bg-black/40 hover:text-[#fff]">
            Prev
          </a>
        <?php else : ?>
          <span
            class="flex w-fit items-center relative cursor-not-allowed select-none px-3 xl:px-6 py-2 lg:py-2 border border-black/20 text-black/40 font-light tracking-wider lg:tracking-widest lg:text-[16px] xl:text-[18px] cursor-default">
            Prev
          </span>
        <?php endif; ?>

        <?php if ($next_post) : ?>
          <a href="<?php echo esc_url(get_permalink($next_post)); ?>"
            class="flex w-fit items-center relative px-3 xl:px-6 py-2 lg:py-2 border border-black/60 text-black font-light tracking-wider lg:tracking-widest lg:text-[16px] xl:text-[18px] transition hover:bg-black/40 hover:text-[#fff]">
            Next
          </a>
        <?php else : ?>
          <span
            class="flex w-fit items-center relative cursor-not-allowed select-none px-3 xl:px-6 py-2 lg:py-2 border border-black/20 text-black/40 font-light tracking-wider lg:tracking-widest lg:text-[16px] xl:text-[18px] cursor-default">
            Next
          </span>
        <?php endif; ?>
      </div>
      <div class="w-full flex justify-center items-center mt-4 lg:mt-8 xl:mt-12">
        <a href="<?php echo esc_url(home_url('/news/')); ?>"
          class="flex w-fit items-center relative px-8 xl:px-12 py-2 lg:py-3 xl:py-4 border border-black/60 text-black font-light tracking-wider lg:tracking-widest lg:text-[16px] xl:text-[18px] transition hover:bg-black/40 hover:text-[#fff]">
          Read more
          <div class="absolute right-0 translate-x-1/2">
            <div class="relative w-[45px] lg:w-[54px] xl:w-[60px] h-[1px] bg-black/60">
              <div class="flex items-start w-1/2 h-[1px] absolute right-0 translate-x-1/2 rotate-[30deg]">
                <div class="w-1/2 h-full bg-black/60">
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>
    </section>
  </div>
</section>

<?php
get_footer();
