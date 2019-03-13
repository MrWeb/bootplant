<li class="nav-item dropdown">
  <a class="nav-link {{Request::is($link.'/*', $link, $link, ($active ?? null)) ? 'active' : ''}}" data-toggle="dropdown"><i class="material-icons">{{$icon ?? 'error_outline'}}</i> {{$item}}</a>
  <div class="dropdown-menu dropdown-menu-small">
    {{$slot}}
  </div>
</li>
