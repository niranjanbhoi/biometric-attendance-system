<?php

session_start();
include('../database/dbconfig.php');

//-------------Register----------
if(isset($_POST['registerbtn']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];
    $usertype = $_POST['usertype'];

    if( $password === $cpassword )
    {
        $sql = "INSERT INTO register (username,email,password,usertype)
            VALUES ('$username', '$email', '$password','$usertype')";

         $sql_run = mysqli_query($dbconfig, $sql);

         if($sql_run)
        {
            $_SESSION['success'] = "Admin Profil Added";
            header('Location: ../register.php');
        }
        else
        {
            $_SESSION['status'] = "Admin Profil Not Added";
           header('Location: ../register.php');
        }
    }   
    else
    {
        $_SESSION['status'] = "Password and Confirm password Dosenot match";
       header('Location: ../register.php');
    }
}
//--------------login-----------------
if(isset($_POST["login_btn"]))  
{  
     if(empty($_POST["username"]) || empty($_POST["password"]))  
     {  
          echo '<script>alert("Both Fields are required")</script>';  
     }  
     else  
     {  
          $username = mysqli_real_escape_string($dbconfig, $_POST["username"]);  
          $password = mysqli_real_escape_string($dbconfig, $_POST["password"]);  
          $query = "SELECT * FROM user WHERE username = '$username'";  
          $result = mysqli_query($dbconfig, $query);  
          if(mysqli_num_rows($result) > 0)  
          {  
               while($row = mysqli_fetch_array($result))  
               {
                    if($row['usertype'] == "admin")
                    {     
                        if(password_verify($password, $row["password"]))  
                        {  
                            //return true;  
                            $_SESSION["username"] = $username;  
                            header("location:../index.php");  
                        }  
                        else  
                        {  
                            //return false;  
                            $_SESSION['status'] = "That username is taken. Try another.";

                            header("location:../login.php"); 
                        }
                    }
                    elseif($row['usertype'] == "user")
                    {
                       // $_SESSION["username"] = $username;  
                        header("location:../../index.php"); 
                    }
                    else
                    {
                        header("location:../login.php");
                        $_SESSION['status'] = "That username is taken. Try another.";

                    }      
               }  
          }  
          else  
          {  
               echo '<script>alert("Wrong User Details")</script>';  
          }  
     }  
} 


//---------------signup------------------
if(isset($_POST['signup_btn']))
{
    $fname = $_POST['First_Name'];
    $lname = $_POST['Last_Name'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];
    $cpassword = $_POST['cpassword'];




    $duplicate=mysqli_query($dbconfig,"select * from user where email='$email' or password='$password'");
    if (mysqli_num_rows($duplicate)>0) 
    {
        $_SESSION['status'] = "That username is taken. Try another.";
        header('Location: ../signup.php');
    }else 
    {
    if( $password === $cpassword )
    {
        $hash = password_hash($password, PASSWORD_BCRYPT);

        $sql = "INSERT INTO user (fname, lname, username, password)
        VALUES ('$fname', '$lname', '$email', '$hash')";

         //$sql_run = mysqli_query($dbconfig, $sql);

         if($dbconfig->query($sql) === TRUE)
        {
            $_SESSION['success'] = "Admin Profil Added";
            header('Location: ../index.php');
        }
        else
        {
            $_SESSION['status'] = "Admin Profil Not Added";
           header('Location: ../signup.php');
        }
    }   
    else
    {
        $_SESSION['status'] = "Password and Confirm password Dosenot match";
       header('Location: ../signup.php');
    }   
}
}

//--------------update-------------------
if(isset($_POST['updatebtn'])){
    
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];
    $updateusertype = $_POST['update_usertype'];

    $sql="UPDATE register SET username='$username',email='$email',password='$password', usertype='$updateusertype' WHERE id='$id'";

    $result = $dbconfig->query($sql);

    if($result)
    {
        $_SESSION['success'] = "your data is updated";
        header('Location: ../register.php' );
    }
    else
    {
        $_SESSION['status'] = "your data is not updated";
        header('Location: ../register.php' );
    }

}




//----------------delete------------------
if(isset($_POST['delete_id']))
{
    $id = $_POST['delete_id'];

    $sql="DELETE FROM register WHERE id='$id'";

    $result = $dbconfig->query($sql);

    if($result)
        {
            $_SESSION['success'] = "your data is deleated";
            header('Location: ../register.php');
        }
        else
        {
            $_SESSION['status'] = "your data is not deleated";
           header('Location: ../register.php');
        }
}

//----------------add device----------------

