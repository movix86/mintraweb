<div id="demo" class="carousel slide" data-ride="carousel">

      <ul class="carousel-indicators">
        <li data-target="#demo" data-slide-to="0" class="active"></li>
        <li data-target="#demo" data-slide-to="1"></li>
        <li data-target="#demo" data-slide-to="2"></li>
      </ul>
      <div class="carousel-inner">

        <div class="carousel-item active">
          @foreach($oneSlider as $oneSliderView)
          <a href="{{$oneSliderView->descripcion}}">
            <img height="500px" width="80%" src="{{asset('storage'). '/' . $oneSliderView->direccion}}" alt="IMAGEN-SLIDER">
          </a>
          @endforeach
          <div class="carousel-caption">
            <h3>Los Angeles</h3>
          </div>
        </div>

        @foreach($sliders as $slider)
          <div class="carousel-item">
            <a href="{{$slider->descripcion}}">
              <img height="500px" width="80%" src="{{asset('storage'). '/' . $slider->direccion}}" alt="IMAGEN-SLIDER">
            </a>
            <div class="carousel-caption">
            </div>
          </div>
        @endforeach
      </div>
      <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </a>
      <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
      </a>
  </div>