<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Virtual leadership training workshops Platform</title>
    <!-- call bootstrap function -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
     <!--  call the function that help in Font icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        /* Additional custom styles */
        h2, h4 {
            font-weight: bold;
        }
        .btn-back {
            margin-left: 20px;
        }
        table{
            background-color: papayawhip;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center text-success">Virtual leadership training workshops Platform</h2>
        <h4 class="text-center text-primary mb-4">THIS IS  REPORT ABOUT leadership resources</h4>

        <a href="home.html" class="btn btn-secondary btn-back">Back Home</a>

        <table class="table table-bordered mt-4">
            <thead class="bg-warning">
                <tr>
                    <th>uploader id</th>
                    <th>uploader date</th>
                    <th>title</th>
                    <th>description</th>
                    <th>resources type</th>
                    <th>rating</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                <?php 
                include "dbconnection.php";
                $sql = "SELECT * FROM leadership resources";
                $result = $connection->query($sql);
                if (!$result) {
                    echo "Invalid query!!" . $connection->error;
                }
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>{$row['uploader id']}</td>
                        <td>{$row['uploader date']}</td> 
                        <td>{$row['title']}</td>
                        <td>{$row['description']}</td>
                        <td>{$row['resources type']}</td>
                         <td>{$row['rating']}</td>
                        <td>
                            <a href='updateleadershipresources.php?uploader id={$row['uploader id']}'  class='btn btn-info'><i class='fas fa-edit'></i></a>
                            <a href='deleteleadershipresources .php?uploader id={$row['uploader id']}' class='btn btn-danger'><i class='fas fa-trash'></i></a>
                        </td>
                    </tr>
                    ";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS (optional, for certain components that require JavaScript) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
