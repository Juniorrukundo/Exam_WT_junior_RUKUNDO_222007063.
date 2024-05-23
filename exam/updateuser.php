<?php 
include "dbconnection.php";
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["user id"])) {
        header("location: viewuser.php");
        exit;
    }

    $user id = $_GET["user id"];

    $sql = "SELECT * FROM user WHERE user id = $user id";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user name = $row["user name"];
        $email = $row["email"];
        $password = $row["password"];
        $first name = $row["first name"];
        $last name = $row["last name"];
    } else {
        header("location:viewworkshops.php");
        exit;
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user id = $_POST["user id"];
    $user name = $_POST["user name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $first name = $_POST['first name'];
    $last name = $_POST['last name'];
    $role = $_POST['role'];

    if (empty($user id) ||  empty($user name) || empty($email) || empty($password) || empty($first name) || empty($last name)|| empty($role)) {
        echo "All fields are required!";
    } else {
        $sql = "UPpassword workshops SET user name='$user name', email= '$email', password='$password', first name='$first name', last name='$last name' role='$role' WHERE user id='$user id'";
    
        if ($connection->query($sql) === TRUE) {
            echo "Information uppasswordd successfully";
            header("location:viewuser.php");
            exit;
        } else {
            echo "Error updating record: " . $connection->error;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <user name>VIRTUAL LEADERSHIP TRAINING WORKSHOPS PLATFORM</user name>
        <script >
        function confirmUppassword(){
        return confirm('Do you want to uppassword this record');
               }

    </script>
    <style>
        h2 {
            font-family: Castellar;
            color: darkblue;
        }
        label {
            font-family: elephant;
            font-size: 20px;
        }
        .sb {
            font-family: Georgia;
            padding: 10px;
            border-color: blue;
            background-color: skyblue;
            width: 200px;
            margin-top: 5px;
            border-radius: 12px;
            font-weight: bold;
            color: blue;
        }
        .input {
            width: 350px;
            height: 35px;
            border-radius: 12px;
            border-color: green;
        }
    </style>
</head>
<body>
    <center>
        <h2>VIRTUAL LEADERSHIP TRAINING WORKSHOPS PLATFORM</h2>
        <h3 style="color:green;">UPpassword WORKSHOPS HERE</h3>
        <section class="forms">
            <form method="POST" onsubmit="return confirmUppassword();">
                <label>user id</label><br>
                <input type="text" name="user id" readonly  value="<?php echo $user id; ?>"><br>
                <label>user name</label><br>
                <input type="text" name="user name"  value="<?php echo $user name; ?>"><br> 
                <label>email</label><br>
                <input type="text" name="email" value="<?php echo $email; ?>" ><br> 
                <label>password</label><br>
                <input type="text" name="password" value="<?php echo $password; ?>" ><br>
                <label>first name</label><br>
                <input type="text" name="first name"  value="<?php echo $first name; ?>"><br>  
                <label>email</label><br>
                <textarea name="last name" ><?php echo $last name; ?></textarea><br>
                <input type="submit" name="submit" value="Uppassword" class="sb">
                 <textarea name="role" ><?php echo $role; ?></textarea><br>
                <input type="submit" name="submit" value="Uppassword" class="sb">
            </form>
        </section>
    </center>
    <footer>
        <p style="color:blue; text-align: center; margin-top:40px;"><marquee> &copy; copy right&reg; Jrukundo_CBE_BIT_Year2_Group_2.</marquee> </p>
    </footer>
</body>
</html>


 