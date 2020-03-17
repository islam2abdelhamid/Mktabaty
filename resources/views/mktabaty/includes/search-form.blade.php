    <!-- Top Filter -->
    <div class="row">
        <div class="col-md-6">
            <form action="{{ url('bookSearch') }}" method="GET">
                {{--  <div class="form-group has-search">
                    <span class="fa fa-search form-control-feedback"></span>
                    <input type="text" class="form-control" placeholder="Search" />
                </div>  --}}
                <div class="btn-group">
                    <select class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" id="selectButton" name="selectButton">
                        <option value="Search By">Search By</option>
                        <option value="title">Title</option>
                        <option value="auther">Auther</option>
                    </select>
                </div>

                <div class="form-group has-search">
                    <span class="fa fa-search form-control-feedback"></span>
                    <input type="text" class="form-control" placeholder="Search" id="searchButton"
                    name="searchButton" onchange="this.form.submit()" style="width: 300px;"/>

                    {{--  <select class="form-control select2" class="form-control"
                    placeholder="Search" id="selectButton" name="selectButton">
                        <option>Seach</option>
                        <option>By Title</option>
                        <option>By Auther</option>
                    </select>  --}}
                </div>
            </form>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <select class="form-control" name="listBy" id="listBy">
                    <option value="" disabled selected>List By</option>
                    <option value="latest">Latest</option>
                    <option value="name">Name</option>
                    <option value="rate">Rate</option>
                </select>
            </div>
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
                }else if (opt == 'auther'){
                    $('#searchButton').attr('placeholder','Search By Auther');
                }else{
                    $('#searchButton').attr('placeholder','Search By ...');
                }
            });
        });
    </script>
    <!-- End of Filter -->
