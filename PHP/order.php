<!DOCTYPE HTML>
<!--  -->

<html>

<head>
    <title>캡딱두</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.dropotron.min.js"></script>
    <script src="js/skel.min.js"></script>
    <script src="js/skel-layers.min.js"></script>
    <script src="js/init.js"></script>
  
    <noscript>
        <link rel="stylesheet" href="css/skel.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/style-wide.css" />
    </noscript>

</head>

<body>
<!-- <body onload="setTimeout(function(){location.href='index.php'}, 5000)"> -->
    
    <?php 
        $var_value = $_GET['varname'];
    ?>

    <!-- Wrapper -->
    <div class="wrapper style1">

        <!-- Header -->
        <div id="header" class="skel-panels-fixed">
            <div id="logo">
                <h1><a href="index.php">DONGGUK CAFE</a></h1>
                <span class="tag">by 캡딱두</span>
            </div>
            <nav id="nav">
                <ul>
                    <li class="active"><a href="./index.php">Homepage</a></li>
                </ul>
            </nav>
        </div>

        <!-- Extra -->

        <div id="extra">
            <div class="container-fluid">

                    <div class="container">
                        <section>
                            <header class="major">
                                <div id="footer" class="wrapper style2"><br>
                        <form action='./delete_unknown.php' name='form' method="post">
                    <p><br>

                    <input class="button2 large" type="submit" value="삭제하기">
                    
                </form> <br><br><br>
        <div id="checkcart" class="container">
            <section>
                <header class="major">
                    <h1 style="font-Size:3em">주문내역</h1>
                    <span class="byline">주문내역을 확인해주세요 !</span>
                </header>
                <!-- ---------------------------------------- -->
                <table class="table">
                        <tr>
                            <th style="color:black; font-weight: bold">상품명</th>
                            <th style="color:black; font-weight: bold">온도</th>
                            <th style="color:black; font-weight: bold;">사이즈</th>
                            <th style="color:black; font-weight: bold">수량</th>
                            <th style="color:black; font-weight: bold">가격</th>
                            <th style="color:black; font-weight: bold">구매시간</th>  
                        </tr>

                <?php
                    $conn=mysqli_connect('localhost','root','dgu1234!','kiosk');
                    $sql = "select * from user where name='unknown' order by regdate desc limit 10";
                    $result = mysqli_query($conn, $sql);

                    while($row = mysqli_fetch_array($result)){
                        echo '<tr><td>'.$row['product_name'].'</td>';   
                        echo '<td>'.$row['temper'].'</td>';
                        echo '<td>'.$row['size'].'</td>';
                        echo '<td>'.$row['amount'].'</td>';
                        echo '<td>'.$row['product_price'].'</td>';
                        echo '<td>'.$row['regdate'].'</td></tr>';
                    }
                  ?>     

                </table>
            </section>
            <br>



                     <br><br><br><br><br>
                
                <form action='./payment.php?varname=<?php echo $var_value ?>' name='form' method="post"><br><br><br>
                    <input class="button3 large" type="submit" style="color:white; text-decoration:none;" value="결제하기"><br><br>
                </form>
              
        </div>
    </div>
                        </section>
                    </div>
            </div>
        </div>
    </div>



    <!-- Footer -->
    <div id="footer" class="wrapper style2">
        <div class="container">
            <section>
                <header class="major">
                   <!--  <h2>주문내역</h2>
                    <span class="byline">주문내역을 확인해주세요 !</span> -->
                </header>
                <!-- ---------------------------------------- -->
                <table>


                </table>



            </section>
        </div>
    </div>

    <!-- Copyright -->
    <div id="copyright">
        <div class="container">
            <div class="copyright">
                <p><a>DONGGUK CAFE</a>
                    <a></a> 
                    <a>캡딱두</a></p>
                <ul class="icons">
                </ul>
            </div>
        </div>
    </div>

</body>

</html>