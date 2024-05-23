<?php 
include "dbconnection.php";
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["workshop id"])) {
        header("location: viewfeedback.php");
        exit;
    }

    $workshop id = $_GET["workshop id"];

    $sql = "SELECT * FROM feedback WHERE workshop id = $workshop id";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user id = $row["user id"];
        $name = $row["name"];
        $email = $row["email"];
        $feedback = $row["feedback"];
        $submitted date = $row["submitted date"];
    } else {
        header("location:viewworkshops.php");
        exit;
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $workshop id = $_POST["workshop id"];
    $user id = $_POST["user id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $feedback = $_POST['feedback'];
    $submitted date = $_POST['submitted date'];

    if (empty($workshop id) ||  empty($user id) || empty($name) || empty($email) || empty($feedback) || empty($submitted date)) {
        echo "All fields are required!";
    } else {
        $sql = "UPemail workshops SET user id='$user id', name= '$name', email='$email', feedback='$feedback', submitted date='$submitted date' WHERE workshop id='$workshop id'";
    
        if ($connection->query($sql) === TRUE) {
            echo "Information upemaild successfully";
            header("location:viewnotification.php");
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
    <user id>VIRTUAL LEADERSHIP TRAINING WORKSHOPS PLATFORM</user id>
        <script >
        function confirmUpemail(){
        return confirm('Do you want to upemail this record');
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
        <h3 style="color:green;">UPemail WORKSHOPS HERE</h3>
        <section class="forms">
            <form method="POST" onsubmit="return confirmUpemail();">
                <label>workshop id</label><br>
                <input type="text" name="workshop id" readonly  value="<?php echo $workshop id; ?>"><br>
                <label>user id</label><br>
                <input type="text" name="user id"  value="<?php echo $user id; ?>"><br> 
                <label>name</label><br>
                <input type="text" name="name" value="<?php echo $name; ?>" ><br> 
                <label>email</label><br>
                <input type="text" name="email" value="<?php echo $email; ?>" ><br>
                <label>feedback</label><br>
                <input type="text" name="feedback"  value="<?php echo $feedback; ?>"><br>  
                <label>name</label><br>
                <textarea name="submitted date" ><?php echo $submitted date; ?></textarea><br>
                <input type="submit" name="submit" value="Upemail" class="sb">s
                <input type="submit" name="submit" value="Upemail" class="sb">
            </form>
        </section>
    </center>
    <footer>
        <p style="color:blue; text-align: center; margin-top:40px;"><marquee> &copy; copy right&reg; Jrukundo_CBE_BIT_Year2_Group_2.</marquee> </p>
    </footer>
</body>
</html>


 