<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="menu.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="global.css">
    <link rel="stylesheet" href="inspi.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <title>Document</title>

    <nav role="navigation">
        <div id="menuToggle">
            <input type="checkbox">
            <span></span>
            <span></span>
            <span></span>
            <ul id="menu">
                <a id="home" href="index.html">
                    <li>Home</li>
                </a>
                <a href="#">
                    <li>Calendrier</li>
                </a>
                <a href="inspi.php">
                    <li>Inspiration</li>
                </a>
                <a href="index.html"><img src="img/logo.png" alt="logo"></a>
                <a href="#">
                    <li>Échange</li>
                </a>
                <a href="#">
                    <li>Compte</li>
                </a>
            </ul>
        </div>
    </nav>
</head>

<body>
    <?php
    $host = "localhost"; //serveur
    $username = "root"; //identifiant pour acceder à la base de données
    $password = "root"; //mdp de username
    $dbname = "Learning Lab"; //Nom de la base de données


    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password); //variable connexion : accès à la base de données
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->GetMessage();
    }


    $affichage = "SELECT posts_id, posts_image, posts_titre, posts_pp, posts_user FROM posts";
    $resultat = $conn->prepare($affichage);
    $resultat->execute();
    ?>

    <?php
    echo "<div class='projects'>";
    while ($ligne = $resultat->fetch()) {
        echo '<div class="post" id="post' . $ligne['posts_id'] . '"><img src="' . $ligne['posts_image'] . '" id="project-image"> </img>' .
            '<h3 id="project-titre">' . $ligne['posts_titre'] . '</h3><div id="user-infos"><img src="' . $ligne['posts_pp'] . '" id="user-pp"> </img><p id="username">' . $ligne['posts_user'] . '</p></div></div>';
    }
    echo "</div>"
    ?>
    <a id="addPost" href="poster.php"><img src="img/plus.png" alt="addPost"></a>


    <script src="script.js"></script>
</body>

</html>