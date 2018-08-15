<?php
include ('connection.php');
// connection to the database
$id=$_REQUEST['id']; 
// got this id from welcome.php
$query = "SELECT * FROM subscribers WHERE id='".$id."'";
// to execute in the database
$result = mysqli_query($link, $query) or die ( mysqul_error());
// store results from database
$row = mysqli_fetch_array($result);
?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <title>Update Data</title>
        <link rel="stylesheet" href="css/style.css" />
    </head>

    <body>
        <div class="form">
            <h1>Update Data</h1>
            <?php
            $status = "";
            // global variable

            if(isset($_POST['new']) && $_POST['new']==1)
            {
                $id =$_REQUEST['id'];
                $fname =$_REQUEST['fname'];
                $lname =$_REQUEST['lname'];
                $email =$_REQUEST['email'];
                $update="UPDATE subscribers set firstName='".$fname."',lastName='".$lname."', email='".$email."' where id='".$id."'"; // this is the query to find and update the database
                mysqli_query($link, $update) or die(mysql_error());
                $status = "Data Updated. </br></br><a href='index.php'>View Data</a>";
                header("Location: welcome.php");
            }else {
                ?>
                <div>
                    <form name="form" method="post" action="">
                        <input type="hidden" name="new" value="1" />
                        <input name="id" type="hidden" value="<?php echo $row['id'];?>" />
                        <p>
                            <input type="text" name="fname" placeholder="Enter First Name" required value="<?= $row['firstName'];?>"
                            />
                        </p>
                        <p>
                            <input type="text" name="lname" placeholder="Enter Last Name" required value="<?= $row['lastName'];?>"
                            />
                        </p>
                        <p>
                            <input type="text" name="email" placeholder="Enter Email" required value="<?= $row['email'];?>" />
                        </p>
                        <p>
                            <input name="submit" type="submit" value="Update" />
                        </p>
                    </form>
                    <?php } ?>
                </div>
        </div>
    </body>

    </html>


    }

    </div>
    </body>

    </html>