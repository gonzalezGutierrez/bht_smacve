<form method="POST" action="{{asset($categoria->getURL())}}" accept-charset="UTF-8" id="FormRegister" class="contact-form">
    @csrf
    @if($categoria->getMETHOD() == 'PUT')
        @method('put')
    @endif
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label for="email" class="">Nombre de la categoria:</label>
                <input  type="text" required class="form-control form-control-lg " name="nombre" value="{{$categoria->categoria}}" placeholder="Categoria" autofocus="">
                @if ($errors->has('categoria'))
                    <span class="text-danger" role="alert">
                        <strong>{{ $errors->first('categoria') }}</strong>
                    </span>
                @endif
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