if(isset($_POST['select'])) 
{ 
    $device_ip = $_POST['device_ip'];
    $duplicate=mysqli_query($dbconfig,"select * from add_device where device_ip='$device_ip'");
    if (mysqli_num_rows($duplicate)>0) 
    {
    echo "<script>alert('Device is already added in the Database..!')</script>";
    echo "<script>window.location = '../device/adddevice.php'</script>";
    }else 
    {
        $sql = "INSERT INTO device_info (device_ip)
        VALUES ('$device_ip')";
    
        if ($dbconfig->query($sql) === TRUE) 
        {
            echo "<script>alert('Device is Succesfully added in the Database..!')</script>";
            echo "<script>window.location = '../device/adddevice.php'</script>";       
            echo "Error: " . $sql . "<br>" . $dbconfig->error;
        }
        else
        {
            $_SESSION['status'] = "your data is not deleated";
           header('Location: ../device.php');
        }
    }
    $dbconfig->close();
} 

//----------------add fringerprint-------------
$user_id;
if(isset($_POST['submit'])) 
{   
    //------------------------------
    $First = $_POST['first'];
    $Last = $_POST['last'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $Class = $_POST['Class'];
    $email = $_POST['email'];
    $mob = $_POST['mob'];
    $pmob = $_POST['pmob'];
    $addr1 = $_POST['addr1'];
    $addr2 = $_POST['addr2'];
    $city = $_POST['city'];
    $pin = $_POST['pin'];
    $state = $_POST['state'];
    $Country = $_POST['Country'];
    $device_ip = $_POST['device_ip'];
    
    //------------------------------
    $user_name = $_POST['user_name'];
    $device_ip = $_POST['device_ip'];
    $duplicate=mysqli_query($dbconfig,"select * from user_info where user_name='$user_name'");
    if (mysqli_num_rows($duplicate)>0) 
    {
    echo "<script>alert('user_name is already added in the Database..!')</script>";
    echo "<script>window.location = '../student.php'</script>";
    }
    else 
    {
        /* $sql = "INSERT INTO user_info (user_name)
        VALUES ('$user_name')"; */

        $sql = "INSERT INTO `member` (`id`, `fname`, `lname`, `date`, `email`, `mob`, `pmob`, `gender`, `address`, `city`, `pincode`, `state`, `country`, `branch`, `class`)
             VALUES (NULL, '$First', '$Last', '$day,$month,$year', '$email', '$mob', '$pmob', '$gender', '$addr', '$city', '$pin', '$state', '$Country', '$Branch','$Class')";

        if ($dbconfig->query($sql) === TRUE) 
        {
            $user_id = $dbconfig->insert_id;
            echo "<script>alert('name is Succesfully added in the Database..!')</script>";
            echo "<script>window.location = '../student.php'</script>";        
        } 
        else 
        {
            echo "Error: " . $sql . "<br>" . $dbconfig->error;
        }
    }
    // for some fingerprint
    $duplicate=mysqli_query($dbconfig,"SELECT * from add_fingerprint WHERE device_ip=$device_ip");
    if (mysqli_num_rows($duplicate)>0) 
    {
        echo "<script>alert('device is already Busy..!')</script>";
        echo "<script>window.location = '../student.php'</script>";
    }
    else 
    {
        echo $user_id;
        $sql = "INSERT INTO add_fingerprint (device_ip, user_id)
        VALUES ('$device_ip', $user_id)";
    
        if ($dbconfig->query($sql) === TRUE) 
        {
            echo "<script>alert('device is Succesfully added ..!')</script>";
            echo "<script>window.location = '../student.php'</script>";        
        } 
        else 
        {
            echo "Error: " . $sql . "<br>" . $dbconfig->error;
            header('Location: ../student.php');
        }
    }

    $dbconfig->close();
} 
/* --------------about us--------------- */
if(isset($_POST['submit1']))
  {
    $pagetitle=$_POST['pagetitle'];
    $pagedes=$_POST['pagedes'];

    $query=mysqli_query($dbconfig,"update tblpage set PageTitle='$pagetitle',PageDescription='$pagedes' where  PageType='aboutus'");
    if ($query) 
    {
    //  $msg="About Us has been updated.";
    $_SESSION['success'] = "About Us has been updated.";
    header('Location: ../about-us.php');
    } 
    else
    {
     // $msg="Something Went Wrong. Please try again";
    $_SESSION['status'] = "Something Went Wrong. Please try again";
    header('Location: ../about-us.php');
    }
}
/*---------------- contact us-----------------*/

if(isset($_POST['submit2']))
  {
  	$bpmsaid=$_SESSION['bpmsaid'];
    $pagetitle=$_POST['pagetitle'];
    $pagedes=$_POST['pagedes'];
    $email=$_POST['email'];
    $mobnumber=$_POST['mobnumber'];
    $timing=$_POST['timing'];
     
    $query=mysqli_query($dbconfig,"update tblpage set PageTitle='$pagetitle',Email='$email',MobileNumber='$mobnumber',Timing='$timing',PageDescription='$pagedes' where  PageType='contactus'");
    if ($query) 
    {
    // $msg="Contact Us has been updated.";
    $_SESSION['success'] = "Contact Us has been updated.";
    header('Location: ../contact-us.php');
    }
    else
    {
    // $msg="Something Went Wrong. Please try again";
    $_SESSION['status'] = "Something Went Wrong. Please try again";
    header('Location: ../contact-us.php');
    }

  
}

?>













