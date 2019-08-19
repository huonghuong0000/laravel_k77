@extends('client.layouts.main')
@section('title', 'Giỏ hàng')
@section('content')
<!-- main -->
<div class="colorlib-shop">
    <div class="container">
        <div class="row row-pb-md">
            <div class="col-md-10 col-md-offset-1">
                <div class="process-wrap">
                    <div class="process text-center active">
                        <p><span>01</span></p>
                        <h3>Giỏ hàng</h3>
                    </div>
                    <div class="process text-center">
                        <p><span>02</span></p>
                        <h3>Thanh toán</h3>
                    </div>
                    <div class="process text-center">
                        <p><span>03</span></p>
                        <h3>Hoàn tất thanh toán</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="row row-pb-md">
            <div class="col-md-10 col-md-offset-1">
                <div class="product-name">
                    <div class="one-forth text-center">
                        <span>Chi tiết sản phẩm</span>
                    </div>
                    <div class="one-eight text-center">
                        <span>Giá</span>
                    </div>
                    <div class="one-eight text-center">
                        <span>Số lượng</span>
                    </div>
                    <div class="one-eight text-center">
                        <span>Tổng</span>
                    </div>
                    <div class="one-eight text-center">
                        <span>Xóa</span>
                    </div>
                </div>

                @forelse (Cart::getContent() as $item)
                    <div class="product-cart">
                        <div class="one-forth">
                            <div class="product-img">
                                <img class="img-thumbnail cart-img" src="/assets/admin/img/{{ $item->attributes->avatar }}">
                            </div>
                            <div class="detail-buy">
                                <h4>Mã : {{ $item->id }}</h4>
                                <h5>{{ $item->name }}</h5>
                            </div>
                        </div>
                        <div class="one-eight text-center">
                            <div class="display-tc">
                                <span class="price">{{ number_format($item->price) }} đ</span>
                            </div>
                        </div>
                        <div class="one-eight text-center">
                            <div class="display-tc">
                                <input type="number" id="quantity" name="quantity"
                                    class="form-control input-number text-center input-quantity" data-id="{{ $item->id }}" value="{{$item->quantity}}">
                            </div>
                        </div>
                        <div class="one-eight text-center">
                            <div class="display-tc">
                                <span class="price summed-price">{{ number_format($item->price*$item->quantity) }} đ</span>
                            </div>
                        </div>
                        <div class="one-eight text-center">
                            <div class="display-tc">
                                <a href="#" class="closed btn-remove-product" data-id="{{ $item->id }}"></a>
                            </div>
                        </div>
                    </div>
                @empty
                    Giỏ hàng trống, mua hàng đê !!!
                @endforelse

            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="total-wrap">
                    <div class="row">
                        <div class="col-md-8"></div>
                        <div class="col-md-3 col-md-push-1 text-center">
                            <div class="total">
                                <div class="sub">
                                    <p>
                                        <span>Tổng:</span> 
                                            <span class="sub-total">{{ number_format(Cart::getSubTotal()) }} đ</span>
                                    </p>
                                </div>
                                <div class="grand-total">
                                    <p>
                                        <span>
                                            <strong>Tổng cộng:</strong>
                                        </span>
                                        <span class="sub-getTotal">{{ number_format(Cart::getTotal()) }} đ</span>
                                    </p>
                                    <a href="{{ route('client.cart.checkout') }}" class="btn btn-primary">Thanh toán
                                        <i class="icon-arrow-right-circle"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- end main -->

@endsection

@push('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function () {

            //xóa sp
            $('.btn-remove-product').on('click', function(e){
                e.preventDefault();
                let id = $(this).attr('data-id');
                let _this = $(this);
                if(confirm('Bạn có chắc muốn xóa sản phẩm không ???')){
                    $.ajax({
                        url: '/cart/destroy',
                        method: 'POST',
                        data: {
                            id: id
                        },
                        success: function(){
                            _this.parents('.product-cart').remove();
                        },
                        error: function(){}
                    });
                }
            });

            //bắt giá trị của ô ipnput-quantity
            $('.input-quantity').change(function() {
                let data = {
                    id: $(this).attr('data-id'),
                    quantity: $(this).val()
                };
                
                let _this = $(this) ;

                $.ajax({
                    url: '/cart/update',
                    data: data,
                    method: "POST",
                    success: function(scs) {
                        _this.parents('.product-cart').find('.summed-price').text(scs.summedPrice + ' đ');
                        $('.sub-total').text(scs.getSubTotal + ' đ');
                        _this.parents('.product-cart').find('.summed-price').text(scs.summedPrice + ' đ');
                        $('.sub-getTotal').text(scs.getTotal + ' đ');
                    },
                    error: function() {}
                });
            });

            $('.summed-price')


            //cộng trừ giá trị trong ô input-số lượng
            var quantitiy = 0;
            $('.quantity-right-plus').click(function (e) {

                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());

                // If is not undefined

                $('#quantity').val(quantity + 1);


                // Increment

            });

            $('.quantity-left-minus').click(function (e) {
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());

                if (quantity > 0) {
                    $('#quantity').val(quantity - 1);
                }
            });

        });
    </script>
@endpush
