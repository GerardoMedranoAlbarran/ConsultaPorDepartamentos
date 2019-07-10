<form  method="get" action="respuesta.php">
 <?php echo "<br><br>Selecciona un departamento:";?> 

 <select tipe="text" name="Department">
	  
<?php
		//vercion dinamica :D
	 	$host = 'localhost';
	   	$user = 'root';
	   	$pass = '';
	   	$dbname = 'employees';
		$conexion = mysqli_connect( $host, $user,$pass);
		$db = mysqli_select_db($conexion,$dbname);
		$query = "SELECT * FROM departments ORDER BY dept_name;";
		$result = mysqli_query($conexion,$query);
		while($row = mysqli_fetch_assoc($result))
   				echo "<option value='{$row['dept_no']}'>{$row['dept_name']}</option>";
   		mysql_close($conexion);
?>

	<!--     vercion no dinamica
  	<option value="d009">Customer Service</option>
   	<option value="d005">Development</option>
	<option value="d002">Finance</option>
	<option value="d003">Human Resources</option>
	<option value="d001">Marketing</option>
	<option value="d004">Production</option>
	<option value="d006">Quality Management</option>
	<option value="d008">Research</option>
	<option value="d007">Sales</option>
	  -->
  </select>

   <?php echo "<br><br><br><br>Numero de registros:<br>";?> 
  <input type="radio" name="tam" value="10" checked> 10<br>
  <input type="radio" name="tam" value="20"> 20<br>
  <input type="radio" name="tam" value="30"> 30<br>
  <input type="submit" name="submit" value="Submit" />
</form>


