<?php
/**
 * @file views-view-grid.tpl.php
 * Default simple view template to display a rows in a grid.
 *
 * - $rows contains a nested array of rows. Each row contains an array of
 *   columns.
 *
 * @ingroup views_templates
 */
?>
<?php

/**
 * Responsive template using ZURB Foundation.
 */

// Get the number of columns set by the view.
$view_column_number = count($rows[0]);
// Calculate the width of the columns based on a 12-column Foundation grid.
$foundation_grid_columns = 12;
$foundation_grid_column_width = ($foundation_grid_columns / $view_column_number);
// Round the column width value just in case the view is using a number of columns not dividing the Foundation grid evenly (a 5-column view grid for example).
if (is_float($foundation_grid_column_width)) {
  $foundation_grid_column_width = floor($foundation_grid_column_width);
  $foundation_grid_column_extra_width = ($foundation_grid_columns - ($foundation_grid_column_width * $view_column_number));
  // Add an extra div/column to fill the Foundation grid evenly. 
  $foundation_grid_column_extra = '<div class="large-' . $foundation_grid_column_extra_width . ' columns"></div>';
}
// Translate results into Foundation classes.
$foundation_grid_column_classes = 'large-' . $foundation_grid_column_width . ' medium-4 small-12 columns';

?>
<?php if (!empty($title)) : ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>
<div class="<?php print $class; ?>"<?php print $attributes; ?>>
    <?php foreach ($rows as $row_number => $columns): ?>
      <div class="row <?php print $row_classes[$row_number]; ?>">
        <?php foreach ($columns as $column_number => $item): ?>
          <div class="<?php print $foundation_grid_column_classes; ?> <?php print $column_classes[$row_number][$column_number]; ?>">
            <?php print $item; ?>
          </div>
        <?php endforeach; ?>
        <?php if (is_float($foundation_grid_column_width)) : ?><?php print $foundation_grid_column_extra; ?><?php endif; ?>
      </div>
    <?php endforeach; ?>
</div>
