<?php 
include "dbconnection.php";
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["instructor id"])) {
        header("location: vieweinstructor.php");
        exit;
    }

    $instructor id = $_GET["instructor id"];

    $sql = "SELECT * FROM instructor WHERE instructor id = $instructor id";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user id = $row["user id"];
        $expertise = $row["expertise"];
        $   bio = $row["   bio"];
        $rating = $row["rating"];
    } else {
        header("location:viewinstructor.php");
        exit;
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $instructor id = $_POST["instructor id"];
    $user id = $_POST["user id"];
    $expertise = $_POST["expertise"];
    $   bio = $_POST[" bio"];
    $rating = $_POST['rating'];

    if (empty($instructor id) ||  empty($user id) || empty($expertise) || empty($   bio) || empty($rating)) {
        echo "All fields are required!";
    } else {
        $sql = "UP  bio workshops SET user id='$user id', expertise= '$expertise',    bio='$ bio', rating='$rating', progress='$progress' WHERE instructor id='$instructor id'";
    
        if ($connection->query($sql) === TRUE) {
            echo "Information up    biod successfully";
            header("location:vieweinstructor.php");
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
    <meta expertise="viewport" content="width=device-width, initial-scale=1">
    <user id>VIRTUAL LEADERSHIP TRAINING WORKSHOPS PLATFORM</user id>
        <script >
        function confirmUp  bio(){
        return confirm('Do you want to up   bio this record');
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
        <h3 style="color:green;">UP bio instructor HERE</h3>
        <section class="forms">
            <form method="POST" onsubmit="return confirmUp  bio();">
                <label>instructor id</label><br>
                <input type="text" expertise="instructor id" readonly  value="<?php echo $instructor id; ?>"><br>
                <label>user id</label><br>
                <input type="text" expertise="user id"  value="<?php echo $user id; ?>"><br> 
                <label>expertise</label><br>
                <input type="text" expertise="expertise" value="<?php echo $expertise; ?>" ><br> 
                <label> bio</label><br>
                <input type="text" expertise="  bio" value="<?php echo $  bio; ?>" ><br>
                <label>rating</label><br>
                <input type="text" expertise="rating"  value="<?php echo $rating; ?>"><br>  
                <label>expertise</label><br>
                <textarea expertise="progress" ><?php echo $progress; ?></textarea><br>
                <input type="submit" expertise="submit" value="Up   bio" class="sb">s
                <input type="submit" expertise="submit" value="Up   bio" class="sb">
            </form>
        </section>
    </center>
    <footer>
        <p style="color:blue; text-align: center; margin-top:40px;"><marquee> &copy; copy right&reg; Jrukundo_CBE_BIT_Year2_Group_2.</marquee> </p>
    </footer>
</body>
</html>


 