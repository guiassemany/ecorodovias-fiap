@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="float-right page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">SmartVias</a></li>
                        <li class="breadcrumb-item"><a href="#">Ocorrências</a></li>
                        <li class="breadcrumb-item active">Listagem</li>
                    </ol>
                </div>
                <h5 class="page-title">Lista de Ocorrências</h5>

            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Código</th>
                                    <th>Data / Hora</th>
                                    <th>Rodovia</th>
                                    <th>Sentido</th>
                                    <th>Natureza</th>
                                    <th>Status</th>
                                    <th>Ações</th>
                                </tr>
                                @foreach($occurrences as $occurrence)
                                <tr>
                                    <td>
                                        {{$occurrence->OCOCODIGO}}
                                    </td>
                                    <td>
                                        {{$occurrence->OCODATA}} / {{$occurrence->OCOHORA}}
                                    </td>
                                    <td>
                                        {{$occurrence->RODNOME}}
                                    </td>
                                    <td>
                                        {{$occurrence->SENDESCRIC}}
                                    </td>
                                    <td>
                                        {{$occurrence->NATDESCRIC}}
                                    </td>
                                    <td>
                                        {{$occurrence->OCOSITUACA}}
                                    </td>
                                    <td>
                                        <a href="{{route('occurrences.details', $occurrence->OCOCODIGO)}}" class="btn btn-info">
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
