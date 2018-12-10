<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="formu-secu.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link rel="shortcut icon" type="image/png" href="https://pbs.twimg.com/profile_images/378800000765892928/49b0cf8a89026ef646eb696a8d1d13ea.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>form-sécu</title>
</head>

<body>
    <main>
        <div class="container-fluid">
            <div class="container">
                <h1 class="col-sm-12 titre">Formulaire</h1>
            </div>
        </div>
        <!--prénom & nom + email + pays + message + genre (H/F) + sujet (3 sujets possibles, plusieurs choix possibles) Tous les champs sont obligatoires, sauf le sujet (dans ce cas, valeur = "Autre")-->
        <div class="container-fluid formulaire" id='formu'>
            <div class="container">
                <div class="row">
                    <form class="col-sm-12 formulaire" action="sanitization.php" method="post">
                        <div class="row p-n">
                            <div class="col-sm-5">
                                <label for="prénom">Ton prénom :</label>
                                <input class="form-control" type="text" name="prenom" placeholder="Jean-philippe" required>
                            </div>
                            <div class="col-sm-5 offset-sm-2">
                                <label for="nom">Ton nom :</label>
                                <input class="form-control" type="text" name="nom" placeholder="Albert" required>
                            </div>
                        </div>
                        <div class="row p-n">
                            <div class="col-sm-12 ">
                                <label for="e-mail">Ton adresse e-mail :</label>
                                <input class="form-control" type="email" name="email" placeholder="ex: jean-philppe-albert@gmail.com" required>
                            </div>
                        </div>
                        <div class="row p-n">
                            <select class="col-sm-4 offset-sm-1" name="pays">
                                    <option value="1">Belgique</option>
                                    <option value="2">Allemagne</option>
                                    <option value="3">Suisse</option>
                                    <option value="4">Maroc</option>
                            </select>
                            <div class="col-sm-4 offset-sm-3">
                                <input type="radio" name="genre" value="1" checked>
                                <label for="homme">homme</label>
                                <input type="radio" name="genre" value="2" checked>
                                <label for="femme">femme</label>
                            </div>
                        </div>
                        <div class="row p-n">
                            <div class="col-sm-2 offset-sm-1">
                                <input type="checkbox" id="hardware" name="sujet[]" value="1" checked>
                                <label for="hardware">hardware</label>
                            </div>
                            <div class="col-sm-2 offset-sm-1">
                                <input type="checkbox" id="logiciel" name="sujet[]" value="2" checked>
                                <label for="logiciel">Logiciel</label>
                            </div>
                            <div class="col-sm-2 offset-sm-1">
                                <input type="checkbox" id="prix" name="sujet[]" value="3" checked>
                                <label for="prix">Prix</label>
                            </div>
                            <div class="col-sm-2 offset-sm-1">
                                <input type="checkbox" id="autre" name="sujet[]" value="4" checked>
                                <label for="autre">Autre</label>
                            </div>
                            <div class="form-group purple-border col-sm-12">
                                <label for="Votre message">Votre message</label>
                                <textarea class="form-control" name="message" id="message" rows="3" required></textarea>
                            </div>

                            <div class="col-sm-12 submit">
                                <input type="submit" name="submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>