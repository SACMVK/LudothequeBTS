<div class="container" id="wrap">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
              <p style="color:red;">@team : TODO</p>
            <form action=" " method="post" accept-charset="utf-8" class="form" role="form">   
                <legend>Proposer un nouveau jeu à la ludothèque</legend>
                Nom :
                <input type="text" name="nom" size="10" maxlength="10" required value="nom" class="form-control input-lg"  placeholder="Nom"/>

                <input type=hidden name="objectToWorkWith" value="Jeu_T" />
                <input type=hidden name="actionToDoWithObject" value="insert" />

                <input type="submit" name="submit" value="Proposer ce jeu"/>
                <input type="reset" value="Réinitialiser">
            </form>          
        </div>
    </div>            
</div>

