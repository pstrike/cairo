<?php
/**
 * Category Custom Edit
 */
function cairo_category_edit_settings( $term, $taxonomy ) {

  $cairo_category_sidebar_onoff  = get_term_meta( $term->term_id, 'cairo_category_sidebar_onoff', true );
  $cairo_category_style  = get_term_meta( $term->term_id, 'cairo_category_style', true );
  $cairo_category_sub  = get_term_meta( $term->term_id, 'cairo_category_sub', true );
  $cairo_category_header  = get_term_meta( $term->term_id, 'cairo_category_header', true );
  $cairo_category_header_image  = get_term_meta( $term->term_id, 'cairo_category_header_image', true );
  $cairo_category_text_color  = get_term_meta( $term->term_id, 'cairo_category_text_color', true );
  $cairo_category_bg_color  = get_term_meta( $term->term_id, 'cairo_category_bg_color', true );
  $cairo_category_custom_banner  = get_term_meta( $term->term_id, 'cairo_category_custom_banner', true );
  $cairo_category_custom_banner_link  = get_term_meta( $term->term_id, 'cairo_category_custom_banner_link', true );
  $cairo_category_featured_style  = get_term_meta( $term->term_id, 'cairo_category_featured_style', true );
  $cairo_category_featured_order_by = get_term_meta( $term->term_id, 'cairo_category_featured_order_by', true );
  $cairo_category_featured_post_count = get_term_meta( $term->term_id, 'cairo_category_featured_post_count', true );

  ?>
  <tr class="form-field">
    <th scope="row" valign="top"><label><?php echo esc_html__( 'Category Sidebar On or Off Style', 'cairo' ); ?></label></th>
    <td>
      <div class="custom-categories">
        <img src="<?php echo CAIRO_URL; ?>/assets/images/admin/home_layout/cairo_sidebar_right.png" alt="">
        <p><input type="radio" name="cairo_category_sidebar_onoff" id="cairo_category_sidebar_onoff-1" value="style1"  class="radio" <?php if($cairo_category_sidebar_onoff === 'style1'){ echo 'checked="checked"'; } ?>>
        <label for="cairo_category_sidebar_onoff-1">Sidebar Right</label></p>
      </div>

      <div class="custom-categories">
        <img src="<?php echo CAIRO_URL; ?>/assets/images/admin/home_layout/cairo_sidebar_left.png" alt="">
        <p><input type="radio" name="cairo_category_sidebar_onoff" id="cairo_category_sidebar_onoff-2" value="style2" class="radio" <?php if($cairo_category_sidebar_onoff === 'style2'){ echo 'checked="checked"'; } ?>>
        <label for="cairo_category_sidebar_onoff-2">Sidebar Left</label></p>
      </div>

      <div class="custom-categories">
        <img src="<?php echo CAIRO_URL; ?>/assets/images/admin/home_layout/cairo_sidebar_fullwidth.png" alt="">
        <p><input type="radio" name="cairo_category_sidebar_onoff" id="cairo_category_sidebar_onoff-3" value="style3" class="radio" <?php if($cairo_category_sidebar_onoff === 'style3'){ echo 'checked="checked"'; } ?>>
        <label for="cairo_category_sidebar_onoff-3">Sidebar Wide</label></p>
      </div>
    </td>
  </tr>
  <!--Category Sidebar On Off End-->

  <tr class="form-field">
    <th scope="row" valign="top"><label><?php echo esc_html__( 'Category Header Subcategory', 'cairo' ); ?></label></th>
    <td>
      <div class="custom-categories">
        <img src="<?php echo CAIRO_URL; ?>/assets/images/admin/category_module/cairo_category_header_1.png" alt="">
        <p><input type="radio" name="cairo_category_sub" id="cairo_category_sub_show" value="sub_show"  class="radio" <?php if($cairo_category_sub === 'sub_show'){ echo 'checked="checked"'; } ?>>
        <label for="cairo_category_sub_show">Show Subcategory</label></p>
      </div>
      <div class="custom-categories">
        <img src="<?php echo CAIRO_URL; ?>/assets/images/admin/category_module/cairo_category_header_1.png" alt="">
        <p><input type="radio" name="cairo_category_sub" id="cairo_category_sub_hide" value="sub_hide"  class="radio" <?php if($cairo_category_sub === 'sub_hide'){ echo 'checked="checked"'; } ?>>
        <label for="cairo_category_sub_hide">Hide Subcategory</label></p>
      </div>
    </td>
  </tr>
  <!--Category Header Subcategory End-->

  <tr class="form-field">
    <th scope="row" valign="top"><label><?php echo esc_html__( 'Category Header Style', 'cairo' ); ?></label></th>
    <td>
      <div class="custom-categories">
        <img src="<?php echo CAIRO_URL; ?>/assets/images/admin/category_module/cairo_category_header_1.png" alt="">
        <p><input type="radio" name="cairo_category_header" id="cairo_category_header-1" value="style1"  class="radio" <?php if($cairo_category_header === 'style1'){ echo 'checked="checked"'; } ?>>
        <label for="cairo_category_header-1">Style - 1</label></p>
      </div>

      <div class="custom-categories">
        <img src="<?php echo CAIRO_URL; ?>/assets/images/admin/category_module/cairo_category_header_2.png" alt="">
        <p><input type="radio" name="cairo_category_header" id="cairo_category_header-2" value="style2" class="radio" <?php if($cairo_category_header === 'style2'){ echo 'checked="checked"'; } ?>>
        <label for="cairo_category_header-2">Style - 2</label></p>
      </div>

      <div class="custom-categories">
        <img src="<?php echo CAIRO_URL; ?>/assets/images/admin/category_module/cairo_category_header_3.png" alt="">
        <p><input type="radio" name="cairo_category_header" id="cairo_category_header-3" value="style3" class="radio" <?php if($cairo_category_header === 'style3'){ echo 'checked="checked"'; } ?>>
        <label for="cairo_category_header-3">Style - 3</label></p>
      </div>

      <div class="custom-categories">
        <img src="<?php echo CAIRO_URL; ?>/assets/images/admin/category_module/cairo_category_header_4.png" alt="">
        <p><input type="radio" name="cairo_category_header" id="cairo_category_header-4" value="style4" class="radio" <?php if($cairo_category_header === 'style4'){ echo 'checked="checked"'; } ?>>
        <label for="cairo_category_header-4">Style - 4</label></p>
      </div>
    </td>
  </tr>
  <!--Category Header Style End-->

  <tr class="form-field">
    <th scope="row" valign="top"><label><?php echo esc_html__( 'Category Header Style 1 Background Image', 'cairo' ); ?></label></th>
    <td>
      <div class="headerimage">
        <input class="custom_title_bg_url" name="cairo_category_header_image" id="cairo_category_header_image" type="text" value="<?php echo get_term_meta($term->term_id, 'cairo_category_header_image', true); ?>" size="40" aria-required="true" />
      </br></br>
      <input type="button" value="<?php esc_html_e( 'Upload Image', 'cairo' ); ?>" class="button custom_title_bg" id="custom_image_uploader_signature"/>
      </div>

    </td>
  </tr>
  <!--Category Header Image End-->

  <tr class="form-field">
    <th scope="row" valign="top"><label for="meta-color"><?php echo esc_html__( 'Page Header Category Background Color', 'cairo' ); ?></label></th>
    <td>
      <div id="colorpicker">
          <input type="text" name="cairo_category_bg_color" id="cairo_category_bg_color" class="colorpicker" value="<?php echo get_term_meta($term->term_id, 'cairo_category_bg_color', true); ?>" aria-required="true"/>
      </div>
          <br />
      <span class="description"><?php echo esc_html__( 'Select the category background color.', 'cairo' ); ?></span>
          <br />
    </td>
  </tr>
  <!--Category BG Color-->

  <tr class="form-field">
    <th scope="row" valign="top"><label for="meta-color"><?php echo esc_html__( 'Page Header Category Text Color', 'cairo' ); ?></label></th>
    <td>
      <div id="colorpicker">
          <input type="text" name="cairo_category_text_color" id="cairo_category_text_color" class="colorpicker" value="<?php echo get_term_meta($term->term_id, 'cairo_category_text_color', true); ?>" aria-required="true"/>
      </div>
          <br />
      <span class="description"><?php echo esc_html__( 'Select the category text color.', 'cairo' ); ?></span>
          <br />
    </td>
  </tr>
  <!--Category Text Color-->

  <tr class="form-field">
    <th scope="row" valign="top"><label for="meta-color"><?php echo esc_html__( 'Category Ads URL', 'cairo' ); ?></label></th>
    <td>
      <div id="customads">
      <input type="text" name="cairo_category_custom_banner_link" id="cairo_category_custom_banner_link" value="<?php echo get_term_meta($term->term_id, 'cairo_category_custom_banner_link', true); ?>" aria-required="true"/>
      </div>
          <br />
      <span class="description"><?php echo esc_html__( 'You can ads banner for link', 'cairo' ); ?></span>
          <br />
    </td>
  </tr>
  <!--Category Custom Banner Link-->

  <tr class="form-field">
    <th scope="row" valign="top"><label for="meta-color"><?php echo esc_html__( 'Category Ads', 'cairo' ); ?></label></th>
    <td>
      <div id="customads">
      <input type="text" name="cairo_category_custom_banner" id="cairo_category_custom_banner" value="<?php echo get_term_meta($term->term_id, 'cairo_category_custom_banner', true); ?>" aria-required="true"/>
      </div>
          <br />
      <span class="description"><?php echo esc_html__( 'You can upload ads banner', 'cairo' ); ?></span>
          <br />
    </td>
  </tr>
  <!--Category Custom Banner-->

  <tr class="form-field">
    <th scope="row" valign="top"><label><?php echo esc_html__( 'Post Style', 'cairo' ); ?></label></th>
    <td>

      <div class="custom-categories">
        <img src="<?php echo CAIRO_URL; ?>/assets/images/admin/blog_style/cairo_post_style_1.png" alt="">
        <p><input type="radio" name="cairo_category_style" id="cairo_category_style-1" value="style1"  class="radio" <?php if($cairo_category_style === 'style1'){ echo 'checked="checked"'; } ?>>
        <label for="cairo_category_style-1">Style - 1</label></p>
      </div>

      <div class="custom-categories">
        <img src="<?php echo CAIRO_URL; ?>/assets/images/admin/blog_style/cairo_post_style_2.png" alt="">
        <p><input type="radio" name="cairo_category_style" id="cairo_category_style-2" value="style2" class="radio" <?php if($cairo_category_style === 'style2'){ echo 'checked="checked"'; } ?>>
        <label for="cairo_category_style-2">Style - 2</label></p>
      </div>

      <div class="custom-categories">
        <img src="<?php echo CAIRO_URL; ?>/assets/images/admin/blog_style/cairo_post_style_3.png" alt="">
        <p><input type="radio" name="cairo_category_style" id="cairo_category_style-3" value="style3" class="radio" <?php if($cairo_category_style === 'style3'){ echo 'checked="checked"'; } ?>>
        <label for="cairo_category_style-3">Style - 3</label></p>
      </div>

      <div class="custom-categories">
        <img src="<?php echo CAIRO_URL; ?>/assets/images/admin/blog_style/cairo_post_style_4.png" alt="">
        <p><input type="radio" name="cairo_category_style" id="cairo_category_style-4" value="style4" class="radio" <?php if($cairo_category_style === 'style4'){ echo 'checked="checked"'; } ?>>
        <label for="cairo_category_style-4">Style - 4</label></p>
      </div>

      <div class="custom-categories">
        <img src="<?php echo CAIRO_URL; ?>/assets/images/admin/blog_style/cairo_post_style_5.png" alt="">
        <p><input type="radio" name="cairo_category_style" id="cairo_category_style-5" value="style5" class="radio" <?php if($cairo_category_style === 'style5'){ echo 'checked="checked"'; } ?>>
        <label for="cairo_category_style-5">Style - 5</label></p>
      </div>

      <div class="custom-categories">
        <img src="<?php echo CAIRO_URL; ?>/assets/images/admin/blog_style/cairo_post_style_6.png" alt="">
        <p><input type="radio" name="cairo_category_style" id="cairo_category_style-6" value="style6" class="radio" <?php if($cairo_category_style === 'style6'){ echo 'checked="checked"'; } ?>>
        <label for="cairo_category_style-6">Style - 6</label></p>
      </div>

      <div class="custom-categories">
        <img src="<?php echo CAIRO_URL; ?>/assets/images/admin/blog_style/cairo_post_style_7.png" alt="">
        <p><input type="radio" name="cairo_category_style" id="cairo_category_style-7" value="style7" class="radio" <?php if($cairo_category_style === 'style7'){ echo 'checked="checked"'; } ?>>
        <label for="cairo_category_style-7">Style - 7</label></p>
      </div>

    </td>
  </tr>
  <!--Category Post Style End-->

  <tr class="form-field">
    <th scope="row" valign="top"><label><?php esc_html_e( 'Featured Post Style', 'cairo' ); ?></label></th>
    <td>

      <div class="custom-categories">
        <img src="<?php echo CAIRO_URL; ?>/assets/images/admin/slider-posts/cairo-featured-style-none.png" alt="">
        <p><input type="radio" name="cairo_category_featured_style" id="cairo_category_featured_style-0" value="close"  class="radio" <?php if($cairo_category_featured_style === 'close'){ echo 'checked="checked"'; } ?>>
        <label for="cairo_category_featured_style-0">Close</label></p>
      </div>

      <div class="custom-categories">
        <img src="<?php echo CAIRO_URL; ?>/assets/images/admin/slider-posts/cairo-featured-style-1.png" alt="">
        <p><input type="radio" name="cairo_category_featured_style" id="cairo_category_featured_style-1" value="style1"  class="radio" <?php if($cairo_category_featured_style === 'style1'){ echo 'checked="checked"'; } ?>>
        <label for="cairo_category_featured_style-1">Style - 1</label></p>
      </div>

      <div class="custom-categories">
        <img src="<?php echo CAIRO_URL; ?>/assets/images/admin/slider-posts/cairo-featured-style-2.png" alt="">
        <p><input type="radio" name="cairo_category_featured_style" id="cairo_category_featured_style-2" value="style2" class="radio" <?php if($cairo_category_featured_style === 'style2'){ echo 'checked="checked"'; } ?>>
        <label for="cairo_category_featured_style-2">Style - 2</label></p>
      </div>

      <div class="custom-categories">
        <img src="<?php echo CAIRO_URL; ?>/assets/images/admin/slider-posts/cairo-featured-style-3.png" alt="">
        <p><input type="radio" name="cairo_category_featured_style" id="cairo_category_featured_style-3" value="style3" class="radio" <?php if($cairo_category_featured_style === 'style3'){ echo 'checked="checked"'; } ?>>
        <label for="cairo_category_featured_style-3">Style - 3</label></p>
      </div>

      <div class="custom-categories">
        <img src="<?php echo CAIRO_URL; ?>/assets/images/admin/slider-posts/cairo-featured-style-4.png" alt="">
        <p><input type="radio" name="cairo_category_featured_style" id="cairo_category_featured_style-4" value="style4" class="radio" <?php if($cairo_category_featured_style === 'style4'){ echo 'checked="checked"'; } ?>>
        <label for="cairo_category_featured_style-4">Style - 4</label></p>
      </div>

      <div class="custom-categories">
        <img src="<?php echo CAIRO_URL; ?>/assets/images/admin/slider-posts/cairo-featured-style-5.png" alt="">
        <p><input type="radio" name="cairo_category_featured_style" id="cairo_category_featured_style-5" value="style5" class="radio" <?php if($cairo_category_featured_style === 'style5'){ echo 'checked="checked"'; } ?>>
        <label for="cairo_category_featured_style-5">Style - 5</label></p>
      </div>

      <div class="custom-categories">
        <img src="<?php echo CAIRO_URL; ?>/assets/images/admin/slider-posts/cairo-featured-style-6.png" alt="">
        <p><input type="radio" name="cairo_category_featured_style" id="cairo_category_featured_style-6" value="style6" class="radio" <?php if($cairo_category_featured_style === 'style6'){ echo 'checked="checked"'; } ?>>
        <label for="cairo_category_featured_style-6">Style - 6</label></p>
      </div>

      <div class="custom-categories">
        <img src="<?php echo CAIRO_URL; ?>/assets/images/admin/slider-posts/cairo-featured-style-7.png" alt="">
        <p><input type="radio" name="cairo_category_featured_style" id="cairo_category_featured_style-7" value="style7" class="radio" <?php if($cairo_category_featured_style === 'style7'){ echo 'checked="checked"'; } ?>>
        <label for="cairo_category_featured_style-7">Style - 7</label></p>
      </div>

    </td>
  </tr>
  <!--Category Featured Post Style End-->

  <tr class="form-field">
    <th scope="row" valign="top"><label for="meta-color"><?php echo esc_html__( 'Featured Post Manuel Post Count', 'cairo' ); ?></label></th>
    <td>
      <div id="customads">
      <input type="text" name="cairo_category_featured_post_count" id="cairo_category_featured_post_count" value="<?php echo get_term_meta($term->term_id, 'cairo_category_featured_post_count', true); ?>" aria-required="true"/>
      </div>
          <br />
      <span class="description"><?php echo esc_html__( 'You can choose Slider Posts Number here.', 'cairo' ); ?></span>
          <br />
    </td>
  </tr>
  <!--Category Featured Post Count End-->

  <?php
}
add_action( 'category_edit_form_fields', 'cairo_category_edit_settings', 10,2 );

