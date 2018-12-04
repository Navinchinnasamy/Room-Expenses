@php $role = Auth::user()->role; @endphp

<!-- START LEFT SIDEBAR NAV-->
<aside id="left-sidebar-nav">
    <ul id="slide-out" class="side-nav fixed leftside-navigation">
        <li class="user-details cyan darken-2">
            <div class="row">
                <div class="col col s4 m4 l4">
                    <img src="{{ asset('template/images/avatar.png') }}" alt=""
                         class="circle responsive-img valign profile-image">
                </div>
                <div class="col col s8 m8 l8">
                    <ul id="profile-dropdown" class="dropdown-content">
                        <li><a href=""><i class="mdi-action-face-unlock"></i> Profile</a></li>
                        <li><a href=""><i class="mdi-action-settings"></i> Settings</a></li>
                        <li class="divider"></li>
                        <li><a href=""><i class="mdi-action-lock-outline"></i> Lock</a></li>
                        <li>
                            <a href="#"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                        class="mdi-hardware-keyboard-tab"></i> Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                    <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#"
                       data-activates="profile-dropdown">{{ Auth::user()->name }}<i
                                class="mdi-navigation-arrow-drop-down right"></i></a>
                    <p class="user-roal"></p>
                </div>
            </div>
        </li>
        <li class="bold {{ Request::path() == 'home' ? 'active' : '' }}"><a href="{{ url('/home') }}"
                                                                            class="waves-effect waves-cyan"><i
                        class="mdi-action-dashboard"></i>Dashboard</a>
        </li>
        <li class="bold {{ Request::path() == 'expense/create' ? 'active' : '' }}"><a
                    href="{{ url('/expense/create') }}" class="waves-effect waves-cyan"><i
                        class="mdi-action-add-shopping-cart"></i> Expenses Add </a>
        </li>
        <li class="bold {{ Request::path() == 'expense' ? 'active' : '' }}"><a href="{{ url('/expense') }}"
                                                                               class="waves-effect waves-cyan"><i
                        class="mdi-action-history"></i> Purchase History </a>
        </li>
        @if($role === 1)
            <li class="bold {{ Request::path() == 'general' ? 'active' : '' }}"><a href="{{ route('general') }}"
                                                                                   class="waves-effect waves-cyan"><i
                            class="mdi-editor-attach-money"></i> General Expenses </a>
            </li>
            <li class="bold {{ Request::path() == 'notification' ? 'active' : '' }}"><a href="{{ route('notification') }}"
                                                                                        class="waves-effect waves-cyan"><i
                            class="mdi-notification-system-update"></i> Notifications </a>
            </li>
            <li class="bold {{Request::path() == 'register' ? 'active' : '' }}"><a href="{{ route('add-user') }}"
                                                                                   class="waves-effect waves-cyan"><i
                            class="mdi-action-verified-user"></i> Add User </a></li>
        @endif
    </ul>
    <a href="#" data-activates="slide-out"
       class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only darken-2"><i
                class="mdi-navigation-menu"></i></a>
</aside>
<!-- END LEFT SIDEBAR NAV-->