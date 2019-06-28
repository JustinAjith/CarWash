<?php $request = request(); ?>
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="{{ asset('images/logo/logo.png')}}" alt="User Image" width="28%;">
        <div>
            <p class="app-sidebar__user-name">{{ Auth::user()->name }}</p>
            <p class="app-sidebar__user-designation">Admin</p>
        </div>
    </div>
    <ul class="app-menu">
        <li><a class="app-menu__item {{ $request->is('admin/dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li><a class="app-menu__item {{ $request->is('admin/booking') ? 'active' : '' }}" href="{{ route('admin.booking') }}"><i class="app-menu__icon fa fa-car"></i><span class="app-menu__label">Booking</span></a></li>
        <li><a class="app-menu__item {{ $request->is('admin/services') ? 'active' : '' }}" href="{{ route('admin.services') }}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Services</span></a></li>
        <li><a class="app-menu__item {{ $request->is('admin/setting') ? 'active' : '' }}" href="{{ route('admin.setting') }}"><i class="app-menu__icon fa fa-cogs"></i><span class="app-menu__label">Setting</span></a></li>
    </ul>
</aside>