<?php
$product = $args['product'] ?? null;
if (empty($product) || !is_object($product)) {
  return;
}
?>
<a href="<?php echo esc_url(get_permalink($product->ID)); ?>">
  <div class="flex flex-col gap-4 group cursor-pointer">
    <?php
    $pid = $product->ID;
    $product_img = get_field('product_img', $pid);
    if (is_array($product_img) && !empty($product_img['url'])) {
      $img_url = $product_img['url'];
    } elseif (is_array($product_img) && !empty($product_img['sizes']['medium'])) {
      $img_url = $product_img['sizes']['medium'];
    } elseif (is_string($product_img)) {
      $img_url = $product_img;
    } else {
      $img_url = get_the_post_thumbnail_url($pid);
    }
    if (!$img_url) {
      $img_url = (defined('T_DIRE_URI') ? T_DIRE_URI : get_template_directory_uri()) . '/assets/images/default-product.png';
    }
    $price = get_field('product_price', $pid);
    ?>
    <div class="w-fit overflow-hidden">
      <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($product->post_title); ?>"
        class="w-full h-auto group-hover:scale-105 transition">
    </div>
    <div class="flex flex-col gap-2 text-white text-[12px] lg:text-[14px]">
      <span class="group-hover:underline underline-offset-4 group-hover:font-semibold transition text-[14px] lg:text-[16px]">
        <?php echo $product->post_title ? esc_html($product->post_title) : '商品名なし'; ?>
      </span>
      <span><?php echo $price ? esc_html($price) : '単価なし'; ?></span>
    </div>
  </div>
</a>