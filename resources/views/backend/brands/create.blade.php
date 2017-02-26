@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.roles.management') . ' | ' . trans('labels.backend.access.roles.create'))

@section('page-header')
    <h1>
        Create Brand
        <small>Creating Brand</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.brands.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-brand', 'files'=>true]) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Create Brand</h3>

                <div class="box-tools pull-right">
                    <a class="btn btn-success" href="{{route('admin.brands.index')}}">Back To Brand List</a>
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            <div class="box-body">
                <div class="form-group">
                    <div class="col-lg-2">
                        <label for="brand_name" class="control-label">Name</label>
                    </div>
                    <div class="col-lg-10">
                        {!!Form::text("name",null,["class"=>"form-control", "id"=>"brand_name"])!!}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    <div class="col-lg-2">
                        <label for="brand_logo" class="control-label">Logo</label>
                    </div>
                    <div class="col-lg-10">
                        {!!Form::file("logo", null, ["class"=>"form-control", "id"=>"brand_logo"])!!}
                    </div><!--col-lg-3-->
                </div><!--form control-->

              
            </div><!-- /.box-body -->
        </div><!--box-->

        <div class="box box-success">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.access.role.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
                </div><!--pull-left-->

                <div class="pull-right">
                    {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-success btn-xs']) }}
                </div><!--pull-right-->

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {{ Form::close() }}
@stop

@section('after-scripts')
    {{ Html::script('js/backend/access/roles/script.js') }}
@stop
