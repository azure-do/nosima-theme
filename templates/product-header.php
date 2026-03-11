<div id="search-header" class="w-full pb-4 border-b border-[#333]">
  <div class="flex justify-between">
    <div>
      <select name="category" id="category"
        class="w-[160px] md:w-[180px] lg:w-[200px] py-[2px] px-1 lg:pr-4 xl:pr-5 text-[13px] lg:text-[14px] xl:text-[16px] 2xl:text-[17px] placeholder:text-[#ccc] outline-none bg-[#5353534d] border border-[#555555] text-white focus:outline-none focus:border-[#dbdbdb] focus:bg-black focus:text-white">
        <option value="1">並び替え</option>
        <option value="2">新着順</option>
        <option value="3">人気順</option>
        <option value="4">価格の安い順</option>
        <option value="5">価格の高い順</option>
      </select>
    </div>
    <div class="flex items-center gap-4">
      <div class="w-fit h-fit relative hidden md:block">
        <input type="text" name="search" placeholder="商品検索"
          class="w-[180px] lg:w-[320px] py-[2px] xl:py-[3px] px-3 lg:pr-4 xl:pr-5 text-[13px] lg:text-[14px] xl:text-[16px] 2xl:text-[17px] placeholder:text-[#ccc] outline-none bg-[#5353534d] border border-[#555555] text-white focus:outline-none focus:border-[#dbdbdb]" />
        <span class="absolute right-0 top-0 bottom-0 flex items-center justify-center p-2"> <i
            class="fa-solid fa-magnifying-glass text-white"></i></span>
      </div>
      <?php
      $current_view = isset($_GET['view']) && $_GET['view'] === 'list' ? 'list' : 'grid';
      $grid_url = add_query_arg('view', 'grid');
      $list_url = add_query_arg('view', 'list');
      ?>
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