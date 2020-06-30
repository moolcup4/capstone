<!-- otherorder.php에서 결제하기 눌렀을 때 -->
<?php header("content-type:text/html; charset=utf-8");
  $connect=mysqli_connect('localhost','root','dgu1234!','kiosk'); //DB연결
   // 쿼리 전송 
   // $query="delete from user";
   // $query = "delete from user order by product_price desc limit 1"

  #얼굴은 등록 되어있는데, 처음 주문하는 사람 일 때 (안드로이드 사진으로 얼굴을 처음 등록한 사람)
   // $var_value = $_GET['varname'];

   $query="delete from user where name='unknown' ";
   $query2="delete from customer";
   $query3="delete from temp";
   // $query2="insert into user values($var_value)"

   $result = mysqli_query($connect, $query);
   if($result === false){
       echo mysqli_error($connect);
   }

   $result2 = mysqli_query($connect, $query2);
   if($result2 === false){
       echo mysqli_error($connect);
   }
   
   $result3 = mysqli_query($connect, $query3);
   if($result3 === false){
       echo mysqli_error($connect);
   }
   // echo $sql;
   
?>


   <script>
   // window.alert('쿼리가 정상적으로 전송 되었습니다. ^^*');
   location.href='./complete.php';
   window.close();
   </script>
