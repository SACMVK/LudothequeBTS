
    <div class="container">
        <div class="paragraphe_accueil">
            <?php if (empty($_SESSION)): ?>
                <a class="paragraphe_accueil"  href="index.php?page=creation/individu.php">
                    Bienvenu.e dans la Ludothèque du BTS,<br/>
                    première plate-forme d'échange de jeux !<br/>
                    Partagez vos jeux et jouez avec les autres,<br/>
                    Rejoignez-nous !
                </a>
            <?php else: ?>
                <p class="paragraphe_accueil" >
                    Bienvenu.e dans votre Ludothèque, <?= $_SESSION["monProfil"]->getPseudo() ?> !
                </p>
            <?php endif; ?>
        </div>


        <div id="slide" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img class="center-block" src=" ihm/img/carte.jpg">
                    <!--
                                            <div class="carousel-caption">
                                                <h3>jeu</h3>
                                                <p class="lead">jeu_test</p>
                                            </div>
                    -->
                </div>

                <div class="item">
                    <img class="center-block" src="ihm/img/jeu.jpg" alt="jeu">
                    <!--
                    <div class="carousel-caption">
                     
                        <h1>JEU</h1>
                        <p class="lead">Jeu_Test</p>
                    </div>
                    -->
                </div>
                <div class="item">
                    <img class="center-block" src="ihm/img/roll.jpg" alt="jeu">
                    <!--
                    <div class="carousel-caption">
                        <h1>JEU</h1>
                        <p class="lead">Jeu_Test</p>
                    </div>
                    -->
                </div>
                <div class="item">
                    <img class="center-block" src="ihm/img/jeu1.jpg" alt="jeu">
                    <!--
                    <div class="carousel-caption">
                        <h1>Jeu</h1>
                        <p class="lead">Jeu_test</p>
                    </div>
                    -->
                </div>
                <div class="item">
                    <img class="center-block" src="ihm/img/monopoly.jpg" alt="jeu">
                    <!--
                    <div class="carousel-caption">
                        <h1>Jeu</h1>
                        <p class="lead">Jeu_test</p>
                    </div>
                    -->
                </div>
                <div class="item">
                    <img class="center-block" src="ihm/img/pc.jpg" alt="jeu">
                    <!--
                                          <div class="carousel-caption">
                                              <h1>Jeu</h1>
                                              <p class="lead">Jeu_test</p>
                                          </div>
                    -->
                </div>
                <div class="item">
                    <img class="center-block" src="ihm/img/poker.jpg" alt="jeu">
                    <!--
                    <div class="carousel-caption">
                        <h1>Jeu</h1>
                        <p class="lead">Jeu_test</p>
                    </div>
                    -->
                </div>
                <div class="item">
                    <img class="center-block" src="ihm/img/uno.jpg" alt="jeu">
                    <!--
                          <div class="carousel-caption">
                              <h1>Jeu</h1>
                              <p class="lead">Jeu_test</p>
                          </div>
                    -->
                </div>



            </div>


        </div>

        <div class="widget">
            <!--AhMaD: premier widget-->
            <div class="collection-accueil">
                <a href="#" class="collection-accueil-item">
                    <h2 class="collection-accueil-title">Jeux Cartes</h2>
                    <div class="collection-accueil-item-image" style="background-image: url(ihm/img/poker.jpg ) ">



                    </div>
                    <div class="collection-accueil-item-content">
                        <div class="collection-accueil-item-content-limiter">
                            <div class="collection-accueil-item-title">Poker</div>
                            <div class="collection-accueil-item-type">Jeux de cartes</div>

                            <div class="collection-accueil-item-text">Le poker est une famille de jeux de cartes
                                comprenant de nombreuses formules et variantes. Il se pratique à plusieurs joueurs avec un jeu
                                généralement de cinquante-deux cartes et des jetons représentant les sommes misées.</div>
                        </div>


                    </div>
                </a>

            </div>
            <!-- AhMaD:deuxième widget-->
            <div class="collection-accueil">
                <a href="#" class="collection-accueil-item">
                    <h2 class="collection-accueil-title">Jeux Vidéo</h2>
                    <div class="collection-accueil-item-image" style="background-image: url(ihm/img/video.jpg ) ">



                    </div>
                    <div class="collection-accueil-item-content">
                        <div class="collection-accueil-item-content-limiter">
                            <div class="collection-accueil-item-title">PlayStation</div>
                            <div class="collection-accueil-item-type">jeux électrique social</div>

                            <div class="collection-accueil-item-text">Vive les aventures dans votre maison sans sortir.</div>
                        </div>


                    </div>
                </a>

            </div>
            <!-- AhMaD:troisième widget-->
            <div class="collection-accueil">
                <a href="#" class="collection-accueil-item">
                    <h2 class="collection-accueil-title">jeux sportif</h2>
                    <div class="collection-accueil-item-image" style="background-image: url(ihm/img/Boules.jpg ) ">



                    </div>
                    <div class="collection-accueil-item-content">
                        <div class="collection-accueil-item-content-limiter">
                            <div class="collection-accueil-item-title">Boule bretonne</div>
                            <div class="collection-accueil-item-type">jeux sportif social</div>

                            <div class="collection-accueil-item-text">La boule bretonne est un sport populaire en Bretagne qui s'apparente plus
                                à la boule lyonnaise qu'à la pétanque. La principale caractéristique de la boule bretonne est la grande variété dans sa pratique.
                                Bien qu’ayant la même base.</div>
                        </div>


                    </div>
                </a>

            </div>

        </div>


    </div>

