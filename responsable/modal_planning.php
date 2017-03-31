<div class="modal fade" id="monmodal">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button class="close" type="button" data-dismiss="modal">x</button>
                  <h4 class="modal-title">Planifier les cours</h4>
                </div>
                <div class="modal-body">
          <form action="gestion_planning.php" method="POST" id="form2">
          <div class="row">
            <div class="col-md-6">
             
            
             <label for="text">Date début:</label> 
             <input type="date" name="dated"  class="form-control" tabindex="1" required  autofocus> <br/>
            

              <label for="text">Date fin:</label> 
             <input type="date" name="datef"  class="form-control" tabindex="2" required  autofocus> <br/>
            
            <label for="text"> Cours</label>
            <?php
            // on va lister les courss 
            $result=Listercours();
            while($row=mysql_fetch_row($result))
            {
              
              $nomcours[]=$row[1];
              
            }
            if(!empty($nomcours))
            {
              ?>
              <select class="form-control" name="nomcours" tabindex="3"  required>
              <?php
              for($i=0;$i<count($nomcours);$i++)
              {
                echo "<option>".$nomcours[$i]."</option>";
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
          document.location.href="gestion_cours.php";
          </script>
      

    <?php



            }

            ?> 
            
            </div>


            <div class="col-sm-6 col-xs-6 col-md-6 col-md-6">
                <label for="text">heure début:</label> 
                <input type="time" name="heured"  class="form-control" tabindex="4" required  > <br/>
    
              <label for="text">heure fin:</label> 
                <input type="time" name="heuref"  class="form-control" tabindex="5" required  > <br/>
    
                <label for="text"> Pofesseur</label> 
                          <?php
            // on va lister les proofs 
            $result=Listerprofs();
            while($row=mysql_fetch_row($result))
            {
              
              $nomprofs[]=$row[3];
              $prenomprofs[]=$row[4];
              $id_profs[]=$row[0];
              
            }
            if(!empty($nomprofs))
            {
              ?>
              <select class="form-control" name="prof" tabindex="6"  required>
              <?php
              for($i=0;$i<count($nomprofs);$i++)
              {
                echo "<option>".  $prenomprofs[$i]." ".  $nomprofs[$i]." /id :".  $id_profs[$i]."</option>";
              }
              ?>
            </select>

              <?php

            }
            else
            {
             ?>
          <script>
          alert("Aucun professeur N'existe veuillez d'abord en créer ");
          document.location.href="index.php";
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

