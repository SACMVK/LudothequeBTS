<p style="color:red;">@team : TODO - ajouter un bouton de recherche de message</p>            
<legend>Mes messages</legend>
  <?php
    if (!empty($_SESSION["mesMessagesRecus"])):
        foreach ($_SESSION["mesMessagesRecus"] as $message) :
            ?>
            <tr> 
                <td><?= $message->getIdMessage() ?></td>
                <td><?= $message->getExpediteur->getNom  ?></td>
                <td><?= $message->getDateEnvoi() ?></td>
                <td><?= $message->getSujet()?></td>
                <td><?= $message->gettexte()?></td>
                <td id="table-recherche">
                    <form action=" " method="post" accept-charset="utf-8">
                        <input type=hidden name="objectToWorkWith" value="Message" />
                        <input type=hidden name="actionToDoWithObject" value="read" />
                                               
                    </form>
                </td>
            </tr> 
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

