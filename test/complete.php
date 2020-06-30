<!DOCTYPE HTML>

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

	<script>
		var myWindow;

		function test(name) {
			myWindow = window.open(
				"popup.php", '_blank', "toolbar=no,scrollbars=no,resizable=yes,left=300,width=650,height=800"
			);
			myWindow.onload = function() {
				myWindow.drink.innerText = name;
			};
		}


	</script>
</head>

<body onload="setTimeout(function(){location.href='index.php'}, 5000)">
 
	<div class="wrapper style1">

		<div id="header" class="skel-panels-fixed">
			<div id="logo">
				<h1><a href="index.php">DONGGUK CAFE</a></h1>
				<span class="tag">by 캡딱두</span>
			</div>
			<nav id="nav">
				<ul>
					<li class="active"><a href="index.php">Homepage</a></li>
				</ul>
			</nav>
		</div>


		<div id="extra">
			<div class="container-fluid">

					<div class="container">
						<section>
							<header class="major">
								<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
								<h1 style="text-align : center; font-size:50px ">Thank you for your order</h1>
								<span class="byline" style="text-align : center" >by 캡딱두  ! </span>
							</header>
							<!-- <p style="text-align:center">
								<a href="index.php" class="button medium">초기화면</a>
							</p>
 -->
						</section>
					</div>

			</div>

		</div>

	</div>

	<div id="footer" class="wrapper style2">
		<div class="container">
			<section>
				<header class="major">
					<h2>주문내역</h2>
					<span class="byline">주문내역을 확인해주세요 !</span>
				</header>
				<!-- ---------------------------------------- -->
				<table>


				</table>



			</section>
		</div>
	</div>

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
