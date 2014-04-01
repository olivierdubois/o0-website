<?php
/**
 * @file
 * 'Person' content type.
 * 'Person' view ('Skills' block).
 *
 */
?>
<article class="<?php print $classes; ?> node-<?php print $node->nid; ?> clearfix"<?php print $attributes; ?>>
  
  <div class="node-content clearfix"<?php print $content_attributes; ?>>

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
            // Disable pan feature for touch devices.
            chart_person_skill_1__chart.panEventsEnabled = false;

            var chart_person_skill_1__graph = new AmCharts.AmGraph();
            chart_person_skill_1__graph.valueField = "level";
            chart_person_skill_1__graph.type = "column";
            chart_person_skill_1__graph.lineColor = "rgb(135, 206, 235)";
            chart_person_skill_1__graph.lineAlpha = 0;
            chart_person_skill_1__graph.fillAlphas = 0.8;
            chart_person_skill_1__graph.balloonText = "[[category]]: [[value]]%";
            chart_person_skill_1__chart.addGraph(chart_person_skill_1__graph);

            var chart_person_skill_1__categoryAxis = chart_person_skill_1__chart.categoryAxis;
            chart_person_skill_1__categoryAxis.autoGridCount  = false;
            chart_person_skill_1__categoryAxis.gridCount = chart_person_skill_1__chartData.length;
            chart_person_skill_1__categoryAxis.gridPosition = "start";
            chart_person_skill_1__categoryAxis.autoWrap = true;
            chart_person_skill_1__categoryAxis.labelRotation = 0;

            var chart_person_skill_1__valueAxis = new AmCharts.ValueAxis();
            chart_person_skill_1__valueAxis.labelFunction = formatValueAxis;
            chart_person_skill_1__valueAxis.minimum = 0;
            chart_person_skill_1__valueAxis.maximum = 100;
            chart_person_skill_1__valueAxis.unit = "%";
            chart_person_skill_1__valueAxis.autoGridCount = false;
            chart_person_skill_1__chart.addValueAxis(chart_person_skill_1__valueAxis);

            chart_person_skill_1__chart.write("chart-person-skill-1");
          });

          function formatValueAxis(value, formattedValue, chart_person_skill_1__valueAxis) {
            if (value === 0) { return "0"; }
            else if (value == 20) { return "Newbie"; }
            else if (value == 40) { return "Geek"; }
            else if (value == 60) { return "Pro"; }
            else if (value == 80) { return "Ninja"; }
            else if (value == 100) { return "Jedi"; }
            else { return ""; }
          }
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
            // Disable pan feature for touch devices.
            chart_person_skill_2__chart.panEventsEnabled = false;

            var chart_person_skill_2__graph = new AmCharts.AmGraph();
            chart_person_skill_2__graph.valueField = "level";
            chart_person_skill_2__graph.type = "column";
            chart_person_skill_2__graph.lineColor = "rgb(135, 206, 235)";
            chart_person_skill_2__graph.lineAlpha = 0;
            chart_person_skill_2__graph.fillAlphas = 0.8;
            chart_person_skill_2__graph.balloonText = "[[category]]: [[value]]%";
            chart_person_skill_2__chart.addGraph(chart_person_skill_2__graph);

            var chart_person_skill_2__categoryAxis = chart_person_skill_2__chart.categoryAxis;
            chart_person_skill_2__categoryAxis.autoGridCount  = false;
            chart_person_skill_2__categoryAxis.gridCount = chart_person_skill_2__chartData.length;
            chart_person_skill_2__categoryAxis.gridPosition = "start";
            chart_person_skill_2__categoryAxis.autoWrap = true;
            chart_person_skill_2__categoryAxis.labelRotation = 0;

            var chart_person_skill_2__valueAxis = new AmCharts.ValueAxis();
            chart_person_skill_2__valueAxis.labelFunction = formatValueAxis;
            chart_person_skill_2__valueAxis.minimum = 0;
            chart_person_skill_2__valueAxis.maximum = 100;
            chart_person_skill_2__valueAxis.unit = "%";
            chart_person_skill_2__valueAxis.autoGridCount = false;
            chart_person_skill_2__chart.addValueAxis(chart_person_skill_2__valueAxis);

            chart_person_skill_2__chart.write("chart-person-skill-2");
          });

          function formatValueAxis(value, formattedValue, chart_person_skill_2__valueAxis) {
            if (value === 0) { return "0"; }
            else if (value == 20) { return "Newbie"; }
            else if (value == 40) { return "Geek"; }
            else if (value == 60) { return "Pro"; }
            else if (value == 80) { return "Ninja"; }
            else if (value == 100) { return "Jedi"; }
            else { return ""; }
          }
        </script>
        <div id="chart-person-skill-2" class="chart chart-person-skill amcharts"></div>
      </div>
    <?php endif; ?>

  </div>

</article>
