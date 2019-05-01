<?php
$body->appendInnerHTML('<header class="header-global">
    <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light headroom">
        <div class="container">
            <a class="navbar-brand mr-lg-5" href="' . URLWEB_FULL . '">
                <img src="' . AS_ASSETS . 'img/logo/logo-horizontal.png">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global"
                    aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbar_global">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="' . URLWEB_FULL . '">
                                <img src="' . AS_ASSETS . 'img/brand/blue.png">
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse"
                                    data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false"
                                    aria-label="Toggle navigation">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
                ' . ((isLogin) ? '<ul class="navbar-nav align-items-lg-center ml-lg-auto">
                    <li class="nav-item d-none d-lg-block ml-lg-4">
                        <a class="btn btn-neutral btn-icon" href="../../../exit" target="_self">
                <span class="btn-inner--icon">
                  <i class="fa fa-sign-out-alt mr-2"></i>
                </span>
                            <span class="nav-link-inner--text">LogOut</span>
                        </a>
                    </li>
                </ul>' : '') .
    '</div>
        </div>
    </nav>
</header>
');