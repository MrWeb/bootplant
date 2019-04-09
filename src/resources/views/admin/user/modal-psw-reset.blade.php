<button type="button" ref="modal" class="d-none btn btn-primary" data-toggle="modal" data-target="#event"></button>
<form action="{{url('users/password/update')}}" method="POST">
  @csrf
  <input type="hidden" name="user_id" value="{{@$user->id}}">
  <div class="modal fade" id="event" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Aggiorna Password</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <ul class="list-group list-group-flush">
            <li class="list-group-item p-3">
              <label for="current">Password Attuale</label>
              <input type="password" class="form-control" name="current" id="current" v-model="modal_data.current">
            </li>
            <li class="list-group-item p-3">
              <label for="new">Nuova Password</label>
              <input type="password" class="form-control" name="new" id="new" v-model="modal_data.new">
            </li>
            <li class="list-group-item p-3">
              <label for="confirm">Conferma Nuova Password</label>
              <input type="password" class="form-control" :class="{'is-invalid':(modal_data.new != modal_data.new_confirm)}" name="confirm" id="confirm" v-model="modal_data.new_confirm">
              <div class="invalid-feedback">Le due password non corrispondono</div>
            </li>
          </ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" ref="modal_close" data-dismiss="modal">Annulla</button>
          <button type="submit" class="btn btn-primary" :disabled="modal_data.new != modal_data.new_confirm">Conferma</button>
        </div>
      </div>
    </div>
  </div>
</form>
