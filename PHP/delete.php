<!-- otherorder.php에서 삭제하기 눌렀을 때 -->
<?php header("content-type:text/html; charset=utf-8");
  $connect=mysqli_connect('localhost','root','dgu1234!','kiosk'); //DB연결
   // 쿼리 전송 
   // $query="delete from user";
   // $query = "delete from user order by product_price desc limit 1"
   $query="delete from user order by regdate desc limit 1";
   $result = mysqli_query($connect, $query);
   if($result === false){
       echo mysqli_error($connect);
   }

   $query2="delete from temp order by regdate desc limit 1";
   $result2 = mysqli_query($connect, $query2);
   if($result2 === false){
       echo mysqli_error($connect);
   }
   
   echo $sql;
   $var_value = $_GET['varname'];
?>


   <script>
   // window.alert('쿼리가 정상적으로 전송 되었습니다. ^^*');
   location.href='./otherorder.php?varname=<?php echo $var_value ?>';
   window.close();
   </script>
