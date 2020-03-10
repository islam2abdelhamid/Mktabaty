@include('dashboard.includes.head')

<body class="dark-edition">
    <div class="wrapper ">
        @include('dashboard.includes.sidebar')


        <div class="main-panel">

            @include('dashboard.includes.navbar')

            @yield('content')

            <script>
                const x = new Date().getFullYear();
              let date = document.getElementById('date');
              date.innerHTML = '&copy; ' + x + date.innerHTML;
            </script>
        </div>

    </div>

    @include('dashboard.includes.scripts')
</body>

</html>