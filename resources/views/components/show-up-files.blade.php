<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-medios">
        <form class="md-form">
            {{--<p>Archivos:</p>--}}
            <input type="file" id="myFile" name="filename2">

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 form-medios">
        <section class="file-visor">
            @if (isset($archivos))
                @for ($i = 0; $i < count($archivos); $i++)
                    @if($archivos[$i] !== '.gitignore' && $archivos[$i] !== '.')
                        <i class="material-icons">image</i><a href="javascript:void(0);" onclick="show_data_file('{{ $archivos[$i] }}')">{{ $archivos[$i] }}</a><br>
                    @endif
                @endfor
            @endif
        </section>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 form-medios">
        <section class="file-visor" id="file-visor">

        </section>
    </div>
</div>
