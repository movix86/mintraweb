<div class="backgroud-user-panel">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2 jumbotron box-shadow">
                        <div class="row">
                            <div class="col-6 col-sm-6 col-md-6 col-lg-12 padding-20" align="center">
                                <a href="{{ route('create-category') }}" class="btn btn-primary box-shadow b-dash">Agregar <br>Categoria</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 jumbotron box-shadow">
                        <div>
                            <h2>Categorias</h2>
                            <p>Panel modification de Categorias</p>
                            <div class="container table-users">
                                <table class="table table-hover">
                                  <thead>
                                    <tr align="center">
                                      <th>Categoria</th>
                                      <th>Descripcion</th>
                                      <th>Modificacion</th>
                                      <th>Eliminar</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @if (isset($data_category))
                                        @foreach ($data_category as $category_table)
                                          <tr align="center">
                                              <td>{{ $category_table->name }}</td>
                                              <td>{{ $category_table->description }}</td>
                                              <td><a href="{{url('/categoria/editar/'.$category_table->id)}}"><i class="material-icons">edit</i></a></td>
                                              <td align="center"><a href="{{ url('categoria/eliminar/'.$category_table->id) }}"><i class="material-icons" style="color:red">delete</i></a></td>
                                          </tr>
                                        @endforeach
                                    @else
                                        No existe
                                    @endif
                                  </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
