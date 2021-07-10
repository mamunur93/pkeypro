@extends($layout)


@section('custom_div')

@if (isset($record) && count($record))
<div ng-controller="auctionsController" ng-init="initFunctions()">
    @else
    <div ng-controller="auctionsController">
        @endif

        @stop


        @section('content')

        @include('bidder.leftmenu')

        <!--Dashboard section -->


        <div class="col-lg-9 col-md-8 col-sm-12 au-onboard">
            <a href="{{URL_HOME}}" class="au-middles justify-content-start"> {{getPhrase('home')}} &nbsp;<span> / {{getPhrase('profile')}} </span></a>

            <div class="au-left-side form-auth-style">

            <a href="/employees/create" class="btn btn-info"> Add New </span></a>

                        <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Designation</th>
                                        <th>Mobile</th>
                                        <th>Role</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($slave_users as $single_slave_usres)
                                    <tr>
                                        <td>{{ $single_slave_usres->name }}</td>
                                        <td>{{ $single_slave_usres->email }}</td>
                                        <td>{{ $single_slave_usres->name }}</td>
                                        <td>{{ $single_slave_usres->phone }}</td>
                                        <td>{{ $single_slave_usres->role[0]->display_name }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                        </table>




                      



                    </div>



                </div>

              

            </div>
        </div>




    </div>
</div>
</section>
<!--Dashboard section-->

@endsection



@section('footer_scripts')
@include('common.validations')
@include('common.alertify')

@include('home.pages.auctions.auctions-js-script')

<script>
    var file = document.getElementById('image_input');

    file.onchange = function(e) {
        var ext = this.value.match(/\.([^\.]+)$/)[1];
        switch (ext) {
            case 'jpg':
            case 'jpeg':
            case 'png':

                break;
            default:
                alertify.error("{{getPhrase('file_type_not_allowed')}}");
                this.value = '';
        }
    };
</script>

@stop