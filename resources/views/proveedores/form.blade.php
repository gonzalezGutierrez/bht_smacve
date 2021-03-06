<form method="POST" action="{{asset($proveedor->getURL())}}" accept-charset="UTF-8" id="FormRegister" class="contact-form">
    @csrf
    @if($proveedor->getMETHOD() == 'PUT')
        @method('put')
    @endif
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label for="email" class="">Nombre del proveedor:</label>
                <input  type="text" class="form-control form-control-lg " name="proveedor" value="{{$proveedor->proveedor}}" placeholder="Proveedor" autofocus="">
                @if ($errors->has('proveedor'))
                    <span class="text-danger" role="alert">
                        <strong>{{ $errors->first('proveedor') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label for="password" class="">Categoria:</label>
                {!! Form::select('idCategoria',$categorias,$proveedor->idCategoria,['class'=>'form-control','placeholder'=>'Selecciona una categoria...']) !!}
                @if ($errors->has('idCategoria'))
                    <span class="text-danger" role="alert">
                        <strong>{{ $errors->first('idCategoria') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-sm-12 section-heading" style="margin-bottom:10px;">
            <h6>Datos de contacto</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label for="telefono">Ciudad: </label>
                <input type="text" name="ciudad" class="form-control" value="{{$proveedor->ciudad}}">
                @if ($errors->has('ciudad'))
                    <span class="text-danger" role="alert">
                        <strong>{{ $errors->first('idCategoria') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label for="telefono">Telefono: </label>
                <input type="text" name="telefono" class="form-control" value="{{$proveedor->telefono}}">
                @if ($errors->has('telefono'))
                    <span class="text-danger" role="alert">
                        <strong>{{ $errors->first('idCategoria') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label for="telefono">Correo electronico: </label>
                <input type="text" name="correo_electronico" class="form-control" value="{{$proveedor->correo_electronico}}">
                @if ($errors->has('correo_electronico'))
                    <span class="text-danger" role="alert">
                        <strong>{{ $errors->first('idCategoria') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label for="telefono">Página web: </label>
                <input type="text" name="pagina_web" class="form-control" value="{{$proveedor->pagina_web}}">
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label for="telefono">Descripción: </label>
                <textarea name="descripcion" rows="8" class="form-control" cols="80">{{$proveedor->descripcion}}</textarea>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <button class="butn theme medium" type="submit"><span>Guardar</span></button>
            </div>
        </div>
    </div>
</form>
