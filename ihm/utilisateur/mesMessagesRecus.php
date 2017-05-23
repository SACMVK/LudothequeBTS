
<legend>Mes messages</legend>
  <?php
    if (!empty($_SESSION["mesMessagesRecus"])):
        foreach ($_SESSION["mesMessagesRecus"] as $message) :
       
            ?>
            <tr> 
                
                <td><?= $message->getExp()->getNom()  ?></td>
                <td><?= $message->getExp()->getPrenom()  ?></td>          
                <td><?= $message->getSujet()?> </td>
                <td><?= $message->getDateEnvoi() ?></td>
                
                <td id="table-recherche">
                    <form action=" " method="post" accept-charset="utf-8">
                        <input type=hidden name="objectToWorkWith" value="Message" />
                        <input type=hidden name="actionToDoWithObject" value="read" />
                                               
                    </form>
                    <form action=" " method="post" accept-charset="utf-8">
                        <input type=hidden name="objectToWorkWith" value="Message" />
                        <input type=hidden name="actionToDoWithObject" value="delete" />
                        <input type="hidden" name="idMessage" value="<?= $message->getIdmessage() ?>" />
                        <input type="image" name="submit" class="boutonTransparent" value="Supprimer ce message de ma ludothèque" src="ihm/img/delete.png">
                    </form>
                </td>
            </tr> <br>
            <?php
        endforeach;
    else:
        ?>
        <tr>
            <td>Aucun résultat</td>
        </tr>
    <?php
    endif;
    ?>
</table>

