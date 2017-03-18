<?php
include('db.php');

$query = "SELECT * FROM register natural join provinces WHERE register.provinces = provinces.PROVINCE_ID";
$result = $conn->query($query);
if (!$result) die($conn->error);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>รายชื่อผู้ลงทะเบียน</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
.button {
  display: inline-block;
  border-radius: 4px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
</style>
</head>
<body>

<div class="container">
  <h1 align="center">รายชื่อผู้ลงทะเบียน</h1>          
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>#</th>
        <th>ชื่อ-นามสกุล</th>
        <th>อีเมล์</th>
        <th>เพศ</th>
        <th>ความสนใจ</th>
        <th>ที่อยู่</th>
        <th>จังหวัด</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = $result->fetch_array()) { ?>
      <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['fullName']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['sex']; ?></td>
        <td><?php echo $row['intr1']; ?><?php if ($row['intr1'] != '') echo "<br>"; ?><?php echo $row['intr2']; ?></td>
        <td><?php echo $row['address']; ?></td>
        <td><?php echo $row['PROVINCE_NAME']; ?></td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
</div>

<center><button class="button" style="vertical-align:middle" name="info" onclick="linkto();"><span>Register</span></button></center>
<script>
    function linkto() {
        window.location='http://angsila.cs.buu.ac.th/~58160253/887371/lab07/register_form.php';
    }
</script>
<?php  
$conn->close();
?>
</body>
</html>
