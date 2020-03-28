<?php 
session_start();
        if(isset($_POST['username_member'])){
				//connection
                  include("condb.php");
				//รับค่า user & m_password_member
                  $username_member = $_POST['username_member'];
                  $password_member = md5($_POST['password_member']);
				//query 
                  $sql="SELECT * FROM tbl_member
                  WHERE  username_member='".$username_member."' 
                  AND  password_member='".$password_member."' ";

                  // echo $sql;

                  // exit;

                  $result = mysqli_query($condb,$sql);



                  // echo mysqli_num_rows($result);

                  // exit;
				
                  if(mysqli_num_rows($result)==1){

                      $row = mysqli_fetch_array($result);

                      $_SESSION["member_id"] = $row["member_id"];
                      //$_SESSION["m_name"] = $row["m_name"];
                      $_SESSION["user_level_member"] = $row["user_level_member"];

                      if($_SESSION["user_level_member"]=="member"){  //ถ้าเป็น member ให้กระโดดไปหน้า user_page.php
                        //echo 'R U MEMBER';

                        //insert login log
                 $ref_member_id = $_SESSION["member_id"];  
                 
                 // echo 'ref_m_id = '.$ref_m_id;
                 // exit;     

                $sql2 = "INSERT INTO tbl_login_member
                (
                ref_member_id
                )
                VALUES
                (
                $ref_member_id
                )
                ";

          $result2 = mysqli_query($condb, $sql2) or die ("Error in query: $sql " . mysqli_error());

          // echo $sql2;

          // exit; 
                       Header("Location: member/");

                      }

                  }else{
                    echo "<script>";
                        echo "alert(\" username หรือ  password ไม่ถูกต้อง\");"; 
                        echo "window.history.back()";
                    echo "</script>";

                  }

        }else{


             Header("Location: index.php"); //user & m_password_member incorrect back to login again

        }
?>