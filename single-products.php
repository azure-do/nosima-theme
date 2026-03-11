<?php

/**
 * The Front Page File
 *
 * @package Usi No Sima
 */

get_header();

$post_id = get_the_ID();
$post_date = get_the_date('Y.m.d', $post_id);
$post_title = get_the_title($post_id);
$post_content = get_field('news_content', $post_id);

$prev_post = get_previous_post();
$next_post = get_next_post();
?>

<main id="main" class="pt-10 lg:pt-12 xl:pt-18 2xl:pt-20 xl:pb-9">
  <div
    class="lg:max-w-[920px] xl:max-w-[1200px] 2xl:max-w-[1400px] mx-auto flex gap-6 lg:gap-8 xl:gap-10 2xl:gap-[52px]">
    <div id="overlay"
      class="hidden w-[100vw] h-[100vh] fixed inset-0 z-30 bg-[#00000075] cursor-pointer transition-opacity duration-300 ease-out">
    </div>
    <?php get_template_part('templates/sidebar'); ?>
    <div id="content" class="flex-1 md:max-w-[680px] lg:max-[545px] xl:max-w-[900px] 2xl:max-w-[1068px] mx-auto">
      <div class="w-full px-7 md:px-0">
        <div id="product-detail-header" class="w-full pb-4 border-b border-[#333]">
          <div class="flex justify-between">
            <div>
              <button type="button"
                class="btn-line text-white flex items-center gap-2 hover:text-white/70 duration-200">
                <i class="fa-solid fa-chevron-left text-lg"></i>
                前の商品
              </button>
            </div>
            <div class="flex items-center gap-4">

            </div>
            <div>
              <button type="button"
                class="btn-line text-white flex items-center gap-2 hover:text-white/70 duration-200">
                次の商品
                <i class="fa-solid fa-chevron-right text-lg"></i>
              </button>
            </div>
          </div>
        </div>
        <!-- おすすめ商品 -->
        <section class="w-full mt-6 lg:mt-8 xl:mt-10">
          <div class="flex flex-col lg:flex-row gap-8">
            <div class="flex flex-row w-full lg:w-auto gap-6">
              <div class="flex-shrink-0 w-full max-w-[400px] lg:max-w-[480px] xl:max-w-[540px] 2xl:max-w-[600px]">
                <div class="w-full">
                  <!-- Main Image Swiper -->
                  <div
                    class="swiper mainImageSwiper aspect-w-1 aspect-h-1 w-full rounded-lg overflow-hidden border border-[#ccc] bg-black shadow mb-4">
                    <div class="swiper-wrapper">
                      <div class="swiper-slide">
                        <img src="<?php echo T_DIRE_URI; ?>/assets/images/recommended01.webp" alt="商品画像1"
                          class="zoomable object-contain w-full h-full transition-all duration-300" />
                      </div>
                      <div class="swiper-slide">
                        <img src="<?php echo T_DIRE_URI; ?>/assets/images/recommended02.webp" alt="商品画像2"
                          class="zoomable object-contain w-full h-full transition-all duration-300" />
                      </div>
                      <div class="swiper-slide">
                        <img src="<?php echo T_DIRE_URI; ?>/assets/images/recommended03.webp" alt="商品画像3"
                          class="zoomable object-contain w-full h-full transition-all duration-300" />
                      </div>
                      <div class="swiper-slide">
                        <img src="<?php echo T_DIRE_URI; ?>/assets/images/recommended04.webp" alt="商品画像4"
                          class="zoomable object-contain w-full h-full transition-all duration-300" />
                      </div>
                      <div class="swiper-slide">
                        <img src="<?php echo T_DIRE_URI; ?>/assets/images/recommended05.webp" alt="商品画像5"
                          class="zoomable object-contain w-full h-full transition-all duration-300" />
                      </div>
                      <div class="swiper-slide">
                        <img src="<?php echo T_DIRE_URI; ?>/assets/images/recommended06.webp" alt="商品画像6"
                          class="zoomable object-contain w-full h-full transition-all duration-300" />
                      </div>
                    </div>
                  </div>
                  <!-- Thumb List Swiper -->
                  <div class="swiper thumbImageSwiper mt-2">
                    <div class="swiper-wrapper">
                      <div class="swiper-slide cursor-pointer border border-[#eee] rounded overflow-hidden">
                        <img src="<?php echo T_DIRE_URI; ?>/assets/images/recommended01.webp" alt="商品画像1サムネイル"
                          class="object-contain w-full h-auto transition-all duration-300 filter-[black]" />
                      </div>
                      <div class="swiper-slide cursor-pointer border border-[#eee] rounded overflow-hidden">
                        <img src="<?php echo T_DIRE_URI; ?>/assets/images/recommended02.webp" alt="商品画像2サムネイル"
                          class="object-contain w-full h-auto transition-all duration-300" />
                      </div>
                      <div class="swiper-slide cursor-pointer border border-[#eee] rounded overflow-hidden">
                        <img src="<?php echo T_DIRE_URI; ?>/assets/images/recommended03.webp" alt="商品画像3サムネイル"
                          class="object-contain w-full h-auto transition-all duration-300" />
                      </div>
                      <div class="swiper-slide cursor-pointer border border-[#eee] rounded overflow-hidden">
                        <img src="<?php echo T_DIRE_URI; ?>/assets/images/recommended04.webp" alt="商品画像4サムネイル"
                          class="object-contain w-full h-auto transition-all duration-300" />
                      </div>
                      <div class="swiper-slide cursor-pointer border border-[#eee] rounded overflow-hidden">
                        <img src="<?php echo T_DIRE_URI; ?>/assets/images/recommended05.webp" alt="商品画像5サムネイル"
                          class="object-contain w-full h-auto transition-all duration-300" />
                      </div>
                      <div class="swiper-slide cursor-pointer border border-[#eee] rounded overflow-hidden">
                        <img src="<?php echo T_DIRE_URI; ?>/assets/images/recommended06.webp" alt="商品画像6サムネイル"
                          class="object-contain w-full h-auto transition-all duration-300" />
                      </div>
                    </div>
                  </div>
 
                </div>
              </div>
            </div>
            <div class="flex-1 pt-4 lg:pt-0 flex flex-col gap-4">
              <h2 class="text-white text-[20px] lg:text-[24px] xl:text-[28px] font-bold mb-1">定番 白タオル 顔料プリント 10枚</h2>
              <span class="text-[#b40000] text-[18px] lg:text-[22px] xl:text-[24px] font-semibold">17,500円～(税込)</span>
              <div class="text-white text-[14px] lg:text-[16px] xl:text-[18px] leading-relaxed space-y-2">
                <p>
                  厚手で高品質な白タオルに顔料プリントを施した定番人気商品。<br>
                  10枚セット価格。チーム名やオリジナルロゴをプリント可能です。
                </p>
                <ul class="list-disc list-inside pl-2 mt-2 text-white/80 text-[13px] lg:text-[15px]">
                  <li>サイズ：約34cm x 85cm</li>
                  <li>素材：綿100%</li>
                  <li>プリント方法：顔料プリント</li>
                  <li>納期：約2週間</li>
                </ul>
              </div>
              <div class="flex items-center gap-2 mt-3">
                <button
                  class="bg-[#b40000] text-white px-6 py-2 rounded hover:bg-[#d93d3d] transition font-bold">カートに追加</button>
                <button
                  class="bg-[#06C755] text-white px-5 py-2 rounded flex items-center gap-2 font-bold hover:bg-white hover:text-[#06C755] border border-[#06C755] transition">
                  <img src="<?php echo T_DIRE_URI; ?>/assets/images/line-mark.webp" alt="Line" class="w-6 h-6"> LINEで問い合わせ
                </button>
              </div>
              <div class="mt-4">
                <span
                  class="px-3 py-1 bg-[#333] text-white rounded text-[13px]">※こちらの商品は受注生産となります。ご注文後、完成イメージをLINEまたはメールにてご連絡いたします。</span>
              </div>
            </div>
          </div>
          <div class="flex flex-col gap-4 mt-6 lg:mt-8 xl:mt-10">
            <div id="related-products" class="w-full border-b border-[#333]">
              <h3 class="text-white text-[18px] lg:text-[22px] xl:text-[24px] font-bold mb-1">おすすめ商品</h3>
            </div>
            <div class="w-full overflow-hidden">
              <div id="productImageSlider" class="swiper-container">
                <div class="swiper-wrapper">
                  <div class="swiper-slide">
                    <img src="<?php echo T_DIRE_URI; ?>/assets/images/recommended01.webp" alt="商品画像1"
                      class="w-full object-cover rounded-md transition-transform duration-300" />
                  </div>
                  <div class="swiper-slide">
                    <img src="<?php echo T_DIRE_URI; ?>/assets/images/recommended02.webp" alt="商品画像2"
                      class="w-full object-cover rounded-md transition-transform duration-300" />
                  </div>
                  <div class="swiper-slide">
                    <img src="<?php echo T_DIRE_URI; ?>/assets/images/recommended03.webp" alt="商品画像3"
                      class="w-full object-cover rounded-md transition-transform duration-300" />
                  </div>
                  <div class="swiper-slide">
                    <img src="<?php echo T_DIRE_URI; ?>/assets/images/recommended04.webp" alt="商品画像3"
                      class="w-full object-cover rounded-md transition-transform duration-300" />
                  </div>
                  <div class="swiper-slide">
                    <img src="<?php echo T_DIRE_URI; ?>/assets/images/recommended05.webp" alt="商品画像3"
                      class="w-full object-cover rounded-md transition-transform duration-300" />
                  </div>
                  <div class="swiper-slide">
                    <img src="<?php echo T_DIRE_URI; ?>/assets/images/recommended06.webp" alt="商品画像3"
                      class="w-full object-cover rounded-md transition-transform duration-300" />
                  </div>
                  <div class="swiper-slide">
                    <img src="<?php echo T_DIRE_URI; ?>/assets/images/recommended01.webp" alt="商品画像1"
                      class="w-full object-cover rounded-md transition-transform duration-300" />
                  </div>
                  <div class="swiper-slide">
                    <img src="<?php echo T_DIRE_URI; ?>/assets/images/recommended02.webp" alt="商品画像2"
                      class="w-full object-cover rounded-md transition-transform duration-300" />
                  </div>
                  <div class="swiper-slide">
                    <img src="<?php echo T_DIRE_URI; ?>/assets/images/recommended03.webp" alt="商品画像3"
                      class="w-full object-cover rounded-md transition-transform duration-300" />
                  </div>
                  <div class="swiper-slide">
                    <img src="<?php echo T_DIRE_URI; ?>/assets/images/recommended04.webp" alt="商品画像3"
                      class="w-full object-cover rounded-md transition-transform duration-300" />
                  </div>
                  <div class="swiper-slide">
                    <img src="<?php echo T_DIRE_URI; ?>/assets/images/recommended05.webp" alt="商品画像3"
                      class="w-full object-cover rounded-md transition-transform duration-300" />
                  </div>
                  <div class="swiper-slide">
                    <img src="<?php echo T_DIRE_URI; ?>/assets/images/recommended06.webp" alt="商品画像3"
                      class="w-full object-cover rounded-md transition-transform duration-300" />
                  </div>
                  <div class="swiper-slide">
                    <img src="<?php echo T_DIRE_URI; ?>/assets/images/recommended01.webp" alt="商品画像1"
                      class="w-full object-cover rounded-md transition-transform duration-300" />
                  </div>
                  <div class="swiper-slide">
                    <img src="<?php echo T_DIRE_URI; ?>/assets/images/recommended02.webp" alt="商品画像2"
                      class="w-full object-cover rounded-md transition-transform duration-300" />
                  </div>
                  <div class="swiper-slide">
                    <img src="<?php echo T_DIRE_URI; ?>/assets/images/recommended03.webp" alt="商品画像3"
                      class="w-full object-cover rounded-md transition-transform duration-300" />
                  </div>
                  <div class="swiper-slide">
                    <img src="<?php echo T_DIRE_URI; ?>/assets/images/recommended04.webp" alt="商品画像3"
                      class="w-full object-cover rounded-md transition-transform duration-300" />
                  </div>
                  <div class="swiper-slide">
                    <img src="<?php echo T_DIRE_URI; ?>/assets/images/recommended05.webp" alt="商品画像3"
                      class="w-full object-cover rounded-md transition-transform duration-300" />
                  </div>
                  <div class="swiper-slide">
                    <img src="<?php echo T_DIRE_URI; ?>/assets/images/recommended06.webp" alt="商品画像3"
                      class="w-full object-cover rounded-md transition-transform duration-300" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <script>
          function changeMainImage(src) {
            document.getElementById('mainProductImage').src = src;
          }
        </script>
      </div>
    </div>
  </div>
</main>