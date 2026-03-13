<?php
if (!defined('T_DIRE_URI')) {
  define('T_DIRE_URI', get_template_directory_uri());
}

function nosima_adjust_news_archive_query($query)
{
  if (is_admin() || ! $query->is_main_query()) {
    return;
  }

  if ($query->is_post_type_archive('news')) {
    $query->set('posts_per_page', 1);
  }
}
add_action('pre_get_posts', 'nosima_adjust_news_archive_query');

function nosima_adjust_products_archive_query($query)
{
  if (is_admin() || ! $query->is_main_query()) {
    return;
  }

  if ($query->is_post_type_archive('products')) {
    $query->set('posts_per_page', 20);
  }
}
add_action('pre_get_posts', 'nosima_adjust_products_archive_query');

// Add a custom field (select) for "product_category" taxonomy term (Edit form)
function nosima_add_product_category_custom_field($term)
{
  $selected = get_term_meta($term->term_id, 'custom_towel_type', true);
  $category_title = get_term_meta($term->term_id, 'category_title', true);
  $options = array(
    'standard_towel'   => '定番タオル',
    'sp_color_towel'   => 'SPカラータオル',
    'flat_weave_towel' => '平織りタオル',
    'cheering_goods'   => '応援グッズ',
    'victory_costume'  => '勝鬨衣装',
  );
?>
  <tr class="form-field">
    <th scope="row"><label for="custom_towel_type">商品の種類 </label></th>
    <td>
      <select name="custom_towel_type" id="custom_towel_type">
        <option value="">選択してください</option>
        <?php foreach ($options as $value => $label): ?>
          <option value="<?php echo esc_attr($value); ?>" <?php selected($selected, $value); ?>><?php echo esc_html($label); ?></option>
        <?php endforeach; ?>
      </select>
      <p class="description">このカテゴリーの種類を選択してください。</p>
    </td>
  </tr>
  <tr class="form-field" id="category_title_row">
    <th scope="row"><label for="category_title">タイトル</label></th>
    <td>
      <input name="category_title" id="category_title" type="text" value="<?php echo esc_attr($category_title); ?>" class="regular-text" />
    </td>
  </tr>
<?php
}
add_action('product_category_edit_form_fields', 'nosima_add_product_category_custom_field', 10, 1);

// Add a custom field (select) for "product_category" taxonomy term (Add form)
add_action('product_category_add_form_fields', function ($taxonomy) {
  $options = array(
    'standard_towel'   => '定番タオル',
    'sp_color_towel'   => 'SPカラータオル',
    'flat_weave_towel' => '平織りタオル',
    'cheering_goods'   => '応援グッズ',
    'victory_costume'  => '勝鬨衣装',
  );
?>
  <div class="form-field">
    <label for="custom_towel_type">商品の種類 </label>
    <select name="custom_towel_type" id="custom_towel_type">
      <option value="">選択してください</option>
      <?php foreach ($options as $value => $label): ?>
        <option value="<?php echo esc_attr($value); ?>"><?php echo esc_html($label); ?></option>
      <?php endforeach; ?>
    </select>
    <p class="description">このカテゴリーの種類を選択してください。</p>
  </div>
  <div class="form-field">
    <label for="category_title">タイトル</label>
    <input name="category_title" id="category_title" type="text" value="" class="regular-text" />
  </div>
<?php
}, 10, 1);

// Save the custom field value when term is created/edited
function nosima_save_product_category_custom_field($term_id)
{
  if (isset($_POST['custom_towel_type'])) {
    update_term_meta($term_id, 'custom_towel_type', sanitize_text_field($_POST['custom_towel_type']));
  }
  if (isset($_POST['category_title'])) {
    update_term_meta($term_id, 'category_title', sanitize_text_field($_POST['category_title']));
  }
}
add_action('created_product_category', 'nosima_save_product_category_custom_field', 10, 1);
add_action('edited_product_category', 'nosima_save_product_category_custom_field', 10, 1);

// Show custom field value in the terms list table column
function nosima_product_category_custom_column_add($columns)
{
  $new_columns = array();
  foreach ($columns as $key => $val) {
    $new_columns[$key] = $val;
    if ($key === 'name') {
      $new_columns['custom_towel_type'] = '商品の種類 ';
      $new_columns['category_title'] = 'タイトル';
    }
  }
  return $new_columns;
}
add_filter('manage_edit-product_category_columns', 'nosima_product_category_custom_column_add');

function nosima_product_category_custom_column_show($out, $column_name, $term_id)
{
  if ($column_name === 'custom_towel_type') {
    $value = get_term_meta($term_id, 'custom_towel_type', true);
    // Display the Japanese label for the English value
    $labels = array(
      'standard_towel'   => '定番タオル',
      'sp_color_towel'   => 'SPカラータオル',
      'flat_weave_towel' => '平織りタオル',
      'cheering_goods'   => '応援グッズ',
      'victory_costume'  => '勝鬨衣装',
    );
    if (!empty($value)) {
      return isset($labels[$value]) ? esc_html($labels[$value]) : esc_html($value);
    } else {
      return '<span style="color:#aaa;">-</span>';
    }
  }
  if ($column_name === 'category_title') {
    $value = get_term_meta($term_id, 'category_title', true);
    if (!empty($value)) {
      return esc_html($value);
    } else {
      return '<span style="color:#aaa;">-</span>';
    }
  }
  return $out;
}
add_filter('manage_product_category_custom_column', 'nosima_product_category_custom_column_show', 10, 3);

add_action('admin_print_footer_scripts-edit-tags.php', function () {
  if (empty($_GET['taxonomy']) || $_GET['taxonomy'] !== 'product_category') {
    return;
  }
?>
  <script>
    (function() {
      var parentRow = document.getElementById('parent');
      var titleRow = document.getElementById('category_title_row');
      if (!parentRow || !titleRow || !parentRow.parentNode) return;
      parentRow.parentNode.insertBefore(titleRow, parentRow.nextSibling);
    })();
  </script>
<?php
});

// =========== [ NEW CODE BELOW ] =============

/**
 * Extract image URLs (src values) from HTML string containing img tags.
 * Useful when ACF WYSIWYG or similar stores multiple images as HTML.
 *
 * @param string $html HTML string (e.g. from ACF WYSIWYG field).
 * @return string[] Array of image URL strings.
 */
function nosima_get_image_urls_from_html($html)
{
  if (empty($html) || ! is_string($html)) {
    return array();
  }
  $urls = array();
  if (preg_match_all('/<img[^>]+src=(["\'])([^"\']+)\1/', $html, $matches)) {
    $urls = $matches[2];
  }
  return $urls;
}

// Make custom towel type available to the frontend (e.g. sidebar.php)
// Usage: $term->custom_towel_type will be populated
add_filter('get_terms', function ($terms, $taxonomies, $args, $term_query) {
  if (is_array($taxonomies) && in_array('product_category', $taxonomies)) {
    foreach ($terms as $term) {
      if (!is_object($term)) {
        continue;
      }
      $term->custom_towel_type = get_term_meta($term->term_id, 'custom_towel_type', true);
      $term->category_title   = get_term_meta($term->term_id, 'category_title', true);
    }
  }
  return $terms;
}, 10, 4);

add_filter('get_term', function ($term, $taxonomy) {
  if (is_object($term) && $taxonomy === 'product_category') {
    $term->category_title = get_term_meta($term->term_id, 'category_title', true);
  }
  return $term;
}, 10, 2);
