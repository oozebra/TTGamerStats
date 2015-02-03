<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/navi.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src = "../js/loader.js"></script>
<script src = "../js/cookie.js"></script>
<script src = "../js/login.js"></script>












    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">

      // Load the Visualization API and the piechart package.
      google.load('visualization', '1.0', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Games');
        data.addColumn('number', 'Tournaments');
        data.addRows([
          ['Street Fighter', 5],
          ['Mortal', 3],
          ['Killer Instinct', 1],
          ['Naruto', 1],
          ['Tekken', 2]
        ]);

        // Set chart options
        var options = {'title':'Top Fighting Games',
                       'width':400,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>




















</head>


<body style=" background-image: url('../img/guile2.jpg');">
<!-- Start of Navibar -->
<div class="navibar">   
	
   
 <span class="opt">Home</span>
 <span class="opt">Stats </span>
 <span class="opt"><a href="user.html">Players</a></span>
 <span class="opt">Events</span>
 <span class="opt">About</span>
 <span id="reg_log" class="login">
 <img src="../img/go.gif" class="go" >
 <span class="loginMenu" >
 Username: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Password:<br />
 <input type="text" maxlength="12" /> &nbsp; <input type="text" maxlength="12"/>
 </span>
 </span> 

 </div>

 <!-- End of Navibar -->
 
 <div id="container"> <!--  start of container  -->

<div class="bar" style="background-color:black;"> <!-- start of sidebar  -->

<span > <!--  start of pic_container  -->
<span id="Org_img" style="float:left;">

<img src="../img/user.png" style="width:100px;  height:100px;" />


</span>
<div style="width:100px;  color:white; height:150px; float:right; font-size:large;">
<span id="Org_Name" style="height:75px; " > Gamer Tourneys </span>
<span id="Org_Name" style="height:75px; "> Sando</span>
</div>
</span><!--  end of pic_container  -->

<div class="side">Profile</div>
<div class="side">Tournaments</div>
<div class="side">Participants</div >
<div class="side">Statistics</div>

</div> <!--  end of sidebar  -->

</div> <!--  end of container  -->

<div id="chart_div" style="position: absolute;width: 400px;margin-left: 400px;margin-bottom: 0px;top: 0px;bottom: auto;margin-top: 150px;" ></div>
 <div style=" position:absolute; background-color: white; width: 700px; height: 125px; margin-left: 275px; top: 0px; margin-top: 600px;" ><?php include dirname(__DIR__) . "/php/get-data.php"; ?> </div>
 
  </body>
  </html>