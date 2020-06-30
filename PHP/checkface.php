<!DOCTYPE HTML>

<html>

<head>
    <title>캡딱두</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.dropotron.min.js"></script>
    <script src="js/skel.min.js"></script>
    <script src="js/skel-layers.min.js"></script>
    <script src="js/init.js"></script>
    <script src="js/app.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <noscript>
        <link rel="stylesheet" href="css/skel.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/style-wide.css" />
    </noscript>

  
  <!-- <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->

    <style>
        #border:hover {
            border: 5px solid #6b6b6b;
            ;
        }
    </style>
    
</head>

<body>
    

               
    <!-- Wrapper -->
    <div class="wrapper style1">

        <!-- Header -->
        <div id="header" class="skel-panels-fixed">
            <div id="logo">
                <h1 id="checkcart2" style="font-size : 2.8em"><a href="./index.php">
                    Dongguk Cafe

                </a></h1>
                <span class="tag">by 캡딱두</span>
            </div>
            <nav id="nav">
                <ul>
                    <li class="active"><a href="./index.php">Homepage</a></li>
                </ul>
            </nav>
        </div>


        
        <div id="banner" class="container">
            <section>




                <p style="font-size : 3em; color:black;" > [
<!-- customer에 저장된 이름을 가져온다 -->
                <?php
                    $conn=mysqli_connect('localhost','root','dgu1234!','kiosk');
                    $sql = "select name from customer where not name='unknown' group by name having count(*) = (select max(mycount) from (select name,count(*) as mycount from customer group by name) as result);";
                    $result = mysqli_query($conn, $sql);

                    if($row = mysqli_fetch_array($result)){
                        $temp = $row['name'];
                        echo '<tr><td>'.$temp.'</td>'; 
                    }

                    ##수정필요
                    #unknown이 아닌 name값 개수 만큼 count 증가
                    // while($row = mysqli_fetch_array($result)){
                    //     if ($row['name']!='unknown'){
                    //            $temp = $row['name'];
                    //            echo '<tr><td>'.$temp.'</td>'; 
                    //            break;
                    //     }
                    // }   

                  ?>   ] 님이 맞으신가요?</p>
               <!--  <a onclick="show('ice');" class="button xlarge">Iced</a>　
                <a onclick="show('hot');" class="button xlarge">Hot</a>　 -->

<!-- 그 이름을 check_yes페이지로 매개변수로 넘김 -->
                <a class="button xlarge" href="./check_yes.php?varname=<?php echo $temp ?>"> 



                    <br><br>YES<br><br><br> </a> <br><br><br>
                <a class="button xlarge" href="./othermenu.php?varname=<?php echo 'unknown' ?>">  <br><br>  NO  <br><br><br> </a>
            </section>
        </div>
        <!-- Extra -->
       

    
</body>


</html>


