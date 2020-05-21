<?php

session_start();
include('database/dbconfig.php');

//----admin_registration----
if(isset($_POST['signup_btn']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $user_type = $_POST['user_type'];
    $password = $_POST['password'];
    $password_confirmation = $_POST['password_confirmation'];
    $default_image = "placeholder.jpg";
    //----check_duplicate_data----
    $query = "SELECT * FROM ct_admin WHERE username == '$username'";
    $result = mysqli_query($dbconfig, $query);
    if ($result) 
    {
        $_SESSION['status'] = "That username is taken,Try another.";
        header('Location:register.php');
    }
    else 
    {
        if( $password === $password_confirmation )
        {
            $hash = password_hash($password, PASSWORD_BCRYPT); //---Password_BCRYPT---

            $sql = "INSERT INTO ct_admin (username, email, password, images, user_type)
            VALUES ('$username', '$email', '$hash', '$default_image', '$user_type')";

            if($dbconfig->query($sql) === TRUE)
            {
                $_SESSION['success'] = "Admin Profile Added";
                $_SESSION["username"] = $username; //---SessionStart_with_Username---
                $_SESSION["usertype"] = $user_type; //---set User_type---
                  
                header('Location:dashboard.php');
            }
            else
            {
                $_SESSION['status'] = "Admin Profil Not Added";
                header('Location:register.php');
            }
        }   
        else
        {
            $_SESSION['status'] = "Password and Confirm_password dosen't Match";
            header('Location:register.php');
        }   
    }   
}
//---ADMIN_Login---
if(isset($_POST["admin_login"]))  
{  
    if(empty($_POST["email"]) || empty($_POST["password"]))  
    {  
        echo '<script>alert("Both Fields are required")</script>';  
    }  
    else
    {  
        $email = mysqli_real_escape_string($dbconfig, $_POST["email"]);
        $password = mysqli_real_escape_string($dbconfig, $_POST["password"]);  
        $query = "SELECT * FROM ct_admin WHERE username = '$username' or email='$email'";
        $result = mysqli_query($dbconfig, $query);

        if(mysqli_num_rows($result) > 0)  
        {  
            while($row = mysqli_fetch_array($result))  
            {
                if($row['user_type'] == "1" || $row['user_type'] == "2")
                {     
                    if(password_verify($password, $row["password"]))  
                    {  
                        $_SESSION["username"] = $row["username"]; //---SessionStart_with_Username---
                        $_SESSION["usertype"] = $row["user_type"]; //---set User_type---  
                        header("location:dashboard.php");  
                    }  
                    else  
                    {  
                        $_SESSION['status'] = "That Username is taken. Try another.";
                        header("location:login.php"); 
                    }
                }
                elseif($row['usertype'] == "user")
                {
                    header("location : bolg.php"); //---redirect-to-blog.php---
                }
                else
                {
                    header("location:login.php");
                    $_SESSION['status'] = "That username is taken. Try another.";
                }      
            }  
        }  
        else  
        {  
            //echo '<script>alert("Wrong User Details")</script>'; 
            $_SESSION['status'] = "Wrong User Details";
            header('Location:login.php'); 
        }  
    }  
} 
//---Update_admin_info---
if(isset($_POST['Update_admin_info']))
{      
    $name = $_POST['name'];
    $username = $_SESSION['username'];
    $email = $_POST['email'];
    $image = $_SESSION["images"];
    $photo =  $_FILES["photo"]["name"]; 
    
    $sql = "UPDATE ct_admin SET username='$name',email='$email', images='$photo' WHERE username='$username'";
    $sql_run = $dbconfig->query($sql);

    if($sql_run)
    {   
        $default_image = "placeholder.jpg";
        if($default_image != $image )
        {
            unlink("img/imageDirectory/$image");
        }
        move_uploaded_file($_FILES["photo"]["tmp_name"],"img/imageDirectory/" . $_FILES["photo"]["name"]);
        $_SESSION['success'] = "User_Info updated";
        $_SESSION["username"] = $name; //---SessionStart_with_Username---
        
        header('Location: profile.php');
    }
    else 
    {
        $_SESSION['status'] = "User_Info Not Updated";
        header('Location: profile.php');
    }
}
//----Update_admin_password----
if(isset($_POST['Update_admin_password'])){

    $old_password = $_POST['old_password'];
    $username = $_SESSION['username'];
    $password = $_POST['password'];
    $password_confirmation = $_POST['password_confirmation'];

    $query = "SELECT * FROM ct_admin  WHERE username='$username'";
    $query_run = mysqli_query($dbconfig, $query);

    if( $password === $password_confirmation )
    {
        if(mysqli_num_rows($query_run) > 0)
        {
            while($row = mysqli_fetch_array($query_run))  
            {
                if($row["user_type"] == "1" || $row["user_type"] == "2" || $row["user_type"] == "3")
                {
                    if(password_verify($old_password, $row["password"]))  
                    {      
                        $hash = password_hash($password, PASSWORD_BCRYPT);

                        $sql="UPDATE ct_admin SET password='$hash' WHERE username='$username'";
                        $result = $dbconfig->query($sql);
                        if($result)
                        {
                            echo "updated";
                            $_SESSION['success'] = "Password has been updated";
                            // header('Location: profile.php' );
                        }
                    }  
                    else  
                    {                     
                        echo "hello";
                        $_SESSION['status'] = "User data is not updated";
                        // header('Location: profile.php' ); 
                    }
                }
                else
                {             echo "hi";
                    $_SESSION['status'] = "User data is not updated";                  
                    // header('Location: profile.php' );
                }
            }        
        }
    }
}
//----Delete_admin_profile----
if(isset($_POST['delete_admin_profile']))
{
    $username = $_SESSION['username'];
    $password = $_POST['password'];
    $image = $_SESSION["images"];
    //echo $password ;

    $query = "SELECT * FROM ct_admin  WHERE username='$username'";
    $query_run = mysqli_query($dbconfig, $query);

    if(mysqli_num_rows($query_run) > 0)
    {
        while($row = mysqli_fetch_array($query_run))  
        {
            if($row["user_type"] == "1" || $row["user_type"] == "2" || $row["user_type"] == "3")
            {
                if(password_verify($password, $row["password"]))  
                {      
                    $hash = password_hash($password, PASSWORD_BCRYPT);

                    $sql="DELETE FROM ct_admin WHERE username='$username'";
                    $result = $dbconfig->query($sql);
                    if($result)
                    {
                        $default_image = "placeholder.jpg";
                        if($default_image != $image )
                        {
                            unlink("img/imageDirectory/$image");
                        }
                        session_destroy();
                        header("Location: login.php");
                    }
                }  
                else  
                {                     
                    $_SESSION['status'] = "Please Enter password correct...";
                    header('Location: profile.php' ); 
                }
            }
            else
            {          
                $_SESSION['status'] = "You'r not allowed to delete profile...";                  
                header('Location: profile.php' );
            }
        }        
    }
}
//----create_role----
if(isset($_POST['create_role']))
{
    $name=$_POST['name'];
    $description=$_POST['description'];
        
    $query=mysqli_query($dbconfig, "insert into  ct_role (name,description) value('$name','$description')");
    if ($query) 
    {   
        header('Location: role.php' );
        echo "<script>alert('Service has been added.');</script>"; 
        echo "<script>window.location.href = 'add-services.php'</script>";   
    $msg="";
    }
    else
    {
        header('Location: role.php' );
    echo "<script>alert('Something Went Wrong. Please try again.');</script>";  	
    }
}
//----update_role---
if(isset($_POST['update_role']))
{
    $id = $_POST['edit_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    
    $sql = "UPDATE ct_role SET name='$name',description='$description' WHERE id='$id'";
    $sql_run = $dbconfig->query($sql);

    if($sql_run)
    {   
        $_SESSION['success'] = "Role updated";
        
        header('Location: role.php');
    }
    else 
    {
        $_SESSION['success'] = "Role Not Updated";
        header('Location: role.php');
    }
}
//----delete_role----
if(isset($_POST['delete_role']))
{
    $id = $_POST['delete_id'];

    $sql="DELETE FROM ct_role WHERE id='$id'";

    $query_run = $dbconfig->query($sql);

    if($query_run)
        {
            $_SESSION['success'] = "your data is deleated";
            header('Location: role.php');
        }
        else
        {
            $_SESSION['status'] = "your data is not deleated";
           header('Location: role.php');
        }
}
//----Create_user----
if(isset($_POST['create_user']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $user_type = $_POST['user_type'];
    $password = $_POST['password'];
    $password_confirmation = $_POST['password_confirmation'];
    $default_image = "placeholder.jpg";
    $photo =  $_FILES["photo"]["name"];
    //----check_duplicate_data----
    $duplicate=mysqli_query($dbconfig,"select * from ct_admin where email='$email' or password='$password' or username='$username'");
    if (mysqli_num_rows($duplicate)>0) 
    {
        $_SESSION['status'] = "That username is taken,Try another.";
        header('Location : register.php');
    }
    else 
    {
        if( $password === $password_confirmation )
        {
            $hash = password_hash($password, PASSWORD_BCRYPT); //---Password_BCRYPT---

            $sql = "INSERT INTO ct_admin (username, email, password, images, user_type)
            VALUES ('$username', '$email', '$hash', '$photo', '$user_type')";

            if($dbconfig->query($sql) === TRUE)
            {
                move_uploaded_file($_FILES["photo"]["tmp_name"],"img/imageDirectory/" . $_FILES["photo"]["name"]);
                $_SESSION['success'] = "Admin Profile Added";
                header('Location:user.php');
            }
            else
            {
                $_SESSION['status'] = "Admin Profil Not Added";
                header('Location:user.php');
            }
        }   
        else
        {
            $_SESSION['status'] = "Password and Confirm_password dosen't Match";
            header('Location:user.php');
        }   
    }   
}
//----add_device----
if(isset($_POST['add_device'])) 
{ 
    $device_ip = $_POST['device_ip'];
    $duplicate=mysqli_query($dbconfig,"select * from ct_device_info where device_ip='$device_ip'");
    if (mysqli_num_rows($duplicate)>0) 
    {
        header('Location: device.php');
        $_SESSION['status'] = "your data is duplicate";
    echo "<script>alert('Device is already added in the Database..!')</script>";
    //echo "<script>window.location = '../device/adddevice.php'</script>";
    }else 
    {
        $sql = "INSERT INTO ct_device_info (device_ip)
        VALUES ('$device_ip')";
    
        if ($dbconfig->query($sql) === TRUE) 
        {
            echo "<script>alert('Device is Succesfully added in the Database..!')</script>";
            echo "<script>window.location = 'device.php'</script>";       
            echo "Error: " . $sql . "<br>" . $dbconfig->error;
            header('Location: device.php');
            $_SESSION['status'] = "your data is inserted";
        }
        else
        {
            $_SESSION['status'] = "your data is not deleated";
           header('Location: device.php');
        }
    }
    $dbconfig->close();
} 
//----remove_device----
if(isset($_POST['remove_device']))
{
    $id = $_POST['device_id'];

    $sql="DELETE FROM ct_device_info WHERE id='$id'";

    $query_run = $dbconfig->query($sql);

    if($query_run)
    {
        header('Location: device.php');
        $_SESSION['status'] = "Device successfully Removed";
    }
    else
    {
        header('Location: device.php');
        $_SESSION['status'] = "Device not Removed";
    }
}

//----register_user_information_with_fringerprint----
if(isset($_POST['finish'])) 
{  

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $date = $_POST['date'];
    $email = $_POST['email'];
    $smob = $_POST['smob'];
    $pmob = $_POST['pmob'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $pin = $_POST['pin'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $device_ip = $_POST['device_ip'];
    //-------------------------------
    $photo =  $_FILES["photo"]["name"];
    

    $sql = "INSERT INTO ct_register ( images,firstname, lastname, date, email, smob, pmob, gender, address, pin, state, city, device_ip)
    VALUES ('$photo','$firstname','$lastname','$date','$email','$smob','$pmob','$gender','$address','$pin','$state','$city','$device_ip')";

    if (mysqli_query($dbconfig, $sql))
    {
        $firstname=$_POST['firstname'];
        chdir("dataset");
        mkdir($firstname);
        //----------------
        $path_image="$firstname"."/";
        move_uploaded_file($_FILES["photo"]["tmp_name"], $path_image . $_FILES["photo"]["name"]);
        //----------------
        $_SESSION['success'] = "User registration is successfully done!";
        header('Location: user_list.php');
    }
    else
    {
        $_SESSION['status'] = "Failed to register user Information";
       header('Location: user_list.php');
    }
}
//----update_user_information_with_fringerprint----
if(isset($_POST['register_user_information']))
{

}
//----remove_user_information_with_fringerprint----
if(isset($_POST['register_user_profile']))
{
    {
        $id = $_POST['delete_id'];
        //$firstname = $_POST['firstname'];
    
        $sql="DELETE FROM ct_register WHERE id='$id'";
    
        $query_run = $dbconfig->query($sql);
    
        if($query_run)
        {
            // unlink("dataset/'.$row['firstname'].'/'.$row['images'].'");
            header('Location: user_list.php');
            $_SESSION['success'] = "User information successfully Removed";
        }
        else
        {
            header('Location: user_list.php');
            $_SESSION['status'] = "Failed to remove user Information";
        }
    }
}
//----generate_report_between_date----
if(isset($_POST['generate_report']))
{

}
//----update_about-us----
if(isset($_POST['update_about-us']))
{
    $pagetitle=$_POST['pagetitle'];
    $pagedes=$_POST['pagedes'];

    $query=mysqli_query($dbconfig,"update ct_blog set PageTitle='$pagetitle',PageDescription='$pagedes' where  PageType='aboutus'");
    if ($query) 
    {
    //  $msg="About Us has been updated.";
    $_SESSION['success'] = "About Us has been updated.";
    header('Location: about_us.php');
    } 
    else
    {
     // $msg="Something Went Wrong. Please try again";
    $_SESSION['status'] = "Something Went Wrong. Please try again";
    header('Location: about_us.php');
    }
}
//----update_contact-us----
if(isset($_POST['update_contact-us']))
{
    $bpmsaid=$_SESSION['bpmsaid'];
    $pagetitle=$_POST['pagetitle'];
    $pagedes=$_POST['pagedes'];
    $email=$_POST['email'];
    $mobnumber=$_POST['mobnumber'];
    $timing=$_POST['timing'];
     
    $query=mysqli_query($dbconfig,"update ct_blog set PageTitle='$pagetitle',Email='$email',MobileNumber='$mobnumber',Timing='$timing',PageDescription='$pagedes' where  PageType='contactus'");
    if ($query) 
    {
    // $msg="Contact Us has been updated.";
    $_SESSION['success'] = "Contact Us has been updated.";
    header('Location: contact_us.php');
    }
    else
    {
    // $msg="Something Went Wrong. Please try again";
    $_SESSION['status'] = "Something Went Wrong. Please try again";
    header('Location: contact_us.php');
    }
}
if(isset($_POST['delete_entry']))
{
    $id = $_POST['delete_id'];

    $sql="DELETE FROM ct_user_entry WHERE id='$id'";

    $query_run = $dbconfig->query($sql);

    if($query_run)
    {
        $_SESSION['success_del'] = "your data entry is deleated";
        header('Location: btw_date.php');
    }
    else
    {
        $_SESSION['status_del'] = "your data entry is not deleated";
        header('Location: btw_date.php');
    }
}
?>