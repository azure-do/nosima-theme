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

// Add a custom field (select) for "product_category" taxonomy term (Edit form)
function nosima_add_product_category_custom_field($term)
{
  // Get saved value (if editing)
  $selected = get_term_meta($term->term_id, 'custom_towel_type', true);
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
<?php
}, 10, 1);

// Save the custom field value when term is created/edited
function nosima_save_product_category_custom_field($term_id)
{
  if (isset($_POST['custom_towel_type'])) {
    update_term_meta($term_id, 'custom_towel_type', sanitize_text_field($_POST['custom_towel_type']));
  }
}
add_action('created_product_category', 'nosima_save_product_category_custom_field', 10, 1);
add_action('edited_product_category', 'nosima_save_product_category_custom_field', 10, 1);

// Show custom field value in the terms list table column
function nosima_product_category_custom_column_add($columns)
{
  // Insert 'custom_towel_type' after the name column
  $new_columns = array();
  foreach ($columns as $key => $val) {
    $new_columns[$key] = $val;
    if ($key === 'name') {
      $new_columns['custom_towel_type'] = '商品の種類 ';
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
  return $out;
}
add_filter('manage_product_category_custom_column', 'nosima_product_category_custom_column_show', 10, 3);

// =========== [ NEW CODE BELOW ] =============

// Make custom towel type available to the frontend (e.g. sidebar.php)
// Usage: $term->custom_towel_type will be populated
add_filter('get_terms', function ($terms, $taxonomies, $args, $term_query) {
  // Only apply for product_category taxonomy
  if (is_array($taxonomies) && in_array('product_category', $taxonomies)) {
    foreach ($terms as $term) {
      // Skip if $term is not an object (handles array of IDs)
      if (!is_object($term)) {
        continue;
      }
      $custom_towel_type = get_term_meta($term->term_id, 'custom_towel_type', true);
      $term->custom_towel_type = $custom_towel_type;
    }
  }
  return $terms;
}, 10, 4);
