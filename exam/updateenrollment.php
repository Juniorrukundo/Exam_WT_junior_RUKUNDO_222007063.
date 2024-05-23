<?php 
include "dbconnection.php";
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["enrollment id"])) {
        header("location: viewenrollment.php");
        exit;
    }

    $enrollment id = $_GET["enrollment id"];

    $sql = "SELECT * FROM enrollment WHERE enrollment id = $enrollment id";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user id = $row["user id"];
        $workshop id = $row["workshop id"];
        $enrollment date = $row["enrollment date"];
        $enrollment status = $row["enrollment status"];
        $progress = $row["progress"];
    } else {
        header("location:viewenrollment.php");
        exit;
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $enrollment id = $_POST["enrollment id"];
    $user id = $_POST["user id"];
    $workshop id = $_POST["workshop id"];
    $enrollment date = $_POST["enrollment date"];
    $enrollment status = $_POST['enrollment status'];
    $progress = $_POST['progress'];

    if (empty($enrollment id) ||  empty($user id) || empty($workshop id) || empty($enrollment date) || empty($enrollment status) || empty($progress)) {
        echo "All fields are required!";
    } else {
        $sql = "UPenrollment date workshops SET user id='$user id', workshop id= '$workshop id', enrollment date='$enrollment date', enrollment status='$enrollment status', progress='$progress' WHERE enrollment id='$enrollment id'";
    
        if ($connection->query($sql) === TRUE) {
            echo "Information upenrollment dated successfully";
            header("location:viewenrollment.php");
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
    <meta workshop id="viewport" content="width=device-width, initial-scale=1">
    <user id>VIRTUAL LEADERSHIP TRAINING WORKSHOPS PLATFORM</user id>
        <script >
        function confirmUpenrollment date(){
        return confirm('Do you want to upenrollment date this record');
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
        <h3 style="color:green;">UPenrollment date enrollment HERE</h3>
        <section class="forms">
            <form method="POST" onsubmit="return confirmUpenrollment date();">
                <label>enrollment id</label><br>
                <input type="text" workshop id="enrollment id" readonly  value="<?php echo $enrollment id; ?>"><br>
                <label>user id</label><br>
                <input type="text" workshop id="user id"  value="<?php echo $user id; ?>"><br> 
                <label>workshop id</label><br>
                <input type="text" workshop id="workshop id" value="<?php echo $workshop id; ?>" ><br> 
                <label>enrollment date</label><br>
                <input type="text" workshop id="enrollment date" value="<?php echo $enrollment date; ?>" ><br>
                <label>enrollment status</label><br>
                <input type="text" workshop id="enrollment status"  value="<?php echo $enrollment status; ?>"><br>  
                <label>workshop id</label><br>
                <textarea workshop id="progress" ><?php echo $progress; ?></textarea><br>
                <input type="submit" workshop id="submit" value="Upenrollment date" class="sb">s
                <input type="submit" workshop id="submit" value="Upenrollment date" class="sb">
            </form>
        </section>
    </center>
    <footer>
        <p style="color:blue; text-align: center; margin-top:40px;"><marquee> &copy; copy right&reg; Jrukundo_CBE_BIT_Year2_Group_2.</marquee> </p>
    </footer>
</body>
</html>


 