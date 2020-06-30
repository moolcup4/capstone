
 <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <?php 
       $connect=mysqli_connect('localhost','root','dgu1234!','kiosk'); //DB연결
       

       $temper = $_POST['menu']; #ICE L 3 caramel 2800
         #caramel ICE S 2 2900
       echo $temper;
       $temp = explode(" ",$temper);

       $temper1=$temp[0];
       $temper2=$temp[1];
       $temper3=$temp[2];
       $temper4=(int)$temp[3];
       $temper5=(int)$temp[4];
       $regdate=date("Y/m/d  H:i:s",time()); //날짜,시간
       $temper7=$temp[7];

       
       // // 쿼리 전송 
       $query="insert into user(product_name,temper,size,amount,product_price,regdate, name) values('$temper1', '$temper2', '$temper3', '$temper4', '$temper5', '$regdate','$temper7')";

       $query2="delete from customer";
       
       $result = mysqli_query($connect, $query);
       if($result === false){
           echo  mysqli_error($connect);
       }
       $result2 = mysqli_query($connect, $query2);
       if($result2 === false){
          echo mysqli_error($connect);
       }

       // mysql_close(); //끝내기
       // echo $sql;
       
    ?>



   <script>
   // window.alert('쿼리가 정상적으로 전송 되었습니다. ^^*');
   location.href='./index.php';
   window.close();
   </script>
