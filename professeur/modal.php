<div class="modal fade" id="monmodal">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button class="close" type="button" data-dismiss="modal">x</button>
                  <h4 class="modal-title">Ajouter une  nouvelle  note</h4>
                </div>
                <div class="modal-body">
          <form action="gestion_notes.php" method="POST" id="form2">
          <div class="row">
            <div class="col-md-6">
             
            
             <label for="text">Note:</label> 
             <input type="text" name="note"  class="form-control" tabindex="1" required placeholder="note du cours" autofocus> <br/>
            
            <label for="text"> Etudiants</label>
            
            <?php
            // on va lister les unités d'enseignements 
            $result=listetudiant();
            while($row=mysql_fetch_row($result))
            {
              $id_user[]=$row[0];
              $nom_user[]=$row[3];
              $prenom_user[]=$row[4];
            }
            if(!empty($id_user))
            {
              ?>
              <select class="form-control" name="id_user" tabindex="5"  required>
              <?php
              for($i=0;$i<count($id_user);$i++)
              {
                echo "<option>".  $prenom_user[$i]." ".  $nom_user[$i]." /id :".  $id_user[$i]."</option>";
              }
              ?>
            </select>

              <?php

            }
            else
            {
             ?>
          <script>
          alert("Aucun Etudiant veuillez contacter le reponsable pédagogique ");
          document.location.href="index.php";
          </script>
            <?php
            }
            ?>

          <label for="text"> Cours</label>

          <?php
            // on va lister les courss 
            $result=Listercours();
            while($row=mysql_fetch_row($result))
            {
              
              $idcours[]=$row[0];
              $nomcours[]=$row[1];
              
            }
            if(!empty($nomcours))
            {
              ?>
              <select class="form-control" name="idcours" tabindex="5"  required>
              <?php
              for($i=0;$i<count($nomcours);$i++)
              {
  
                echo "<option>".  $nomcours[$i]." /id :".  $idcours[$i]."</option>";
              }
              ?>
            </select>

              <?php

            }
            else
            {
             ?>
          <script>
          alert("Aucun cours N'existe veuillez d'abord en créer ");
          document.location.href="gestion_ue.php";
          </script>
          <?php
            }
            ?>
            </div>
            

          </div>

          </form>   
                    
                </div>
                <div class="modal-footer">

             <button type="submit" class="btn btn-success" name="ajouter"  form="form2">ajouter</button>
           <button type="reset" class="btn btn-warning" data-dismiss="modal">annuler</button>
                </div>

              </div>

            </div>

          </div>

