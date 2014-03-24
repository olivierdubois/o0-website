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
      <div class="field field-name-field-person-image field-type-image"><div class="field-items"><div class="field-item"><a href="<?php print image_style_url('person_image_modal_fullscreen', $node->field_person_image['und'][0]['uri']); ?>" class="colorbox-inline"><img typeof="foaf:Image" src="<?php print image_style_url('person_image_head_node', $node->field_person_image['und'][0]['uri']); ?>" alt="<?php print $node->field_person_image['und'][0]['alt']; ?>" title="<?php print $node->field_person_image['und'][0]['title']; ?>" /></a></div></div></div>
    <?php endif; ?>

    <?php if (!empty($content['field_person_about'])): ?>
      <?php if ($node->field_person_about['und'][0]['safe_value']): ?>
        <?php print render($content['field_person_about']); ?>
      <?php else: ?>
        <div class="field field-name-field-person-about field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item" property="content:encoded"><p><?php print $node->field_person_about['und'][0]['safe_summary']; ?></p></div></div></div>
      <?php endif; ?>
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
            chart_person_skill_1__graph.balloonText = "[[category]]: [[value]]%";
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
            chart_person_skill_2__graph.balloonText = "[[category]]: [[value]]%";
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

    <?php if (!empty($content['field_person_chart_work'])): ?>
      <script type="text/javascript" src="http://www.amcharts.com/lib/3/pie.js"></script>
      <script type="text/javascript" src="http://www.amcharts.com/lib/3/themes/none.js"></script>
      <h4>A typical day at the office</h4>
      <div class="field field-name-field-person-chart-work field-type-file clearfix">
        <script type="text/javascript">
          // Build the array containing the data for the chart.
          var chart_person_chart_work_1__chartData = [
            <?php
              if (($handle = fopen($node->field_person_chart_work['und'][0]['uri'], 'r')) !== FALSE) {
                while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
                  $num = count($data);
                  print '{';
                  for ($c=0; $c < $num; $c++) {
                    if ($c==0) {
                      print '"title": "' . $data[$c] . '", ';
                    }
                    if ($c==1) {
                      print '"value": ' . $data[$c] . ', ';
                    }
                    if ($c==2) {
                      print '"color": "' . $data[$c] . '"';
                    }
                  }
                  print '},';
                }
                fclose($handle);
              }
            ?>
          ];

          // Build the chart.
          AmCharts.ready(function() {
            var chart_person_chart_work_1__chart = new AmCharts.AmPieChart();
            chart_person_chart_work_1__chart.dataProvider = chart_person_chart_work_1__chartData;
            chart_person_chart_work_1__chart.radius = "42%";
            chart_person_chart_work_1__chart.innerRadius = "60%";
            chart_person_chart_work_1__chart.titleField = "title";
            chart_person_chart_work_1__chart.valueField = "value";
            chart_person_chart_work_1__chart.colorField = "color";
            chart_person_chart_work_1__chart.startDuration = 1;
            chart_person_chart_work_1__chart.labelRadius = 20;
            chart_person_chart_work_1__chart.labelText = "[[title]]: [[value]]%";
            chart_person_chart_work_1__chart.labelsEnabled = false;
            chart_person_chart_work_1__chart.balloonText = "[[title]]: [[value]]%";
            chart_person_chart_work_1__chart.creditsPosition = "top-right";

            var chart_person_chart_work_1__legend = new AmCharts.AmLegend();
            chart_person_chart_work_1__legend.position = "right";
            chart_person_chart_work_1__legend.markerType = "circle";
            chart_person_chart_work_1__legend.markerSize = 20;
            chart_person_chart_work_1__legend.valueText = "";
            chart_person_chart_work_1__legend.valueWidth = 0;
            chart_person_chart_work_1__chart.addLegend(chart_person_chart_work_1__legend);

            chart_person_chart_work_1__chart.write("chart-person-chart-work-1");
          });
        </script>
        <div id="chart-person-chart-work-1" class="chart chart-person-chart amcharts" style=""></div>
      </div>
    <?php endif; ?>

    <?php if (!empty($content['field_person_chart_travel'])): ?>
    <h4>Cool places I had the chance to visit</h4>
    <div class="field field-name-field-person-chart-travel field-type-file clearfix">
      <script type="text/javascript">
        // SVG path for map marker icon.
        var targetSVG = "M9,0C4.029,0,0,4.029,0,9s4.029,9,9,9s9-4.029,9-9S13.971,0,9,0z M9,15.93 c-3.83,0-6.93-3.1-6.93-6.93S5.17,2.07,9,2.07s6.93,3.1,6.93,6.93S12.83,15.93,9,15.93 M12.5,9c0,1.933-1.567,3.5-3.5,3.5S5.5,10.933,5.5,9S7.067,5.5,9,5.5 S12.5,7.067,12.5,9z";

        AmCharts.ready(function() {
          var chart_person_chart_travel_1__map = new AmCharts.AmMap();
          chart_person_chart_travel_1__map.pathToImages = "/sites/all/libraries/ammap/ammap/images/";

          var dataProvider = {
            map: "worldLow",
            images: [
            <?php
              if (($handle = fopen($node->field_person_chart_travel['und'][0]['uri'], 'r')) !== FALSE) {
                while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
                  $num = count($data);
                  print '{';
                  print 'svgPath: targetSVG, ';
                  print 'zoomLevel: 5, ';
                  print 'scale: 0.75, ';
                  for ($c=0; $c < $num; $c++) {
                    if ($c==0) {
                      print 'title: "' . $data[$c] . '", ';
                    }
                    if ($c==1) {
                      print 'latitude: ' . $data[$c] . ', ';
                    }
                    if ($c==2) {
                      print 'longitude: ' . $data[$c] . '';
                    }
                  }
                  print '},';
                }
                fclose($handle);
              }
            ?>
            ]
          };

          chart_person_chart_travel_1__map.dataProvider = dataProvider;

          chart_person_chart_travel_1__map.areasSettings = {
            unlistedAreasColor: "rgb(217, 217, 217)",
            autoZoom: true
          };

          chart_person_chart_travel_1__map.imagesSettings = {
            color: "rgb(40, 179, 235)",
            rollOverColor: "rgb(102, 102, 102)",
            rollOverScale: 2,
            selectedColor: "rgb(51, 51, 51)",
            selectedScale: 2
          };

          chart_person_chart_travel_1__map.zoomControl = {
            buttonFillColor: "rgb(204, 204, 204)",
            buttonRollOverColor: "rgb(135, 206, 235)"
          };

          chart_person_chart_travel_1__map.write("chart-person-chart-travel-1");
        });
      </script>
      <div id="chart-person-chart-travel-1" class="chart chart-person-chart amcharts" style="width: 100%; height: 500px;"></div>
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
