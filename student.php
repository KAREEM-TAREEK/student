<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="student.css">
    <title>student</title>
</head>
<body>
<?php
//الاتصال مع قاعده البيانات
$host = 'localhost';
$user = 'root';
$password = '';
$db_name = 'kareem';
$conn = mysqli_connect($host, $user, $password, $db_name);
$result=mysqli_query($conn,"select * from student");//
$id='';
$name='';
$address='';
if (isset($_POST['id'])) {
    $id = $_POST['id'];
}
if (isset($_POST['name'])) {
    $name = $_POST['name'];
}
if (isset($_POST['address'])) {
    $address = $_POST['address'];
}
$sqls='';
if (isset($_POST['add'])) {
    $sqls = "insert into student (id,name,address) values ('$id','$name','$address')";//
     mysqli_query($conn,$sqls);
     header('location:student.php');
}
if (isset($_POST['del'])) {
    $sqls = "delete from student where  name= '$name' ";//
     mysqli_query($conn,$sqls);
     header('location:student.php');
}








?>











    <section  class="join">
        <form   method="POST" class="lol" action="">
            <div class="create">CREATE FREE ACCOUNT NOW</div>
            <input  name="id" type="text" placeholder="ID">
            <input name="name" type="text" placeholder="NAME the student">
            <input name="address"  placeholder="address the student ">
            <div class="btn">
                <button  name="add">Add the student</button>
                <button  name="del">Delete the student</button>
             
            </div>
    </form>
    
</section>
<section class="table">
<form   class="form"      method="POST">
        <table class="tab" border="1">
            <tr>

                <th>id</th>
                <th>name</th>
                <th>address</th>
            </tr>
            <?php
              while ($row = mysqli_fetch_array($result)) {
                echo '<tr>';
                echo '<td>' . $row['id'] . '</td>';
                echo '<td>' . $row['name'] . '</td>';
                echo '<td>' . $row['address'] . '</td>';
                echo '</tr>';
            }

            ?>
        </table>
</form>











</section>
</body>
</html>