@extends('layout')

@section('title', 'Cart')

@section('content')
<div class="container mt-5 p-3 rounded cart">
    <div class="row no-gutters">
        <div class="col-md-8">
            <div class="product-details mr-2">
                <a href="{{ url('/') }}">
                    <div class="d-flex flex-row align-items-center"><i class="fa fa-long-arrow-left"></i><span class="ml-2">Continue Shopping</span></div>
                </a>
                <hr>
                <?php 
                    $total = 0; 
                    $shipping_charge = 2 // static value just for demo purpose
                ?>
                @if(session('cart'))
                <h6 class="mb-0">Shopping cart</h6>
                <div class="d-flex justify-content-between"><span>You have {{ count((array) session('cart')) }} items in your cart</span>
                </div>
                @foreach(session('cart') as $id => $details)
                <?php $total += $details['price'] * $details['quantity'] ?>
                <div class="d-flex justify-content-between align-items-center mt-3 p-2 items rounded">
                    <div class="d-flex flex-row"><img class="rounded" src="{{ $details['photo'] }}" width="40">
                        <div class="ml-2"><span class="font-weight-bold d-block">{{ $details['name'] }}</span><span class="spec">${{ $details['price']}}</span></div>
                    </div>
                    <div class="d-flex flex-row align-items-center quantity">
                        <a href="#" class="quantity-minus" data-id="{{ $id }}"><span>-</span></a>
                        <input name="quantity" type="text" class="quantity-input qty-val{{ $id }}" value="{{ $details['quantity'] }}">
                        <a href="#" class="quantity-plus" data-id="{{ $id }}"><span>+</span></a>
                    </div>
                    <div class="d-flex flex-row align-items-center"><span class="d-block font-weight-bold">${{ $details['price'] * $details['quantity'] }}</span>
                        <i class="fa fa-trash-o ml-3 text-black-50 remove-from-cart" style="cursor: pointer;" data-id="{{ $id }}"></i>
                    </div>
                </div>
                @endforeach
                @else
                <div class="d-flex justify-content-between align-items-center">
                    <img class="rounded" src="{{ asset('empty-cart.png') }}" width="100%">
                </div>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="payment-info">
                <div class="d-flex justify-content-between align-items-center"><span>Checkout details</span></div>
                <form  action="{{url('place-order')}}" method="POST">
                    @csrf    
                    <div>
                        <label class="credit-card-label">Name</label>
                        <input type="text" required class="form-control credit-inputs" placeholder="Name" name="name">
                    </div>
                    <div>
                        <label class="credit-card-label">Mobile</label>
                        <input type="text" required class="form-control credit-inputs" placeholder="Enter Phone" name="mobile">
                    </div>
                    <div>
                        <label class="credit-card-label">Shipping Address</label>
                        <input type="text" required class="form-control credit-inputs" required name="address"></textarea>
                    </div>
                    <span class="type d-block mt-3 mb-1">Payment type</span>
                    <label class="radio"> 
                        <input type="radio" name="payment_type" value="1" checked> 
                        <span><img width="70" src="https://img.icons8.com/color/48/000000/cash-.png" title="Cash on Delivery" /></span> 
                    </label>
                    <label class="radio"> 
                        <input type="radio" disabled name="payment_type" value="2"> 
                        <span><img width="70" src="https://img.icons8.com/external-flat-satawat-anukul/64/000000/external-ecommerce-ecommerceflat-flat-satawat-anukul-39.png" title="Online Payment" /></span> 
                    </label>

                    <input type="hidden" name="sub_total" value="{{ $total }}"> 
                    <input type="hidden" name="shipping_charge" value="{{ $shipping_charge }}"> 
                    <input type="hidden" name="total_amount" value="{{ $total + $shipping_charge }}"> 

                    <hr class="line">
                    <div class="d-flex justify-content-between information">
                        <span>Sub Total</span><span>${{ $total }}</span>
                    </div>
                    <div class="d-flex justify-content-between information">
                        <span>Shipping Charge</span><span>${{ $shipping_charge }}</span>
                    </div>
                    <div class="d-flex justify-content-between information">
                        <span>Total</span><span>${{ $total + $shipping_charge }}</span>
                    </div>
                    @if(session('cart'))
                    <button class="btn btn-primary btn-block d-flex justify-content-between mt-3" type="submit"><span>${{ $total }}</span>
                        <span>Checkout<i class="fa fa-long-arrow-right ml-1"></i></span>
                    </button>
                @endif
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')


<script type="text/javascript">
    $('.quantity-minus').click(function(e) {
        e.preventDefault();

        var id = $(this).attr("data-id");
        var input = $('.qty-val' + id);
        var value = input.val();
        if (value > 1) {
            value--;
        }
        input.val(value);
        updateCart($(this).attr("data-id"), value);
    });

    $('.quantity-plus').click(function(e) {
        e.preventDefault();
        var id = $(this).attr("data-id");
        var input = $('.qty-val' + id);
        var value = input.val();
        value++;
        input.val(value);
        updateCart($(this).attr("data-id"), value);
    })

    function updateCart(id, qty) {
        $.ajax({
            url: "{{ url('update-cart') }}",
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}',
                id: id,
                quantity: qty
            },
            success: function(response) {
                window.location.reload();
            }
        });
    }

    $(".remove-from-cart").click(function(e) {
        e.preventDefault();

        var ele = $(this);

        if (confirm("Are you sure")) {
            $.ajax({
                url: "{{ url('remove-from-cart') }}",
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.attr("data-id")
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        }
    });
</script>

@endsection