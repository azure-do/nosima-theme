<?php
$product = $args['product'] ?? null;
if (empty($product) || !is_object($product)) {
  return;
}
$pid = $product->ID;
$product_img = get_field('product_img', $pid);
if (is_array($product_img) && !empty($product_img['url'])) {
  $img_url = $product_img['url'];
} elseif (is_array($product_img) && !empty($product_img['sizes']['thumbnail'])) {
  $img_url = $product_img['sizes']['thumbnail'];
} elseif (is_string($product_img)) {
  $img_url = $product_img;
} else {
  $img_url = get_the_post_thumbnail_url($pid);
}
$img_url = $img_url ?: '';
$price = get_field('product_price', $pid);
?>
<a href="<?php echo esc_url(get_permalink($product->ID)); ?>">
  <div class="flex flex-row gap-4 xl:gap-6 group cursor-pointer">
    <div class="w-fit overflow-hidden">
      <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($product->post_title); ?>"
        class="w-[100px] md:w-[130px] xl:w-[150px] h-auto group-hover:scale-105 transition">
    </div>
    <div class="flex-1 flex flex-col gap-1 lg:gap-2 text-white text-[12px] lg:text-[14px]">
      <span
        class="group-hover:underline underline-offset-4 group-hover:font-semibold transition text-[14px] lg:text-[16px]">
        <?php echo $product->post_title ? esc_html($product->post_title) : '商品名なし'; ?>
      </span>
      <span>
        <?php echo $price ? esc_html($price) : '単価なし'; ?>
      </span>
      <span class="text-white/70 line-clamp-2 md:line-clamp-3 lg:line-clamp-4 xl:line-clamp-4">
        <?php echo $product->post_content ? esc_html(wp_strip_all_tags($product->post_content)) : '商品説明なし'; ?>
      </span>
    </div>
  </div>
</a>