/**
 * Category Custom Save
 */
function cairo_category_settings_save( $term_id, $tt_id, $taxonomy ) {
  if ( isset( $_POST['cairo_category_sidebar_onoff'] ) ) {
    update_term_meta( $term_id, 'cairo_category_sidebar_onoff', $_POST['cairo_category_sidebar_onoff'] );
  }
  if ( isset( $_POST['cairo_category_style'] ) ) {
    update_term_meta( $term_id, 'cairo_category_style', $_POST['cairo_category_style'] );
  }
  if ( isset( $_POST['cairo_category_sub'] ) ) {
    update_term_meta( $term_id, 'cairo_category_sub', $_POST['cairo_category_sub'] );
  }
  if ( isset( $_POST['cairo_category_header'] ) ) {
    update_term_meta( $term_id, 'cairo_category_header', $_POST['cairo_category_header'] );
  }
  if ( isset( $_POST['cairo_category_header_image'] ) ) {
    update_term_meta( $term_id, 'cairo_category_header_image', $_POST['cairo_category_header_image'] );
  }
  if ( isset( $_POST['cairo_category_text_color'] ) ) {
    update_term_meta( $term_id, 'cairo_category_text_color', $_POST['cairo_category_text_color'] );
  }
  if ( isset( $_POST['cairo_category_bg_color'] ) ) {
    update_term_meta( $term_id, 'cairo_category_bg_color', $_POST['cairo_category_bg_color'] );
  }
  if ( isset( $_POST['cairo_category_custom_banner'] ) ) {
    update_term_meta( $term_id, 'cairo_category_custom_banner', $_POST['cairo_category_custom_banner'] );
  }
  if ( isset( $_POST['cairo_category_custom_banner_link'] ) ) {
    update_term_meta( $term_id, 'cairo_category_custom_banner_link', $_POST['cairo_category_custom_banner_link'] );
  }
  if ( isset( $_POST['cairo_category_featured_style'] ) ) {
    update_term_meta( $term_id, 'cairo_category_featured_style', $_POST['cairo_category_featured_style'] );
  }
  if ( isset( $_POST['cairo_category_featured_order_by'] ) ) {
    update_term_meta( $term_id, 'cairo_category_featured_order_by', $_POST['cairo_category_featured_order_by'] );
  }
  if ( isset( $_POST['cairo_category_featured_post_count'] ) ) {
    update_term_meta( $term_id, 'cairo_category_featured_post_count', $_POST['cairo_category_featured_post_count'] );
  }
}
add_action( 'edit_term', 'cairo_category_settings_save', 10,3 );


