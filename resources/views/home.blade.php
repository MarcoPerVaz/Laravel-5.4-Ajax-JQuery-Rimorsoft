@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Panel Administrativo</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>
                        <span class="products-total"> {{ $products->total() }} </span>
                         registros | página {{ $products->currentPage() }}
                        de {{ $products->lastPage() }}
                    </p>
                    <div id="alert" class="alert alert-info"> </div>
                    <table class="table table-over table-striped">
                        <thead>
                            <tr>
                                <th width="20px">ID</th>
                                <th>Nombre del producto</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td width="20px">{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td width="20px">
                                        {!! Form::open(['route' => ['destroyProduct', $product->id], 'method' => 'DELETE']) !!}
                                            <a href="#" class="btn-delete">Eliminar</a>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $products->render() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

    <script src="{{ asset('js/script.js') }}"></script>
    
@endsection
