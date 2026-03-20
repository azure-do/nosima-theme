<?php
if (!defined('ABSPATH')) {
  exit;
}
$items = nosima_get_breadcrumb();
if (empty($items)) {
  return;
}
?>
<nav class="breadcrumb w-full lg:max-w-[920px] xl:max-w-[1200px] 2xl:max-w-[1400px] mx-auto py-2 lg:py-3 my-4 lg:my-6 xl:my-8 px-7 md:px-0" aria-label="パンくずリスト">
  <ol class="flex flex-wrap items-center gap-1 text-[12px] lg:text-[13px] xl:text-[14px] text-white/80">
    <?php foreach ($items as $i => $item) : ?>
      <li class="flex items-center gap-1">
        <?php if ($i > 0) : ?>
          <span class="text-white/50" aria-hidden="true">/</span>
        <?php endif; ?>
        <?php if (!empty($item['url'])) : ?>
          <a href="<?php echo esc_url($item['url']); ?>" class="hover:text-white transition-colors"><?php echo esc_html($item['label']); ?></a>
        <?php else : ?>
          <span class="text-white" aria-current="page"><?php echo esc_html($item['label']); ?></span>
        <?php endif; ?>
      </li>
    <?php endforeach; ?>
  </ol>
</nav>