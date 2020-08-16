<?php
        include('../dbcon.php');

        $rollno= $_POST['rollno'];
        $name= $_POST['name'];
        $city= $_POST['city'];
        $contactno= $_POST['contact'];
        $std= $_POST['standard'];
        $id=$_POST['sid'];
        $imagename = $_FILES['simg']['name'];
        $tempname = $_FILES['simg']['tmp_name'];

        move_uploaded_file($tempname,"../dataimg/$imagename");
    

        $qry="UPDATE `student` SET `rollno` = '$rollno', `name` = '$name', `city` = '$city', `contact` = '$contactno', `standard` = '$std', `image` = '$imagename' WHERE `id` = $id;";

        $run= mysqli_query($con,$qry);

        if($run == true)
        {
            ?>
            <script>
                alert('Data Updated Successfully');
                window.open('updateform.php?sid=<?php echo $id;?>','_self');
            </script>
            <?php
        }

?>
