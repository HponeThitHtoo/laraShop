@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.roles.management') . ' | ' . trans('labels.backend.access.roles.edit'))

@section('page-header')
    <h1>
        Order Management
        <small>Edit Order</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($order, ['route' => ['admin.orders.update', $order], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'edit-order']) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Order</h3>

                <div class="box-tools pull-right">
                    <a class="btn btn-success" href="{{route('admin.orders.index')}}">Back To Order List</a>
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            <div class="box-body">
                
                <div class="form-group">
                   <!--  {{ Form::label('name', trans('validation.attributes.backend.access.roles.name'), ['class' => 'col-lg-2 control-label']) }} -->
                   <label class="col-lg-2 control-label">Product</label>

                    <div class="col-lg-10">
                        {!!Form::select("product_id", $products, null, ["class"=>"form-control"])!!}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                   <!--  {{ Form::label('name', trans('validation.attributes.backend.access.roles.name'), ['class' => 'col-lg-2 control-label']) }} -->
                   <label class="col-lg-2 control-label">Customer</label>

                    <div class="col-lg-10">
                        {!!Form::select("customer_id", $customers, $order->customer_id, ["class"=>"form-control"])!!}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                   <!--  {{ Form::label('name', trans('validation.attributes.backend.access.roles.name'), ['class' => 'col-lg-2 control-label']) }} -->
                   <label class="col-lg-2 control-label" for="product_description">Order Amount</label>

                    <div class="col-lg-10">
                        <!-- {{ Form::text('title', null, ['class' => 'form-control']) }} -->
                        {{ Form::text('order_amount', null, ['class' => 'form-control']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                   <!--  {{ Form::label('name', trans('validation.attributes.backend.access.roles.name'), ['class' => 'col-lg-2 control-label']) }} -->
                   <label class="col-lg-2 control-label">Address</label>

                    <div class="col-lg-10">
                        {!!Form::textarea("order_address",null, ["class"=>"form-control", "id"=>"order_address"])!!}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                   <!--  {{ Form::label('name', trans('validation.attributes.backend.access.roles.name'), ['class' => 'col-lg-2 control-label']) }} -->
                   <label class="col-lg-2 control-label">Phone</label>

                    <div class="col-lg-10">
                        {{ Form::text('order_phone', null, ['class' => 'form-control']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                   <!--  {{ Form::label('name', trans('validation.attributes.backend.access.roles.name'), ['class' => 'col-lg-2 control-label']) }} -->
                   <label class="col-lg-2 control-label">Order Status</label>

                    <div class="col-lg-10">
                        {!!Form::select('order_status',array(0=>"Pending", 1=>"Complete"),$order->order_status,["class"=>"form-control", "id"=>"order_status"])!!}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                   <!--  {{ Form::label('name', trans('validation.attributes.backend.access.roles.name'), ['class' => 'col-lg-2 control-label']) }} -->
                   <label class="col-lg-2 control-label">Payment Status</label>

                    <div class="col-lg-10">
                        {!!Form::select('payment_status',[0=>"Pending", 1=>"Complete"],$order->payment_status,["class"=>"form-control", "id"=>"payment_status"])!!}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                   <!--  {{ Form::label('name', trans('validation.attributes.backend.access.roles.name'), ['class' => 'col-lg-2 control-label']) }} -->
                   <label class="col-lg-2 control-label">Payment Method</label>

                    <div class="col-lg-10">
                        {!!Form::select('payment_method',[0=>"Cash", 1=>"MPU"],$order->payment_method,["class"=>"form-control", "id"=>"payment_method"])!!}
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