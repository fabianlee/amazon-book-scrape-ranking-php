<?php
$servername = "localhost";
$username = "xxxxxx_wpYY";
$password = "***************";
$dbname = "xxxxxxx_wpYYY";

/**
 Create database named book_ranking with:
   * thedate (datetime)
   * ranking (int)
   * category (varchar 64)
*/

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$localfile="/home/xxxx/todays_amazon_ranking.csv";
if (!file_exists($localfile)) {
  die("ERROR could not read local csv file");
}

foreach(file($localfile) as $line) {
  //echo $line . "\n";
  $fields = explode(",", trim($line)); // remove new line with trim
  $sql = "INSERT INTO book_ranking (thedate, ranking, category) VALUES ('$fields[0]', $fields[1], '$fields[2]')";
  echo $sql . "\n";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "\n" . $conn->error;
  }

}

$conn->close();
?>
