
<form action="" method="post" accept-charset="utf-8" class="form" > 
    <legend>Envoyer un message</legend>
    Pseudo du destinataire :
    <?php
    $pseudo ="";
    if(!empty($_REQUEST['idDest'])){
        $pseudo = $_REQUEST['pseudo'];
    }
   
    ?>
    <input type ="text" name="pseudo" class="form-control input-lg" value="<?= $pseudo; ?>">
    <?php if(!empty($_REQUEST['idDest'])): ?>
    <input type="hidden" name="idDest" class="form-control input-lg" value="<?= $_REQUEST['idDest'] ?>" />
    <?php endif; ?>

    Sujet du message :
    <input type="text" name="sujet" class="form-control input-lg" placeholder="sujet" required />
    Message :
    <textarea type="textarea" name="texte" class="form-control input-lg" placeholder="texte" maxlength="140" rows="7" /></textarea>

    <input type=hidden name="idExped" value="<?= $_SESSION["monProfil"]->getIdUser(); ?>" />
    <input type=hidden name="objectToWorkWith" value="Message" />
    <input type=hidden name="actionToDoWithObject" value="insert" />
  
    <button type="submit" id="submit" name="submit" class="boutonBleu">Envoyer</button>
</form>


