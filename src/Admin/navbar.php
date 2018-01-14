<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="./admin/index.php">Admin Panel</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive"
        aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="./admin/">
                    <i class="fa fa-dashboard"></i>
                    <span class="nav-link-text">Dashboard</span>
                </a>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Wine Management    ">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion" >
                    <i class="fa fa-cubes"></i>
                    <span class="nav-link-text">Wine Manager</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseExamplePages">
                    <li>
                        <a href="./admin/wine/">List Wine</a>
                    </li>
                    <li>
                        <a href="./admin/wine/cat/">List Category</a>
                    </li>
                    <li>
                        <a href="./admin/wine/country/">List Country</a>
                    </li>
                    <li>
                        <a href="./admin/wine/publisher/">List Publisher</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Order Manager">
                <a class="nav-link" href="./admin/order/">
                    <i class="fa fa-shopping-cart"></i>
                    <span class="nav-link-text">Order Manager</span>
                </a>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Promotion Manager">
                <a class="nav-link" href="./admin/promotion/">
                    <i class="fa fa-gift"></i>
                    <span class="nav-link-text">Promotion Manager</span>
                </a>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Promotion Manager">
                <a class="nav-link" href="./admin/payment/">
                    <i class="fa fa-credit-card"></i>
                    <span class="nav-link-text">Payment Method</span>
                </a>
            </li>

        </ul>
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">  
            <li><a class="nav-link" href="./"><i class="fa fa-fw fa-home"></i>Home</a></li>  
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-fw fa-sign-out"></i>Logout</a>
            </li>
        </ul>
    </div>
</nav>