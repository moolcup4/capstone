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
                                <div id="footer" class="wrapper style2">
        <div id="checkcart" class="container"><br><br>
                           <input class="button2 large"  
                    value="다른 메뉴 주문" onclick="move();" ><br><br>
            <section>
                <header class="major">
                    <h1 style="font-Size:3em">[
                        <?php
                            // $conn=mysqli_connect('localhost','root','dgu1234!','kiosk');
                            // $sql = "select * from customer";
                            // $result = mysqli_query($conn, $sql);

                            // if ($row = mysqli_fetch_array($result)){
                            //     echo '<tr><td>'.$row['name'].'</td>';   
                                
                            // }

                            $var_value = $_GET['varname'];
                            echo $var_value;
                          ?>

                      ] 님의 선호 메뉴</h1>
                    <span class="byline">해당 메뉴로 바로 주문 가능합니다 !</span>
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
                //수정시작(1개만 출력하게)
                    $conn=mysqli_connect('localhost','root','dgu1234!','kiosk');
                    
                    // 이전 페이지에서 받은 이름을 가져온다.
                    $var_value = $_GET['varname'];
                    //안드로이드에서 선호메뉴를 가져온다
                    $sql = "select * from android where name='$var_value' order by regdate desc";

                    $result = mysqli_query($conn, $sql);

                    if($row = mysqli_fetch_array($result)){
                        $temp1 = $row['name'];
                        $temp2 = $row['menu'];
                        $temp3 = $row['temper'];
                        $temp4 = $row['size'];
                        $temp5 = $row['count'];
                        $temp6 = $row['price'];
                        $temp7 = $row['regdate'];

                        echo '<tr><td>'.$temp2.'</td>';   
                        echo '<td>'.$temp3.'</td>';
                        echo '<td>'.$temp4.'</td>';
                        echo '<td>'.$temp5.'</td>';
                        echo '<td>'.$temp6.'</td>';
                        echo '<td>'.$temp7.'</td></tr>'; 
                    }                   
                 
                    else{
                        $sql = "select * from user where name='$var_value' order by regdate desc";

                        $result = mysqli_query($conn, $sql);

                        if($row = mysqli_fetch_array($result)){
                            $temp1 = $row['product_name'];
                            $temp2 = $row['temper'];
                            $temp3 = $row['size'];
                            $temp4 = $row['amount'];
                            $temp5 = $row['product_price'];
                            $temp6 = $row['regdate'];
                            $temp7 = $row['name'];

                            echo '<tr><td>'.$temp1.'</td>';   
                            echo '<td>'.$temp2.'</td>';
                            echo '<td>'.$temp3.'</td>';
                            echo '<td>'.$temp4.'</td>';
                            echo '<td>'.$temp5.'</td>';
                            echo '<td>'.$temp6.'</td></tr>'; 
                        }                  
                    }
                    
                    

                  ?>    

                </table>
            </section>
            <br><br><br><br>

               <!--  <form action='./delete.php' name='form' method="post">
                    <p>

                    <input class="button2 large" type="submit" value="삭제하기">
                    
                </form> -->


                <br><br><br><br><br><br><br><br>
                <form action='./check_order.php' method="post">
                    <button id='sub' class="button3 large" type="submit" name=menu value='결제하기' 
                onclick="change();" ><span style="color:white; font-size:60px; font-weight:bold">결제하기   </span>
                </button>
                </form>

                 <!--  <a class="button2 large" href="complete.php" style="color:white; text-decoration:none;" onclick="update()";>결제하기</a>    -->


       <!--      <br><br><br> -->
              
        </div>
    </div>
                        </section>
                    </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        var temper1 = "<?php echo $temp1; ?>";
        var temper2 = "<?php echo $temp2; ?>";
        var temper3 = "<?php echo $temp3; ?>";
        var temper4 = "<?php echo $temp4; ?>";
        var temper5 = "<?php echo $temp5; ?>";
        var temper6 = "<?php echo $temp6; ?>";
        var temper7 = "<?php echo $temp7; ?>";

    function change() {
      
      document.getElementById("sub").value = temper1 + ' ' + temper2 + ' ' + temper3 + ' ' + temper4 + ' ' + temper5 + ' ' + temper6 + ' ' + temper7
      // product_name + ' ' + temper + ' ' + size + ' ' + amount + ' '+ product_price
    }


    </script>
 
    <script>
        function move(){
            location.href='./othermenu.php?varname=<?php echo $var_value ?>'
        }
    </script>

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