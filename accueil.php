<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Sportify : Consultation Sportive</title>
    <link href="logo.jpg" rel="icon" type="image/x-icon" />
    <script src="script.js" defer></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<!-- Bibliothèque jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
	<!-- Dernier JavaScript compilé -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        .carousel {
            max-width: 800px;
            height: 450px;
            margin: 20px auto;
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 0;
        }

        .carousel img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: none;
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }

        .carousel img.active {
            display: block;
            opacity: 1;
        }

        .carousel-controls {
            position: absolute;
            top: 50%;
            width: 100%;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);
        }

        .carousel-controls button {
            background-color: rgba(0, 0, 0, 0.5);
            border: none;
            color: white;
            padding: 10px;
            cursor: pointer;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            outline: none;
            transition: background-color 0.3s ease;
        }

        .carousel-controls button:hover {
            background-color: rgba(0, 0, 0, 0.7);
        }

        .carousel-indicators {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(0%);
            display: flex;
            justify-content: center;
        }

        .carousel-indicators span {
            display: block;
            width: 10px;
            height: 10px;
            margin: 0 5px;
            background-color: rgba(255, 255, 255, 0.5);
            border-radius: 50%;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .carousel-indicators span.active {
            background-color: white;
        }

        #footer {
            height: auto;
        }
    </style>
