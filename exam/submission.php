<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Submission Form</title>
  <style>
    .container {
      max-width: 400px;
      margin: 50px auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    h2 {
      text-align: center;
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 5px;
    }

    input[type="text"],
    input[type="date"],
    input[type="number"],
    textarea {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    button {
      width: 100%;
      padding: 10px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    button:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Submission Form</h2>
    <form id="submissionForm" method="post">
      <div class="form-group">
        <label for="submissionId">Submission ID:</label>
        <input type="text" id="submissionId" name="submissionId" required>
      </div>
      <div class="form-group">
        <label for="assignmentId">Assignment ID:</label>
        <input type="text" id="assignmentId" name="assignmentId" required>
      </div>
      <div class="form-group">
        <label for="userId">User ID:</label>
        <input type="text" id="userId" name="userId" required>
      </div>
      <div class="form-group">
        <label for="submissionDate">Submission Date:</label>
        <input type="date" id="submissionDate" name="submissionDate" required>
      </div>
      <div class="form-group">
        <label for="score">Score:</label>
        <input type="number" id="score" name="score" required>
      </div>
      <div class="form-group">
        <label for="feedback">Feedback:</label>
        <textarea id="feedback" name="feedback" rows="4"></textarea>
      </div>
      <button type="submit">Submit</button>
    </form>
  </div>

  <?php
  // Check if form is submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Database connection parameters
      $servername = "localhost";
      $username = "root"; // Replace with your MySQL username
      $password = ""; // Replace with your MySQL password
      $database = "virtual_leadership_training_workshops_platform"; // Replace with your database name

      // Create connection
      $conn = new mysqli($servername, $username, $password, $database);

      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      // Retrieve form data
      $submissionId = $_POST['submissionId'];
      $assignmentId = $_POST['assignmentId'];
      $userId = $_POST['userId'];
      $submissionDate = $_POST['submissionDate'];
      $score = $_POST['score'];
      $feedback = $_POST['feedback'];

      // SQL query to insert data into the submission table
      $sql = "INSERT INTO `submission` (`submission id`, `assignment id`, `user id`, `submission date`, `score`, `feedback`) 
              VALUES ('$submissionId', '$assignmentId', '$userId', '$submissionDate', '$score', '$feedback')";

      if ($conn->query($sql) === TRUE) {
          echo "<script>alert('New record created successfully');</script>";
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }

      // Close connection
      $conn->close();
  }
  ?>
</body>
</html>
