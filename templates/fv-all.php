<?php
if (! defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

global $post;
$page_slug = '';

$request_uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
$home_path = parse_url(home_url(), PHP_URL_PATH);
if ($home_path && strpos($request_uri, $home_path) === 0) {
  $request_uri = substr($request_uri, strlen($home_path));
}
$path = trim(urldecode($request_uri), '/');
$page_slug = ($path !== '') ? strtok($path, '/') : '';

$fv_image = '';

if ($page_slug == 'product' || $page_slug == 'products') {
  $fv_image = T_DIRE_URI . '/assets/images/fv-top01.webp';
} elseif ($page_slug == 'news') {
  $fv_image = T_DIRE_URI . '/assets/images/fv-top02.webp';
} elseif ($page_slug == 'history') {
  $fv_image = T_DIRE_URI . '/assets/images/fv-top03.webp';
}
?>

<section id="fv-all">
  <div class="w-full">
    <div class="relative w-full overflow-hidden">
      <img src="<?php echo $fv_image; ?>" alt="メインビジュアル"
        class="w-[150%] max-w-[150%] md:max-w-[100%] md:w-full h-[400px] object-center left-1/2 -translate-x-1/2 relative">
    </div>
  </div>
</section>