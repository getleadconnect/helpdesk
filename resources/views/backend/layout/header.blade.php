
<header class="page-header">
    <div class="header-container">
        <button type="button" id="mobile-nav-toggle">
            <div class="lnr lnr-menu"><span></span> <span></span> <span></span></div>
        </button>
        <a class="topbar-mobile-toggle"><span></span> <span></span> <span></span></a>

        <div class="d-flex row-wrap align-items-center justify-content-between">
            <div class="col-lg-8 d-flex align-items-center">
                <div class="logo-holder">
                    <a href="{{url('user/home')}}">
                        <img src="{{ url('backend/images/getlead-logo.svg')}}">

                    </a>

                </div>
                <nav id="nav-menu-container">
                    <ul class="nav-menu">

                        {{-- @if(auth()->user()->int_role_id==\App\User::ADMIN) --}}
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('user/home')}}"
                                   title="Dashboard">
                                    <span class="ks-icon la la-book"></span><span>Home</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('admin/enquiries')}}"
                                   title="CRM">
                                    <span class="ks-icon la la-book"></span><span>CRM</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('admin/gl-promo-codes')}}"
                                   title="Missed Call">
                                    <span class="ks-icon la la-info-circle"></span><span>Missed Call</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('admin/users')}}"
                                   title="Users">
                                    <span class="ks-icon la la-book"></span><span>Users</span>
                                </a>
                            </li>

                            <li class="menu-has-children nav-item">
                                <a class="nav-link" href="{{url('admin/sms-history')}}"
                                   title="SMS">
                                    <span class="ks-icon la la-info-circle"></span><span>SMS</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('admin/mail-domain')}}"
                                   title="Bulk Email">
                                    <span class="ks-icon la la-info-circle"></span><span>Bulk Email</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('admin/sms-user-templates')}}"
                                   title="Bulk Email">
                                    <span class="ks-icon la la-info-circle"></span><span>Approvals</span>
                                </a>
                            </li>
                            <li class="menu-has-children nav-item">
                                <a class="nav-link" href="#"
                                   title="Settings">
                                    <span class="ks-icon la la-info-circle"></span><span>Settings</span>
                                </a>

                                <ul>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('admin/testimonials')}}"
                                           title="Testimonials">
                                            <span class="ks-icon la la-info-circle"></span><span>Testimonials</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('admin/website-enquiry')}}"
                                           title="Website Enquiry">
                                            <span class="ks-icon la la-info-circle"></span><span>Website Enquiry</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('admin/crm-enquiry')}}"
                                           title="Crm Enquiry">
                                            <span class="ks-icon la la-info-circle"></span><span>Crm Enquiry</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('admin/career')}}"
                                           title="Career">
                                            <span class="ks-icon la la-info-circle"></span><span>Career</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('admin/career-designation')}}"
                                           title="Designation">
                                            <span class="ks-icon la la-info-circle"></span><span>Designation</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('admin/privilage')}}"
                                           title="Privilege">
                                            <span class="ks-icon la la-info-circle"></span><span>Privilege</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('admin/url-shortener')}}"
                                   title="Shortner">
                                    <span class="ks-icon la la-info-circle"></span><span>Shortner</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{url('user/home')}}" title="Dashboard">
                                    <span class="ks-icon la la-book"></span><span>Home</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{url('user/crm-dashboard')}}" title="Leads">
                                    <span class="ks-icon la la-magnet"></span><span>Leads</span>
                                </a>
                            </li>
                           
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/user/sms-dashboard')}}"
                                   title="SMS"><span>SMS</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('user/ivr-dashboard')}}" title="IVR">
                                    <span>IVR</span></a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('user/sales/dashboard')}}" title="Sales">
                                    <span class="ks-icon la la-phone"></span><span>Sales</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="" title="Sales">
                                    <span class="ks-icon la la-phone"></span><span>Tickets</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('user/tasks')}}" title="Shortner">
                                    <span class="ks-icon la la-phone"></span><span>Tasks</span>
                                </a>
                            </li>
                            <li class="menu-has-children nav-item">
                                <a href="#" title="GL Tools">
                                    <span class="ks-icon la la-phone"></span><span>GL Tools</span>
                                </a>
                                <ul>
                                    <li>
                                        <a class="nav-link" href="{{url('user/missed-call-dashboard')}}"
                                           title="Missed Calls">
                                            <span class="ks-icon la la-info-circle"></span> <span>Missed calls</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="{{url('user/show-gl-verify')}}" title="GL Verify">
                                            <span class="ks-icon la la-info-circle"></span> <span>GL Verify</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="{{url('user/campaign')}}" title="GL Promo">
                                            <span class="ks-icon la la-info-circle"></span><span>GL Promo</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="{{url('user/scratch-redeem-history')}}"
                                           title="GL Scratch">
                                            <span class="ks-icon la la-info-circle"></span><span>GL Scratch</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="{{url('user/show-gl-website-contacts')}}"
                                           title="GL Connect">
                                            <span class="ks-icon la la-info-circle"></span><span>GL Connect</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('user/gl-events')}}" title="GL Events">
                                            <span class="ks-icon la la-info-circle"></span><span>GL Events</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('user/automation')}}" title="GL Automate">
                                            <span class="ks-icon la la-info-circle"></span><span>GL Automate</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('user/url-shortener')}}" title="Shortner">
                                            <span class="ks-icon la la-phone"></span><span>GL Shortner</span>
                                        </a>
                                    </li>
            
                                </ul>
                            </li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-4  d-flex align-items-center justify-content-end menu-panel">
                <div class="dropdown-navigation top-bar">
                    <ul>
                        {{-- @if(Auth::user()->int_role_id==1) --}}
                            <li><span class="text-danger"><h6>Super Admin</h6></span></li>
                        {{-- @endif --}}

                        {{-- @include('backend.user-pages.database-notifications.notifications') --}}

                        <li class="dropdown user-panel drop-menu-sec">
                        {{-- @if(Auth::user()->vchr_logo)
                                <a class="logged-user mg-lft-25 l-grey" href="#">
                                    <img src="{{ url(Auth::user()->vchr_logo)}}"
                                         alt=""> {{  Auth::user()->vchr_user_name }}</a>
                            @else --}}
                                <a class="logged-user mg-lft-25 l-grey" href="#">
                                    <img src="http://via.placeholder.com/500x500"
                                         alt="">Test</a>
                            {{-- @endif --}}
                            <ul class="dropdown-menu">
                                {{-- @if(Auth::user()->int_role_id==2 || Auth::user()->int_role_id==3)
                                    <li class="bg-btm">
                                        <a href="{{ url('user/profile') }}" class="nav-link">
                                            <i class="fa fa-user-o" aria-hidden="true"></i> View Profile</a>
                                    </li>
                                @endif
                                @if(Auth::user()->int_role_id==2) --}}
                                    <li class="bg-btm">
                                        <a href="{{url('/user/payment-plans')}}" class="nav-link">
                                            <i class="fa fa-credit-card"></i>Subscribe Plans</a>
                                    </li>
                                {{-- @endif --}}
                                <li class="bg-btm {{ request()->is('user/change-password') ? 'active' : '' }}">
                                <li class="{{ request()->is('user/change-password') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{url('user/user-password')}}">
                                        <i class="fa fa-lock" aria-hidden="true"></i>
                                        Change Password
                                    </a>
                                </li>
                                <li class="bg-btm">
                                    <a href="" class="nav-link">
                                        <i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</header>
