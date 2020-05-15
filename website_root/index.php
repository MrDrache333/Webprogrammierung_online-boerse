<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
<<<<<<< HEAD
    <style>
    .grid-container {
      display: grid;
      height: auto;
      align-content: space-between;
      grid-template-columns: auto auto auto;
      grid-gap: 10px;
    <!-- background-color #a8b8ff  -farbe des logos-->
      background-color: #989898
      padding:10px;
    }
    .gird-container > div {
      background-color: #a8b8ff;
      text-align: center;
      paddig: 20px 0;
      font-size : 30px;
    }
=======
    <link rel="stylesheet" href="styles/global.css">
    <title></title>
>>>>>>> 1f95d06339f65ca070f4c9c2a9758a44bbd260c7
  </head>
  <body>
    <?php include "header.html"; ?>
    <br>
    <br>


  <div class = "grid-container">

            <div>    <a href="search_job.php"> <image src="images/auto.jpg" widht="1000000" height="100" alt="Auto"> </a> </div>
            <div>    <a href="search_job.php"> <image src="images/garten.jpg" widht="1000000" height="100"> </a> </div>
            <div>    <a href="search_job.php">  <image src="images/haus.jpg" widht="100" height="100">        </a>    </div>
<div> <a href = "search_job.php"> <image src="images/dienstleistungen.jpg" width = "100" height = "100"> </a> </div>
            <div> <a href="search_job.php">  <image src="images/technik.jpg" widht="100" height="100"> </a></div>
            <div>  <a href="search_job.php"> <image src="images/fitness.jpg" widht="100" height="100"> </a></div>
            <div>   <a href="search_job.php"> <image src="images/taxi.jpg" widht="100" height="100"> </a></div>


</div>


    <?php include "footer.html"; ?>
  </body>
</html>
