<?php
//show all the data
require 'connect.php';
$stm=$pdo->prepare("select* from students");
$stm->execute([]);
$students=$stm->fetchAll();
//var_dump($students);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>Show</title>
</head>
<body>
<?php require 'navbar.php'?>
   <div class="container">
       <div class="row justify-content-center">
           <div class="col-sm-8">
               <table class="table table-striped">
                  <tr>
                      <th>ID</th>
                      <th>NAME</th>
                      <th>EMAIL</th>
                      <th>PHONE</th>
                      <th>COURSE</th>
                      <th>DETAILS</th>
                      <th>ACTION</th>
                  </tr>
                   <?php foreach ($students as $student):?>

                   <tr>
                       <td><?=$student->id ?></td>
                       <td><?=$student->name ?></td>
                       <td><?=$student->email ?></td>
                       <td><?=$student->phone ?></td>
                       <td><?=$student->course ?></td>
                       <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal<?=$student->id?>">More</td>
                       <td><a href="delete.php?id=<?=$student->id?>" class="btn btn-danger btn-sm">x</a></td>
                   </tr>


                       <!-- The Modal -->
                       <div class="modal" id="myModal<?=$student->id?>">
                           <div class="modal-dialog">
                               <div class="modal-content">

                                   <!-- Modal Header -->
                                   <div class="modal-header">
                                       <h4 class="modal-title"><?=$student->name?></h4>
                                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                                   </div>

                                   <!-- Modal body -->
                                   <div class="modal-body">
                                       <div class="row justify-content-center">
                                           <div class="col-sm-8">
                                               <img class="rounded-circle mx-auto d-block" src="<?=$student ->photo ?>" alt="" width="200" height="200">
                                               <p class="text-center"><?=$student->reg_date?></p>
                                               <p class="text-center"><?=$student->gender?></p>
                                               <p class="text-center"><?=$student->course?></p>
                                           </div>
                                       </div>
                                   </div>

                                   <!-- Modal footer -->
                                   <div class="modal-footer">
                                       <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                   </div>

                               </div>
                           </div>
                       </div>





                   <?php endforeach; ?>

               </table>
           </div>
       </div>
   </div>
</body>
</html>
