<?php 
include "dbconnection.php";
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["notification id"])) {
        header("location: viewnotification.php");
        exit;
    }

    $notification id = $_GET["notification id"];

    $sql = "SELECT * FROM notification WHERE notification id = $notification id";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user id = $row["user id"];
        $message = $row["message"];
        $notification type = $row["notification type"];
        $created date = $row["created date"];
        $read status = $row["read status"];
    } else {
        header("location:viewworkshops.php");
        exit;
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $notification id = $_POST["notification id"];
    $user id = $_POST["user id"];
    $message = $_POST["message"];
    $notification type = $_POST["notification type"];
    $created date = $_POST['created date'];
    $lread status = $_POST['lread status'];

    if (empty($notification id) ||  empty($user id) || empty($message) || empty($notification type) || empty($created date) || empty($lread status)) {
        echo "All fields are required!";
    } else {
        $sql = "UPnotification type workshops SET user id='$user id', message= '$message', notification type='$notification type', created date='$created date', read status='$read status' WHERE notification id='$notification id'";
    
        if ($connection->query($sql) === TRUE) {
            echo "Information upnotification typed successfully";
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
        function confirmUpnotification type(){
        return confirm('Do you want to upnotification type this record');
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
        <h3 style="color:green;">UPnotification type WORKSHOPS HERE</h3>
        <section class="forms">
            <form method="POST" onsubmit="return confirmUpnotification type();">
                <label>notification id</label><br>
                <input type="text" name="notification id" readonly  value="<?php echo $notification id; ?>"><br>
                <label>user id</label><br>
                <input type="text" name="user id"  value="<?php echo $user id; ?>"><br> 
                <label>message</label><br>
                <input type="text" name="message" value="<?php echo $message; ?>" ><br> 
                <label>notification type</label><br>
                <input type="text" name="notification type" value="<?php echo $notification type; ?>" ><br>
                <label>created date</label><br>
                <input type="text" name="created date"  value="<?php echo $created date; ?>"><br>  
                <label>message</label><br>
                <textarea name="read status" ><?php echo $read status; ?></textarea><br>
                <input type="submit" name="submit" value="Upnotification type" class="sb">s
                <input type="submit" name="submit" value="Upnotification type" class="sb">
            </form>
        </section>
    </center>
    <footer>
        <p style="color:blue; text-align: center; margin-top:40px;"><marquee> &copy; copy right&reg; Jrukundo_CBE_BIT_Year2_Group_2.</marquee> </p>
    </footer>
</body>
</html>


 