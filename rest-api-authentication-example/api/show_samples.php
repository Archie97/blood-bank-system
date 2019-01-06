<?php
$mysqli = new mysqli("localhost", "root", "", "api_db");
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
$query = 'SELECT blood_name,blood_group,blood_cell_count,haemoglobin from blood_samples';
echo ' <h2>Blood Samples List</h2>
<div class="row"style="box-sizing:border-box;">';
if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
       echo '<div class="column">
        <div class="card">
        
          <div class="container">
            <h2>'.$row['blood_name'].'</h2>
            <p class="title">Blood Group : '.$row['blood_group'].'</p>
            <p>Blood Cell Count  :  '.$row['blood_cell_count'].'</p>
            <p>Haemoglobin : '.$row['haemoglobin'].'</p>
          </div>
        </div>
      </div>';
    }
    $result->free();
}

echo '</div>';

?>