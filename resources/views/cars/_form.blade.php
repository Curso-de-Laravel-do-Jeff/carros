@include('util.errors')

<div class="form-group">
    <label for="brand">Marca: </label>
    <input type="text" id="brand" name="brand" class="form-control" value="" placeholder="Marca">
</div>

<div class="form-group">
    <label for="model">Modelo: </label>
    <input type="text" id="model" name="model" class="form-control" value="" placeholder="Modelo">
</div>

<div class="form-group">
    <label for="year">Ano: </label>
    <input type="number" id="year" name="year" class="form-control" value="" placeholder="Ano">
</div>

<div class="form-group">
    <label for="color">Cor: </label>
    <input type="text" id="color" name="color" class="form-control" value="" placeholder="Cor">
</div>

<div class="form-group">
    <label for="value">Valor: </label>
    <input type="number" step="0.01" id="value" name="value" class="form-control" value="" placeholder="Valor">
</div>

<button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-save"></i> Salvar</button>
