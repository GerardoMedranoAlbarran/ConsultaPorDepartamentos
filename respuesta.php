
 <?php

 	$host = 'localhost';
   	$user = 'root';
   	$pass = '';
   	$dbname = 'employees';
   	//$conn = mysql_connect($host, $user, $pass);
 	
	$conexion = mysqli_connect( $host, $user,$pass);
	$db = mysqli_select_db($conexion,$dbname);
	$get = $_GET['Department'];
  	
  	$query = "SELECT 
              employees.emp_no AS Id_empleado,
              CONCAT(first_name,' ',last_name) AS FULLNAME,
              title AS Title,
              salary AS Salary
              FROM employees 
              JOIN current_dept_emp ON employees.emp_no=current_dept_emp.emp_no 
              JOIN titles ON  employees.emp_no=titles.emp_no
              JOIN salaries ON employees.emp_no=salaries.emp_no
              WHERE salaries.to_date>=CURDATE() 
              AND titleS.to_date > CURDATE()
              AND dept_no = '$get' 
              LIMIT 10;";



   	$result = mysqli_query($conexion,$query);
  	$flag_once = true;

    echo "<style> table, th, td {border: 1px solid black;} </style>";

    echo "<table style='width:100%'>";
  	while($row = mysqli_fetch_assoc($result)){
   		if($flag_once){
        echo "<tr>";
        foreach ($row as $key => $val) 
          echo "<th>".$key."</th>"; 
        echo "</tr>";   
        $flag_once = false;
      }
      echo "<tr>";
   		foreach ($row as $key =>$value){
   			if($flag_once);
   			echo "<td>".$value."</td>"; 
   		} 				 
   		echo "</tr>";	
   	}
    echo "</table>";

   	


   


?>