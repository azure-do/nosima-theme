<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>USI NO SIMA</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link rel="icon" type="image/x-icon" href="<?php echo T_DIRE_URI; ?>/assets/images/favicon.webp" />
  <link href="<?php echo T_DIRE_URI; ?>/assets/css/swiper.css" rel="stylesheet" />
  <link href="<?php echo T_DIRE_URI; ?>/assets/css/font-mincho.css" rel="stylesheet" />
  <link href="<?php echo T_DIRE_URI; ?>/assets/css/main.css" rel="stylesheet" />
  <link href="<?php echo T_DIRE_URI; ?>/assets/css/aos.css" rel="stylesheet" />

  <script src="<?php echo T_DIRE_URI; ?>/assets/css/tailwind.css"></script>
  <script src="<?php echo T_DIRE_URI; ?>/assets/js/swiper-bundle.min.js"></script>
  <script src="<?php echo T_DIRE_URI; ?>/assets/js/aos.js"></script>
  <script src="<?php echo T_DIRE_URI; ?>/assets/js/main.js"></script>
  <style>
    @media (max-width: 1023px) {
      #searchForm.searchForm--open {
        opacity: 1;
        visibility: visible;
        pointer-events: auto;
      }

      #overlay.overlay--open {
        display: block;
      }

      #sidebar.sidebar--open {
        transform: translateX(0);
      }
    }
  </style>
</head>

<body class="relative bg-[url('<?php echo T_DIRE_URI; ?>/assets/images/bg-default.webp')] bg-center">
  <header class="fixed w-full justify-center bg-black z-[100] py-2 lg:py-3 xl:py-4 2xl:py-[15px] px-8 xl:px-12">
    <div class="relative w-full mx-auto flex items-center justify-between">
      <div class="flex items-center shrink-0">
        <a href="<?php echo esc_url(home_url('/')); ?>">
          <img src="<?php echo T_DIRE_URI; ?>/assets/images/logo.webp" alt="ロゴ" class="w-[200px] lg:w-[260px] xl:w-[280px] 2xl:w-[285px]" />
        </a>
      </div>
      <div class="relative">
        <div id="searchForm"
          class="absolute md:static top-[43px] right-0 flex items-center flex-shrink items-stretch opacity-0 invisible pointer-events-none md:opacity-100 md:visible md:pointer-events-auto transition-opacity duration-300 ease-out">
          <input type="text" name="search" placeholder="商品検索"
            class="w-[180px] lg:w-[320px] px-3 lg:px-4 xl:px-5 text-[13px] lg:text-[14px] xl:text-[16px] 2xl:text-[18px] placeholder:text-[#ccc] border-none outline-none bg-white text-black" />
          <button
            class="bg-gradient-to-b from-[#303030] to-[#161616] border border-[#555555] text-white text-nowrap text-[12px] lg:text-[14px] xl:text-[16px] 2xl:text-[18px] px-2 lg:px-4 xl:px-6 py-1 xl:py-2 ml-1 xl:ml-2 transition hover:from-[#161616] hover:to-[#303030] outline-none">
            検索
          </button>
        </div>
        <button id="searchBtn" class="block md:hidden p-2 bg-white rounded-full flex items-center justify-center">
          <i class="fa-solid fa-search text-black text-[15px]" aria-hidden="true"></i>
          <span class="sr-only">検索</span>
        </button>
      </div>
    </div>
  </header>
  <div class="w-full h-[55px] lg:h-[60px] xl:h-[85px]"></div>