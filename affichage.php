<?php 
include("connect.php"); ?>
<!DOCTYPE html>
<html>
<head>
	    <title>Affichage</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/design.css" rel="stylesheet">
</head>
<body>
<div class="topnav">
  <a class="active" href="form1.php">formulaire</a>
  <a href="affichage.php">affichage</a>
  <div class="search-container">
    <form action="">
      <input type="text" placeholder="Search.." name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</div>
    <br>

<?php

$req1="select num_a,checkbox,theme,mode,lieu,gouvernorat,periode,fin_periode,temps,
              fin_t,pause,fin_p
       from cycle";

/*$req2="select nom,num_cin,direction,entreprise,journee
       from participant"; 

*/

		$result1=mysqli_query($db,$req1);
   /*     $result2=mysqli_query($db,$req2);
		$result3=mysqli_query($db,$req3);*/

		if (mysqli_num_rows($result1)==0){
		echo "aucun enregistrement trouve";
	}else{
	?>
	<table class="table" border="1" width="-250" align="center">
		<thead class="thead-dark">
			<tr>
			<th scope="col" >numera d'action</th>
			<th scope="col">action</th>
			<th scope="col">theme de formation</th>
			<th scope="col">mode de formation</th>
			<th scope="col">lieu de deroulement</th>
            <th scope="col">gouvernorat</th>
            <th scope="col">Debut de formation</th>
            <th scope="col">Fin du formation</th>
            <th scope="col">horaire du</th>
            <th scope="col">à</th>
            <th scope="col">pause du</th>
            <th scope="col">à</th>
            </tr>
		</thead>
		<?php 
		while($row=mysqli_fetch_array($result1)){
		echo"
          <tbody
		<tr>
			<th scope='row'>".
				$row['num_a'].
			"</th>
			 <td>"
			    .$row['checkbox']."
			 </td>
			 <td>"
			    .$row['theme']."
			 </td>	
			 <td>"
			  .$row['mode']."
			 </td>
			 <td>"
			  .$row['lieu']."
			 </td>
			 <td>"
			  .$row['gouvernorat']."
			 </td>
			 <td>"
			  .$row['periode']."
			 </td>
			 <td>"
			  .$row['fin_periode']."
			 </td>
			 <td>"
			  .$row['temps']."
			 </td>
			 <td>"
			  .$row['fin_t']."
			 </td>
			 <td>"
			  .$row['pause']."
			 </td>
			 <td>"
			   .$row['fin_p']."
			 </td>
			 
			 
		</tr>
		";
	}
	echo "</tbody>
		</table> <br> <hr> <br> ";
	}
	
   
	$req2="select nom,num_cin,direction,entreprise,journee
       from participant"; 

    $result2=mysqli_query($db,$req2);
    if (mysqli_num_rows($result2)==0){
		echo "aucun enregistrement trouve";
	}else{
	?>
	<table class="table"  border="1" width="80%"  align="center">
		<thead class="thead-dark">
			<tr>
			<th scope="col">nom de participant</th>
			<th scope="col">N°cin</th>
			<th scope="col">direction</th>
			<th scope="col">entreprise</th>
			<th scope="col">journee</th>
			</tr>
          </thead>
		
		<?php 
		while($row=mysqli_fetch_array($result2)){
		echo"
        <tbody>
		<tr>
			<td scope='row'>".
				$row['nom'].
			"</td>
			 <td>"
			    .$row['num_cin']."
			 </td>
			 <td>"
			    .$row['direction']."
			 </td>	
			 <td>"
			  .$row['entreprise']."
			 </td>
			 <td>"
			  .$row['journee']."
			 </td>
			 
		</tr>
		";
	}
	echo "</tbody>
		</table><br> <hr><br>";
	}
     
$req3="select nom_f,specialite,direction
       from formateur"; 

    $result3=mysqli_query($db,$req3);
    if (mysqli_num_rows($result3)==0){
		echo "aucun enregistrement trouve";
	}else{
	?>
	<table class="table" border="1" width="80%"  align="center">
		<thead class="thead-dark">
		  <tr>
			<th scope="col">nom de formateur</th>
			<th scope="col">specialite</th>
			<th scope="col">direction</th>
		  </tr>	
		</thead>	
            
		
		<?php 
		while($row=mysqli_fetch_array($result3)){
		echo"
        <tbody>
		<tr>
			<td scope='row'>".
				$row['nom_f'].
			"</td>
			 <td>"
			    .$row['specialite']."
			 </td>
			 <td>"
			    .$row['direction']."
			 </td>	
			
			 
		</tr>
		";
	}
	echo "</tbody>
		</table>";
	}

     ?>
 
     </body>
</html>