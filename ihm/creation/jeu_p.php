

<div class="container" id="wrap">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form action=" " method="post" accept-charset="utf-8" class="form" role="form">   
                <legend>Ajouter un jeu à ma ludothèque</legend>
                Nom du jeu :
                <select name="idPC" class="form-control input-lg">
                    <?php
                    include 'job/dao/Connexion_DataBase.php';
                    selectValuesWithId("jeu_t", "nom", "idPC");
                    ?>
                </select>

                
                <input type=hidden name="idProprietaire" value="<?= $_SESSION["monProfil"]->getIdUser(); ?>" />

                <input type=hidden name="objectToWorkWith" value="Jeu_P" />
                <input type=hidden name="actionToDoWithObject" value="insert" />

                <button type="submit" name="submit" class="btn btn-primary pull-right">Ajouter ce jeu</button>
                <button type="reset" name="reset" class="btn btn-primary pull-left">Réinitialiser</button>
                
            </form>          
        </div>
    </div>            
</div>




