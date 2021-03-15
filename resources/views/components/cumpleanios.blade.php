<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
    <div class="row">
        <div class="col-12" align="center">
            <img width="180px" src="img/gif-cumpleanios.gif" alt=""> 
            <style type="text/css">
            </style>
            <div class="list-age">
                 
                <table class="table table-hover table-striped">
                <tbody>
                    
                    	@foreach($cumpleaneros as $cumpleanio)
                            <tr>
                                <td>
    								<img style="border-radius: 100px" width="100px" src="{{asset('storage'). '/' . $cumpleanio->img}}" alt="IMAGEN-SLIDER">
                            	</td>
                            	<td>

                            		{{$cumpleanio->nombre}}</td>
                            	<td>{{$cumpleanio->fecha}}</td>
                    		</tr>
                        @endforeach
                    </tr>
                </tbody>
            </table>
            <br>
            </div>
        </div>
        <div class="col-md-2 ">
        	{{$cumpleaneros->links()}}
        </div>
    </div>
</div>