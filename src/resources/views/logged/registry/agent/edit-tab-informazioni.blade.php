<div class="row border-bottom py-2">
  <div class="col">
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="lastName">Cognome</label>
        <input type="text" class="form-control" v-model="agent.lname" name="lname" value="{{@$agent->lname}}">
      </div>
      <div class="form-group col-md-6">
        <label for="firstName">Nome</label>
        <input type="text" class="form-control" v-model="agent.fname" name="fname" value="{{@$agent->fname}}">
      </div>
      <div class="form-group col-md-4">
        <label for="userLocation">Indirizzo</label>
        <div class="input-group input-group-seamless">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="material-icons"></i>
            </div>
          </div>
          <input type="text" class="form-control" name="address" value="{{@$agent->address}}">
        </div>
      </div>
      <div class="form-group col-md-3">
        <label for="phoneNumber">Città</label>
        <input type="text" class="form-control" name="city" value="{{@$agent->city}}">
      </div>
      <div class="form-group col-md-2">
        <label for="phoneNumber">CAP</label>
        <input type="text" class="form-control" name="zip" value="{{@$agent->zip}}">
      </div>
      <div class="form-group col-md-3">
        <label for="phoneNumber">Provincia</label>
        <input type="text" class="form-control" name="district" value="{{@$agent->district}}">
      </div>
      <div class="form-group col-md-4">
        <label for="emailAddress">CF</label>
        <div class="input-group input-group-seamless">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="material-icons">folder_shared</i>
            </div>
          </div>
          <input type="text" class="form-control" name="CF" value="{{@$agent->CF}}">
        </div>
      </div>
      <div class="form-group col-md-4">
        <label for="emailAddress">Indirizzo Email</label>
        <div class="input-group input-group-seamless">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="material-icons"></i>
            </div>
          </div>
          <input type="email" class="form-control" name="email" value="{{@$agent->email}}">
        </div>
      </div>
      <div class="form-group col-md-4">
        <label for="emailAddress">Telefono</label>
        <div class="input-group input-group-seamless">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="material-icons">phone</i>
            </div>
          </div>
          <input type="phone" class="form-control" name="phone" value="{{@$agent->phone}}">
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
  <div class="form-group col-md-8">
    <label for="emailAddress">Ragione Sociale</label>
    <div class="input-group input-group-seamless">
      <div class="input-group-prepend">
        <div class="input-group-text">
          <i class="material-icons">domain</i>
        </div>
      </div>
      <input type="text" class="form-control" name="company" value="{{@$agent->company}}">
    </div>
  </div>
  <div class="form-group col-md-4">
    <label for="phoneNumber">P.IVA</label>
    <input type="text" class="form-control" name="PIVA" value="{{@$agent->PIVA}}">
  </div>
</div>
