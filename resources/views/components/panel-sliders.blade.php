
<div class="file-box">
    <h2>Slider {{ isset($slider) ? ' ' . $slider->id : 'No' }}</h2>
    <form action='{{ url('/slider/guardar') }}' method="POST" enctype="multipart/form-data">
        @csrf
        <p>Seleccionar el archivo:</p>
        <input type="hidden" id="id_slide" name="id_slider" value="{{ isset($slider) ? $slider->id : "" }}">
        <div class="form-group">
            <input type="file" id="{{ isset($slider) ? 'slider' . $slider->id : 'No' }}" name="file-slider"><br>
        </div>
        <div class="form-group">
            <input type="text" placeholder="Titulo Slider" name="name-slider" value="{{ isset($slider) ? $slider->name : '' }}" maxlength="50" class="form-control"><br>
        </div>
        <div class="form-group">
            <input type="text" placeholder="URL" name="url" value="{{ isset($slider) ? $slider->url_news : '' }}" class="form-control">
        </div>
        <br>
        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Guardar slider</button><br><br>
            <a href='{{ isset($slider) ? url('slider/eliminar/'. $slider->id) : "Error en el codigo" }}'><i class="material-icons" style="font-size:48px;color:red">delete_forever</i></a>
        </div>
    </form>
</div>
