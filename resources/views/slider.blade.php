@foreach($sliders as $slider)
{{$obj[] = $slider->direccion}}
@endforeach
<div id="demo" class="carousel slide" data-ride="carousel">

      <ul class="carousel-indicators">
        <li data-target="#demo" data-slide-to="0" class="active"></li>
        <li data-target="#demo" data-slide-to="1"></li>
        <li data-target="#demo" data-slide-to="2"></li>
      </ul>
      <div class="carousel-inner">

        <div class="carousel-item active">
          <img width="80%" src="{{asset('storage'). '/' . $obj[0]}}" alt="IMAGEN-SLIDER">
          <div class="carousel-caption">
            <h3>Los Angeles</h3>
          </div>
        </div>
        <div class="carousel-item">
          <img width="80%" src="{{asset('storage'). '/' . $obj[1]}}" alt="IMAGEN-SLIDER">
          <div class="carousel-caption">
            <h3>Chicago</h3>
          </div>
        </div>
        <div class="carousel-item">
          <img width="80%" src="{{asset('storage'). '/' . $obj[2]}}" alt="IMAGEN-SLIDER">
          <div class="carousel-caption">
            <h3>New York</h3>
          </div>
        </div>
        
      </div>
      <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </a>
      <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
      </a>
  </div>