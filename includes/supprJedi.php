<!-- Modal connexion -->
<div class="modal fade" id="delJedi" tabindex="-1" role="dialog" aria-labelledby="connectTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="connectTitle">Ajouter un jedi</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- FORMULAIRE -->
                <form action="suppr.php" method="POST">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Suppression par prénom:</label>
                      <input type="text" class="form-control" name="del_jedi_prenom" id="del_jedi_prenom">
                    </div>
                    <button type="submit" class="btn btn-primary">Valider la supression</button>
                  </form>
            </div>
          </div>
        </div>
      </div>