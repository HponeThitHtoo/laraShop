@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.roles.management') . ' | ' . trans('labels.backend.access.roles.create'))

@section('page-header')
    <h1>
        Create Order
        <small>Creating Order</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.orders.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-order']) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Create Order</h3>

                <div class="box-tools pull-right">
                    <a class="btn btn-success" href="{{route('admin.orders.index')}}">Back To Order List</a>
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            <div class="box-body">

                <div class="form-group">
                    <div class="col-lg-2">
                        <label for="product" class="control-label">Product</label>
                    </div>
                    <div class="col-lg-10">
                        {!!Form::select('product_ids[]',$products,null,["class"=>"form-control", "id"=>"product", "multiple"=>"multiple"])!!}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    <!-- {{ Form::label('name', trans('validation.attributes.backend.access.roles.name'), ['class' => 'col-lg-2 control-label']) }} -->
                    <div class="col-lg-2">
                        <label for="order_customer" class="control-label">Customer</label>
                    </div>
                    <div class="col-lg-10">
                         {!!Form::select("customer_id", $customers, null, ["class"=>"form-control", "id"=>"order_customer"])!!}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    <div class="col-lg-2">
                        <label for="order_order_amount" class="control-label">Order Amount</label>
                    </div>
                    <div class="col-lg-10">
                       {!!Form::text("order_amount", null, ["class"=>"form-control", "id"=>"order_order_amount"])!!}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    <div class="col-lg-2">
                        <label for="order_address" class="control-label">Address</label>
                    </div>
                    <div class="col-lg-10">
                        {!!Form::textarea("order_address",null, ["class"=>"form-control", "id"=>"order_address"])!!}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    <!-- {{ Form::label('associated-permissions', trans('validation.attributes.backend.access.roles.associated_permissions'), ['class' => 'col-lg-2 control-label']) }} -->
                    <div class="col-lg-2">
                        <label for="order_phone" class="control-label">Phone No:</label>
                    </div>
                    <div class="col-lg-10">
                        <!-- {{ Form::select('associated-permissions', array('all' => trans('labels.general.all'), 'custom' => trans('labels.general.custom')), 'all', ['class' => 'form-control']) }} -->
                        {!!Form::text("order_phone", null, ["class"=>"form-control", "id"=>"order_phone"])!!}
                    </div><!--col-lg-3-->
                </div><!--form control-->

                

                <div class="form-group">
                    <div class="col-lg-2">
                        <label for="order_status" class="control-label">Order Status</label>
                    </div>
                    <div class="col-lg-10">
                        {!!Form::select('order_status',array(0=>"Pending", 1=>"Complete"),null,["class"=>"form-control", "id"=>"order_status"])!!}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    <div class="col-lg-2">
                        <label for="payment_status" class="control-label">Payment Status</label>
                    </div>
                    <div class="col-lg-10">
                        {!!Form::select('payment_status',[0=>"Pending", 1=>"Complete"],null,["class"=>"form-control", "id"=>"payment_status"])!!}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    <div class="col-lg-2">
                        <label for="payment_method" class="control-label">Payment method</label>
                    </div>
                    <div class="col-lg-10">
                        {!!Form::select('payment_method',[0=>"Cash", 1=>"MPU"],null,["class"=>"form-control", "id"=>"payment_method"])!!}
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
