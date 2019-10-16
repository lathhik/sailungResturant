@include('backend.partials.head')
<div class="container body">
    <div class="main_container">
        @include('backend.partials.side-nave')
        @include('backend.partials.top-nav')

        @yield('content')

    </div>
</div>
@include('backend.partials.footer')
@include('backend.partials.foot')
