<?php 
include "dbconnection.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["submission_id"])) {
        header("location: viewsubmission.php");
        exit;
    }

    $submission_id = $_GET["submission_id"];

    $sql = "SELECT * FROM submission WHERE submission_id = $submission_id";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $assignment_id = $row["assignment_id"];
        $user_id = $row["user_id"];
        $submission_date = $row["submission_date"];
        $score = $row["score"];
        $feedback = $row["feedback"];
    } else {
        header("location:viewsubmission.php");
        exit;
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $submission_id = $_POST["submission_id"];
    $assignment_id = $_POST["assignment_id"];
    $user_id = $_POST["user_id"];
    $submission_date = $_POST["submission_date"];
    $score = $_POST["score"];
    $feedback = $_POST["feedback"];
    if (empty($submission_id) || empty($assignment_id) || empty($user_id) || empty($submission_date) || empty($score) || empty($feedback)) {
        echo "All fields are required!";
    } else {
        $sql = "UPDATE submission SET assignment_id='$assignment_id', user_id='$user_id', submission_date='$submission_date', score='$score', feedback='$feedback' WHERE submission_id='$submission_id'";
    
        if ($connection->query($sql) === TRUE) {
            echo "Information updated successfully";
            header("location:viewsubmission.php");
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
    <title>Virtual Leadership Training Workshops Platform</title>
    <script >
        function confirmUpdate(){
            return confirm('Do you want to update this record');
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
        <h2>Virtual Leadership Training Workshops Platform</h2>
        <h3 style="color:green;">Update Submission Here</h3>
        <section class="forms">
            <form method="POST" onsubmit="return confirmUpdate();">
                <label>Submission ID</label><br>
                <input type="text" name="submission_id" readonly  value="<?php echo $submission_id; ?>"><br>
                <label>Assignment ID</label><br>
                <input type="text" name="assignment_id" value="<?php echo $assignment_id; ?>"><br> 
                <label>User ID</label><br>
                <input type="text" name="user_id" value="<?php echo $user_id; ?>" ><br> 
                <label>Submission Date</label><br>
                <input type="text" name="submission_date" value="<?php echo $submission_date; ?>" ><br>
                <label>Score</label><br>
                <input type="text" name="score" value="<?php echo $score; ?>" ><br>
                <label>Feedback</label><br>
                <input type="text" name="feedback" value="<?php echo $feedback; ?>" ><br>
                <input type="submit" name="submit" value="Update" class="sb">
            </form>
        </section>
    </center>
    <footer>
        <p style="color:blue; text-align: center; margin-top:40px;"><marquee> &copy; copy right&reg; junia_CBE_BIT_Year2_Group_2.</marquee> </p>
    </footer>
</body>
</html>
