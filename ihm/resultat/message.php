
    <div class="blocList">
        <div>
       <?php if($_SESSION['monProfil']->getIdUser() == $element->getExp()->getIdUser()): ?>
            <p> A : 
         <?=  $element->getDest()->getNom()  ?> 
         <?=  $element->getDest()->getPrenom()  ?> 
         <?php else : ?>
            <p> De : 
        <?=  $element->getExp()->getNom()  ?> 
         <?=  $element->getExp()->getPrenom()  ?> 
            </p>
            <?php endif; ?>
        </div>
        <div>
            <p>Sujet :
        <?=  $element->getSujet()?>  
            </p>
        </div>           
        <?=  $element->getTexte()?>                
    </div>
<?php if($_SESSION['monProfil']->getIdUser() == $element->getDest()->getIdUser()): ?>
  <div class="blocList">
    <form action=" " method="post" accept-charset="utf-8" class="form" role="form"> 
    <legend>Répondre à ce message</legend>  
    Message :
    <textarea type="textarea" name="texte" class="form-control input-lg" placeholder="texte" maxlength="140" rows="7" /></textarea>
    <input type=hidden name="idExped" value="<?= $_SESSION["monProfil"]->getIdUser(); ?>" />
    <input type=hidden name="dateEnvoi" value="<?= getAujourdhui() ?>" />
    <input type=hidden name="sujet" value=" <?=  $element->getSujet()?>  " />
    <input type=hidden name="objectToWorkWith" value="Message" />
    <input type=hidden name="actionToDoWithObject" value="insert" />
    <input type=hidden name="idDest" value=" <?=  $element->getExp()->getIdUser()  ?> " />
    <button type="submit" id="submit" name="submit" class="boutonBleu">Envoyer</button>
    </form>
       
     
  </div>
<?php endif; ?>