/*------------- CATEGORY COLOR START -------------*/

  /** Add New Field To Category **/
  function cairo_extra_category_fields_background_color( $tag ) {
      $t_id = $tag->term_id;
      $cat_meta = get_option( "category_$t_id" );
      $cat_text = get_option( "category_$t_id" );
    ?>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="meta-color"><?php echo esc_html__( 'Label Category Background Color', 'cairo' ); ?></label></th>
        <td>
        <div id="colorpicker">
            <input type="text" name="cat_meta[catBG]" class="colorpicker" size="3" style="min-width:75px; width:20%; text-align:left;" value="<?php echo (isset($cat_meta['catBG'])) ? $cat_meta['catBG'] : ''; ?>" />
        </div>
            <br />
        <span class="description"><?php echo esc_html__( 'Select the custom color.', 'cairo' ); ?></span>
            <br />
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="meta-color"><?php echo esc_html__( 'Label Category Text Color', 'cairo' ); ?></label></th>
        <td>
        <div id="colorpicker">
            <input type="text" name="cat_text[catText]" class="colorpicker" size="3" style="min-width:75px; width:20%; text-align:left;" value="<?php echo (isset($cat_text['catText'])) ? $cat_text['catText'] : ''; ?>" />
        </div>
            <br />
        <span class="description"><?php echo esc_html__( 'Select the custom color.', 'cairo' ); ?></span>
            <br />
        </td>
    </tr>
    <?php
  }
  add_action('category_edit_form_fields','cairo_extra_category_fields_background_color');

  function cairo_save_extra_category_fileds( $term_id ) {

      if ( isset( $_POST['cat_meta'] ) ) {
          $t_id = $term_id;
          $cat_meta = get_option( "category_$t_id");
          $cat_keys = array_keys($_POST['cat_meta']);
              foreach ($cat_keys as $key){
              if (isset($_POST['cat_meta'][$key])){
                  $cat_meta[$key] = $_POST['cat_meta'][$key];
              }
          }
          //save the option array
          update_option( "category_$t_id", $cat_meta );
      }
      if ( isset( $_POST['cat_text'] ) ) {
          $t_id = $term_id;
          $cat_text = get_option( "category_$t_id");
          $cat_keys = array_keys($_POST['cat_text']);
              foreach ($cat_keys as $key){
              if (isset($_POST['cat_text'][$key])){
                  $cat_text[$key] = $_POST['cat_text'][$key];
              }
          }
          //save the option array
          update_option( "category_$t_id", $cat_text );
      }
  }
  add_action ('edited_category', 'cairo_save_extra_category_fileds');
  add_action('created_category', 'cairo_save_extra_category_fileds', 11, 1);


  /*------------- CATEGORY COLOR END -------------*/
