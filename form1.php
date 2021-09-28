<?php 
include("connect.php"); 

 if(isset($_POST['submit'])){

     $na=$_POST['naction'];

     $c=$_POST['c'];
     $th=$_POST['theme'];
     $m=$_POST['mode'];
     $l=$_POST['lieu'];
     $gv=$_POST['gouvernort'];
     $ddu=$_POST['bdate1'];
     $da=$_POST['bdate2'];
     $tdu=$_POST['btime1'];
     $ta=$_POST['btime2'];
     $pause=$_POST['ptime1'];
     $pa=$_POST['ptime2'];
     $chk="";  
foreach($c as $chk1)  
   {  
      $chk .= $chk1.",";
      } 
     
       $req="INSERT INTO cycle(num_a,checkbox,theme,mode,lieu,gouvernorat,periode,fin_periode,temps,
              fin_t,pause,fin_p)

              VALUES ('$na','$chk','$th','$m','$l','$gv','$ddu','$da','$tdu','$ta','$pause','$pa')";

              $result1=mysqli_query($db,$req);
              if($result1){
                 echo'<script>alert("Inserted cycle Successfully")</script>';  
               }else{
                     echo'<script>alert("failed to insert cycle")</script>';  

              } 
        $id="select id_c from cycle where id_c=(select max(id_c) from cycle)";
        $aff=mysqli_query($db,$id);
            while($row=mysqli_fetch_array($aff)){
                  $id_c=$row['id_c'];
}
  $pname=$_POST['pname'];
    $pcin=$_POST['pcin'];
     $pdir=$_POST['pdirection'];
     $pent=$_POST['pentreprise'];
     $pj=$_POST['pjournee'];
    $req2="INSERT INTO participant  (nom,num_cin,direction,entreprise,journee,id_c)
              VALUES ( '$pname','$pcin','$pdir','$pent','$pj','$id_c')";
              $result2=mysqli_query($db,$req2);
              if($result2){
                 echo'<script>alert("Inserted participant Successfully")</script>';  
            
              }else{
                     echo'<script>alert("failed to insert participant")</script>';  
              } 
     $fname=$_POST['fname'];
     $fs =$_POST['fspecial'];
     $fdir=$_POST['fdirection'];
     
     
     
    $req3="INSERT INTO formateur (nom_f,specialite,direction,id_c)
              VALUES ( '$fname','$fs','$fdir','$id_c')";
              $result3=mysqli_query($db,$req3);
              if($result3){
               echo'<script>alert("Inserted formateur Successfully")</script>';  
                

              }else{
                     echo'<script>alert("failed to insert formateur")</script>';  
              } 
            
           
}
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">

    <title>feuille de presence</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/form.css" rel="stylesheet">
        <link href="css/design.css" rel="stylesheet">


  </head>
  <body>
    
    <div class="testbox">
      <form action="" method="POST">
        <div class="banner">
          <h1>feuille de presence</h1>
        </div>
        <br/>
        <fieldset>
          <legend>cycle</legend>
             <p>Entreprise:Centre national de l'informatique</p>
          <div class="item">
            <label for="fname"> N° d'action<span>*</span></label>
            <input id="fname" type="number" name="naction" />
          </div>
          <div class="item">
            <label class="container">Crédit d'impôt
               <input type="checkbox" checked="checked" name="c[]" value="Crédit d impôt">
               <span class="checkmark"></span>
              </label>
              <label class="container">Droit de tirage(individuel)
               <input type="checkbox" name="c[]" value="Droit de tirage(individuel)">
               <span class="checkmark"></span>
              </label>
              <label class="container">Droit de tirage(collectif)
               <input type="checkbox" name="c[]" value="Droit de tirage(collectif)">
               <span class="checkmark"></span>
              </label>
          </div>
          <div class="item">
            <label for="activity">Thème de formation<span>*</span></label>
            <input id="activity" type="text" name="theme" />
          </div>
          <div class="item">
            <label for="fee">Mode de formation<span>*</span></label>
            <input id="fee" type="text" name="mode" />
          </div>
          <div class="item">
            <label for="activity">Lieu de déroulement<span>*</span></label>
            <input id="activity" type="text" name="lieu" />
          </div>
          <div class="item">
            <label for="fee">Gouvernorat<span>*</span></label>
            <input id="fee" type="text" name="gouvernort" />
          </div>
          <div class="item">
            <label for="fee">periode:du:<span>*</span></label>
            <input id="bdate" type="date" name="bdate1" />
            <i class="fas fa-calendar-alt"></i>
          </div>

          <div class="item">
            <label for="bdate">au: <span>*</span></label>
            <input id="bdate" type="date" name="bdate2" />
            <i class="fas fa-calendar-alt"></i>
          </div>

           <div class="item">
            <label for="fee">horaire:du:<span>*</span></label>
            <input id="bdate" type="time" name="btime1" />
            
          </div>

          <div class="item">
            <label for="bdate">à: <span>*</span></label>
            <input id="bdate" type="time" name="btime2" />
            
          </div>

           <div class="item">
            <label for="fee">pause:du:<span>*</span></label>
            <input id="bdate" type="time" name="ptime1" />
            
          </div>

          <div class="item">
            <label for="bdate">à: <span>*</span></label>
            <input id="bdate" type="time" name="ptime2" />
            
          </div>
           
        </fieldset>
        <br/>
        <fieldset>
          <legend>participant</legend>
           <div class="item">
          <div class="item">
            <label for="fname"> Nom et prénom<span>*</span></label>
            <input id="fname" type="text" name="pname" />
          </div>
          <div class="item">
            <label for="lname">N°CIN<span>*</span></label>
            <input id="lname" type="number" name="pcin" />
          </div>
          <div class="item">
            <label for="address1">Direction/Service<span>*</span></label>
            <input id="address1" type="text"   name="pdirection" />
          </div>
          <div class="item">
            <label for="address2">Entreprise<span>*</span></label>
            <input id="address2" type="text"   name="pentreprise" />
          </div>
          <div class="item">
            <label for="city">Emargement:</label>
          </div>
          <div class="item">
            <label for="state">journée<span>*</span></label>
            <input id="state" type="text"   name="pjournee" />
          </div>
                            
        </fieldset>
         <fieldset>
          <legend>formateur</legend>
          <div class="item">
            <label for="fname">nom et prenom du formateur<span>*</span></label>
            <input id="fname" type="text" name="fname" />
          </div>
          
          <div class="item">
            <label for="activity">spécialité<span>*</span></label>
            <input id="activity" type="text" name="fspecial" />
          </div>
          <div class="item">
            <label for="fee">direction<span>*</span></label>
            <input id="fee" type="text" name="fdirection" />
          </div>
          
           
        </fieldset>
         <div class="btn-block">
          <button type="submit" name="submit">Submit</button>
         </div>
      </form>
    </div>

  </body>
</html>