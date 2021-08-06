<center>
<h3>Categorias</h3>
</center>
<center>
    <div class="box-btns-category">
        @if (isset($cursos))
            @foreach ($cursos as $item)
                <a href=""><img src="{{ $item->url_path_image_course_btn }}" class="categorias-cursos-home" alt="{{ $item->name }}"></a>
            @endforeach
        @endif
    </div>
</center>
