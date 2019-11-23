@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="float-right page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">SmartVias</a></li>
                        <li class="breadcrumb-item"><a href="#">Viaturas</a></li>
                        <li class="breadcrumb-item active">Listagem</li>
                    </ol>
                </div>
                <h5 class="page-title">Lista de Viaturas</h5>

            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Código</th>
                                    <th>Descrição</th>
                                    <th>Modelo</th>
                                    <th>Placa</th>
                                    <th>Proprietário</th>
                                    <th>Base</th>
                                    <th>Ações</th>
                                </tr>
                                @foreach($officialVehicles as $officialVehicle)
                                <tr>
                                    <td>
                                        {{$officialVehicle->VIACODIGO}}
                                    </td>
                                    <td>
                                        {{$officialVehicle->VIADESCRIC}}
                                    </td>
                                    <td>
                                        {{$officialVehicle->VIAMODELO}}
                                    </td>
                                    <td>
                                        {{$officialVehicle->VIAPLACA}}
                                    </td>
                                    <td>
                                        {{$officialVehicle->VIAPROPRIE}}
                                    </td>
                                    <td>
                                        {{$officialVehicle->VIABASE}}
                                    </td>
                                    <td>
                                        <a href="{{route('officialVehicles.details', $officialVehicle->VIACODIGO)}}" class="btn btn-info">
                                            <i class="fa fa-eye"></i> Ver Detalhes
                                        </a>
                                    </td>
                                </tr>
                                    @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- container fluid -->
@endsection
