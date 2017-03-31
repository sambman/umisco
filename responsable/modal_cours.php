<div class="modal fade" id="monmodal">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button class="close" type="button" data-dismiss="modal">x</button>
                  <h4 class="modal-title">Ajouter un  nouveau  cours</h4>
                </div>
                <div class="modal-body">
          <form action="gestion_cours.php" method="POST" id="form2">
          <div class="row">
            <div class="col-md-6">            
              <label for="text">Nom:</label> 
              <input type="text" name="nom"  class="form-control" tabindex="1" required placeholder="Nom du cours" autofocus> <br/>
              <label for="text"> Description</label>
              <textarea name="description" class="form-control" tabindex="3" required></textarea><br/>
              <label for="text"> Unités d'Enseignement</label>
                <?php
                  // on va lister les unités d'enseignements 
                  $result=Listerue();
                  while($row=mysql_fetch_row($result))
                  {
                    $id_ue[]=$row[0];
                    $nom_ue[]=$row[1];
                    $id_pof[]=$row[2];
                  }
                  if(!empty($id_ue))
                  {
                    ?>
                    <select class="form-control" name="ue" tabindex="5"  required>
                      <?php
                      for($i=0;$i<count($id_ue);$i++)
                      {
                        echo "<option>".$nom_ue[$i]."</option>";
                      }
                      ?>
                    </select></br>
                <?php
                  }
                else
                  {
                ?>
          <script>
          alert("Aucun UE N'existe veuillez d'abord en créer ");
          document.location.href="gestion_ue.php";
          </script>
    <?php
            }
            ?>  
            </div>
            <div class="col-sm-6 col-xs-6 col-md-6 col-md-6">
                <label for="text">Coefficient:</label> 
                <input type="number" name="coef" min="1"  class="form-control" tabindex="2" required placeholder="Coefficient du cours" > <br/>
              <label for="text"> Catégorie</label> 
                <select class="form-control" name="categorie" tabindex="4"  required>
                  <option>Obligatoire</option>
                  <option>Optionnel</option>
                  <option>Initiation à la recherche</option>
                </select></br></br>
                  <label for="text">Crédit:</label> 
                <input type="number" name="credit"  min="1" class="form-control" tabindex="6" required placeholder="Crédit du cours" > <br/>                
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

