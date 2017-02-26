@extends('frontend.layouts.app')

@section('content')

<div class='container'>
    <div class='row' style='padding-top:25px; padding-bottom:25px;'>
        <div class='col-md-12'>
            <div id='mainContentWrapper'>
                <div class="col-md-8 col-md-offset-2">
                    <h2 style="text-align: center; color: white; padding-bottom: 20px">
                        Complete Your Order
                    </h2>
                    <hr/>
                    <div class="shopping_cart">

                        {{ Form::open([
                        'route' => 'frontend.checkout_process', 
                        'class' => 'form-horizontal', 
                        'role' => 'form',
                         'method' => 'post',
                          'id' => 'create-payment']) }}
                            
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Contact
                                            and Billing Information</a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse">
                                    <div class="panel-body">
                                        <b>Help us keep your account safe and secure, please verify your billing
                                            information.</b>
                                        <br/><br/>
                                        <table class="table table-striped" style="font-weight: bold;">
                                            
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_first_name">Name:</label></td>
                                                <td>
                                                    <input class="form-control" id="id_first_name" name="name"
                                                           type="text"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_phone">Phone:</label></td>
                                                <td>
                                                    <input class="form-control" id="id_phone" name="phone" type="text"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_email">Email:</label></td>
                                                <td>
                                                    <input class="form-control" id="id_email" name="email"
                                                            type="text" value="{{Auth::user()->email}}"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_address_line_1">Address:</label></td>
                                                <td>
                                                     <textarea id="id_address_line_1" name="address" rows="3" class="form-control"></textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_city">City:</label></td>
                                                <td>
                                                    <input class="form-control" id="id_city" name="city"
                                                           type="text"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_state">State:</label></td>
                                                <td>
                                                    <select class="form-control" id="id_state" name="state">
                                                        <option value="YGN">Yangon</option>
                                                        <option value="MDY">Mandalay</option>
                                                        <option value="BGO">Bago</option>
                                                        <option value="MGW">Magwe</option>
                                                        <option value="SAG">Sagine</option>
                                                        <option value="NPD">Nay Pyi Daw</option>
                                                        <option value="AWD">Ayerwady</option>
                                                        <option value="TNY">Tanintaryee</option>
                                                        <option value="KCN">Ka Chin</option>
                                                        <option value="KYR">Ka Yar</option>
                                                        <option value="KYN">Ka Yin</option>
                                                        <option value="CHN">Chin</option>
                                                        <option value="MON">Mon</option>
                                                        <option value="RKN">Ra Khine</option>
                                                        <option value="SHN">Shan</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                            <b>Payment Information</b>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse">
                                    <div class="panel-body">
                                        <span class='payment-errors'></span>
                                        <fieldset>
                                            <legend>What method would you like to pay with today?</legend>
                                            

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label" for="payment_method">Payment Method
                                                    Card</label>
                                                <div class="col-sm-9">
                                                    <div class="radio">
  						<label><input type="radio" name="payment_method" value="1">Cash On Delivery</label>
					</div>
					<div class="radio">
					  	<label><input type="radio" name="payment_method" value="2">Paypal</label>
					</div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label" for="phone">Payment Phone</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" stripe-data="name"
                                                           id="phone" placeholder="Card Holder's Phone Number" name="payment_phone">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label" for="payment_email">Payment Email</label>
                                                <div class="col-sm-9">
                                                    <input type="email" class="form-control" stripe-data="name"
                                                           id="payment_email" placeholder="Card Holder's Email" name="payment_email">
                                                </div>
                                            </div>
                                                
                                                <div class="form-group">
                                                    <div class="col-sm-offset-3 col-sm-9">
                                                    </div>
                                                </div>
                                        </fieldset>
                                        <button type="submit" class="btn btn-success btn-lg" style="width:100%;">Pay
                                            Now
                                        </button>
                                        <br/>
                                        <div style="text-align: left;"><br/>
                                            By submiting this order you are agreeing to our <a href="/legal/billing/">universal
                                                billing agreement</a>, and <a href="/legal/terms/">terms of service</a>.
                                            If you have any questions about our products or services please contact us
                                            before placing this order.
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('secondary_content')
    
@endsection