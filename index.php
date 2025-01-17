<?php
include("config.php");
include("reactions.php");

$getReactions = Reactions::getReactions();
//uncomment de volgende regel om te kijken hoe de array van je reactions eruit ziet
// echo "<pre>".var_dump($getReactions)."</pre>";

if(!empty($_POST)){

    //dit is een voorbeeld array.  Deze waardes moeten erin staan.
    $postArray = [
        'name' => $_POST["name"],
        'email' => $_POST["email"],
        'message' => $_POST["comment"]
    ];

    $setReaction = Reactions::setReaction($postArray);

    if(isset($setReaction['error']) && $setReaction['error'] != ''){
        prettyDump($setReaction['error']);
    }
    

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youtube remake</title>
    <link rel="stylesheet" href="mystyle.css">
</head>
<body>
    <iframe width="560" height="315" src="https://www.youtube.com/embed/watch?v=pRJ-Dai3oB0&list=PLN9X97LDR0XuH5iW6C4AAsiEDNMNke_Ks" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    <h2>Hieronder komen reacties</h2>
    
    <form action="" method="POST">

    <div>
        naam: <input type="text" name="name" value="">
    </div>
    <div>
         email: <input type="text" name="email" value="">
    </div>
    <div> 
        <textarea name="comment" cols= "30" rows="10"></textarea>
    </div>
    <input type="submit" value="Verzenden">
</form>
    <p>Maak hier je eigen pagina van aan de hand van de opdracht</p>

    <?php

    foreach($getReactions as $reaction) {
        echo("<div class='message'>");
        echo"<h3>".$reaction['name']."</h3>";
        echo"<p>".$reaction['message']."</p>";
        echo("</div>");
    }
    ?>
</body>
</html>

<?php
$con->close();
?>