

<div class="container" id="wrap">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <p style="color:red;">@team : TODO</p>
            <form action=" " method="post" accept-charset="utf-8" class="form" role="form">   
                <legend>Ajouter un jeu à ma ludothèque</legend>
                Nom :
                <select name="nom">
                    <?php
                    include 'job/dao/Connexion_DataBase.php';
                    selectDico("jeu_t", "nom");
                    ?>
                </select>



                <input type=hidden name="objectToWorkWith" value="Jeu_T" />
                <input type=hidden name="actionToDoWithObject" value="insert" />

                <input type="submit" name="submit" value="Ajouter ce jeu"/>
                <input type="reset" value="Réinitialiser">
            </form>          
        </div>
    </div>            
</div>




