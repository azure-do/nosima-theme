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
                  class="block w-[32px] lg:w-[40px] xl:w-[48px] aspect-[1.2] flex items-center justify-center border border-[#777] text-[#aaa] text-[14px] lg:text-[18px] xl:text-[20px] font-serif bg-black/20 select-none"
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
              class="block w-[32px] lg:w-[40px] xl:w-[48px] aspect-[1.2] flex items-center justify-center border border-[#777] text-[#aaa] text-[14px] lg:text-[18px] xl:text-[20px] font-serif transition duration-150 hover:text-white hover:border-[#eee] <?php echo $is_current ? 'bg-black border-white text-white' : 'bg-black/20'; ?>"
              style="letter-spacing:0.08em;">
              <span class="leading-[1] pb-[1px] lg:pb-[2px]"><?php echo esc_html($page_number); ?></span>
            </a>
          </li>
        <?php endforeach; ?>

        <?php if ($current < $total_pages) : ?>
          <li>
            <a href="<?php echo esc_url(get_pagenum_link($current + 1)); ?>"
              class="block w-[32px] lg:w-[40px] xl:w-[48px] aspect-[1.2] flex items-center justify-center border border-[#777] text-[#aaa] text-[12px] lg:text-[16px] xl:text-[20px] hover:text-white hover:border-[#eee] font-serif transition duration-150 bg-black/20"
              style="letter-spacing:0.08em;">
              <i class="angle-right fa-solid fa-angle-right"></i>
            </a>
          </li>
          <li>
            <a href="<?php echo esc_url(get_pagenum_link($total_pages)); ?>"
              class="block h-full flex items-center justify-center px-1 lg:px-2 xl:px-4 border border-[#777] text-[#aaa] text-[12px] lg:text-[16px] xl:text-[20px] hover:text-white hover:border-[#eee] font-serif transition duration-150 bg-black/20"
              style="letter-spacing:0.13em;">
              <i class="angle-double-right fa-solid fa-angle-double-right"></i>
            </a>
          </li>
        <?php else : ?>
          <li>
            <span
              class="block w-[32px] lg:w-[40px] xl:w-[48px] aspect-[1.2] flex items-center justify-center border border-[#555]/40 text-[#555]/40 text-[14px] lg:text-[18px] xl:text-[26px] font-serif bg-black/20 select-none cursor-not-allowed"
              style="letter-spacing:0.08em;">
              <i class="angle-right fa-solid fa-angle-right"></i>
            </span>
          </li>
          <li>
            <span
              class="block h-full flex items-center justify-center px-1 lg:px-2 xl:px-4 border border-[#555]/40 text-[#555]/40 text-[14px] lg:text-[18px] xl:text-[22px] font-serif bg-black/20 select-none cursor-not-allowed"
              style="letter-spacing:0.13em;">
              <i class="angle-double-right fa-solid fa-angle-double-right"></i>
            </span>
          </li>
        <?php endif; ?>
      </ul>
    </nav>
  </div>
<?php endif; ?>