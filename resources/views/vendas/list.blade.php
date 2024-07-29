@extends('base')
@section('conteudo')
@section('nome', 'Controle de Vendas')

<style>
    .content-wrapper {
        background-color: #f2f2f2; /* Cinza claro */
        padding: 20px; /* Adicione algum preenchimento para separar o conteúdo da borda */
    }
</style>

<div class="content-wrapper">

<h1 style="font-family: Times New Roman, serif; font-weight: bold; margin-bottom: 20px;">Controle de Vendas</h1>

<form action="{{ route('vendas.search') }}" method="post">
    <div class="row">
        @csrf
        <div class="col-4">
            <label for=""style="font-family: Times New Roman, serif;">Informe o nome do cliente:</label><br>
            <input type="text" name="cliente" class="form-control"><br>
        </div>
        
        <div class="col-4" style="margin-top: 22px;">
            <button type="submit" class="btn btn-outline-primary"> <i class="fa-solid fa-magnifying-glass"></i> Buscar</button>
            <a href="{{ url('vendas/create') }}" class="btn btn-outline-warning"><i class="fa-sharp fa-solid fa-circle-plus"></i> Novo</a>
            <a href="{{ url('vendas/chart') }}" class="btn btn-warning"><i class="fa-solid fa-chart-pie"></i> Gráfico</a> 
        </div>
        <div class="col-4 d-flex justify-content-end" style="margin-top: 22px;">
            <a class="btn btn btn-secondary ml-auto align-self-center" href="{{ url('') }}"><i class="fa-solid fa-house"></i> Inicio</a><br>
        </div>
    </div>
</form>

<hr>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th style="font-family: Times New Roman, serif">ID</th>
            <th style="font-family: Times New Roman, serif">CLIENTE</th>
            <th style="font-family: Times New Roman, serif">JOIA</th>
            <th style="font-family: Times New Roman, serif">DATA</th>
            <th style="font-family: Times New Roman, serif">QUANTIDADE</th>
            <th style="font-family: Times New Roman, serif">REÇO TOTAL</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dados as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->cliente->nome ?? '' }}</td>
                <td>{{ $item->joia->nome ?? '' }}</td>
                <td>{{ date('d/m/Y', strtotime($item->data)) ?? '' }}</td>
                <td>{{ $item->quantidade}}</td>
                <td>{{ $item->preco_tot}}</td>
                <td><a href="{{ route('vendas.edit', $item->id) }} "class="btn btn-success" title="Editar"><i
                            class="fas fa-pencil-alt"></i></a></td>
                <td>
                    <form action="{{ route('vendas.destroy', $item) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger" title="Deletar"
                            onclick="return confirm('Deseja realmente deletar esse registro?')">
                            <i class="fas fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
@stop
