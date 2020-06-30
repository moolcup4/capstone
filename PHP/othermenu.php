<!DOCTYPE HTML>

<html>

<head>
    <title>캡딱두</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <!-- 5초 뒤에 사이트로 이동 -->
    <!-- <meta http-equiv="refresh" content="5; url=http:./checkface.php"> -->

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
    <?php
        $var_value = $_GET['varname'];
        // if($var_value=null){
            // $var_value = $_GET['varname2'];
        // }
    ?>

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
               <!--  <p style="font-size : 4.3em; color:black;" >사진을 선택해도 주문이 가능합니다!</p> -->
               <!--  <a onclick="show('ice');" class="button xlarge">Iced</a>　
                <a onclick="show('hot');" class="button xlarge">Hot</a>　 -->
                <br><br><br>
                
                <a class="button xlarge" href="./otherorder.php?varname=<?php echo $var_value ?>
                "> <br><br><br>장바구니<br><br><br></a>
            </section>
        </div>
        <!-- Extra -->
        <div id="extra">
            <div id="menu_list" class="container">
            
                <div id="prac1" class="row no-collapse-1">
                    <section class="4u">
                        <div id="border" data-name="(ICED) Americano" data-price=2500>
                            <a class="image featured">
                                <img src="images/(ICED) Americano.PNG" data-name="(ICED) Americano" data-price=2500>
                            </a>
                            <div class="box" data-name="(ICED) Americano" data-price=2500>
                                <p style="font-size:2.5em;" id="menu" data-name="(ICED) Americano" data-price=2500>Americano<br> 2500원
                                </p>
                                <!-- <a data-name="(ICED) Americano" data-price=2500 class="button mid_large">장바구니</a> -->
                            </div>
                        </div>
                    </section>

                    <section class="4u">
                        <div id="border" data-name="(ICED) Cappuccino" data-price=2800>
                            <a class="image featured">
                                <img src="images/(ICED) Cappuccino.PNG" data-name="(ICED) Cappuccino" data-price=2800>
                            </a>
                            <div class="box" data-name="(ICED) Cappuccino" data-price=2800>
                                <p style="font-size:2.5em;" id="menu" data-name="(ICED) Cappuccino" data-price=2800>Cappuccino<br> 2800원
                                </p>
                                <!-- <a data-name="(ICED) Cappuccino" data-price=2800 class="button mid_large">장바구니</a> -->
                            </div>
                        </div>
                    </section>

                    <section class="4u">
                        <div id="border" data-name="(ICED) CafeLatte" data-price=2700>
                            <a class="image featured">
                                <img src="images/(ICED) CafeLatte.PNG" data-name="(ICED) CafeLatte" data-price=2700>
                            </a>
                            <div class="box" data-name="(ICED) CafeLatte" data-price=2700>
                                <p style="font-size:2.5em;" id="menu" data-name="(ICED) CafeLatte" data-price=2700>CafeLatte<br> 2700원
                                </p>
                                <!-- <a data-name="(ICED) CafeLatte" class="button mid_large" data-price=2700>장바구니</a> -->
                            </div>
                        </div>
                    </section>

                </div>
 
     

                <div id="prac2" class="row no-collapse-1">
                    <section class="4u">
                        <div id="border" data-name="(ICED) Vanila Latte" data-price=3000>
                            <a class="image featured">
                                <img src="images/(ICED) Vanila Latte.PNG" data-name="(ICED) Vanila Latte" data-price=3000>
                            </a>
                            <div class="box" data-name="(ICED) Vanila Latte" data-price=3000>
                                <p style="font-size:2.5em;" id="menu" data-name="(ICED) Vanila Latte" data-price=3000>Vanila Latte<br> 3000원
                                </p>
                                <!-- <a data-name="(ICED) Vanila Latteo" class="button mid_large" data-price=3000>장바구니</a> -->
                            </div>
                        </div>
                    </section>

                    <section class="4u">
                        <div id="border" data-name="(ICED) Caramel" data-price=2700>
                            <a class="image featured">
                                <img src="images/(ICED) Caramel.PNG" data-name="(ICED) Caramel" data-price=2700>
                            </a>
                            <div class="box" data-name="(ICED) Caramel" data-price=2700>
                                <p style="font-size:2.5em;" id="menu" data-name="(ICED) Caramel" data-price=2700>Caramel<br> 2700원
                                </p>
                                <!-- <a data-name="(ICED) Caramel" class="button mid_large" data-price=2700>장바구니</a> -->
                            </div>
                        </div>
                    </section>

                    <section class="4u">
                        <div id="border" data-name="(ICED) Cafe Mocha" data-price=2900>
                            <a class="image featured">
                                <img src="images/(ICED) Cafe Mocha.PNG" data-name="(ICED) Cafe Mocha" data-price=2900>
                            </a>
                            <div class="box" data-name="(ICED) Cafe Mocha" data-price=2900>
                                <p style="font-size:2.5em;" id="menu" data-name="(ICED) Cafe Mocha" data-price=2900>Cafe Mocha<br> 2900원
                                </p>
                                <!-- <a data-name="(ICED) Cafe Mocha" class="button mid_large" data-price=2900>장바구니</a> -->
                            </div>
                        </div>
                    </section>
                </div>

            </div>
        </div>

        <script>
            // var ProductList = document.getElementById("ProductList");
            var myWindow;

            function test(name,price) {
                 // var popupX = (window.screen.width / 2) - (1400 / 2);
                 // var popupY = (window.screen.height / 2) - (2000 /2);
                var popupX = (window.screen.width);
                var popupY = (window.screen.height);
                myWindow = window.open(
                    "otherpopup.php?varname=<?php echo $var_value ?>", '_blank', "toolbar=no, left="+popupX+",top=200, scrollbars=yes, width=1400,height=2000"
                );
                myWindow.onload = function() {
                    myWindow.drink.innerText = name + " " + price + "원";
                };
            }
        </script>

        <!-- 메뉴영역 클릭시 팝업창 띄우기-->
        <script>
            menu_list.addEventListener("click", (e) => {
                var dataname = e.target.getAttribute("data-name");
                var dataprice = e.target.getAttribute("data-price");

                if (e.target.nodeName == "DIV" || "P" || "A") {
                    e.target.onclick = test(dataname,dataprice);
                }
            });
            
        </script>
  

        <br><br>
    </div>

    <script>
        // var myWindow2;
        function go() {
            var popupX = (window.screen.width / 2) - (1400 / 2);
            var popupY = (window.screen.height / 2) - (2000 /2);

            var popUrl = "complete.html"
            var popOption ="toolbar=no, left="+popupX+",top=200, scrollbars=yes, width=1400,height=2000"
            window.open(popUrl,popOption)

        }

        comple.addEventListener("click", (e) => {
            if (e.target.nodeName == "A") {
                e.target.onclick = go();
            }
        });
    </script>

    <script>
        $(document).ready(function() {
                // Add smooth scrolling to all links
                $("a").on('click', function(event) {
                    // Make sure this.hash has a value before overriding default behavior
                    if (this.hash !== "") {
                        // Prevent default anchor click behavior
                        event.preventDefault();
                        // Store hash
                        var hash = this.hash;
                        // Using jQuery's animate() method to add smooth page scroll
                        // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                        $('html, body').animate({
                            scrollTop: $(hash).offset().top
                        }, 800, function() {
                            // Add hash (#) to URL when done scrolling (default click behavior)
                            window.location.hash = hash;
                        });
                    } // End if
                });
            });
    </script>

    <br /><br /><br />
 

</body>


</html>
