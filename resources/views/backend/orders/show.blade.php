@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.roles.management'))

@section('after-styles')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>Orders</h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Order Item Management</h3>

            <div class="box-tools pull-right">
                <a class="btn btn-success" href="{{route('admin.orders.index')}}">Back To Order List</a>
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="roles-table" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>Order Item ID</th>
                            <th>Order ID</th>
                            <th>Customer</th>
                            <th>Product</th>
                            <th>Product Price</th>
                            <th>Order Item Amount</th>
                            <th>Order Amount</th>
                            <th>Status</th>
                            <th>Created_at</th>
                            <!-- <th>Actions</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order_items as $order_item)
                        <tr>
                            <td>{{$order_item->id}}</td>
                            <td>{{$order_item->order_id}}</td>
                            <td>{{$order_item->customer}}</td>
                            <td>{{$order_item->product_title}}</td>
                            <td>{{$order_item->product_price}}</td>
                            <td>{{$order_item->order_item_amount}}</td>
                            <td>{{$order_item->order_amount}}</td>
                            <td>{{$order_item->status}}</td>
                            <td>{{$order_item->created_at}}</td>
                           
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div><!--box-->
{{$order_items->links()}}
    
@stop

@section('after-scripts')
    
@stop