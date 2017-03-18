<!DOCTYPE html>
<?php
    include('db.php');

    $query = "SELECT * FROM provinces";
    $result = $conn->query($query);
    if (!$result) die($conn->error);
?>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Form Validation</title>
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
  width: 250px;
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

.btn-group .button {
    background-color: #4CAF50; /* Green */
    border: 1px solid green;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    cursor: pointer;
    float: left;
}
.btn-group .button:not(:last-child) {
    border-right: none; /* Prevent double borders */
}
.btn-group .button:hover {
    background-color: #3e8e41;
}
</style>
</head>
<body>
<h3>แบบฟอร์มลงทะเบียน</h3>
<form action="dopost.php" method="post" class="a">
    ชื่อ-นามสกุล: <br/>
    <input type="text" class="text" name="name" id="name" /> <br/>
    อีเมล: <br/>
    <input type="email" class="text" name="email" id="email" /> <br/>
    เพศ: <br/>
    <input type="radio" class="radio" name="sex" id="sex1" value="ชาย" /> ชาย
    <input type="radio" class="radio" name="sex" id="sex2" value="หญิง" /> หญิง
    <br/>
    ความสนใจ: <br/>
    <input type="checkbox" class="checkbox" name="intr1" id="intr1" value="เรียน"/> เรียน
    <input type="checkbox" class="checkbox" name="intr2" id="intr2" value="เกมส์"/> เกมส์
    <br/>
    ที่อยู่: <br/>
    <textarea class="text" name="address" id="address" rows="4" cols="50" ></textarea>
    <br/>
    จังหวัด: <br/>
    <select name="province" id="province">
        <option value="">---เลือกจังหวัด---</option>
    <?php
    while ($row = $result->fetch_array()) { ?>
        <option value="<?php echo $row['PROVINCE_ID']; ?>"><?php echo $row['PROVINCE_NAME']; ?></option>
    <?php } ?>
    </select><br/>

    <br/><br/>
    <input type="submit" id="submit" value="Submit" name="submit" />
</form>

<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script>
$('#submit').on('click',function(event){
    var valid = true;
    errorMessage = "";

    if ($('#name').val() == '') {
        errorMessage = "โปรดป้อนชื่อ-นามสกุล \n";
        valid = false;
    }

    if ($('#email').val() == '') {
        errorMessage += "โปรดป้อน email\n";
        valid = false;
    }else if (!(($('#email').val().indexOf(".") > 0) && ($('#email').val().indexOf("@") > 0)) || /[^a-zA-Z0-9.@_-]/.test($('#email').val())) {
	    errorMessage+="โปรดป้อน email ให้ถูกต้อง\n";
	    valid=false;
	}

    if($('#sex1').prop("checked") == false && $('#sex2').prop("checked") == false){
	    errorMessage += "โปรดเลือก เพศ \n";
	    valid = false;
	}

	if($('#intr1').prop("checked") == false && $('#intr2').prop("checked") == false){
	    errorMessage += "โปรดเลือกความสนใจอย่างน้อย 1 อย่าง \n";
	    valid = false;
	}

    if ($('#address').val() == '') {
        errorMessage += "โปรดป้อนที่อยู่\n";
        valid = false;
    }

    if($('#province').val() == ''){
		errorMessage += "โปรดเลือกจังหวัด \n";
		valid = false;
	}

    if ( !valid && errorMessage.length > 0) {
        alert(errorMessage);
        event.preventDefault();
    }
});
</script>

<button class="button" style="vertical-align:middle" name="info" onclick="linkto();"><span>ER Diagram</span></button>
<script>
    function linkto() {
        window.location='http://angsila.cs.buu.ac.th/~58160253/887371/lab07/er.png';
    }
</script>

<div class="btn-group">
  <button class="button" onclick="link1();">Source Code: <br>register_form.php</button>
  <button class="button" onclick="link2();">Source Code: <br>dopost.php</button>
  <button class="button" onclick="link3();">Source Code: <br>show_register.php</button>
</div>

<script>
    function link1() {
        window.location='https://github.com/chayanbank/lab07/blob/master/register_form.php';
    }
    function link2() {
        window.location='https://github.com/chayanbank/lab07/blob/master/dopost.php';
    }
    function link3() {
        window.location='https://github.com/chayanbank/lab07/blob/master/show_register.php';
    }
</script>

</body>
</html>