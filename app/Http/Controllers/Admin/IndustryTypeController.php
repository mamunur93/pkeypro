<?php

namespace App\Http\Controllers\Admin;

use App\IndustryType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;

// use App\Http\Requests\Admin\StoreIndustryTypesRequest;
// use App\Http\Requests\Admin\UpdateIndustryTypesRequest;
// 
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use App\Subscriber;
use Exception;
class IndustryTypeController extends Controller
{
    /**
     * Display a listing of IndustryType.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!checkRole(getUserGrade(1)))
        {
            prepareBlockUserMessage();
            return back();
        }

       
        $records = IndustryType::all();

        $data['active_class']       = 'industry_type';

        $data['records']            = $records;
        $data['layout']             = getLayOut();
 
        return view('admin.industry_type.index',$data);
    }

    /**
     * Show the form for creating new IndustryType.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!checkRole(getUserGrade(1)))
        {
            prepareBlockUserMessage();
            return back();
        }

        $data['title']        = 'Create Industry Type';
        $data['active_class'] = 'industry_type';
     

        $data['subscribers']  = Subscriber::getSubscriberOptions();
            
        return view('admin.industry_type.create', $data);
    }

    /**
     * Store a newly created IndustryType in storage.
     *
     * @param  \App\Http\Requests\StoreIndustryTypesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        if (!checkRole(getUserGrade(1)))
        {
            prepareBlockUserMessage();
            return back();
        }

        $this->validate($request, [
         'title'   => 'bail|required',
        ]);


        if ($redirect = $this->check_isdemo()) {
            flash('info','crud_operations_disabled_in_demo', 'info');
            return redirect($redirect);
        }

        $record = new IndustryType();

        $record->title           = $request->title;

        $record->save();


        return redirect('/admin/industry-type');
    }


    /**
     * Show the form for editing IndustryType.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $created_bies = \App\User::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $enum_to = IndustryType::$enum_to;
            
        $create_letter = IndustryType::findOrFail($id);

        return view('admin.industry_type.edit', compact('create_letter', 'enum_to', 'created_bies'));
    }

    /**
     * Update IndustryType in storage.
     *
     * @param  \App\Http\Requests\UpdateIndustryTypesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($redirect = $this->check_isdemo()) {
            flash('info','crud_operations_disabled_in_demo', 'info');
            return redirect($redirect);
        }

        $create_letter = IndustryType::findOrFail($id);
        $create_letter->update($request->all());

        return redirect()->route('admin.industry_type.index');
    }


    /**
     * Display IndustryType.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!checkRole(getUserGrade(1)))
        {
            prepareBlockUserMessage();
            return back();
        }

        $create_letter = IndustryType::join('subscribers','industry_type.subscriber_id','subscribers.id'               )->select(['industry_type.*','subscribers.email'])
                            ->where('industry_type.id',$id)
                            ->first();

        if ($isValid = $this->isValidRecord($create_letter))
             return redirect($isValid);


        $data['title']        = getPhrase('view');
        $data['active_class'] = 'industry_type';
        
        $data['create_letter'] = $create_letter;
                                 
        return view('admin.industry_type.show', $data);
    }


    /**
     * Remove IndustryType from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $create_letter = IndustryType::findOrFail($id);
        $create_letter->delete();

        return redirect()->route('admin.industry_type.index');
    }

    /**
     * Delete all selected IndustryType at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (!checkRole(getUserGrade(1)))
        {
            prepareBlockUserMessage();
            return back();
        }

        $record = IndustryType::where('id',$request->id)->first();

        if ($isValid = $this->isValidRecord($record)) {
            $response['status']  = 0;
            $response['message'] = getPhrase('record_not_found');
            return json_encode($response);
        }

         if ($redirect = $this->check_isdemo()) {
            
            $response['status']  = 0;
            $response['message'] = getPhrase('crud_operations_disabled_in_demo');
            return json_encode($response);
        }
             

         if ($request->id) {

            try {
                  if(!env('DEMO_MODE')) {
                     
                    $entries = IndustryType::where('id', $request->id)->get();

                        foreach ($entries as $entry) {
                            $entry->delete();
                        }

                  }
                $response['status'] = 1;
                $response['message'] = getPhrase('record_deleted_successfully');

            }
            catch ( \Illuminate\Database\QueryException $e) {

                   $response['status'] = 0;
                   if(getSetting('show_foreign_key_constraint','module'))
                    $response['message'] =  $e->errorInfo;
                   else
                    $response['message'] =  getPhrase('record_not_deleted');
            }  

            
        } else {

            $response['status'] = 0;
            $response['message'] = getPhrase('invalid_operation');
        }

        return json_encode($response);
     
    }


    /**
     * Restore IndustryType from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $create_letter = IndustryType::onlyTrashed()->findOrFail($id);
        $create_letter->restore();

        return redirect()->route('admin.industry_type.index');
    }

    /**
     * Permanently delete IndustryType from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        $create_letter = IndustryType::onlyTrashed()->findOrFail($id);
        $create_letter->forceDelete();

        return redirect()->route('admin.industry_type.index');
    }

    /**
     * [isValidRecord description]
     * @param  [type]  $record [description]
     * @return boolean         [description]
     */
    public function isValidRecord($record)
    {
      if ($record === null) {
        flash('Ooops...!', getPhrase("page_not_found"), 'error');
        return $this->getRedirectUrl();
       }

       return FALSE;
    }

    /**
     * [getRedirectUrl description]
     * @return [type] [description]
     */
    public function getRedirectUrl()
    {
      return URL_LIST_industry_type;
    }


      /**
      * [check_isdemo description]
      * @return [type] [description]
      */
    public function check_isdemo()
    {
       if (env('DEMO_MODE'))
          return URL_LIST_industry_type;
       else
          return false;
    }

}
