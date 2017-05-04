

<div class="container" id="wrap">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <form action=" " method="post" accept-charset="utf-8" class="form" role="form">   
                <legend>Trouver un compte</legend>
                Nom :
                <input type="text" name="nom" class="form-control input-lg" maxlength="12" placeholder="Nom" />
                Prénom :
                <input type="text" name="prenom" class="form-control input-lg" maxlength="12" placeholder="Prénom" />
                Pseudo :
                <input type="text" name="Pseudo" class="form-control input-lg" maxlength="12" placeholder="Prénom" />
                Ville :
                <input type="text" name="ville" class="form-control input-lg" maxlength="12" placeholder="Ville" />
                Pseudo :
                <input type="number" name="numDept" class="form-control input-lg" maxlength="5" placeholder="Département" />

                <input type=hidden name="objectToWorkWith" value="Individu" />
                <input type=hidden name="actionToDoWithObject" value="selectList" />


                <button type="submit" name="submit" class="btn btn-primary pull-right">Rechercher</button>
                <button type="reset" name="reset" class="btn btn-primary pull-left">Réinitialiser</button>

            </form>          
        </div>
    </div>            
</div>
