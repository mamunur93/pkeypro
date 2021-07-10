@inject('request', 'Illuminate\Http\Request')
@extends($layout)

@section('content')
    <h3 class="page-title"> Industry Type </h3>

    

    
    

    <div class="panel panel-default">
        <div class="panel-heading">
            {{getPhrase('list')}}

            @can('create_letter_create')
                <a href="/admin/industry-type/create" class="btn btn-success btn-add pull-right"> {{getPhrase('add_new')}} </a>
            @endcan

        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped datatable">
                <thead>
                    <tr>
                        <th style="text-align:center;">S.no.</th>

                        <th> {{getPhrase('title')}}</th>
                     
                        <th>&nbsp;</th>
                    </tr>
                </thead>

                 @if (count($records) > 0)
                <tbody>
                    @if (count($records) > 0)
                    <?php $i=0;?>
                        @foreach ($records as $record)
                        <?php $i++;?>
                        
                            <tr data-entry-id="{{ $record->id }}">
                               
                               <td style="text-align:center;">{{$i}}</td>

                               <td field-key='title'>{{ $record->title }}</td>

                                <td>
                                    <a class="btn btn-xs btn-danger" href="javascript:void(0)" onclick="deleteRecord('{{$record->id}}')"> {{ getPhrase('delete') }} </a>
                                </td>

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6"> {{ getPhrase('no_entries_in_table') }}</td>
                        </tr>
                    @endif
                </tbody>
                 @endif

            </table>
        </div>
    </div>
@stop

@section('footer_scripts') 


        @include('common.deletescript', array('route'=>URL_INDUSTRY_TYPE_DELETE))

@endsection 