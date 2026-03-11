<?php if (empty($product) || !is_object($product)) return; ?>
<div class="flex flex-row gap-4 xl:gap-6 group cursor-pointer">
  <div class="w-fit overflow-hidden">
    <img src="<?php echo esc_url(get_the_post_thumbnail_url($product->ID) ?: ''); ?>" alt="商品画像"
      class="w-[100px] md:w-[130px] xl:w-[150px] h-auto group-hover:scale-105 transition">
  </div>
  <div class="flex-1 flex flex-col gap-1 lg:gap-2 text-white text-[12px] lg:text-[14px]">
    <span
      class="group-hover:underline underline-offset-4 group-hover:font-semibold transition text-[14px] lg:text-[16px]">
      <?php echo $product->post_title; ?>
    </span>
    <span><?php echo $product->post_excerpt; ?></span>
    <span class="text-white/70 line-clamp-2 md:line-clamp-3 lg:line-clamp-4 xl:line-clamp-4">
      <?php echo $product->post_content; ?>
    </span>
  </div>
</div>