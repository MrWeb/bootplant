<div class="row border-bottom py-2">
  <div class="col">
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="lname">Cognome</label>
        <input type="text" class="form-control" v-model="insurance.lname" name="lname" value="{{@$insurance->lname}}">
      </div>
      <div class="form-group col-md-6">
        <label for="fname">Nome</label>
        <input type="text" class="form-control" v-model="insurance.fname" name="fname" value="{{@$insurance->fname}}">
      </div>
      <div class="form-group col-md-4">
        <label for="address">Indirizzo</label>
        <div class="input-group input-group-seamless">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="material-icons"></i>
            </div>
          </div>
          <input type="text" class="form-control" name="address" value="{{@$insurance->address}}">
        </div>
      </div>
      <div class="form-group col-md-3">
        <label for="city">Città</label>
        <input type="text" class="form-control" name="city" value="{{@$insurance->city}}">
      </div>
      <div class="form-group col-md-2">
        <label for="zip">CAP</label>
        <input type="text" class="form-control" name="zip" value="{{@$insurance->zip}}">
      </div>
      <div class="form-group col-md-3">
        <label for="district">Provincia</label>
        <input type="text" class="form-control" name="district" value="{{@$insurance->district}}">
      </div>
      <div class="form-group col-md-4">
        <label for="CF">CF</label>
        <div class="input-group input-group-seamless">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="material-icons">folder_shared</i>
            </div>
          </div>
          <input type="text" class="form-control" name="CF" value="{{@$insurance->CF}}">
        </div>
      </div>
      <div class="form-group col-md-4">
        <label for="email">Indirizzo Email</label>
        <div class="input-group input-group-seamless">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="material-icons"></i>
            </div>
          </div>
          <input type="email" class="form-control" name="email" value="{{@$insurance->email}}">
        </div>
      </div>
      <div class="form-group col-md-4">
        <label for="phone">Telefono</label>
        <div class="input-group input-group-seamless">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="material-icons">phone</i>
            </div>
          </div>
          <input type="phone" class="form-control" name="phone" value="{{@$insurance->phone}}">
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row border-bottom py-2 bg-light">
  <div class="col my-2">
    Informazioni Aziendali
  </div>
</div>
<div class="form-row py-2">
  <div class="form-group col-md-6">
    <label for="company">Ragione Sociale</label>
    <div class="input-group input-group-seamless">
      <div class="input-group-prepend">
        <div class="input-group-text">
          <i class="material-icons">domain</i>
        </div>
      </div>
      <input type="text" class="form-control" name="company" value="{{@$insurance->company}}">
    </div>
  </div>
  <div class="form-group col-md-3">
    <label for="PIVA">P.IVA</label>
    <input type="text" class="form-control" name="PIVA" value="{{@$insurance->PIVA}}">
  </div>
  <div class="form-group col-md-3">
    <label for="n_agenzia">Numero Agenzia</label>
    <input type="text" class="form-control" name="n_agenzia" value="{{@$insurance->n_agenzia}}">
  </div>
</div>
