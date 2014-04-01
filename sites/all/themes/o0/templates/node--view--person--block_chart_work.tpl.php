<?php
/**
 * @file
 * 'Person' content type.
 * 'Person' view ('Work chart' block).
 *
 */
?>
<article class="<?php print $classes; ?> node-<?php print $node->nid; ?> clearfix"<?php print $attributes; ?>>
  
  <div class="node-content clearfix"<?php print $content_attributes; ?>>

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
            // Disable pan feature for touch devices.
            chart_person_chart_work_1__chart.panEventsEnabled = false;

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

  </div>

</article>
