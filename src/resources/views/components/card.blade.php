<div class="col-{{(isset($size)) ? $size*2 : '12'}} col-md-{{$size ?? '6'}} col-lg-{{(isset($size)) ? $size/2 : '3'}} mb-4">
  <a href="{{$link}}">
    <div class="stats-small stats-small--1 card card-small">
      <div class="card-body bg-{{$color ?? 'white'}} p-0 d-flex">
        <div class="d-flex flex-column m-auto">
          <div class="stats-small__data text-center">
            <span class="stats-small__label text-uppercase {{(isset($color)) ? 'text-white' : ''}}">{{$title}}</span>
            <h6 class="stats-small__value count my-3 {{(isset($color)) ? 'text-white' : ''}}">{{$num}}</h6>
          </div>
        </div>
      </div>
    </div>
  </a>
</div>
