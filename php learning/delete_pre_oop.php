<?php
    $conn = new mysqli("localhost","root","","tasin");
    if($conn->connect_error){
        die("failed");
    }
    if(isset($_REQUEST['submit'])){
        $sql = "delete from student where id = ?";
        $result=$conn->prepare($sql);
        if($result){
            $result->bind_param('i',$id);
            $id = $_REQUEST['id'];
            $result->execute();
            echo $result->affected_rows."Row affected";
        }
    }

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
        <div class="container">
            <div class="row">
            <?php 
                
                //  query 
                $sql = "select * from student";
                //  prepare
                $result = $conn->prepare($sql);
                //bind
                $result->bind_result($id,$name,$roll,$address);
                //execute
                $result->execute();
                //store result
                $result->store_result();
                if($result->num_rows>0){
                    echo "<table class=\"table\">";
                    echo "<thead>";
                        echo "<tr>";
                            echo "<th>ID</th>";
                            echo "<th>Name</th>";
                            echo "<th>Roll</th>";
                            echo "<th>Address</th>";
                            echo "<th>Action</th>";
                        echo "</tr>";
                    echo "</thead>";

                    echo "<tbody>";
                    while($result->fetch()){
                        echo "<tr>";
                                echo "<td>".$id."</td>";
                                echo "<td>".$name."</td>";
                                echo "<td>".$roll."</td>";
                                echo "<td>".$address."</td>";
                                echo '<td><form action="" method="POST"><input type="hidden" name="id" value='.$id.'><input type="submit" class ="btn btn-sm btn-danger" name="submit" value="Delete"></form></td>';
                            echo "</tr>";
                    }
                    echo "</body>";
                }
                else{
                    echo "0 result";
                }
            ?>
            </div>
        </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>