<!-- Top Filter -->
<div class="row">

    <form action="{{ url('bookSearch') }}" method="GET">
        {{--  <div class="form-group has-search">
                    <span class="fa fa-search form-control-feedback"></span>
                    <input type="text" class="form-control" placeholder="Search" />
                </div>  --}}
        <div class="col-md-6 d-flex justify-content-start">




            <div class="form-group has-search">
                <span class="fa fa-search form-control-feedback"></span>
                <input type="text" class="form-control" placeholder="Search" id="searchButton" name="searchButton"
                    onchange="this.form.submit()" style="width: 300px;" />

                {{--  <select class="form-control select2" class="form-control"
                        placeholder="Search" id="selectButton" name="selectButton">
                            <option>Seach</option>
                            <option>By Title</option>
                            <option>By Author</option>
                        </select>  --}}
            </div>
            <div class="form-group">
                <select class="form-control dropdown-toggle" name="selectButton" style="width: 110px;">
                    <option value="title" selected>Title</option>
                    <option value="author">Author</option>
                </select>
            </div>
        </div>
    </form>


    <div class="col-md-6">
        <form action="{{ url('bookSort') }}" method="GET">
        <div class="form-group">
            <select class="form-control" name="listBy" id="listBy" onchange="this.form.submit()">
                <option value="" disabled selected>List By</option>
                <option value="latest">Latest</option>
                <option value="name">Name</option>
                <option value="rate">Rate</option>
            </select>
        </div>
        </form>
    </div>

</div>
<script src="../../../js/app.js"></script>
<script>
    {{--  $(document).ready( function () {
            $('#searchButton').each( function() {
                $(this).hide();
            });
        });  --}}
        $(function(){
            $('#selectButton').change(function(){
                var opt = $(this).val();
                if(opt == 'title'){
                    $('#searchButton').attr('placeholder','Search By Title');
                }else if (opt == 'author'){
                    $('#searchButton').attr('placeholder','Search By Author');
                }else{
                    $('#searchButton').attr('placeholder','Search By ...');
                }
            });
        });
</script>
<!-- End of Filter -->
