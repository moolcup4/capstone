<?php header("content-type:text/html; charset=utf-8");
   $connect=mysqli_connect('localhost','root','dgu1234!','kiosk'); //DB연결
   
   $temper = $_POST['menu']; #ICE L 3 caramel 2800
   #caramel ICE S 2 2900
   $temp = explode(" ",$temper);

   $temper=$temp[0];
   $size=$temp[1];
   $amount=$temp[2];
   
   if (count($temp)>= 6) {
      $product_name=$temp[3].' '.$temp[4];
      $product_price=$temp[5];
   }
   else{
      $product_name=$temp[3];  
      $product_price=$temp[4];
   }  
   
   $regdate=date("Y/m/d  H:i:s",time()); //날짜,시간
   // $regdate=date(time()); //날짜,시간
   $value = (int)$product_price * (int)$amount;
   $product_price = $value;
   // echo $temper;
   // echo $size;
   // echo $amount;
   // echo $product_name;
   // echo $product_price;
   // echo $regdate
    
   // 쿼리 전송 
   $query="insert into user(product_name,temper,size,amount,product_price,regdate) values('$product_name','$temper','$size','$amount','$product_price','$regdate')";
   
   $result = mysqli_query($connect, $query);
   if($result === false){
       echo  mysqli_error($connect);
   }
   // mysql_close(); //끝내기
   // echo $sql;
   
?>


   <script>
   // window.alert('쿼리가 정상적으로 전송 되었습니다. ^^*');
   // location.href='./index.php';
   window.close();
   </script>
