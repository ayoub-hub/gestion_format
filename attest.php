 <?php 
include("connect.php"); 

?>

<!DOCTYPE html>
<html>
<head>
    <title>Les Attestation</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="css/design.css" rel="stylesheet">
<link href="css/att.css" rel="stylesheet">


</head>
<body>

<div class="topnav">
  <a class="active" href="form1.php">formulaire</a>
  <a href="affichage.php">Affichage</a>
   <a href="recherche.php">Recherche</a>
  <a href="attest.php">Attestation</a>
  <div class="search-container">
    <form action="" method="POST">
      <input type="text" placeholder="ecrire nom de participant" name="search">
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
	
	
		
		while($row=mysqli_fetch_array($result)){
		echo"
		 <table  >
        <tr>
           <td>
            <div>	
      	     <img src='css/cni.jpg' width='150px' height='120px'>
            </div>
          </td> 
            <td>
              
            </td>

            <td>
           <center>
            <svg xmlns='http://www.w3.org/2000/svg' width='150' height='150' fill='currentColor' class='bi    bi-award' viewBox='0 0 16 16'>
              <path d='M9.669.864 8 0 6.331.864l-1.858.282-.842 1.68-1.337 1.32L2.6 6l-.306 1.854 1.337 1.32.842 1.68 1.858.282L8 12l1.669-.864 1.858-.282.842-1.68 1.337-1.32L13.4 6l.306-1.854-1.337-1.32-.842-1.68L9.669.864zm1.196 1.193.684 1.365 1.086 1.072L12.387 6l.248 1.506-1.086 1.072-.684 1.365-1.51.229L8 10.874l-1.355-.702-1.51-.229-.684-1.365-1.086-1.072L3.614 6l-.25-1.506 1.087-1.072.684-1.365 1.51-.229L8 1.126l1.356.702 1.509.229z'/>
             <path d='M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1 4 11.794z'/>
           </svg>
          </center>
        </td>
         </tr>
        <tr>
         
         <td></td>

       </tr>
       <tr>
         <td colspan='3'>
           <h1>
	          <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-star' viewBox='0 0 16 16'>
            <path d='M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z'/>
           </svg>
         
          Attestation 
 	          
       
 	        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-star' viewBox='0 0 16 16'>
            <path d='M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z'/>
          </svg>
        </h1>
      </td>

       </tr>
       <tr>
        <td colspan='3'>
          <h2>
           de participation
          </h2>
  
        </td>
      </tr>
      <tr>
        <td colspan='3'>
          <center>
            <hr class='new5'>
          </center>
        </td> 
      </tr>
 
 	
 		 <tr>
 		  
 			 <td colspan='3'>
 			  <h3 class='des'>décerné à</h3>
 		    </td>
 		    
 		</tr>
 		<tr>
      
      
      <td colspan='3'>
        <h2 class='bas'>".$row['nomp']."</h2>
      </td>
 		   
 	   </tr>
 		
     <tr>
 	   <td></td>
 	
      <td>
        <p class='cord'>	Pour avoir participe
      
        a la formation ".$row['theme']." ".$row['mode']."
       
        anime par ".$row['theme']."
        </p>
       </td> 
       <td></td>
     </tr>
 




	
       
       	<tr>
       		<td class='dat'>
             <h3>Date</h3>
          </td>
          <td>
            
          </td>
       		<td class='sig'>
            <h3>Signature</h3>
          </td>
       	</tr>
       	<tr>
       		<td ></td>
       		<td ></td>
          <td ></td>

       	</tr>
       	<tr>
       		<td class='dat'>
            <h3> ".$row['periode']."</h3>
          </td>
          <td></td>
       		<td colspan='2'>
            <img src='css/Signature.png' class='Signature' width='300px'>
          </td>
       	</tr> </tbody>
		</table>"
  ;
	}
	
	}
	}
 
	?>
</body>
</html>

