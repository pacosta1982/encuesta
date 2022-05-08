@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.survey.actions.show'))

@section('body')

<div class="card">
    <div class="card-header text-center">
         ENCUESTA - {{ $survey->name }}
    </div>
    <div class="card-body">
        <div class="row">
            <div class="form-group col-sm-4">
                <p class="card-text"> <strong> Total Respuestas: {{ $survey->entries_count }}</strong></p>
            </div>
            <div class="form-group col-sm-4">
                <p class="card-text"></p>
            </div>
            <div class="form-group col-sm-4">
                <p class="card-text">
                    <a href="{{ url('admin/surveys/export') }}" class="btn btn-block btn-square btn-lg text-white bg-success"><i class="fa fa-file-excel-o"></i><strong> Exportar Respuestas</strong></a>
                </p>
            </div>

    </div>
    </div>
</div>

@include('admin.survey.components.questionlisting')




@endsection
