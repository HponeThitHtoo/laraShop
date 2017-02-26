@extends('frontend.layouts.app')

@section('content')

<table class="table">
    <thead>
        <tr>
            <th>Product</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Subtotal</th>
        </tr>
    </thead>

    <tbody>

        <?php foreach(Cart::content() as $row) :?>

            <tr>
                <td>
                    <p><strong><?php echo $row->name; ?></strong></p>
                    <p><?php echo ($row->options->has('size') ? $row->options->size : ''); ?></p>
                </td>
                <td><input type="text" value="<?php echo $row->qty; ?>"></td>
                <td>$<?php echo $row->price; ?></td>
                <td>$<?php echo $row->total; ?></td>
            </tr>

        <?php endforeach;?>

    </tbody>

    <tfoot>
        <tr>
            <td colspan="2">&nbsp;</td>
            <td>Subtotal</td>
            <td><?php echo Cart::subtotal(); ?></td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
            <td>Tax</td>
            <td><?php echo Cart::tax(); ?></td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
            <td>Total</td>
            <td><?php echo Cart::total(); ?></td>
        </tr>
    </tfoot>
</table>

<hr style="border:2px solid #84C639;">

<a href="{{route('frontend.checkout')}}" class="btn btn-success pull-right">Check Out</a>
<span class="pull-right">&nbsp;|&nbsp;</span>
<a href="{{route('frontend.products')}}" class="btn btn-info pull-right">Continue Shopping</a>

@endsection

@section('secondary_content')
    
@endsection