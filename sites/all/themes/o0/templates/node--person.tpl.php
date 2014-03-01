<?php
/**
 * @file
 * 'Person' content type.
 * 'Person' node template.
 *
 */
?>
<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <header>
    <?php print render($title_prefix); ?>
    <?php if (!$page): ?>
      <h2<?php print $title_attributes; ?> class="node-title title"><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
    <?php endif; ?>
    <?php print render($title_suffix); ?>

    <?php if ($display_submitted): ?>
      <div class="meta submitted">
        <?php //print $user_picture; ?>
        <?php //print $submitted; ?>
      </div>
    <?php endif; ?>

    <div class="meta">
    </div>
  </header>
  
  <div class="node-content clearfix"<?php print $content_attributes; ?>>
    <?php
      // Hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
    ?>

    <?php if (!empty($content['field_person_image'])): ?>
      <?php print render($content['field_person_image']); ?>
      <?php /* <div class="field field-name-field-person-image field-type-image"><div class="field-items"><div class="field-item"><a href="<?php print image_style_url('person_image_modal_fullscreen', $node->field_person_image[$node->language][0]['uri']); ?>" class="colorbox-inline"><img typeof="foaf:Image" src="<?php print image_style_url('person_image_node', $node->field_person_image[$node->language][0]['uri']); ?>" alt="" /></a></div></div></div> */ ?>
    <?php endif; ?>

    <?php if (!empty($content['body'])): ?>
      <?php print render($content['body']); ?>
    <?php endif; ?>

    <h3>Skills</h3>
    <?php if (!empty($content['field_person_skill'])): ?>
      <h4>Web technologies</h4>
      <div class="field field-name-field-person-skill field-type-field-collection clearfix">
        <script type="text/javascript">
          // Build the array containing the data for the chart.
          var chart_person_skill_1__chartData = [
            <?php foreach($content['field_person_skill']['#items'] as $entity_uri) :
              $field_collection_item = entity_load('field_collection_item', $entity_uri);
              foreach($field_collection_item as $field_collection_object) : ?>
                <?php if ($field_collection_object->field_person_skill_skill && $field_collection_object->field_person_skill_level): ?>
                  {
                    "skill": "<?php print $field_collection_object->field_person_skill_skill['und'][0]['value']; ?>",
                    "level": <?php print $field_collection_object->field_person_skill_level['und'][0]['value']; ?>
                  },
                <?php endif; ?>
            <?php endforeach; endforeach; ?>
          ];

          // Build the chart.
          AmCharts.ready(function() {
            var chart_person_skill_1__chart = new AmCharts.AmSerialChart();
            chart_person_skill_1__chart.dataProvider = chart_person_skill_1__chartData;
            chart_person_skill_1__chart.categoryField = "skill";
            chart_person_skill_1__chart.startDuration = 1;
            chart_person_skill_1__chart.creditsPosition = "top-right";

            var chart_person_skill_1__graph = new AmCharts.AmGraph();
            chart_person_skill_1__graph.valueField = "level";
            chart_person_skill_1__graph.type = "column";
            chart_person_skill_1__graph.lineColor = "rgb(135, 206, 235)";
            chart_person_skill_1__graph.lineAlpha = 0;
            chart_person_skill_1__graph.fillAlphas = 0.8;
            chart_person_skill_1__graph.balloonText = "[[category]]: <b>[[value]]</b>";
            chart_person_skill_1__chart.addGraph(chart_person_skill_1__graph);

            var chart_person_skill_1__categoryAxis = chart_person_skill_1__chart.categoryAxis;
            chart_person_skill_1__categoryAxis.autoGridCount  = false;
            chart_person_skill_1__categoryAxis.gridCount = chart_person_skill_1__chartData.length;
            chart_person_skill_1__categoryAxis.gridPosition = "start";
            chart_person_skill_1__categoryAxis.autoWrap = true;
            chart_person_skill_1__categoryAxis.labelRotation = 0;

            var chart_person_skill_1__valueAxis = new AmCharts.ValueAxis();
            chart_person_skill_1__valueAxis.minimum = 0;
            chart_person_skill_1__valueAxis.maximum = 100;
            chart_person_skill_1__valueAxis.unit = "%";
            chart_person_skill_1__valueAxis.autoGridCount = false;
            chart_person_skill_1__chart.addValueAxis(chart_person_skill_1__valueAxis);

            chart_person_skill_1__chart.write("chart-person-skill-1");
          });
        </script>
        <div id="chart-person-skill-1" class="chart chart-person-skill amcharts"></div>
      </div>
    <?php endif; ?>

    <?php if (!empty($content['field_person_skill_2'])): ?>
      <h4>Content management systems, etc.</h4>
      <div class="field field-name-field-person-skill field-type-field-collection clearfix">
        <script type="text/javascript">
          // Build the array containing the data for the chart.
          var chart_person_skill_2__chartData = [
            <?php foreach($content['field_person_skill_2']['#items'] as $entity_uri) :
              $field_collection_item = entity_load('field_collection_item', $entity_uri);
              foreach($field_collection_item as $field_collection_object) : ?>
                <?php if ($field_collection_object->field_person_skill_skill && $field_collection_object->field_person_skill_level): ?>
                  {
                    "skill": "<?php print $field_collection_object->field_person_skill_skill['und'][0]['value']; ?>",
                    "level": <?php print $field_collection_object->field_person_skill_level['und'][0]['value']; ?>
                  },
                <?php endif; ?>
            <?php endforeach; endforeach; ?>
          ];

          // Build the chart.
          AmCharts.ready(function() {
            var chart_person_skill_2__chart = new AmCharts.AmSerialChart();
            chart_person_skill_2__chart.dataProvider = chart_person_skill_2__chartData;
            chart_person_skill_2__chart.categoryField = "skill";
            chart_person_skill_2__chart.startDuration = 1;
            chart_person_skill_2__chart.creditsPosition = "top-right";

            var chart_person_skill_2__graph = new AmCharts.AmGraph();
            chart_person_skill_2__graph.valueField = "level";
            chart_person_skill_2__graph.type = "column";
            chart_person_skill_2__graph.lineColor = "rgb(135, 206, 235)";
            chart_person_skill_2__graph.lineAlpha = 0;
            chart_person_skill_2__graph.fillAlphas = 0.8;
            chart_person_skill_2__graph.balloonText = "[[category]]: <b>[[value]]</b>";
            chart_person_skill_2__chart.addGraph(chart_person_skill_2__graph);

            var chart_person_skill_2__categoryAxis = chart_person_skill_2__chart.categoryAxis;
            chart_person_skill_2__categoryAxis.autoGridCount  = false;
            chart_person_skill_2__categoryAxis.gridCount = chart_person_skill_2__chartData.length;
            chart_person_skill_2__categoryAxis.gridPosition = "start";
            chart_person_skill_2__categoryAxis.autoWrap = true;
            chart_person_skill_2__categoryAxis.labelRotation = 0;

            var chart_person_skill_2__valueAxis = new AmCharts.ValueAxis();
            chart_person_skill_2__valueAxis.minimum = 0;
            chart_person_skill_2__valueAxis.maximum = 100;
            chart_person_skill_2__valueAxis.unit = "%";
            chart_person_skill_2__valueAxis.autoGridCount = false;
            chart_person_skill_2__chart.addValueAxis(chart_person_skill_2__valueAxis);

            chart_person_skill_2__chart.write("chart-person-skill-2");
          });
        </script>
        <div id="chart-person-skill-2" class="chart chart-person-skill amcharts"></div>
      </div>
    <?php endif; ?>

  </div>

  <footer>
    <?php
      // Remove the "Add new comment" link on the teaser page or if the comment
      // form is being displayed on the same page.
      if ($teaser || !empty($content['comments']['comment_form'])) {
        unset($content['links']['comment']['#links']['comment-add']);
      }
      // Only display the wrapper div if there are links.
      $links = render($content['links']);
    ?>
    <?php if ($links): ?>
      <div class="link-wrapper">
        <?php print $links; ?>
      </div>
    <?php endif; ?>
  </footer>

  <section>
    <?php print render($content['comments']); ?>
  </section>

</article>
