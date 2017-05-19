<p style="color:red;">@team : TODO - ajouter un bouton de recherche de message</p>            
<legend>Mes messages</legend>
  <?php
    if (!empty($_SESSION["mesMessages"])):
        foreach ($_SESSION["mesMessages"] as $message) :
            ?>
            <tr> 
                <td><?= $message->getIdMessage() ?></td>
                <td><?= $message->getExp() ?></td>
                <td><?= $message->getDateEnvoi() ?></td>
                <td><?= $message->getSujet()?></td>
                <td id="table-recherche">
                    <form action=" " method="post" accept-charset="utf-8">
                        <input type=hidden name="objectToWorkWith" value="Message" />
                        <input type=hidden name="actionToDoWithObject" value="read" />
                        <input type="hidden" name="idMessage" value="<?= $message->getIdMessage() ?>" />
                       
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

