 <?php 
include("connect.php"); 

?>

<!DOCTYPE html>
<html>
<head>
    <title>Recherche</title>
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
    <form action="" method="POST">
      <input type="text" placeholder="Search.." name="search">
      <button type="submit" name="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</div>
<?php
if(isset($_POST['submit'])){
     
      $a=$_POST['search'];

 
 $req="select c.mode as mode,c.theme as theme,c.periode as periode,f.nom_f as nomf,p.nom as nomp
        from `cycle` c,`formateur` f,`participant` p
        
        where  p.nom='$a'
         and c.id_c=f.id_c
        and c.id_c=p.id_c
        
           
        ";

		$result=mysqli_query($db,$req);
		if (mysqli_num_rows($result)==0){
		echo "aucun enregistrement trouve";
	}else{
	?>
	<table border="1" width="80%" align="center">
		<tbody>
			<th>Attestation</th>
			<th>nom</th>
			<th>nom de formateur</th>
			<th>date </th>
			<th>mode formation</th>
            <th>theme formation</th>
		
		<?php 
		while($row=mysqli_fetch_array($result)){
		echo"
		<tr>
			<td>"
				.$row['nomp'].
			"</td>
			 
			 <td>".$row['mode']."-".$row['theme']."
			 </td>
			 <td>".$row['nomf']."-".$row['periode']."
			 </td>
			 <th>".$row['nomp']."
		</tr>";
	}
	echo "</tbody>
		</table>";
	}
	}
 
	?>
</body>
</html>

