<?php

include('db.php');

// $sql = 'CREATE TABLE `admin` (
//     `id` int(50) NOT NULL AUTO_INCREMENT PRIMARY KEY,
//     `name` varchar(255) NOT NULL,
//     `password` varchar(255) NOT NULL
//   )';

  // $sql = 'ALTER TABLE admin ADD tnx_id varchar(255) NOT NULL;';

  $sql = 'TRUNCATE TABLE payments';

if ($conn->query($sql) === TRUE) {
    echo "Datas Deleted successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
?>