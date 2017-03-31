<div class="modal fade" id="monmodal">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button class="close" type="button" data-dismiss="modal">x</button>
                  <h4 class="modal-title">Ajouter un  nouveau  Utilisateur</h4>
                </div>
                <div class="modal-body">
          <form action="gestion_user.php" method="POST" id="form2">
          <div class="row">
            <div class="col-md-6">
             
            
             <label for="text">Nom:</label> 
             <input type="text" name="nom"  class="form-control" tabindex="1" required placeholder="Nom de l'utilisateur" autofocus> <br/>
            
            <label for="text"> login</label>
            <input type="text" class="form-control" name="login" tabindex="3"  required  placeholder="Prenom de l'utilisateur"><br/>

            <label for="text"> Telephone</label>
            <input type="text" class="form-control" name="numtel" tabindex="5" required><br/>
            
            

            </div>


            <div class="col-sm-6 col-xs-6 col-md-6 col-md-6">
                <label for="text">Prenom:</label> 
                <input type="text" name="prenom"  class="form-control" tabindex="2" required placeholder="Prenom du patient" > <br/>

               <label for="text"> Mot de passe</label>
               <input type="password" class="form-control" name="password" tabindex="4" required placeholder="Mot de passe l'utilisateur"><br/>

               <label for="text"> email</label>
               <input type="email" class="form-control" name="email" tabindex="6"  required><br/>
                <label for="text"> Type</label> 
                <select class="form-control" name="type" tabindex="7"  required>
                  <option>Etudiant</option>
                  <option>Professeur</option>
                  <option>Doctorant</option>
                  <option>Chercheur</option>
                </select>
            </div>
            

          </div>

          </form>   
                    
                </div>
                <div class="modal-footer">

             <button type="submit" class="btn btn-success" name="enregistrer"  form="form2">Enregistrer</button>
           <button type="reset" class="btn btn-warning" data-dismiss="modal">annuler</button>
                </div>

              </div>

            </div>

          </div>

