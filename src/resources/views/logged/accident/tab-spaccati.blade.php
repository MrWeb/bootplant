<div class="row border-bottom py-2">
  <div class="col">
    <div class="form-row">
      <div class="form-group col-md-12">
        <label for="listino">Listino Prezzi</label>
        <select class="form-control" name="list_id" id="listino" v-model="accident.list_id">
          <option value="1">Uno</option>
          <option value="2">Due</option>
        </select>
      </div>
    </div>
  </div>
</div>
<div class="row border-bottom py-2 bg-light">
  <div class="col col-md-12 my-2" v-show="!accident.list_id">
    Selezionare il Listino
  </div>
  <div class="col col-md-12 my-2" v-show="accident.list_id">
    Spaccato Auto
  </div>
</div>
