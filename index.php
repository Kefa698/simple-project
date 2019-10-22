<?php
   if (isset($_POST['email']))
   {
       require "connect.php";
       $name=$_POST["name"];
     $email=$_POST["email"];
     $phone=$_POST["phone"];
     $course=$_POST["course"];
     $gender=$_POST["gender"];

       $target_dir = "photos/";
       $random= rand(1000000,5000000);
       $target_file = $target_dir . $random. basename($_FILES["photo"]["name"]);

      if (move_uploaded_file($_FILES['photo']['tmp_name'],$target_file))
       {
           //save in db

           $stm=$pdo->prepare("INSERT INTO `students`(`id`, `name`, `email`, `phone`, `photo`, `course`, `gender`, `reg_date`) VALUES (?,?,?,?,?,?,?,?)");
           $reg_date=date("Y-m-d");
           $stm->execute([null,$name,$email,$phone,$target_file,$course,$gender,$reg_date]);
       }
      else{
          die("it failed");
   }
   }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Register</title>
</head>
<body>
<?php require 'navbar.php'?>
   <div class="container">
       <div class="row justify-content-center">
           <div class="col-sm-5">
               <div class="card">

                   <div class="card-body">
                       <form action="index.php" method="post" enctype="multipart/form-data">
                           <div class="form-group">
                               <label for="name">Full Name</label>
                               <input type="text" class="form-control" required name="name" placeholder="full name">
                           </div>
                           <div class="form-group">
                               <label for="email">Email</label>
                               <input type="email" class="form-control" required name="email" placeholder="email">
                           </div>
                           <div class="form-group">
                               <label for="Phone">Phone number</label>
                               <input type="tel" class="form-control" required name="phone" placeholder="phone number">
                           </div>
                           <div class="form-group">
                               <label for="photo">Photo</label>
                               <input type="file" accept="image/" class="form-control-file border" required name="photo" placeholder="photo">
                           </div>
                           <div class="form-group">
                               <label for="Course">Select Course</label>
                             <select name="course" id="" class="form-control">
                               <option value="Python">Python</option>
                               <option value="Android">Android</option>
                               <option value="PHP">PHP</option>
                               <option value="Kotlin">Kotlin</option>
                               <option value="Data Science">Data Science</option>
                             </select>
                           </div>
                           <label for="gender">Choose Gender</label>
                           <div class="form-check">
                               <label class="form-check-label">
                                   <input type="radio" class="form-check-input"  value="Male" name="gender">Male
                               </label>
                           </div>
                           <div class="form-check">
                               <label class="form-check-label">
                                   <input type="radio" class="form-check-input" value="Female" name="gender">female
                               </label>
                           </div>
                           <button class="btn btn-primary">Submit</button>
                       </form>
                   </div>
               </div>
           </div>

       </div>
   </div>
</body>
</html>
