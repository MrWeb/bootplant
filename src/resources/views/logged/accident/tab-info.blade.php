{{-- Dettagli Ordine --}}
<div class="row py-2">
  <div class="col">
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="targa">Targa</label>
        <input type="text" class="form-control" v-model="accident.targa" name="targa" id="targa" value="{{@$accident->targa}}">
      </div>
      <div class="form-group col-md-8">
        <label for="telaio">Numero di Telaio</label>
        <input type="text" class="form-control" v-model="accident.telaio" name="telaio" id="telaio" value="{{@$accident->telaio}}">
      </div>
      <div class="form-group col-md-4">
        <label for="marca">Marca</label>
        <input type="text" class="form-control" v-model="accident.marca" name="marca" id="marca" value="{{@$accident->marca}}">
      </div>
      <div class="form-group col-md-4">
        <label for="modello">Modello</label>
        <input type="text" class="form-control" v-model="accident.modello" name="modello" id="modello" value="{{@$accident->modello}}">
      </div>
      <div class="form-group col-md-4">
        <label for="colore">Colore</label>
        <input type="text" class="form-control" v-model="accident.colore" name="colore" id="colore" value="{{@$accident->colore}}">
      </div>
      <div class="form-group col-md-4">
        <label for="internal_accident_code">Numero Interno Sinistro</label>
        <input type="text" class="form-control" v-model="accident.internal_accident_code" name="internal_accident_code" id="internal_accident_code" value="{{@$accident->internal_accident_code}}">
      </div>
      <div class="form-group col-md-8">
        <vue-search-small endpoint="customerlist" label="Assicurazione Collegata"></vue-search-small>
        {{-- <label for="insurance_id">Assicurazione Collegata</label>
        <input type="text" :readonly="registry.kind == 'insurance'" class="form-control" v-model="accident.insurance_id" name="insurance_id" id="insurance_id" value="{{@$accident->insurance_id}}"> --}}
      </div>
      <div class="form-group col-md-12">
        <label for="descrizione">Descrizione Lavoro</label>
        <textarea name="descrizione" id="descrizione" rows="5" class="form-control" v-model="accident.descrizione"></textarea>
      </div>
    </div>
  </div>
</div>
