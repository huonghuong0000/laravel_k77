@extends('client.layouts.main')
@section('title', 'Danh sách sản phẩm')
@section('content')
<!-- main -->
<div class="colorlib-shop">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-push-3">
                <div class="row row-pb-lg">

                    @forelse ($products as $product)
                        <div class="col-md-4 text-center">
                            <div class="product-entry">
                                <div class="product-img"
                                    style="background-image: url(/assets/admin/img/{{ $product->avatar }}">
                                    <div class="cart">
                                        <p>
                                            <span class="addtocart" >
                                                <a class="btn-add-cart" data-id="{{ $product->id }}" href="cart.html">
                                                    <i class="icon-shopping-cart"></i>
                                                </a>
                                            </span>
                                            <span>
                                                <a href="{{ route('client.product.detail', $product->id) }}">
                                                    <i class="icon-eye"></i>
                                                </a>
                                            </span>
    
                                        </p>
                                    </div>
                                </div>
                                <div class="desc">
                                    <h3><a href="{{ route('client.product.detail', $product->id) }}">{{ $product->name }}</a></h3>
                                    <p class="price"><span> {{ $product->price }} đ</span></p>
                                </div>
                            </div>
                        </div>
                    @empty
                        
                    @endforelse
                    {{--  <div class="col-md-4 text-center">
                        <div class="product-entry">
                            <div class="product-img"
                                style="background-image: url(/assets/client/images/quan-kaki-do-man-qk162-8273.jpg);">

                                <div class="cart">
                                    <p>
                                        <span class="addtocart"><a href="cart.html"><i
                                                    class="icon-shopping-cart"></i></a></span>
                                        <span><a href="detail.html"><i class="icon-eye"></i></a></span>


                                    </p>
                                </div>
                            </div>
                            <div class="desc">
                                <h3><a href="detail.html">Quần kaki đỏ man</a></h3>
                                <p class="price"><span>3.000.000 đ</span></p>
                            </div>
                        </div>
                    </div>  --}}
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-md-pull-9">
                <div class="sidebar">
                    <div class="side">
                        <h2>Danh mục</h2>
                        <div class="fancy-collapse-panel">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#menu1"
                                                aria-expanded="true" aria-controls="collapseOne">Quần Áo Nam
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="menu1" class="panel-collapse collapse" role="tabpanel"
                                        aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <ul>
                                                <li><a href="#">Áo Sơ mi nam</a></li>
                                                <li><a href="#">Áo thun nam</a></li>
                                                <li><a href="#">Áo Khoác nam</a></li>
                                                <li><a href="#">Áo vest Nam</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#menu2"
                                               aria-expanded="true" aria-controls="collapseOne">Quần Áo Nữ
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="menu2" class="panel-collapse collapse" role="tabpanel"
                                        aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <ul>
                                                <li><a href="#">Áo Sơ mi Nữ</a></li>
                                                <li><a href="#">Áo thun Nữ</a></li>
                                                <li><a href="#">Áo Khoác Nữ</a></li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="side">
                        <h2>Khoảng giá</h2>
                        <form method="get" class="colorlib-form-2" action="">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="guests">Từ:</label>
                                        <div class="form-field">
                                            <i class="icon icon-arrow-down3"></i>
                                            <select name="start" id="people" class="form-control">
                                                <option value > Chọn giá nào =))) </option>
                                                <option {{ $start=== 10000? 'selected':'' }} value="10000">10.000 VNĐ</option>
                                                <option {{ $start=== 20000? 'selected':'' }} value="20000">20.000 VNĐ</option>
                                                <option {{ $start=== 30000? 'selected':'' }} value="30000">30.000 VNĐ</option>
                                                <option {{ $start=== 150000? 'selected':'' }} value="150000">150.000 VNĐ</option>
                                                <option {{ $start=== 100000? 'selected':'' }} value="100000">100.000 VNĐ</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="guests">Đến:</label>
                                        <div class="form-field">
                                            <i class="icon icon-arrow-down3"></i>
                                            <select name="end" id="people" class="form-control">
                                                <option value > Chọn giá nào =))) </option>
                                                <option {{ $end===100000? 'selected':'' }} value="100000">100.000 VNĐ</option>
                                                <option {{ $end===150000? 'selected':'' }} value="150000">150.000 VNĐ</option>
                                                <option {{ $end===200000? 'selected':'' }} value="200000">200.000 VNĐ</option>
                                                <option {{ $end===250000? 'selected':'' }} value="250000">250.000 VNĐ</option>
                                                <option {{ $end===50000? 'selected':'' }} value="50000">50.000 VNĐ</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" style="width: 100%;border: none;height: 40px;">Tìm kiếm</button>
                        </form>
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
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
           
            $('.btn-add-cart').click(function(e){
                e.preventDefault();
                let data = {
                    id: $(this).attr('data-id'),
                    quantity: 1,
                }
                $.ajax({
                    url: '/cart/add',
                    method: 'POST',
                    data: data,
                    success: function(scs){
                        $('.cart-quantity').text(scs.quantity);
                    },
                    error: function(){
                    },
                });
            });
        });
    </script>
@endpush
