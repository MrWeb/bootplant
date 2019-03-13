{{-- Se dominio di test, mostro banner viola --}}
{{-- @php
$full_url = explode('.', url(''));
$domain_extension = array_pop($full_url);
@endphp
@if($domain_extension == 'test' || $domain_extension == 'io')
<div class="alert alert-royal-blue text-center">Versione di prova</div>
@endif --}}

@if(count($errors))
<div class="container-fluid px-0">
 <div class="alert alert-danger alert-dismissible fade show m-0" role="alert">
   <strong>Errore:</strong>
   @foreach ($errors->all() as $error)
   {{$error}}
   @endforeach
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
 </div>
</div>
@endif

@if(session('success'))
<div class="container-fluid px-0">
  <div class="alert alert-success alert-dismissible fade show m-0" role="alert">
    {{session('success')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
</div>
@endif

@if(session('info'))
<div class="container-fluid px-0">
  <div class="alert alert-info alert-dismissible fade show m-0" role="alert">
    {{session('info')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
</div>
@endif


{{-- Vue Notification --}}
<d-alert v-cloak show dismissible v-bind:theme="notification.type" v-for="notification in notifications" :key="notification.id"><strong>@{{(notification.type == 'danger') ? 'Errore: ': ''}}@{{notification.msg}}</strong></d-alert>
{{--
<div class="container-fluid px-0" v-cloak v-for="notification in notifications">
  <div class="alert alert-dismissible fade show m-0" :class="'alert-'+notification.type" role="alert">
    <strong>@{{(notification.type == 'danger') ? 'Errore: ': ''}}@{{notification.msg}}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
</div> --}}
{{-- End Vue Notification --}}
