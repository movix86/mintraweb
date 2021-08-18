<center>
    <h3>Cursos</h3>
</center>
<br>
<div class="box-btns-category">
    @if (isset($cursos))
        @foreach ($cursos as $item)
            <a href="{{ url('/cursos/' . $item->id . '/' . $item->name) }}"><img src="{{ $item->url_path_image_course_btn }}" class="categorias-cursos-home" alt="{{ $item->name }}"></a>
        @endforeach
    @endif
</div>
<br>
