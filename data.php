<?php
  
  require("connect.php");
  $error ='';
 if(isset($_POST['Send'])){
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["Image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $email =$_POST['email'];
    $favcolor =$_POST['favcolor'];
    $phone =$_POST['phone'];
    $birthday =$_POST['birthday'];
    $status =$_POST['status'];
    $family =$_POST['family'];
    $gender =$_POST['gender'];
    $languages = $_POST['languages'];
    $language =''; 
    foreach ($languages as $lang)
    {
      $language .= $lang.',';
    }
    //echo $languages[0];
    $Nationality =$_POST['Nationality'];
    $Role =$_POST['Role'];
    $Comment =$_POST['Comment'];
if(empty($FirstName)){
      $error = "Your Name is required";
      }else{
        if(!preg_match("/^[a-zA-Z ]*$/",$FirstName)){
         $error = "Name must be  letters only";
        }
        }
   if(empty($LastName)){
          $error = "Your Last Name is Required As well ";
         }else{
            if(!preg_match("/^[a-zA-Z ]*$/",$LastName )){
             $error = "Name must be  letters only";     
            }
            }
     if (empty($email)){
      $error = "Email is Required";
     }if (empty($email)){
      $error = "Email is Required";
     }else{
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
          $error = "Email Must Be a Valid Email Address";
     }
    } 
    if (empty($phone)){
      $error ="Your Phone Number is Required";
    }  
     if (empty($birthday)){
      $error = "Enter The Date of Your Birth";
     } 
     if (empty($gender)){
        $error = "Your Type of Gender is required";
       }
    if (empty($status)){
        $error = "Your Marital Status is required";
      }
    if (empty($family)){
        $error = "The Number of Your Family is required";
       }
    if (empty($Role)){
        $error = "Your Occupation is required";
       }
    if (empty($Nationality)){
        $error = "Your Nationality is required";
      }   
    if (empty($languages)){
        $error = "Enter The Language You Speak";
    } 
    if (strlen($Comment)>500){
        $error = "Comment Must Not be More Than 500 Characters";
       } 
if (empty($error)) {
 $sql= "SELECT * FROM  form WHERE email='$email'";
  $result= mysqli_query($conn, $sql);
if($result){
    $rows= mysqli_num_rows($result);
if ($rows == 0){
        $sql = "INSERT INTO gg(FirstName,LastName,Image,email,favcolor,phone,birthday,status,family,gender,language,Nationality,Role,Comment) VALUES 
        ('$FirstName','$LastName','$target_file','$email','$favcolor','$phone','$birthday','$status','$family','$gender','$language','$Nationality','$Role','$Comment')";
   $result = mysqli_query($conn,$sql);
 if ($result){
   $success = "<h1>Your Form Has Been Submitted Successfully</h1>";
   
 }else{
    $mistake = "Something went wrong"; }  
   
 }else {
    $mistake = "Email is Already on The Database";}
}else{
 $mistake = "Something Went Wrong";
}
    }
}
?>
<?php if (isset($success)):?>
<?php
        echo $success;
        ?>
 <?php endif?> 
<?php if (isset($mistake)):?>
 <div class="error">
     <h1>
       <?php 
       echo $mistake;
       ?>
      </h1>
    </div>  
    <?php endif?>
<?php if (!empty($error)){?><h1><?php echo $error;?></h1><?php }?>
