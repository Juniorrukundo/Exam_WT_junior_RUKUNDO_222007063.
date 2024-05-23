<?php 
include "dbconnection.php";
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["attendee id "])) {
        header("location: viewattendees.php");
        exit;
    }

    $attendee id  = $_GET["attendee id "];

    $sql = "SELECT * FROM attendees WHERE attendee id  = $attendee id ";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user id = $row["user id"];
        $workshop id = $row["workshop id"];
        $   feedback = $row["  feedback"];
        $attendee status = $row["attendee status"];
    } else {
        header("location:viewworkshops.php");
        exit;
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $attendee id  = $_POST["attendee id "];
    $user id = $_POST["user id"];
    $workshop id = $_POST["workshop id"];
    $   feedback = $_POST["    feedback"];
    $attendee status = $_POST['attendee status'];

    if (empty($attendee id ) ||  empty($user id) || empty($workshop id) || empty($  feedback) || empty($attendee status)) {
        echo "All fields are required!";
    } else {
        $sql = "UP  feedback workshops SET user id='$user id', workshop id= '$workshop id',   feedback='$   feedback', attendee status='$attendee status', last name='$last name' role='$role' WHERE attendee id ='$attendee id '";
    
        if ($connection->query($sql) === TRUE) {
            echo "Information up    feedbackd successfully";
            header("location:viewattendeessz.php");
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
        function confirmUp  feedback(){
        return confirm('Do you want to up   feedback this record');
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
        <h3 style="color:green;">UP feedback WORKSHOPS HERE</h3>
        <section class="forms">
            <form method="POST" onsubmit="return confirmUp  feedback();">
                <label>attendee id </label><br>
                <input type="text" name="attendee id " readonly  value="<?php echo $attendee id ; ?>"><br>
                <label>user id</label><br>
                <input type="text" name="user id"  value="<?php echo $user id; ?>"><br> 
                <label>workshop id</label><br>
                <input type="text" name="workshop id" value="<?php echo $workshop id; ?>" ><br> 
                <label> feedback</label><br>
                <input type="text" name="   feedback" value="<?php echo $  feedback; ?>" ><br>
                <label>attendee status</label><br>
                <input type="text" name="attendee status"  value="<?php echo $attendee status; ?>"><br>  
                <label>workshop id</label><br>
                <textarea name="last name" ><?php echo $last name; ?></textarea><br>
                <input type="submit" name="submit" value="Up    feedback" class="sb">
                 <textarea name="role" ><?php echo $role; ?></textarea><br>
                <input type="submit" name="submit" value="Up    feedback" class="sb">
            </form>
        </section>
    </center>
    <footer>
        <p style="color:blue; text-align: center; margin-top:40px;"><marquee> &copy; copy right&reg; Jrukundo_CBE_BIT_Year2_Group_2.</marquee> </p>
    </footer>
</body>
</html>


 