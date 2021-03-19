
<div class="container mt-3">
    <h2>Custom File</h2>
    <p>To create a custom file upload, wrap a container element with a class of .custom-file around the input with type="file". Then add the .custom-file-input to the file input:</p>
    <form action='{{ url('/slider/guardar') }}' method="POST" enctype="multipart/form-data">
        @csrf
        <p>Default file:</p>
        <input type="hidden" id="id_slide" name="id_slider" value="{{ isset($slider) ? $slider->id : "" }}">
        <input type="file" id="{{ isset($slider) ? 'slider' . $slider->id : 'No' }}" name="file-slider"><br>
        <input type="text" placeholder="Titulo Slider" name="name-slider" value="{{ isset($slider) ? $slider->name : "" }}"><br>
        <input type="text" placeholder="URL" name="url" value="{{ isset($slider) ? $slider->url_news : "" }}"><br>
        <a href='{{ isset($slider) ? url('slider/eliminar/'. $slider->id) : "Error en el codigo" }}'>Eliminar</a>
        {{ isset($slider) ? $slider->id : 'No' }}
        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Guardar Este slider</button>
        </div>
    </form>
</div>

