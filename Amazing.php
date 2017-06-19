<!DOCTYPE html>
<html>
 <head>
     <title>Scare</title>
 <style type="text/css">
 @import url("styles.css");
    #centerLayer {
     background: lavender; /* Цвет фона */
	 float:left;
	 margin-left: 40px; 
    }
   </style>
</head>

<body>
 <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>

 <script type="text/javascript" language="javascript">
    // function call() {
        // alert('tyt');
 	  // var msg   = $('#formx').serialize();
        // $.ajax({
          // type: 'POST',
          // url: 'res.php',
          // data: msg,
          // success: function(data) {
            // $('#results').html(data);
          // },
          // error:  function(xhr, str){
	    // alert('Возникла ошибка: ' + xhr.responseCode);
          // }
        // });
 
    // }
// </script>


<div id="shapka"><h1>People <hr/></div>

<div id="centerLayer">

    <form method="post"  action="Amazing.php" >
        <p>Имя: <input id="name" name="name" placeholder="Name" pattern="[a-zA-Zа-яА-ЯёЁ]+" type="text" size='20' maxlength='11' minlength='3' required></p>

        <p>Дата рождения: <input id="bdate" name="bdate" type="date"></p>

        <p>Телефон: <input id="phone" name="phone" placeholder="(___) ___ __ __" 
		pattern="^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$" 
		title="Формат: (096) 999 99 99" required></p>

        <p>E-mail: <input id="email" name="email" type="email" placeholder="example@gmail.com" required></p>

        <p>О себе: <br /><textarea id="about" name="about" cols="30" rows="5"></textarea></p>

        <p><input type='submit' name='add' value='Send'></p>
    </form>
</div>

<?php 
include_once ("db.php");
	if(isset($_POST['add']))
	{
		$name = strip_tags(trim($_POST['name']));
		$bdate = strip_tags(trim($_POST['bdate']));
		$phone = strip_tags(trim($_POST['phone']));
		$email = strip_tags(trim($_POST['email']));
		$about = strip_tags(trim($_POST['about']));
	
		mysql_query(" 
		INSERT INTO humans(name, bdate, phone, email, about) 
		VALUES ('$name', '$bdate', '$phone', '$email', '$about')"
		);

        
		
	}
?>
		
	
 



<div id="tablet">
<table>
<tr>
 <th>  </th>
  <th>Имя</th>
  <th>Дата рождения</th>
  <th>Телефон</th>
  <th>E-mail</th>
  <th>О себе</th>
  </tr>
  <?php
	$result = mysql_query(" SELECT * FROM humans ");
	while ($row = mysql_fetch_array($result))
	{?>
 <tr>
 <td><a href="delete.php?id=<?php echo $row['id']?>"><img src="red.png" width="20" 
   height="20" border = "0" ></a></td>
  <td><?php echo $row['name'];?></td>
  <td><?php echo $row['bdate'];?></td>
  <td><?php echo $row['phone'];?></td>
  <td><?php echo $row['email'];?></td>
  <td><?php echo $row['about'];?></td>
<?php	}
mysql_close();
	?>
 </tr>
</table>
</div>
 </body>
</html>