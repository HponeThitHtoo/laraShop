@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.roles.management') . ' | ' . trans('labels.backend.access.roles.edit'))

@section('page-header')
    <h1>
        Edit Product
        <small>Edit Product</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($product, ['route' => ['admin.products.update', $product], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'edit-product', 'files'=>true]) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Product</h3>

                <div class="box-tools pull-right">
                     <a class="btn btn-success" href="{{route('admin.products.index')}}">Back To Product List</a>
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            <div class="box-body">
                <div class="form-group">
                   <!--  {{ Form::label('name', trans('validation.attributes.backend.access.roles.name'), ['class' => 'col-lg-2 control-label']) }} -->
                   <label class="col-lg-2 control-label">Title</label>

                    <div class="col-lg-10">
                        {{ Form::text('title', null, ['class' => 'form-control']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                   <!--  {{ Form::label('name', trans('validation.attributes.backend.access.roles.name'), ['class' => 'col-lg-2 control-label']) }} -->
                   <label class="col-lg-2 control-label" for="product_description">Description</label>

                    <div class="col-lg-10">
                        <!-- {{ Form::text('title', null, ['class' => 'form-control']) }} -->
                        <textarea rows="5" name="description" id="product_description" class="form-control" placeholder="Product Description">{{$product->description}}</textarea>
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                   <!--  {{ Form::label('name', trans('validation.attributes.backend.access.roles.name'), ['class' => 'col-lg-2 control-label']) }} -->
                   <label class="col-lg-2 control-label">Price</label>

                    <div class="col-lg-10">
                        {{ Form::text('price', null, ['class' => 'form-control']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                   <!--  {{ Form::label('name', trans('validation.attributes.backend.access.roles.name'), ['class' => 'col-lg-2 control-label']) }} -->
                   <label class="col-lg-2 control-label">Image</label>

                    <div class="col-lg-10">
                        {!!Form::file("image", null, ["class"=>"form-control", "id"=>"product_image"])!!}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                   <!--  {{ Form::label('name', trans('validation.attributes.backend.access.roles.name'), ['class' => 'col-lg-2 control-label']) }} -->
                   <label class="col-lg-2 control-label">User</label>

                    <div class="col-lg-10">
                        {!!Form::select("user_id", $users, $product->user_id, ["class"=>"form-control"])!!}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                   <!--  {{ Form::label('name', trans('validation.attributes.backend.access.roles.name'), ['class' => 'col-lg-2 control-label']) }} -->
                   <label class="col-lg-2 control-label">Category</label>

                    <div class="col-lg-10">
                        {!!Form::select("category_id", $categories, $product->category_id, ["class"=>"form-control"])!!}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                 <div class="form-group">
                   <label class="col-lg-2 control-label">Brand</label>

                    <div class="col-lg-10">
                        {!!Form::select("brand_id", $brands, $product->brand_id, ["class"=>"form-control"])!!}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                   <!--  {{ Form::label('name', trans('validation.attributes.backend.access.roles.name'), ['class' => 'col-lg-2 control-label']) }} -->
                   <label class="col-lg-2 control-label">Quantity</label>

                    <div class="col-lg-10">
                        {{ Form::text('quantity', null, ['class' => 'form-control']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

            </div><!-- /.box-body -->
        </div><!--box-->

        <div class="box box-success">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.access.role.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
                </div><!--pull-left-->

                <div class="pull-right">
                    {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-success btn-xs']) }}
                </div><!--pull-right-->

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {{ Form::close() }}
@stop

@section('after-scripts')
    {{ Html::script('js/backend/access/roles/script.js') }}
@stop