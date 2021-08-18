<center>
    <h3>Categorias</h3>
</center>
<br>
<div class="box-btns-category">
    @if (isset($category))
        @foreach ($category as $item)
            <a href="{{route('category-page-btn', [$item->name])}}"><img src="{{ $item->url_path_image_category_btn }}" class="categorias-cursos-home" alt="{{ $item->name }}"></a>
        @endforeach
    @endif
</div>
<br>
