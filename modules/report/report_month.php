<?php
    if($_POST['submit'] == "submit"){
        $_SESSION['startmonth'] = $_POST['startmonth'];
        $_SESSION['endmonth'] = $_POST['endmonth'];
    }else{
        $_SESSION['startmonth'] = "";
        $_SESSION['endmonth'] = "";
        $_SESSION['sum'] = "";
        $_SESSION['month'] = "";
    }
?>
<div class="panel panel-default">
    <div class="panel-heading">
            <span class='glyphicon glyphicon-print'></span> รายงานยอดขายรายเดือน
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
                  <table>
                      <tr><td align="right"><b>เลือกปี : </b></td><td><select style="margin: 5px;" name="year">
                      <?php
                        for($i = 0; $i < count($_SESSION['year']); $i++){
                          echo "<option value='",$_SESSION['year'][$i],"'";if($_POST['year'] == $_SESSION['year'][$i]){echo "selected='selected'"; } echo "'>",$_SESSION['year'][$i] ,"</option>";                          
                        }
                      ?>
                      </select></td></tr>

                    <tr><td align="right"><b>เลือกเดือน :</b></td><td><select style="margin: 5px;" name="startmonth">
                        <option value="">เลือกเดือนเริ่มต้น</option>
                        <?php
                          $month = array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฏาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
                          for($i = 0; $i < count($month); $i++){
                            echo "<option value='$month[$i]'";if($_SESSION['startmonth'] == $month[$i]){ echo " selected='selected'";} echo ">$month[$i]</option>";
                          }
                        ?>
                      </select>

                      <select style="margin: 5px;"  name="endmonth">
                        <option value="">เลือกเดือนสิ้นสุด</option>
                        <?php                         
                          for($i = 0; $i < count($month); $i++){
                            echo "<option value='$month[$i]'";if($_SESSION['endmonth'] == $month[$i]){ echo " selected='selected'";} echo ">$month[$i]</option>";
                          }
                        ?>
                      </select> 
                    &nbsp;<button type="submit" name="submit" value="submit" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-file"></span> view report</button></td></tr>
                  </table>
                 
                
              </form>


              <?php 
                  if($_POST['submit'] == "submit"){
                    if($_POST['startmonth'] == ""){
                      echo "<font color='red'>*กรุณาเลือกเดือนเริ่มต้น</font>";
                    }else if($_POST['endmonth'] == ""){
                      echo "<font color='red'>*กรุณาเลือกเดือนสิ้นสุด</font>";
                    }else{             
                     

                      $key_start = array_search("$_SESSION[startmonth]",$month);
                      $key_end = array_search("$_SESSION[endmonth]",$month);

                      $_SESSION['month'] = array(); // เก็บเดือนที่จะโชว์ใน graph
                      $_SESSION['sum'] = array(); // เก็บค่ารวมที่จะโชว์ใน graph
                      for($i = $key_start; $i <= $key_end; $i++){
                          $sql = "SELECT SUM(closing_price) FROM closing WHERE closing_date LIKE '%/$month[$i]/$_POST[year]%'";
                          list($sum) = mysql_fetch_row(mysql_query($sql));
                          $_SESSION['month'][] = $month[$i];
                          
                          /**** Check Variable Sum equal NULL ****/
                          if($sum == null){
                            $_SESSION['sum'][] = 0;
                          }else{
                            $_SESSION['sum'][] = $sum;
                          }
                          /**************************************/                         
                      } 

                                  

                    }
                  }
                ?>



<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          <?php   
                if($_POST['submit'] == "submit"){
                  echo " ['Year', 'Sales'],";             
                  for($i = 0; $i < count($_SESSION['sum'])-1; $i++){
                      $sum = $_SESSION['sum'][$i];
                      $month = $_SESSION['month'][$i];
                      echo " ['$month',$sum],";
                  }   
                  //ตำแหน่งสุดท้าย
                  $c_sum = count($_SESSION['sum'])-1;
                  $sum = $_SESSION['sum'][$c_sum];
                  $month = $_SESSION['month'][$c_sum];
                  echo " ['$month',  $sum]";
              }
          ?>
         
        ]);

        var options = {
          title: 'รายงานยอดขายรายเดือนประจำปี <?php echo $_POST[year];?>',
          hAxis: {title: 'Month', titleTextStyle: {color: 'red'}}
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>


                  <div id="chart_div" style="width: 100%; height: 500px;"></div>
            </div>
</div>