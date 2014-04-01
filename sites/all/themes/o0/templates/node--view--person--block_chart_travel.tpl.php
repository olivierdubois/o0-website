<?php
/**
 * @file
 * 'Person' content type.
 * 'Person' view ('Travel chart' block).
 *
 */
?>
<article class="<?php print $classes; ?> node-<?php print $node->nid; ?> clearfix"<?php print $attributes; ?>>
  
  <div class="node-content clearfix"<?php print $content_attributes; ?>>

    <?php if (!empty($content['field_person_chart_travel'])): ?>
    <h4>Cool places I had the chance to visit</h4>
    <div class="field field-name-field-person-chart-travel field-type-file clearfix">
      <script type="text/javascript">
        // SVG path for map marker icon.
        var targetSVG = "M9,0C4.029,0,0,4.029,0,9s4.029,9,9,9s9-4.029,9-9S13.971,0,9,0z M9,15.93 c-3.83,0-6.93-3.1-6.93-6.93S5.17,2.07,9,2.07s6.93,3.1,6.93,6.93S12.83,15.93,9,15.93 M12.5,9c0,1.933-1.567,3.5-3.5,3.5S5.5,10.933,5.5,9S7.067,5.5,9,5.5 S12.5,7.067,12.5,9z";

        AmCharts.ready(function() {
          var chart_person_chart_travel_1__map = new AmCharts.AmMap();
          chart_person_chart_travel_1__map.pathToImages = "/sites/all/libraries/ammap/ammap/images/";
          // Disable pan feature for touch devices.
          chart_person_chart_travel_1__map.panEventsEnabled = false;

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

</article>