</head>
<body>
    <div id="header">
        <h1>
            <button class="button" data-text="Awesome">
                <span class="actual-text">&nbsp;Sportify&nbsp;</span>
                <span aria-hidden="true" class="hover-text">&nbsp;Sportify&nbsp;</span>  
            </button>
        </h1> 
    </div>
    <div id="navigation">
        <div class="logo">
            <a href="accueil.php">
                <img src="logo.jpg" alt="Sportify Logo" width="100" height="100">
            </a>
        </div>
        <div class="nav-item">
            <a href="accueil.php">
                <h3>
                    <button class="button" data-text="Awesome">
                        <span class="actual-text">&nbsp;Accueil&nbsp;</span>
                        <span aria-hidden="true" class="hover-text">&nbsp;Accueil&nbsp;</span>  
                    </button>
                </h3>
            </a>
        </div> 
        <div class="nav-item">
            <a href="#">
                <h3>
                    <button class="button" data-text="Awesome">
                        <span class="actual-text">&nbsp;Parcourir&nbsp;</span>
                        <span aria-hidden="true" class="hover-text">&nbsp;Parcourir&nbsp;</span>  
                    </button>
                </h3>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="index.html"> Les Activités sportives</a>
                <a class="dropdown-item" href="index2.html"> Les Sports de compétition</a>
                <a class="dropdown-item" href="salle_de_sport.php">Salle de sport Omnes</a>
            </div>
        </div> 
        <div class="nav-item">
            <a href="rechercher.html">
                <h3>
                    <button class="button" data-text="Awesome">
                        <span class="actual-text">&nbsp;Recherche&nbsp;</span>
                        <span aria-hidden="true" class="hover-text">&nbsp;Recherche&nbsp;</span>  
                    </button>
                </h3>
            </a>
        </div> 
        <div class="nav-item">
            <a href="#">
                <h3>
                    <button class="button" data-text="Awesome">
                        <span class="actual-text">&nbsp;Réservation&nbsp;</span>
                        <span aria-hidden="true" class="hover-text">&nbsp;Réservation&nbsp;</span>  
                    </button>
                </h3>
            </a>
        </div> 
        <div class="nav-item">
            <a href="accueil.html">
                <h3>
                    <button class="button" data-text="Awesome">
                        <span class="actual-text">&nbsp;Compte&nbsp;</span>
                        <span aria-hidden="true" class="hover-text">&nbsp;Compte&nbsp;</span>  
                    </button>
                </h3>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="compte-client.php"> Votre compte client</a>
                <a class="dropdown-item" href="compte-coach.php"> Votre compte coach</a>
                <a class="dropdown-item" href="compte-admin.php"> Votre compte administrateur</a>

            </div>
        </div> 
    </div>
    <div id="section">
        <div class="content">
                <br><p>Bienvenue sur notre plateforme Sportify ! Nous sommes ravis de vous accueillir parmi nous.Que vous soyez un athlète chevronné ou un amateur passionné de sport, vous êtes au bon endroit pour explorer, découvrir et vivre pleinement votre passion pour le sport.</p>
                <p>Profitez de notre large gamme de fonctionnalités pour planifier vos entraînements, suivre vos performances, découvrir de nouveaux sports, et bien plus encore. Notre équipe est là pour vous accompagner à chaque étape de votre parcours sportif.</p>
                <p>N'hésitez pas à explorer notre site et à nous contacter si vous avez des questions ou besoin d'assistance. Nous sommes là pour rendre votre expérience sur Sportify aussi enrichissante et agréable que possible.</p>
                <p>Que votre aventure sportive commence dès maintenant !</p><br>
        </div>
        <h2>Différents sports :</h2>      
        <div class="carousel">
            <img src="Coach_Basketball.jpg" alt="Basketball" class="active">
            <img src="Coach_Biking.jpg" alt="Biking" >
            <img src="Coach_Fitness.jpg" alt="Fitness">
            <img src="Coach_Musculation.jpg" alt="Musculation">
            <img src="Coach_Football.jpg" alt="Football">
            <img src="Coach_Natation.jpg" alt="Natation">
            <img src="Coach_Plongeon.jpg" alt="Plongeon">
            <img src="Coach_Rugby.jpg" alt="Rugby">
            <img src="Coach_Tennis.jpg" alt="Tennis">
            <img src="Coach_Cardio-training.jpg" alt="Cardio-training">
            <div class="carousel-controls">
                <button onclick="prevSlide()">&#10094;</button>
                <button onclick="nextSlide()">&#10095;</button>
            </div>
            <div class="carousel-indicators">
                <span onclick="goToSlide(0)" class="active"></span>
                <span onclick="goToSlide(1)"></span>
                <span onclick="goToSlide(2)"></span>
                <span onclick="goToSlide(3)"></span>
                <span onclick="goToSlide(4)"></span>
                <span onclick="goToSlide(5)"></span>
                <span onclick="goToSlide(6)"></span>
                <span onclick="goToSlide(7)"></span>
                <span onclick="goToSlide(8)"></span>
                <span onclick="goToSlide(9)"></span>
            </div>
        </div>

        <script>
            let currentIndex = 0;
            const images = document.querySelectorAll('.carousel img');
            const indicators = document.querySelectorAll('.carousel-indicators span');

            function showSlide(index) {
                images[currentIndex].classList.remove('active');
                indicators[currentIndex].classList.remove('active');
                currentIndex = (index + images.length) % images.length;
                images[currentIndex].classList.add('active');
                indicators[currentIndex].classList.add('active');
            }

            function nextSlide() {
                showSlide(currentIndex + 1);
            }

            function prevSlide() {
                showSlide(currentIndex - 1);
            }

            function goToSlide(index) {
                showSlide(index);
            }

            // Auto slide
            setInterval(nextSlide, 5000); // Change image every 3 seconds
        </script>
        <br><br>
        <div class="evenement_semaine">
            <h2>Événement de la semaine :</h2>
            <img class="photo_semaine" src="Marathon_Evenement.jpg" alt="Marathon" align="right" width="600" height="300">
            <div class="post">
                <p>Bonjour à toutes et à tous !</p><br>
                <p>En cette magnifique semaine de fin Mai nous terminons les préparatifs du marathon de Paris.</p><br>
                <p>En effet, nous vous attendons avec toute l'équipe cardio-training de Sportify</p><br>
                <p class="last_p">ce samedi pour relever le défis d'une vie !!</p>
            </div>
        </div>
    </div>
    <div id="footer">
        <table>
            <tr>
                <td>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.9405040726577!2d2.310566315674712!3d48.85661407928702!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e671d5ec8ff3b5%3A0xc7886c51e1cbd88b!2s15%20Rue%20de%20Grenelle%2C%2075007%20Paris%2C%20France!5e0!3m2!1sfr!2sfr!4v1616411279154!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Copyright &copy; 2024 Sportify</p>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="mailto:sportify@gmail.com">sportify@gmail.com</a>
                    <p>0139287600</p>
                    <a href="https://www.google.fr/maps/place/15+Rue+de+Grenelle,+75007+Paris/@48.8531959,2.3259779,17z/data=!3m1!4b1!4m6!3m5!1s0x47e671d6973ba029:0xa5580f220b251923!8m2!3d48.8531924!4d2.3285528!16s%2Fg%2F11csmgr_yq?entry=ttu">15 Rue de Grenelle 75015 PARIS</p>
                </td>
            </tr>
        </table> 
    </div>
</body>
</html>
