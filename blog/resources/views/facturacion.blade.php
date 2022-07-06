@extends('master')

@section('body')
<script type="text/javascript" >var atributos = `<?= $atributos ?>`;</script>
<script type="text/javascript">var productos = `<?= $productos ?>`;</script>




<form method="post" action="{{ route('factura.store') }}">
@csrf
    <h1><b> Facturación </b></h1>
    
    <br>
    <h4><b> Factura No.:        {{ $idfactura }}  </b></h4>
    <br>
    <div class="form-group">
        
            <label for="NIT">NIT</label>
            <input type="text" class="form-control" name="clienteNIT" placeholder="NIT del cliente">
        
    </div>
    <br>

    
    @if (session('error'))
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
            <strong>¡Error!</strong> <span>El nit del cliente no existe</span>
        </div>
    @endif
    

    <br>
    <div class="form-group">
        <label for="direccion">Dirección</label>
        <input type="text" class="form-control" name="direccion" placeholder="Dirección">
    </div>
    <br>
    <table id="datosFactura" class="table order-list">
        <thead>
            <tr>
                <td style="text-align:center;">Producto</td>
                <td style="text-align:center;">Cantidad</td>
                <td style="text-align:center;">Precio Unitario</td>
            </tr>
        </thead>
        <tbody>
            <tr id="0">
                <td style="text-align:center" class="col-sm-6">                    
                    <select name="marca0" id="marca0" class="form-control dynamic" data-dependent="precio0">
                    @foreach ($atributos as $atributo)
                        <option id="marcas0" value="{{ $atributo -> marcaid }}" > {{ $atributo -> nombre}} </option>
                    @endforeach
                    </select>
                </td>
                <td style="text-align:center" class="col-sm-3">
                    <input type="number" name="cantidad0" id="cantidad0" class="form-control" value ="1"/>
                </td>
                <td style="text-align:center" class="col-sm-3" id="precioU0">
                {{ $atributos[0] -> precio }}
                </td>
               
                <td class="col-sm-2"><a class="deleteRow"></a>
                </td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" style="text-align: center;">
                    <input type="button" class="btn btn-info btn-lg btn-block" style="border-radius:100px" id="addrowF" value="+" />
                </td>
            </tr>

            <tr>
                <td colspan="5" style="text-align: center;">
                    <h3 id="suma"></h3>
                </td>
            </tr>
            <tr>
            </tr>
        </tfoot>
    </table>

        <div class="container-contact100-form-btn">
            <button class="contact100-form-btn" style="color: rgb(255,255,255);" >
                Realizar compra
            </button>
        </div>
    </form>
@endsection

<style>
.alert {
  padding: 20px;
  background-color: #f44336;
  color: white;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
</style>

