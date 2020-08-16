<?php
session_start();

    if(isset($_SESSION['uid']))
    {
        echo "";
    }
    else
    {
        header('location: ../login.php');
    }

?>
<?php
    include('header.php');
    include('title.php');
?>
<form method="post" action="addstudent.php"enctype="multipart/form-data";>
    <table align="center" border="1" style="width:70%; margin-top:40px;">
        <tr>
            <th>Roll no</th>
            <td><input type="text" name="rollno" placeholder="Enter Roll No."required> </td>
        </tr>
        <tr>
            <th>Full Name</th>
            <td><input type="text" name="name" placeholder="Enter Full Name"required></td>
        </tr>
        <tr>
            <th>City</th>
            <td><input type="text" name="city" placeholder="Enter City"required></td>
        </tr>
        <tr>
            <th>Parents Contact No.</th>
            <td><input type="text" name="contact" placeholder="Enter Parents Contact No."required></td>
        </tr>
        <tr>
            <th>Standard</th>
            <td><input type="number" name="standard" placeholder="Enter Your Std."required></td>
        </tr>
        <tr>
            <th>Image</th>
            <td><input type="file" name="simg" required></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" name="submit" value="Submit"></td>
        </tr>
    </table>
</form>
</body>
</html>

<?php
    if(isset($_POST['submit']))
    {
        include('../dbcon.php');
        $rollno= $_POST['rollno'];
        $name= $_POST['name'];
        $city= $_POST['city'];
        $contactno= $_POST['contact'];
        $std= $_POST['standard'];
        $imagename = $_FILES['simg']['name'];
        $tempname = $_FILES['simg']['tmp_name'];

        move_uploaded_file($tempname,"../dataimg/$imagename");
    

        $qry="INSERT INTO `student`(`rollno`, `name`, `city`, `contact`, `standard`, `image`) VALUES ('$rollno','$name','$city','$contactno','$std','$imagename')";

        $run= mysqli_query($con,$qry);

        if($run == true)
        {
            ?>
            <script>
                alert('Data Inserted Successfully');
            </script>
            <?php
        }
    }
?>