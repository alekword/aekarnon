<div class="panel panel-default">
    <div class="panel-heading">
            <span class='glyphicon glyphicon-print'></span> รายงานยอดขายรายปี
    </div>
            <div class="panel-body">
              <br>
              <form method="POST" action="">
                  <?php 
                    /*************************** LIST YEAR NO Repeat *****************************/
                    $list_year = "SELECT closing_date FROM closing ORDER BY closing_date DESC";
                    $result = mysql_query($list_year);
                    $_SESSION['year'] = array();
                    while(list($year) = mysql_fetch_row($result)){
                        $y_explode = explode("/", $year); // Explode Year                      
                        if(!in_array($y_explode[2],$_SESSION['year'])){
                            $_SESSION['year'][] = $y_explode[2]; // Keep Value in Session
                        }
                    }
                    /*****************************************************************************/
                  ?>
                  <b>เลือกปี : </b><select style="margin: 5px;" onchange="this.form.submit()" name="year">
                      <option value="ทุกปี">ทุกปี</option>
                      <?php
                        for($i = 0; $i < count($_SESSION['year']); $i++){
                          echo "<option value='",$_SESSION['year'][$i],"'";if($_POST['year'] == $_SESSION['year'][$i]){echo "selected='selected'"; } echo "'>",$_SESSION['year'][$i] ,"</option>";                          
                        }
                      ?>
                  </select>
              </form>


              <?php 
              /***** Choss All Year And First Load *****/
                if(empty($_POST['year']) OR $_POST['year'] == "ทุกปี"){
                  $_SESSION['sum'] = array();
                  for($i = 0; $i < count($_SESSION['year']); $i++){
                    $year = $_SESSION[year][$i];
                    $sum = "SELECT SUM(closing_price) FROM closing WHERE closing_date LIKE '%$year'";
                    $result = mysql_query($sum);
                    list($sum_price) = mysql_fetch_row($result);
                    $_SESSION['sum'][] = $sum_price;
                  }
                /***** Choss One Year *****/
                }else if($_POST['year']){
                  $year = $_POST['year'];
                  $sum = "SELECT SUM(closing_price) FROM closing WHERE closing_date LIKE '%$_POST[year]'";
                  list($sum_price) = mysql_fetch_row(mysql_query($sum));
                }
              ?>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          <?php 
            /***** Choss All Year And First Load *****/
             if(empty($_POST['year']) OR $_POST['year'] == "ทุกปี"){
                echo " ['Year', 'Sales'],";               
                for($i = 0; $i < count($_SESSION['year'])-1; $i++){
                    $sum = $_SESSION['sum'][$i];
                    $year = $_SESSION['year'][$i];
                    echo " ['$year',  $sum],";
                }
                //ตำแหน่งสุดท้าย
                $c_sum = count($_SESSION['sum'])-1;
                $sum = $_SESSION['sum'][$c_sum];
                $year = $_SESSION['year'][$c_sum];
                echo " ['$year',  $sum]";

            /***** Choss One Year *****/
             }else if($_POST['year']){
                echo " ['Year', 'Sales'],
                      ['$year', $sum_price]";
             }
          ?>
         
        ]);

        var options = {
          title: 'รายงานยอดขายรายปี (<?php echo $_POST[year];?>)',
          hAxis: {title: 'Year', titleTextStyle: {color: 'red'}}
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>


                  <div id="chart_div" style="width: 900px; height: 500px;"></div>
            </div>
</div>

