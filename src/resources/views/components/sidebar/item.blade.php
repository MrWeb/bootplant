<li class="nav-item">
  <a class="nav-link {{Request::is($link.'/*', $link, $link, ($active ?? null)) ? 'active' : ''}}" href="{{url('/'.$link)}}">
    <i class="material-icons">{{$icon ?? 'error_outline'}}</i>
    <span>{{$item}}</span>
  </a>
</li>
