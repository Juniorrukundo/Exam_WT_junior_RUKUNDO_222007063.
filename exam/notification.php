<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Notification Form</title>
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
    textarea {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    select {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
      background-color: white;
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
    <h2>Notification Form</h2>
    <form id="notificationForm" method="post">
      <div class="form-group">
        <label for="userId">User ID:</label>
        <input type="text" id="userId" name="userId" required>
      </div>
      <div class="form-group">
        <label for="message">Message:</label>
        <textarea id="message" name="message" rows="4" required></textarea>
      </div>
      <div class="form-group">
        <label for="notificationType">Notification Type:</label>
        <select id="notificationType" name="notificationType" required>
          <option value="">Select Notification Type</option>
          <option value="email">Email</option>
          <option value="sms">SMS</option>
          <option value="app">App</option>
        </select>
      </div>
      <div class="form-group">
        <label for="createdDate">Created Date:</label>
        <input type="date" id="createdDate" name="createdDate" required>
      </div>
      <div class="form-group">
        <label for="readStatus">Read Status:</label>
        <select id="readStatus" name="readStatus" required>
          <option value="">Select Read Status</option>
          <option value="read">Read</option>
          <option value="unread">Unread</option>
        </select>
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
      $userId = $_POST['userId'];
      $message = $_POST['message'];
      $notificationType = $_POST['notificationType'];
      $createdDate = $_POST['createdDate'];
      $readStatus = $_POST['readStatus'];

      // SQL query to insert data into the notification table
      $sql = "INSERT INTO `notification` (`user id`, `message`, `notification type`, `created date`, `read status`) 
              VALUES ('$userId', '$message', '$notificationType', '$createdDate', '$readStatus')";

      if ($conn->query($sql) === TRUE) {
          echo "<script>alert('Notification sent successfully');</script>";
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }

      // Close connection
      $conn->close();
  }
  ?>
</body>
</html>
