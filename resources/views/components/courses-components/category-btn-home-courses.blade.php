<center>
    <h3>Categorias</h3>
</center>
<br>
<div class="box-btns-category">
    @if (isset($cursos))
        @foreach ($cursos as $item)
            <a href=""><img src="{{ $item->url_path_image_category_btn }}" class="categorias-cursos-home" alt="{{ $item->name }}"></a>
        @endforeach
    @endif
</div>
<br>
