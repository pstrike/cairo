<?php
$footerwidgetcolumn = ot_get_option('footer_bottom_area');

// Widget Footer One Columns
if ($footerwidgetcolumn == 'onecolumns') { ?>
<div class="col-md-12 col-sm-12 col-xs-12">
  <?php dynamic_sidebar("cairo_footer_bottom_1"); ?>
</div>
<?php }

// Widget Footer Tow Columns
elseif ($footerwidgetcolumn == 'towcolumns') { ?>
<div class="col-md-6 col-sm-12 col-xs-12">
  <?php
  $footersidebarOne = dynamic_sidebar("cairo_footer_bottom_1");
    dynamic_sidebar( $footersidebarOne );
  ?>
</div>
<div class="col-md-6 col-sm-12 col-xs-12">
  <?php
  $footersidebarTwo = dynamic_sidebar("cairo_footer_bottom_2");
  if (is_active_sidebar($footersidebarTwo)) {
    dynamic_sidebar( $footersidebarTwo );
  }
  ?>
</div>
<?php }

// Widget Footer Three Columns
elseif ($footerwidgetcolumn == 'threecolumns') { ?>
<div class="col-md-4 col-sm-12 col-xs-12">
  <?php
  $footersidebarOne = dynamic_sidebar("cairo_footer_bottom_1");
  if (is_active_sidebar($footersidebarOne)) {
    dynamic_sidebar( $footersidebarOne );
  }
  ?>
</div>
<div class="col-md-4 col-sm-12 col-xs-12">
  <?php
  $footersidebarTwo = dynamic_sidebar("cairo_footer_bottom_2");
  if (is_active_sidebar($footersidebarTwo)) {
    dynamic_sidebar( $footersidebarTwo );
  }
  ?>
</div>
<div class="col-md-4 col-sm-12 col-xs-12">
  <?php
  $footersidebarTheree = dynamic_sidebar("cairo_footer_bottom_3");
  if (is_active_sidebar($footersidebarTheree)) {
    dynamic_sidebar( $footersidebarTheree );
  }
  ?>
</div>
<?php }

// Widget Footer Four Columns
elseif ($footerwidgetcolumn == 'fourcolumns') { ?>
<div class="col-md-3 col-sm-12 col-xs-12">
  <?php
  $footersidebarOne = dynamic_sidebar("cairo_footer_bottom_1");
  if (is_active_sidebar($footersidebarOne)) {
    dynamic_sidebar( $footersidebarOne );
  }
  ?>
</div>
<div class="col-md-3 col-sm-12 col-xs-12">
  <?php
  $footersidebarTwo = dynamic_sidebar("cairo_footer_bottom_2");
  if (is_active_sidebar($footersidebarTwo)) {
    dynamic_sidebar( $footersidebarTwo );
  }
  ?>
</div>
<div class="col-md-3 col-sm-12 col-xs-12">
  <?php
  $footersidebarTheree = dynamic_sidebar("cairo_footer_bottom_3");
  if (is_active_sidebar($footersidebarTheree)) {
    dynamic_sidebar( $footersidebarTheree );
  }
  ?>
</div>
<div class="col-md-3 col-sm-12 col-xs-12">
  <?php
  $footersidebarFour = dynamic_sidebar("cairo_footer_bottom_4");
  if (is_active_sidebar($footersidebarFour)) {
    dynamic_sidebar( $footersidebarFour );
  }
  ?>
</div>
<?php }
