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

    <script>
        $('#bookModalUpdate').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var title = button.data('title')
            var auther = button.data('auther')
            var category = button.data('category')
            var quantity = button.data('quantity')
            var avaliable = button.data('avaliable')
            var price = button.data('price')
            var action = button.data('action')

            var modal = $(this)
            modal.find('.modal-body #id').val(id)
            modal.find('.modal-body #title').val(title)
            modal.find('.modal-body #auther').val(auther)
            modal.find('.modal-body #category').val(category)
            modal.find('.modal-body #quantity').val(quantity)
            modal.find('.modal-body #avaliable').val(avaliable)
            modal.find('.modal-body #price').val(price)
            {{--  modal.find('.modal-body #updateForm').attr("action",  "{{ url('books/'. action) }}" );  --}}
        })
    </script>
</body>

</html>
