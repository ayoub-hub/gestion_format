
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
  <a class="active" href="form1.php">Formulaire</a>
  <a href="affichage.php">Affichage</a>
    <a href="recherche.php">Recherche</a>
  <a href="attest.php">Attestation</a>

  <div class="search-container">
    <form action="" method="POST">
      <input type="text" placeholder="ecrire theme de formation" name="search">
      <button type="submit" name="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</div>
<?php 

if(isset($_POST['submit'])){
     
     $rech=$_POST['search'];

     $req="select id_c,num_a,checkbox,theme,mode,lieu,gouvernorat,periode,fin_periode,temps,
              fin_t,pause,fin_p
       from cycle
       where theme='$rech'";
     $res=mysqli_query($db,$req);
     if (mysqli_num_rows($res)==0){
     echo "aucun resultat trouve";

      }
     else{
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
    while($row=mysqli_fetch_array($res)){
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
    </table>";
}

  $reqq="select id_c,num_a,checkbox,theme,mode,lieu,gouvernorat,periode,fin_periode,temps,
              fin_t,pause,fin_p
       from cycle
       where theme='$rech'";
     $ress=mysqli_query($db,$reqq);
     
      while($roww=mysqli_fetch_array($ress)){
       $id=$roww['id_c'];

   $req1=" select nom,num_cin,direction,entreprise,journee
       from participant
       where id_c='$id'";
     $res1=mysqli_query($db,$req1);
     if (mysqli_num_rows($res1)==0){
     echo "aucun resultat trouve";
 }
     else{
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
    while($row1=mysqli_fetch_array($res1)){
    echo"
        <tbody>
    <tr>
      <td scope='row'>".
        $row1['nom'].
      "</td>
       <td>"
          .$row1['num_cin']."
       </td>
       <td>"
          .$row1['direction']."
       </td>  
       <td>"
        .$row1['entreprise']."
       </td>
       <td>"
        .$row1['journee']."
       </td>
       
    </tr>
    ";
  }}
  echo "</tbody>
    </table> ";
}

$re="select id_c,num_a,checkbox,theme,mode,lieu,gouvernorat,periode,fin_periode,temps,
              fin_t,pause,fin_p
       from cycle
       where theme='$rech'";
     $result=mysqli_query($db,$re);
     
      while($row1=mysqli_fetch_array($result)){
       $id=$row1['id_c'];


$req3="select nom_f,specialite,direction
       from formateur
       where id_c='$id'"; 

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
    while($row2=mysqli_fetch_array($result3)){
    echo"
        <tbody>
    <tr>
      <td scope='row'>".
        $row2['nom_f'].
      "</td>
       <td>"
          .$row2['specialite']."
       </td>
       <td>"
          .$row2['direction']."
       </td>  
      
       
    </tr>
    ";
  }}
  echo "</tbody>
    </table>";
  }


    
   }

?>
</body>
</html>
