  <div class="modal fade" id="monmodal">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button class="close" type="button" data-dismiss="modal">x</button>
                  <h4 class="modal-title">Ajouter</h4>
                </div>
                <div class="modal-body">
          <form action="gestion_ue.php" method="POST" id="form2">
          <div class="row">
            <div class="col-md-6">
             <label for="text">Code UE:</label> 
             <input type="text" name="code"  class="form-control" tabindex="1" required placeholder="Code de l'unité d'enseignement" autofocus> <br/>
              
             <label for="text">Libellé UE:</label> 
             <input type="text" name="libelle"  class="form-control" tabindex="3" required placeholder="Libellé de l'unité d'enseignement" autofocus> <br/>
            
           </div>
         </div>

          </form>   
                    
                </div>
                <div class="modal-footer">

             <button type="submit" class="btn btn-success" name="ajouter"  form="form2">Ajouter</button>
           <button type="reset" class="btn btn-warning" data-dismiss="modal">annuler</button>
                </div>

              </div>

            </div>

          </div>
	
