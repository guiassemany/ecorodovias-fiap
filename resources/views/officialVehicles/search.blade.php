@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="float-right page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">SmartVias</a></li>
                        <li class="breadcrumb-item"><a href="#">Viaturas</a></li>
                        <li class="breadcrumb-item active">Pesquisa</li>
                    </ol>
                </div>
                <h5 class="page-title">Pesquisa</h5>

            </div>
            <div class="col-12">
                <div class="card">
                    <form method="GET" action="{{route('officialVehicles.index')}}">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">
                                Pesquisa de ocorrências
                            </h4>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">CÓDIGO</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="DIGITE O CÓDIGO DA VIATURA"
                                           id="example-text-input" name="VIACODIGO">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">DATA</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="DESCRIÇÃO DA VIATURA"
                                           id="example-text-input" name="VIADESCRIC">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary">
                                Pesquisar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- container fluid -->
@endsection
