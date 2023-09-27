<?php
//verifications des information du formulaire

if(isset($_POST['email']) && isset($_POST['mdp'])) { // verifications des informations de l'$utilisateur
    //email et mot de passe dans des variables
    $email = $_POST['$email'];
    $mdp = $_POST['$mdp'];
    //verifications des informations entrées 
    //connection a la base de données
    $nom_serveur = "localhost";
    $utilisateur = "root";
    $mot_de_passe ="";
    $nom_base_données ="Information";
    $con = mysqli_connect($nom_serveur,$utilisateur,$mot_de_passe,$nom_base_données);
    //requete pour selectionner l'utilisateur qui a pour email et mot de passe les indentifiants qui ont été entrées
    $req = mysqli_query($con,"SELECT * FROM utilisateurs WHERE email='$email' AND mdp ='$mdp");
    $num_ligne = mysqli_num_rows($req); //compter le nombre de ligne ayant rapport a la requette sql
    if($num_ligne > 1){
        header("location :bienvenu.php"); //si le nombre de ligne est > 1 ? on sera redirigé vers la page bienvenu
    }else{// sinon
        echo "Adresse Mail ou Mots d passe incorectes !";
    }
}
?>