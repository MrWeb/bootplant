<div class="row border-bottom py-2 mt-1">
  <div class="col">
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="lastName">Cognome</label>
        <input type="text" class="form-control" v-model="customer.lname" name="lname" value="{{@$customer->lname}}">
      </div>
      <div class="form-group col-md-6">
        <label for="firstName">Nome</label>
        <input type="text" class="form-control" v-model="customer.fname" name="fname" value="{{@$customer->fname}}">
      </div>
      <div class="form-group col-md-4">
        <label for="userLocation">Indirizzo</label>
        <div class="input-group input-group-seamless">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="material-icons"></i>
            </div>
          </div>
          <input type="text" class="form-control" name="address" value="{{@$customer->address}}">
        </div>
      </div>
      <div class="form-group col-md-3">
        <label for="phoneNumber">Città</label>
        <input type="text" class="form-control" name="city" value="{{@$customer->city}}">
      </div>
      <div class="form-group col-md-2">
        <label for="phoneNumber">CAP</label>
        <input type="text" class="form-control" name="zip" value="{{@$customer->zip}}">
      </div>
      <div class="form-group col-md-3">
        <label for="phoneNumber">Provincia</label>
        <input type="text" class="form-control" name="district" value="{{@$customer->district}}">
      </div>
      <div class="form-group col-md-4">
        <label for="emailAddress">CF</label>
        <div class="input-group input-group-seamless">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="material-icons">folder_shared</i>
            </div>
          </div>
          <input type="text" class="form-control" name="CF" value="{{@$customer->CF}}">
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
          <input type="email" class="form-control" name="email" value="{{@$customer->email}}">
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
          <input type="phone" class="form-control" name="phone" value="{{@$customer->phone}}">
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
      <input type="text" class="form-control" name="company" value="{{@$customer->company}}">
    </div>
  </div>
  <div class="form-group col-md-4">
    <label for="phoneNumber">P.IVA</label>
    <input type="text" class="form-control" name="PIVA" value="{{@$customer->PIVA}}">
  </div>
  {{-- End content --}}
</div>
