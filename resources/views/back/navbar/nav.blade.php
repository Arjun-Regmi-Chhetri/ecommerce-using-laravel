<div class="navigation-bar">
    <div class="container-fluid position-relative">
        <div class="row">
            <div class="col text-start d-lg-none d-md-block hams" >
                <div class="hamburger">
                    <div class="inner-hams">
                        <ul class="lines"></ul>
                    </div>
                </div>
            </div>
            <div class="col col-sm-12 col-md-6 col-lg-8 search py-2">
                <form class="d-flex align-items-center justify-content-center ">
                    <input type="search" name="search" placeholder="search">
                    <button>Search</button>
                </form>
            </div>
            <div class="col d-flex justify-content-end align-items-center">
                <ul class="navigation position-relative">
                    <li>
                        <a href=""><i class="bi bi-bell"></i></a>
                    </li>
                    <li class="gearIcon">
                        <i class="bi bi-gear"></i>
                    </li>
                    <li>
                        <a href=""><i class="bi bi-grid-3x3-gap-fill"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>



</div>
@include('back.navbar.setting')
@yield('content')


