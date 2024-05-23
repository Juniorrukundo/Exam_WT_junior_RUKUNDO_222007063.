<?php 
include "dbconnection.php";
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["uploader id"])) {
        header("location: viewleadershipresources.php");
        exit;
    }

    $uploader id = $_GET["uploader id"];

    $sql = "SELECT * FROM leadershipresources WHERE uploader id = $uploader id";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $upload date = $row["upload date"];
        $title = $row["title"];
        $description = $row["description"];
        $resource type = $row["resource type"];
        $rating = $row["rating"];
    } else {
        header("location:viewleadershipresources.php");
        exit;
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uploader id = $_POST["uploader id"];
    $upload date = $_POST["upload date"];
    $title = $_POST["title"];
    $description = $_POST["description"];
    $resource type = $_POST['resource type'];
    $rating = $_POST['rating'];
    $role = $_POST['role'];

    if (empty($uploader id) ||  empty($upload date) || empty($title) || empty($description) || empty($resource type) || empty($rating)|| empty($role)) {
        echo "All fields are required!";
    } else {
        $sql = "UPdescription workshops SET upload date='$upload date', title= '$title', description='$description', resource type='$resource type', rating='$rating' role='$role' WHERE uploader id='$uploader id'";
    
        if ($connection->query($sql) === TRUE) {
            echo "Information updescriptiond successfully";
            header("location:viewleadershipresources.php");
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
    <upload date>VIRTUAL LEADERSHIP TRAINING WORKSHOPS PLATFORM</upload date>
        <script >
        function confirmUpdescription(){
        return confirm('Do you want to updescription this record');
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
        <h3 style="color:green;">UPdescription WORKSHOPS HERE</h3>
        <section class="forms">
            <form method="POST" onsubmit="return confirmUpdescription();">
                <label>uploader id</label><br>
                <input type="text" name="uploader id" readonly  value="<?php echo $uploader id; ?>"><br>
                <label>upload date</label><br>
                <input type="text" name="upload date"  value="<?php echo $upload date; ?>"><br> 
                <label>title</label><br>
                <input type="text" name="title" value="<?php echo $title; ?>" ><br> 
                <label>description</label><br>
                <input type="text" name="description" value="<?php echo $description; ?>" ><br>
                <label>resource type</label><br>
                <input type="text" name="resource type"  value="<?php echo $resource type; ?>"><br>  
                <label>title</label><br>
                <textarea name="rating" ><?php echo $rating; ?></textarea><br>
                <input type="submit" name="submit" value="Updescription" class="sb">
                 <textarea name="role" ><?php echo $role; ?></textarea><br>
                <input type="submit" name="submit" value="Updescription" class="sb">
            </form>
        </section>
    </center>
    <footer>
        <p style="color:blue; text-align: center; margin-top:40px;"><marquee> &copy; copy right&reg; Jrukundo_CBE_BIT_Year2_Group_2.</marquee> </p>
    </footer>
</body>
</html>


 