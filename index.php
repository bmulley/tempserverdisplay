<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Home Temperature</title>
  <meta name="description" content="Temperature">
  <meta name="author" content="Joe">
  <meta http-equiv="refresh" content="15">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="bmulley.css">
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-134648541-1"></script>
  <script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-134648541-1');
  </script>

</head>
<body>
<?php
$require_once("/home/config.php");
$con = mysqli_connect($host,$username,$password,$database);

if (mysqli_connect_errno())
        {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

$result = mysqli_query($con, "Select * FROM temperature WHERE id IN( SELECT max(id) from temperature group by name) order by name");

?>

<div class="container-fluid", style="text-align: center">
        <div class="row">
                        <?php
                                while($row = mysqli_fetch_array($result)) {
                                        echo '<div class="col-md-3 card cardbox">';
                                                echo '<div class="card-header">';
                                                        echo $row['name'];
                                                echo '</div>';
                                                echo '<div class="card-body">';
                                                        echo $row['temp'];
                                                echo '</div>';
                                                echo '<div class="card-footer">';
                                                        echo $row['time'];
                                                echo '</div>';
                                        echo '</div>';

                                }
                        ?>


        </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script>
        $( document ).ready(function() {
                console.log( "ready!" );
        });
</script>

</body>
</html>
<?php
mysqli_close($con);
?>
