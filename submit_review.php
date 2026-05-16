<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $name = mysqli_real_escape_string($conn, $_POST["name"]);
  $project = mysqli_real_escape_string($conn, $_POST["project"]);
  $rating = (int) $_POST["rating"];
  $message = mysqli_real_escape_string($conn, $_POST["message"]);

  if ($rating < 1 || $rating > 5) {
    header("Location: index.php#reviews");
    exit;
  }

  $query = "INSERT INTO client_reviews (name, project, rating, message)
            VALUES ('$name', '$project', '$rating', '$message')";

  mysqli_query($conn, $query);

  header("Location: index.php#reviews");
  exit;
}
?>