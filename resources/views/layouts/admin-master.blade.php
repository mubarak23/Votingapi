
@include('admin.admin-header')
<body>
    
    <div class="main">
    	@include('admin.admin-sidebar')

        @yield('content')

    </div>

    @include('admin.admin-footer')
