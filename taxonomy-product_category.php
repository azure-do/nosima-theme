<?php
get_header();

$term = get_queried_object();
$term_name = $term->name;
$term_description = $term->description;
$term_slug = $term->slug;
$term_id = $term->term_id;
$term_parent = $term->parent;
$term_count = $term->count;
$term_taxonomy = $term->taxonomy;
?>

<main id="main" class="pt-10 lg:pt-12 xl:pt-18 2xl:pt-20 xl:pb-9">
  <div
    class="lg:max-w-[920px] xl:max-w-[1200px] 2xl:max-w-[1400px] mx-auto flex gap-6 lg:gap-8 xl:gap-10 2xl:gap-[52px]">
    <div id="overlay"
      class="hidden w-[100vw] h-[100vh] fixed inset-0 z-30 bg-[#00000075] cursor-pointer transition-opacity duration-300 ease-out">
    </div>
    <?php get_template_part('templates/sidebar'); ?>
    <div id="content" class="flex-1 md:max-w-[680px] lg:max-w-full mx-auto">
      <h1 class="text-white text-[20px] lg:text-[24px] xl:text-[28px] font-bold mb-1">This is Products Category</h1>
    </div>
  </div>
  </div>
  </div>
</main>

<?php get_footer(); ?>