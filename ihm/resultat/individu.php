 <div class="image_acceuil">
                <img src="ihm/img/letsplay.png"/>

            </div>
<div class="container">
      <div class="row">
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo  $_SESSION["user"]->getNom(); ?> </h3>
            </div>
            <div class="panel-body">
              <div class="row">
                  <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                       
                             <tr>
                        <td>Pseudo : </td>
                        <td> <?php echo  $_SESSION["user"]->getPseudo(); ?></td>
                      </tr>
                    <tr>
                        <td>Nom :</td>
                        <td><?php echo  $_SESSION["user"]->getNom(); ?></td>
                      </tr>
                      <tr>
                        <td>Prenom :</td>
                        <td><?php echo  $_SESSION["user"]->getPrenom(); ?></td>
                      </tr>
                      <tr>
                        <td>Email :</td>
                        <td><a href="mailto:' . $individu->getEmail() . '"><?php echo  $_SESSION["user"]->getEmail() ; ?></a></td>
                      </tr>
                   
                      <tr>
                        <td>date d inscription :</td>
                        <td><?php echo  $_SESSION["user"]->getDateInscription() ; ?></td>
                      </tr>
                      <tr>
                        <td>date de naissance :</td>
                        <td> <?php echo  $_SESSION["user"]->getDateNaissance() ; ?></td>
                      </tr>
                       <tr>
                       
                       <tr>
                        <td>ville :</td>
                        <td><?php echo  $_SESSION["user"]->getVille()   ; ?></td>
                      </tr>
                       <tr>
                        <td>Departement :</td>
                        <td><?php echo  $_SESSION["user"]->getDept()   ; ?></td>
                      </tr>
                        <tr>
                        <td>Code Postal :</td>
                        <td> <?php echo  $_SESSION["user"]->getCodePostal() ; ?></td>
                      </tr>
                      <tr>
                        <td>Tel :</td>
                        <td><?php echo  $_SESSION["user"]->getTelephone() ; ?><br>
                        </td>
                           
                      </tr>
                     
                    </tbody>
                  </table>
                  
                  <a href="#" class="btn btn-primary">Mes jeux</a>
                  <a href="#" class="btn btn-primary">Mes messages</a>
                </div>
              </div>
            </div>
           
          </div>
        </div>
      </div>
    </div>   

