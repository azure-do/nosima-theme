<?php if (empty($product) || !is_object($product)) return; ?>
<div class="flex flex-col gap-4 group cursor-pointer">
  <div class="w-fit overflow-hidden">
    <?php
    $thumbnail_url = get_the_post_thumbnail_url($product->ID);
    if (!$thumbnail_url) {
      $thumbnail_url = get_template_directory_uri() . '/assets/img/default-product.png';
    }
    ?>
    <img src="<?php echo esc_url($thumbnail_url); ?>" alt="商品画像"
      class="w-full h-auto group-hover:scale-105 transition">
  </div>
  <div class="flex flex-col gap-2 text-white text-[12px] lg:text-[14px]">
    <span class="group-hover:underline underline-offset-4 group-hover:font-semibold transition text-[14px] lg:text-[16px]">
      <?php echo $product ? esc_html($product->post_title ?: '定番 白タオル顔料プリント 10枚') : ''; ?>
    </span>
    <span><?php echo $product ? esc_html($product->post_excerpt ?: '17,500円～(税込)') : ''; ?></span>
  </div>
</div>