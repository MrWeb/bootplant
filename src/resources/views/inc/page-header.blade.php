<div class="page-header row no-gutters py-4">
  <div class="col-12 col-sm-4 text-center text-sm-left mb-4 mb-sm-0">
    <span class="text-uppercase page-subtitle">@yield('section', "Dashboard")</span>
    <h3 class="page-title">@yield('page', "Dashboard")</h3>
  </div>
{{--   <div class="col-12 col-sm-4 d-flex align-items-center">
    <div class="btn-group btn-group-sm btn-group-toggle d-inline-flex mb-4 mb-sm-0 mx-auto" role="group" aria-label="Page actions">
      <a href="index.html" class="btn btn-white active"> Traffic </a>
      <a href="ecommerce.html" class="btn btn-white"> Sales </a>
    </div>
  </div> --}}
  @if (trim($__env->yieldContent('addbutton')))
    <div class="col-12 mt-3 d-flex align-items-right flex-row-reverse">
      @yield('addbutton')
    </div>
  @endif
</div>
