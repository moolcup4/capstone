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
	<link rel="stylesheet" href="themes/alertify.core.css" />
	<link rel="stylesheet" href="themes/alertify.default.css" id="toggleCSS" />
	<meta name="viewport" content="width=device-width">

	<noscript>
		<link rel="stylesheet" href="css/skel.css" />
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/style-wide.css" />
	</noscript>


		<style>
		.button_gray {
		  background-color: gray;
		  border: none;
		  color: white;
		  padding: 400px 400px;
		  text-align: center;
		  font-size: 50px;
		  margin: 5px 7px;
		  opacity: 0.6;
		  transition: 0.3s;
		  display: inline-block;
		  text-decoration: none;
		  cursor: pointer;
		  border-radius: 12px;
		}
		#count{
			padding: 90px 90px;
			margin: 10px 20px;
			font-size: 80px;
			border-radius: 12px;
		}

		#type_blue{
			background-color: blue;
			padding: 170px 140px;
		}
		#type_red{
			background-color: red;
			padding: 170px 125px;
		}
		#type_black{
			background-color: black;
			padding: 300px 170px;
		}
		#button_장바구니{
			background-color: #ff7f00;
			padding: 160px 75px;
			margin: 20px -25px;
			color: black;
			font-family: Georgia;
		}
		#count{
			padding: 165px 180px;
			background: #000000;
			opacity: 1
		}
		
		.button_gray:hover {background-color: black;
		opacity: 1}



		</style>
		


</head>

<body style="background-color: white;">

	<?php $var_value = $_GET['varname']; ?>

		<div name="form" style="font-size:45px">
			<p style="text-align:center;" id="drink"></p>

			<form action='./othertest3.php?varname=<?php echo $var_value ?>' name='form' method="post">
	
		 	<div style="text-align:center;">
				<div>
					<!-- <input type='button' class="button popup" name="shot" value='Y'>　 -->
				<input id="type_black" type='button' class = "button_gray" name="size" value='S'>
				<input id="type_black" type='button' name="size" class="button_gray" value='M'>
				<input id="type_black" type='button' class="button_gray" name="size" value='L'></div>
				
				<input id="type_black" type='button' class="button_gray" name="+" value='+'>
				<input id="type_black" type='button' class="button_gray" name="-" value='-'>
				<input id="count" type='button' class="button_gray" 
				style="font-size:60px;" value='1' size='1'><br>

				<input id="type_red" type='button' class="button_gray" name="temper" value='HOT' > 
				<input id="type_blue" type='button' class="button_gray" name="temper" value='ICE' >　
				<button id="button_장바구니"  class="button_gray" 
				name=menu value='장바구니 담기' 
				onclick="change();" ><span style="color:white; font-size:60px; font-weight:bold">장바구니</span></button>
				
				</div>
		
			</form>
	
		</div>

			<script>
				// var name='americano'
				var size='S';
				var temper="ICE"
				var amount=1;
				document.querySelector("form").addEventListener("click", (e) => {
					var name = e.target.getAttribute("name");
					if (e.target.nodeName == "INPUT") {
						if (name == "size") {
							size = e.target.value;
						} else if (name == "temper") {
							temper = e.target.value;
						} else if (name == "+") {
							count.value++;
						} else if (name == "-" && count.value > 0) {
							count.value--;
						}
					}
				});

				function senditem() {
					setTimeout(function() {
						window.close();
					}, 2000);
				}
			</script>
		</div>

	<script>
    function change() {
      if (size && temper) {
            amount = count.value;
      }

      var temp = drink.innerText;
			temp_split = temp.split(' ') 

			if (temp_split.length>=4){
				product_name = temp_split[1] + ' ' + temp_split[2]
				product_price = temp_split[temp_split.length-1]
			}
			else{
				product_name = temp_split[1]
				product_price = temp_split[2]
			}

      document.getElementById("button_장바구니").value = temper + ' ' + size + ' ' + amount + ' ' + product_name + ' ' + product_price 
      // + ' ' + <?php $var_value ?>
     
    }
	</script>

	
	<script src="lib/alertify.min.js"></script>
	<script>
		function add_row() {
			var ProductList = opener.document.getElementById("ProductList");
			var row = ProductList.insertRow(ProductList.rows.length);
			var cell1 = row.insertCell(0);
			var cell2 = row.insertCell(1);
			var cell3 = row.insertCell(2);
			var cell4 = row.insertCell(3);
			var cell5 = row.insertCell(4);

			var temp = drink.innerText;
			temp_split = temp.split(' ') 

			if (temp_split.length>=4){
				product_name = temp_split[1] + ' ' + temp_split[2]
				product_price = temp_split[temp_split.length-1]
			}
			else{
				product_name = temp_split[1]
				product_price = temp_split[2]
			}

			cell1.innerText = product_name;
			cell2.innerText = temper;
			cell3.innerText = size;
			cell4.innerText = amount;
			cell5.innerText = product_price;
				
		}

		
	</script>

<script>
$("[name=menu]").on('click', function() {
			add_row();
			setTimeout(function(){window.close();}, 1200);

})
</script>

</body>

</html>
