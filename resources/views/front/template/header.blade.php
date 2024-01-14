<div class="col-12">
    <header class="row">
        <!-- Top Nav -->
        <div class="col-12 bg py-2 ">
            <div class="container-fluid container-lg">
                <div class="row ">
                    <div class="col-auto me-auto d-md-block d-none">
                        <ul class="top-nav">
                            <li>
                                <a href="tel:+123-456-7890"><i class="fa fa-phone-square me-2"></i>+123-456-7890</a>
                            </li>
                            <li>
                                <a href="mailto:mail@ecom.com"><i class="fa fa-envelope me-2"></i>mail@ecom.com</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-auto d-md-block d-none">
                        <ul class="top-nav">
                            @auth()
                                <li>
                                    <a href="{{route('')}}">
                                        <i class="fas fa-user-alt me-2"></i>{{auth()->user()->full_name}}
                                    </a>
                                </li>
                                <li>

                                    <a  href="{{route('logout')}}" id="logout-btn">
                                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                                    </a>
                                    <form action="{{route('logout')}}" method="post" id="logout-form">
                                        @csrf
                                    </form>
                                </li>
                                {{--                                <form action="{{route('logout')}}" method="post" id="logout-form">--}}
                                {{--                                    @csrf--}}
                                {{--                                </form>--}}
                            @else
                                <li>
                                    <a href="{{'register'}}"><i class="fas fa-user-edit me-2"></i>Register</a>
                                </li>
                                <li>
                                    <a href="{{'login'}}"><i class="fas fa-sign-in-alt me-2"></i>Login</a>
                                </li>
                            @endauth
                        </ul>
                    </div>
                </div>
                <div class="row d-flex align-items-center pt-3">
                    <div class="col-lg-auto">
                        <div class="site-logo text-center text-lg-left">
                            <a href="">
                                <img src="{{url('public/images/logo2.png')}}" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-5 mx-auto mt-4 mt-lg-0">
                        <form action="#">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="search" class="form-control border-dark" placeholder="Search..." required>
                                    <button class="btn btn-outline-dark bg-white"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-auto text-center text-lg-left header-item-holder">
                        <a href="#" class="header-item">
                            <i class="fas fa-heart me-2"></i><span id="header-favorite">0</span>
                        </a>
                        <a href="cart.html" class="header-item">
                            <i class="fa fa-shopping-bag me-2"></i><span id="header-qty" class="me-3">2</span>

                        </a>
                        <a href="cart.html" class="header-item">
                            <i class="fas fa-money-bill-wave me-2"></i><span id="header-price">$4,000</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
        <!-- Top Nav -->

        <!-- Header -->
        <div class="col-12 bg-dark ">
            <div class="container-fluid container-lg">

                <!-- Nav -->
                <div class="row">
                    <nav class="navbar navbar-expand-md navbar-dark  col-12">
                        <button class="navbar-toggler d-lg-none border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="mainNav">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{route('front.home.show')}}">Home </a>
                                </li>
                                @foreach($categories as $slug => $category)
                                    <li class="nav-item active">
                                        <a class="nav-link" href="{{route('front.category.show',$slug)}}">{{$category}} </a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </nav>
                </div>
                <!-- Nav -->
            </div>

        </div>
        <!-- Header -->

    </header>
</div>

