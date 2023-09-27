<?php 
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=information;charset=utf8;', 'root', 'root');
if (isset($_POST['envoi']))
    if(!empty($_POST['Nom']) and !empty($_POST['Prenom']) and !empty($_POST['Numero']) and !empty($_POST['Email'])){
        $Nom = htmlspecialchars($_post['Nom']);
        $Prenom = htmlspecialchars($_post['Prenom']);
        $Numero = $Numero = $_POST['Numero'];
        $email = htmlspecialchars($_POST['email']);
$bdd->exec('INSERT INTO newsletter(email) VALUES($_email)');
        $insertparticipant = $bdd->prepare('insert into users(pseudo,mdp)values(?,?)');
        $insertparticipant->execute(array($Nom,$Prenom,$Numero,$Email));
        
        $recupparticipant = $bdd->prepare('select * from users where pseudo = ? and mdp = ?');
        $recupparticipant->execute(array($Nom,$Prenom,$Numero,$Email));
        if($recupparticipant->rowCount() > 0){
            $_SESSION['$Nom'] = $Nom;
            $_SESSION['Prenom'] = $Prenom;
            $_SESSION['$Numero'] = $Numero;
            $_SESSION['Email'] = $Email;
            $_SESSION['id'] = $recupparticipant->fetch()['id'];
        }
        echo $_SESSION['id'];
        
        
    }else{
        echo "veuillez compléter tous les champs...";
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>inscription</title>
    <meta charset="utf-8">
</head>

<body>
    <form method="post" action="" align="center">
        <input type="text" name="Nom">
        <br />
        <input type="text" name="Prenom">
        <input type="text" name="Numero">
        <input type="text" name="Email">
        <br />
        <input type="submit" name="envoyer">
    </form>
</body>

</html>