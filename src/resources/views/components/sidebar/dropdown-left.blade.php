<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle {{Request::is($link.'/*', $link, $link, ($active ?? null)) ? 'active' : ''}}" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
    <i class="material-icons">{{$icon ?? 'error_outline'}}</i>
    <span>{{$item}}</span>
  </a>
  <div class="dropdown-menu dropdown-menu-small">
    {{$slot}}
  </div>
</li>
