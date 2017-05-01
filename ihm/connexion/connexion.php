
<div class="container">
    <div class="row">
        <div class='col-md-3'></div>
        <div class="col-md-6">
            <div class="login-box well">
                    <form action="" method="POST">
                        <legend>Se connecter</legend>
                        <div class="form-group">
                            <label for="username-email"> Pseudo :</label>
                            <input type="text" name="pseudo" size="20" maxlength="20" required="required" value="id333"  placeholder="votre pseudo"  class="form-control"/>
                        
                        </div>
                        <div class="form-group">
                            <label for="password">Mot de passe:</label>
                               <input type="password" name="mdp" size="20" maxlength="20" required="required" value="ju4d" placeholder="Password"  class="form-control"/>
                            
                        </div>
                     
                        <div class="form-group">
                             <input type=hidden name=connexion value=on></input>
                            <input type="submit" class="btn btn-default btn-login-submit btn-block m-t-md" value="Se connecter" />
                        </div>
                      
                        <div class="form-group">
                            <p class="text-center m-t-xs text-sm"> Vous n'avez pas un compte?</p> 
                            <a href="index.php?page=creation/individu.php" class="btn btn-default btn-block m-t-md">Créer un compte</a>
                        </div>
                    </form>
                
            </div>
        </div>
        <div class='col-md-3'></div>
    </div>
</div>