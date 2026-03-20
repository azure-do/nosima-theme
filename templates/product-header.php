<?php
$current_view = isset($_GET['view']) && $_GET['view'] === 'list' ? 'list' : 'grid';
$current_sort = isset($_GET['sort']) ? sanitize_text_field(wp_unslash($_GET['sort'])) : 'price_asc';
if ($current_sort === '') {
  $current_sort = 'price_asc';
}
$current_find = isset($_GET['find']) ? sanitize_text_field(wp_unslash($_GET['find'])) : '';
$base_url = remove_query_arg(array('view', 'sort', 'find', 'paged'));
$grid_url = add_query_arg('view', 'grid', $base_url);
$list_url = add_query_arg('view', 'list', $base_url);
if ($current_sort) {
  $grid_url = add_query_arg('sort', $current_sort, $grid_url);
  $list_url = add_query_arg('sort', $current_sort, $list_url);
}
if ($current_find !== '') {
  $grid_url = add_query_arg('find', $current_find, $grid_url);
  $list_url = add_query_arg('find', $current_find, $list_url);
}
?>
<div id="search-header" class="w-full pb-4 border-b border-[#333]">
  <div class="flex justify-between">
    <div>
      <form method="get" id="product-sort-form" class="inline">
        <?php if ($current_view) : ?>
          <input type="hidden" name="view" value="<?php echo esc_attr($current_view); ?>" />
        <?php endif; ?>
        <?php if ($current_find !== '') : ?>
          <input type="hidden" name="find" value="<?php echo esc_attr($current_find); ?>" />
        <?php endif; ?>
        <select name="sort" id="product-sort"
          class="w-[160px] md:w-[180px] lg:w-[200px] py-[2px] px-1 lg:pr-4 xl:pr-5 text-[13px] lg:text-[14px] xl:text-[16px] 2xl:text-[17px] placeholder:text-[#ccc] outline-none bg-[#5353534d] border border-[#555555] text-white focus:outline-none focus:border-[#dbdbdb] focus:bg-black focus:text-white">
          <option value=""<?php selected($current_sort, ''); ?>>並び替え</option>
          <option value="new"<?php selected($current_sort, 'new'); ?>>新着順</option>
          <option value="popular"<?php selected($current_sort, 'popular'); ?>>人気順</option>
          <option value="price_asc"<?php selected($current_sort, 'price_asc'); ?>>価格の安い順</option>
          <option value="price_desc"<?php selected($current_sort, 'price_desc'); ?>>価格の高い順</option>
        </select>
      </form>
    </div>
    <div class="flex items-center gap-4">
      <div class="w-fit h-fit relative hidden md:block">
        <form method="get" id="product-search-form" class="relative">
          <?php if ($current_view) : ?>
            <input type="hidden" name="view" value="<?php echo esc_attr($current_view); ?>" />
          <?php endif; ?>
          <?php if ($current_sort) : ?>
            <input type="hidden" name="sort" value="<?php echo esc_attr($current_sort); ?>" />
          <?php endif; ?>
          <input type="text" name="find" value="<?php echo esc_attr($current_find); ?>"
            placeholder="商品検索"
            class="w-[180px] lg:w-[320px] py-[2px] xl:py-[3px] px-3 lg:pr-4 xl:pr-7 text-[13px] lg:text-[14px] xl:text-[16px] 2xl:text-[17px] placeholder:text-[#ccc] outline-none bg-[#5353534d] border border-[#555555] text-white focus:outline-none focus:border-[#dbdbdb]" />
          <button type="submit" class="absolute right-0 top-0 bottom-0 flex items-center justify-center p-2 z-10" aria-label="検索">
            <i class="fa-solid fa-magnifying-glass text-white"></i>
          </button>
        </form>
      </div>
      <div class="view-toggle flex items-center gap-0">
        <a href="<?php echo esc_url($grid_url); ?>"
          class="view-toggle-btn py-[5px] xl:py-[7px] px-2 lg:px-[10px] text-[14px] lg:text-[15px] xl:text-[16px] text-white/70 hover:text-white transition <?php echo $current_view === 'grid' ? ' view-toggle-btn--active text-white' : ''; ?>"
          aria-label="グリッド表示">
          <i class="fa-solid fa-th-large"></i>
        </a>
        <a href="<?php echo esc_url($list_url); ?>"
          class="view-toggle-btn py-[5px] xl:py-[7px] px-2 lg:px-[10px] text-[14px] lg:text-[15px] xl:text-[16px] text-white/70 hover:text-white transition <?php echo $current_view === 'list' ? ' view-toggle-btn--active text-white' : ''; ?>"
          aria-label="リスト表示">
          <i class="fa-solid fa-list-ul"></i>
        </a>
      </div>
    </div>
  </div>
</div>
<script>
(function() {
  var form = document.getElementById('product-sort-form');
  var select = document.getElementById('product-sort');
  if (form && select) {
    select.addEventListener('change', function() { form.submit(); });
  }
})();
</script>