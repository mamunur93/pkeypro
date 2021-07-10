<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

use Image;
use App\ImageSettings;

use App\Country;
use App\IndustryType;
use App\City;
use File;
use Exception;

class EmployeeController extends Controller
{

    public function __construct()
    {
         $this->middleware('auth');
    }
    
    /**
     * Display a listing of User.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      

        if (!checkRole(getUserGrade(8)))
        {
            prepareBlockUserMessage();
            return back();
        }

        //return 'hello';

        $data['title']              = getPhrase('users');
        $data['active_class']       = 'employee_management';

        // $users = User::all();

        $users = User::join('roles', 'users.role_id', '=', 'roles.id')
                  ->select(['users.id','users.name','users.email','users.image','roles.display_name','users.slug','users.role_id','users.business_telephone','users.approved'])
                  ->where('parent_user_id', auth::user()->id)
                  ->orderBy('users.updated_at', 'desc')->get();

        $data['users']      = $users;

        return view('admin.employees.index', $data);
    }

    /**
     * Show the form for creating new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!checkRole(getUserGrade(8)))
        {
            prepareBlockUserMessage();
            return back();
        }

        $data['title']              = getPhrase('Employee');
        $data['active_class']       = 'employee_management';

        $roles = \App\Role::orderBy('id', 'DESC')->get()->pluck('title', 'id')->take(4);
        $data['roles']              = $roles;

        $data['record']       = FALSE;

        $data['layout']        = getLayOut();

        return view('admin.employees.add-edit', $data);
    }

    /**
     * Store a newly created User in storage.
     *
     * @param  \App\Http\Requests\StoreUsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      

        $columns = array(
        'name'          => 'bail|required|max:20|',
        'email'         => 'bail|required|unique:users,email',
        'password'      => 'bail|required|min:5',
        'password_confirmation' =>  'bail|required|min:5|same:password',
        );


        if(checkRole(getUserGrade(8))) 
          $columns['role_id']  = 'bail|required'; 

        $this->validate($request,$columns);
          

        if ($redirect = $this->check_isdemo()) {
            flash('info','crud_operations_disabled_in_demo', 'info');
            return redirect($redirect);
        }

          
        $role_id = getRoleData('bidder');

         if($request->role_id)
          $role_id = $request->role_id;


        $user           = new User();
        $name           = $request->name;
        $user->name     = $name;
        $user->email    = $request->email;
      
        $password       = $request->password;
        $user->password = bcrypt($password);

        $user->role_id        = $role_id;

        $user->login_enabled= 1;
        $slug               = $user::makeSlug($name);
        //$user->username     = $request->username;
        $user->slug         = $slug;
        $user->phone        = $request->phone;
        $user->parent_user_id = auth::user()->id;

        
      //   $user->business_telephone = $request->business_telephone;
      //  $user->post_office = $request->post_office;
      //  $user->police_station = $request->police_station;
      // $user->industry_type = $request->industry_type;
      // $user->product = $request->product;
      // $user->nid_passport = $request->nid_passport;
      // $user->trade_license = $request->trade_license;
      // $user->tin = $request->tin;
      // $user->bin = $request->bin;
      // $user->nid_passport2 = $request->nid_passport2;
      //  $user->contact_person = $request->contact_person;
     //  $user->website = $request->website;
        
        

        // $user->country_id   = $request->country_id;
        // $user->state_id     = $request->state_id;
        // $user->city_id      = $request->city_id;

        // $user->address      = $request->address;
        // $user->address2      = $request->address2;

        $user->approved = $request->approved;

        $user->save();

        if (!env('DEMO_MODE')) {
           $user->roles()->attach($user->role_id);

           if ($request->hasFile('image') || $request->hasFile('company_logo'))
           $this->processUpload($request, $user);
        }
         

        $message = getPhrase('record_added_successfully_with_password ').' '.$password;
        $exception = 0;
        

         try { 
            if (!env('DEMO_MODE')) {
           
              //send email notification to user - when user registered
              $user->notify(new \App\Notifications\NewUserRegistration($user,'user',$password));
            }
         
           //$this->sendPushNotification($user);
         }
         catch(Exception $ex)
         {
            $message = getPhrase('record_added_successfully_with_password ').' '.$password;
            $message .= getPhrase('\ncannot_send_email_to_user, please_check_your_server_settings');
            $exception = 1;
         }

        $flash = app('App\Http\Flash');
        $flash->create('Success...!', $message, 'success', 'flash_overlay',FALSE);

        return redirect('/users/slave/'.$user->slug);

    }


     protected function processUpload(Request $request, User $user)
     {

        if (env('DEMO_MODE')) {
            return 'demo';
        }


        if ($request->hasFile('image')) {
          
          $imageObject = new ImageSettings();

          $random_str = rand(0,9999999);
          
          
          $destinationPath      = $imageObject->getProfilePicsPath();
          $destinationPathThumb = $imageObject->getProfilePicsThumbnailpath();
          
          $fileName = $user->id.'_'.$random_str.'.'.$request->image->guessClientExtension();
          
          $request->file('image')->move($destinationPath, $fileName);
          $user->image = $fileName;
          

          Image::make($destinationPath.$fileName)->fit($imageObject->getProfilePicSize())->save($destinationPath.$fileName);
         
          Image::make($destinationPath.$fileName)->fit($imageObject->getThumbnailSize())->save($destinationPathThumb.$fileName);
          $user->save();

        } 

        if ($request->hasFile('nid_passport')) {
          
          $imageObject = new ImageSettings();

          $random_str = rand(0,9999999);
          
          
          $destinationPath      = $imageObject->getProfilePicsPath();
          $destinationPathThumb = $imageObject->getProfilePicsThumbnailpath();
          
          $fileName = $user->id.'_'.$random_str.'.'.$request->nid_passport->guessClientExtension();
          
          $request->file('nid_passport')->move($destinationPath, $fileName);
          $user->nid_passport = $fileName;
          

          //Image::make($destinationPath.$fileName)->fit($imageObject->getProfilePicSize())->save($destinationPath.$fileName);
         
          //Image::make($destinationPath.$fileName)->fit($imageObject->getThumbnailSize())->save($destinationPathThumb.$fileName);
          $user->save();

        } 

        if ($request->hasFile('trade_license')) {
          
          $imageObject = new ImageSettings();

          $random_str = rand(0,9999999);
          
          
          $destinationPath      = $imageObject->getProfilePicsPath();
          $destinationPathThumb = $imageObject->getProfilePicsThumbnailpath();
          
          $fileName = $user->id.'_'.$random_str.'.'.$request->trade_license->guessClientExtension();
          
          $request->file('trade_license')->move($destinationPath, $fileName);
          $user->trade_license = $fileName;
          

          //Image::make($destinationPath.$fileName)->fit($imageObject->getProfilePicSize())->save($destinationPath.$fileName);
         
          //Image::make($destinationPath.$fileName)->fit($imageObject->getThumbnailSize())->save($destinationPathThumb.$fileName);
          $user->save();

        } 

        if ($request->hasFile('tin')) {
          
          $imageObject = new ImageSettings();

          $random_str = rand(0,9999999);
          
          
          $destinationPath      = $imageObject->getProfilePicsPath();
          $destinationPathThumb = $imageObject->getProfilePicsThumbnailpath();
          
          $fileName = $user->id.'_'.$random_str.'.'.$request->tin->guessClientExtension();
          
          $request->file('tin')->move($destinationPath, $fileName);
          $user->tin = $fileName;
          

          //Image::make($destinationPath.$fileName)->fit($imageObject->getProfilePicSize())->save($destinationPath.$fileName);
         
          //Image::make($destinationPath.$fileName)->fit($imageObject->getThumbnailSize())->save($destinationPathThumb.$fileName);
          $user->save();

        } 

        if ($request->hasFile('company_logo')) {
          
          $imageObject = new ImageSettings();
        
          $random_str = rand(0,9999999);

          $destinationPath      = $imageObject->getCompanyLogoPath();
          $destinationPathThumb = $imageObject->getCompanyLogoThumbnailpath();
          
          $fileName = $user->id.'_'.$random_str.'_company_logo'.'.'.$request->company_logo->guessClientExtension();
          
          $request->file('company_logo')->move($destinationPath, $fileName);
          $user->company_logo = $fileName;
         
          Image::make($destinationPath.$fileName)->fit($imageObject->getProfilePicSize())->save($destinationPath.$fileName);
         
          Image::make($destinationPath.$fileName)->fit($imageObject->getThumbnailSize())->save($destinationPathThumb.$fileName);
          $user->save();
        }
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
      return URL_USERS;
    }



    /**
     * Show the form for editing User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        
        if (!checkRole(getUserGrade(7)))
        {
            prepareBlockUserMessage();
            return back();
        }
        
        $record = User::where('slug', $slug)->get()->first();

        
        if($isValid = $this->isValidRecord($record))
         return redirect($isValid);



        /**
        * Validate the non-admin user wether is trying to access other user profile
        * If so return the user back to previous page with message
        */
       
        if(!isEligible($slug))
          return back();

        /**
         * Make sure the Admin or staff cannot edit the Admin/Owner accounts
         * Only Owner can edit the Admin/Owner profiles
         * Admin can edit his own account, in that case send role type admin on condition
         */
        
        $UserOwnAccount = FALSE;
         if(\Auth::user()->id == $record->id)
          $UserOwnAccount = TRUE;
          
         
        
        if(!$UserOwnAccount)  {
            $current_user_role = getRoleData($record->role_id);

            if((($current_user_role == 'admin') ))
            {
              if(!checkRole(getUserGrade(1))) {
                prepareBlockUserMessage();
                return back();
              }
            }
        }

        $data['record']             = $record;


        $roles = \App\Role::get()->pluck('display_name', 'id');
        $data['roles'] = $roles;

        $data['countries']  = Country::getCountryOptions();
        
        $data['active_class']       = 'user_management';
        $data['title']              = getPhrase('edit_user');

        $data['layout']        = getLayOut();

        
        
        if (checkRole(getUserGrade(4)))
           return view('admin.employees.add-edit', $data);
        elseif (checkRole(getUserGrade(7)))
           return view('bidder.profile', $data);
        else
           return redirect(URL_USERS_LOGIN);
    }
//Mamunur Rahaman
    public function business($slug)
    {
        
        if (!checkRole(getUserGrade(7)))
        {
            prepareBlockUserMessage();
            return back();
        }
        
        $record = User::where('slug', $slug)->get()->first();

        
        if($isValid = $this->isValidRecord($record))
         return redirect($isValid);



        /**
        * Validate the non-admin user wether is trying to access other user profile
        * If so return the user back to previous page with message
        */
       
        if(!isEligible($slug))
          return back();

        /**
         * Make sure the Admin or staff cannot edit the Admin/Owner accounts
         * Only Owner can edit the Admin/Owner profiles
         * Admin can edit his own account, in that case send role type admin on condition
         */
        
        $UserOwnAccount = FALSE;
         if(\Auth::user()->id == $record->id)
          $UserOwnAccount = TRUE;
          
         
        
        if(!$UserOwnAccount)  {
            $current_user_role = getRoleData($record->role_id);

            if((($current_user_role == 'admin') ))
            {
              if(!checkRole(getUserGrade(1))) {
                prepareBlockUserMessage();
                return back();
              }
            }
        }

        $data['record']             = $record;


        $roles = \App\Role::get()->pluck('display_name', 'id');
        $data['roles'] = $roles;

        //return 
        // Country::getCountryOptions();

        $data['industries']  = IndustryType::get()->pluck('title', 'id');
        
        $data['active_class']       = 'user_management';
        $data['title']              = getPhrase('edit_user');

        $data['layout']        = getLayOut();

        //return $data;

        
        
        if (checkRole(getUserGrade(4)))
           return view('admin.employees.add-edit', $data);
        elseif (checkRole(getUserGrade(7)))
           return view('bidder.business', $data);
        else
           return redirect(URL_USERS_LOGIN);
    }

    public function business_update(Request $request, $slug){
      

      if (!checkRole(getUserGrade(7)))
      {
          prepareBlockUserMessage();
          return back();
      }

      $record     = User::where('slug', $slug)->get()->first();

      $previous_nid = $record->nid_passport;
      $previous_trade = $record->trade_licence;
      $previous_tin = $record->tin;
      $previous_status = $record->approved;


      if($isValid = $this->isValidRecord($record))
       return redirect($isValid);


      if(!isEligible($slug))
        return back();

      if(checkRole(getUserGrade(1)))
        $validation['role_id'] = 'bail|required|integer';


      if ($redirect = $this->check_isdemo()) {
          flash('info','crud_operations_disabled_in_demo', 'info');
          return redirect($redirect);
      }


     // $name = $request->name;
      $previous_role_id = $record->role_id;
      //  if($name != $record->name)
      //     $record->slug = $record::makeSlug($name);

    //  $record->name = $name;
      
      if(checkRole(getUserGrade(1))) {

        $record->role_id  = $request->role_id;
        $record->approved = $request->approved;

      }


     
     $record->industry_type = $request->industry_type;
     $record->product = $request->product;
     $record->nid_passport = $request->nid_passport;
     $record->trade_license = $request->trade_license;
     $record->tin = $request->tin;
     
     //return var_dump($record);

     $record->save();

     if(checkRole(getUserGrade(1)))
      {
        /**
         * Delete the Roles associated with that user
         * Add the new set of roles
         */
      
         if(!env('DEMO_MODE')) {
            DB::table('role_user')
            ->where('user_id', '=', $record->id)
            ->where('role_id', '=', $previous_role_id)
            ->delete();
            
           $record->roles()->attach($request->role_id);


        }
      }


      if(!env('DEMO_MODE')) {

        if ($request->hasFile('nid_passport') || $request->hasFile('trade_license') || $request->hasFile('tin')) {

           $this->processUpload($request, $record);

            if ($request->hasFile('nid_passport') && $previous_nid!='') {

                  $this->deleteFile($previous_nid, USER_IMAGES_PATH);
                  $this->deleteFile($previous_nid, USER_IMAGES_THUMBPATH);
            }

            if ($request->hasFile('trade_license') && $previous_trade!='') {

                $this->deleteFile($previous_trade, USER_IMAGES_PATH);
                $this->deleteFile($previous_trade, USER_IMAGES_THUMBPATH);
            }

            if ($request->hasFile('tin') && $previous_tin!='') {

              $this->deleteFile($previous_tin, USER_IMAGES_PATH);
              $this->deleteFile($previous_tin, USER_IMAGES_THUMBPATH);
            }

          
        }

    }

      $message = 'record_updated_successfully';

      if (checkRole(getUserGrade(1))) {

          if ($previous_status!=$request->approved) {

                  try {
                      if (!env('DEMO_MODE')) {
                        //user account status changed - email to user
                          $account_status='Blocked';
                          if ($request->approved==1) {
                             $account_status='Unblocked';
                          }
                          $user = getUserRecord($record->id);
                          
                          $user->notify(new \App\Notifications\UserAccountNotification($user,$account_status));

                       }
                   } catch(Exception $ex) {

                      $message = getPhrase('record_updated_successfully ');
                      $message .= getPhrase('\ncannot_send_email_to_user, please_check_your_server_settings');
                  }
          }
      }



      


      flash('success',$message, 'success');

      if(checkRole(getUserGrade(1)))
      return redirect('/users/business/edit/'.$record->slug);


      return redirect(URL_USERS_EDIT.'/'.$record->slug);
    }
     public function org($slug)
    {
     
        if (!checkRole(getUserGrade(7)))
        {
            prepareBlockUserMessage();
            return back();
        }
        
        $record = User::where('slug', $slug)->get()->first();

        
        if($isValid = $this->isValidRecord($record))
         return redirect($isValid);



        /**
        * Validate the non-admin user wether is trying to access other user profile
        * If so return the user back to previous page with message
        */
       
        if(!isEligible($slug))
          return back();

        /**
         * Make sure the Admin or staff cannot edit the Admin/Owner accounts
         * Only Owner can edit the Admin/Owner profiles
         * Admin can edit his own account, in that case send role type admin on condition
         */
        
        $UserOwnAccount = FALSE;
         if(\Auth::user()->id == $record->id)
          $UserOwnAccount = TRUE;
          
         
        
        if(!$UserOwnAccount)  {
            $current_user_role = getRoleData($record->role_id);

            if((($current_user_role == 'admin') ))
            {
              if(!checkRole(getUserGrade(1))) {
                prepareBlockUserMessage();
                return back();
              }
            }
        }

        $data['record']             = $record;


        $roles = \App\Role::get()->pluck('display_name', 'id');
        $data['roles'] = $roles;

        $data['countries']  = Country::getCountryOptions();
        
        $data['active_class']       = 'user_management';
        $data['title']              = getPhrase('edit_user');

        $data['layout']        = getLayOut();

        
        
        if (checkRole(getUserGrade(4)))
           return view('admin.employees.add-edit', $data);
        elseif (checkRole(getUserGrade(7)))
           return view('bidder.org', $data);
        else
           return redirect(URL_USERS_LOGIN);
    }
//Mamunur Rahaman

    /**
     * Update User in storage.
     *
     * @param  \App\Http\Requests\UpdateUsersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {

       if (!checkRole(getUserGrade(7)))
        {
            prepareBlockUserMessage();
            return back();
        }

        $record     = User::where('slug', $slug)->get()->first();

        $previous_image = $record->image;
        $previous_company_logo = $record->company_logo;
        $previous_status = $record->approved;


        if($isValid = $this->isValidRecord($record))
         return redirect($isValid);

        $validation = [
        'name'      => 'bail|required|max:20|',
        'phone'     => 'bail|required|max:20',
        'image'     => 'bail|mimes:png,jpg,jpeg|max:2048',
        'country_id'    => 'bail|required',
        'state_id'      => 'bail|required',
        'city_id'       => 'bail|required'
        ];


        if(!isEligible($slug))
          return back();

        if(checkRole(getUserGrade(1)))
          $validation['role_id'] = 'bail|required|integer';

        $this->validate($request, $validation);



        if ($redirect = $this->check_isdemo()) {
            flash('info','crud_operations_disabled_in_demo', 'info');
            return redirect($redirect);
        }


        $name = $request->name;
        $previous_role_id = $record->role_id;
         if($name != $record->name)
            $record->slug = $record::makeSlug($name);

        $record->name = $name;
        
        if(checkRole(getUserGrade(1))) {

          $record->role_id  = $request->role_id;
          $record->approved = $request->approved;

        }


       $record->phone = $request->phone;
       
       
       $record->business_telephone = $request->business_telephone;
       $record->post_office = $request->post_office;
       $record->police_station = $request->police_station;
       $record->industry_type = $request->industry_type;
       $record->product = $request->product;
      //  $record->nid_passport = $request->nid_passport;
      //  $record->trade_license = $request->trade_license;
      //  $record->tin = $request->tin;
      // $record->website = $request->website;
       $record->bin = $request->bin;
       $record->nid_passport2 = $request->nid_passport2;
        $record->contact_person = $request->contact_person;
       
       
       $record->address = $request->address;
       $record->address2 = $request->address2;

       $record->country_id = $request->country_id;
       $record->state_id   = $request->state_id;
       $record->city_id    = $request->city_id;
       
       //return var_dump($record);

       $record->save();

       if(checkRole(getUserGrade(1)))
        {
          /**
           * Delete the Roles associated with that user
           * Add the new set of roles
           */
        
           if(!env('DEMO_MODE')) {
              DB::table('role_user')
              ->where('user_id', '=', $record->id)
              ->where('role_id', '=', $previous_role_id)
              ->delete();
              
             $record->roles()->attach($request->role_id);


          }
        }


        if(!env('DEMO_MODE')) {

          if ($request->hasFile('image') || $request->hasFile('company_logo')) {

             $this->processUpload($request, $record);

              if ($request->hasFile('image') && $previous_image!='') {

                    $this->deleteFile($previous_image, USER_IMAGES_PATH);
                    $this->deleteFile($previous_image, USER_IMAGES_THUMBPATH);
              }

              if ($request->hasFile('company_logo') && $previous_company_logo!='') {

                    $this->deleteFile($previous_company_logo, SELLER_LOGO_PATH_URL);
                    $this->deleteFile($previous_company_logo, SELLER_LOGO_THUMB_PATH_URL);
              }
          }

      }

        $message = 'record_updated_successfully';

        if (checkRole(getUserGrade(1))) {

            if ($previous_status!=$request->approved) {

                    try {
                        if (!env('DEMO_MODE')) {
                          //user account status changed - email to user
                            $account_status='Blocked';
                            if ($request->approved==1) {
                               $account_status='Unblocked';
                            }
                            $user = getUserRecord($record->id);
                            
                            $user->notify(new \App\Notifications\UserAccountNotification($user,$account_status));

                         }
                     } catch(Exception $ex) {

                        $message = getPhrase('record_updated_successfully ');
                        $message .= getPhrase('\ncannot_send_email_to_user, please_check_your_server_settings');
                    }
            }
        }



        


        flash('success',$message, 'success');

        if(checkRole(getUserGrade(1)))
        return redirect(URL_USERS);


        return redirect(URL_USERS_EDIT.'/'.$record->slug);

    }

    /**
     * [deleteFile description]
     * @param  [type]  $record   [description]
     * @param  [type]  $path     [description]
     * @param  boolean $is_array [description]
     * @return [type]            [description]
     */
    public function deleteFile($record, $path, $is_array = FALSE)
    {
       
        $destinationPath      = $path;
      
        $files = array();
        $files[] = $destinationPath.$record;

        File::delete($files);
    }



    /**
     * Display User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        
        if (!checkRole(getUserGrade(1)))
        {
            prepareBlockUserMessage();
            return back();
        }

        $record = User::join('roles','users.role_id','roles.id')
                        ->leftJoin('countries','users.country_id','countries.id')
                        ->leftJoin('states','users.state_id','states.id')
                        ->leftJoin('cities','users.city_id','cities.id')
                        ->select(['users.*','roles.display_name','countries.title',
                                'states.state','cities.city'])
                        ->where('users.slug', $slug)->get()->first();

      
        

        if($isValid = $this->isValidRecord($record))
         return redirect($isValid);
       /**
        * Validate the non-admin user wether is trying to access other user profile
        * If so return the user back to previous page with message
        */
       
        if(!isEligible($slug))
          return back();

        $data['user']             = $record;
       
        $data['active_class']       = 'user_management';
        $data['title']              = getPhrase('view_details');
        $data['layout']             = getLayout();
        
        return view('admin.employees.user_details', $data);



    }


    /**
     * Remove User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.employees.index');
    }

    /**
     * Delete all selected User at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = User::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * This method will show the page for change password for user
     * @param  [type] $slug [description]
     * @return [type]       [description]
     */
    public function changePassword($slug)
    {

        if (!checkRole(getUserGrade(7)))
        {
            prepareBlockUserMessage();
            return back();
        }

       $record = User::where('slug', $slug)->get()->first();
       
        if($isValid = $this->isValidRecord($record))
         return redirect($isValid);
       /**
        * Validate the non-admin user wether is trying to access other user profile
        * If so return the user back to previous page with message
        */

        if(!isEligible($slug))
          return back();

        $data['record']             = $record;
        $data['active_class']       = 'profile';
        $data['title']              = getPhrase('change_password');
        $data['layout']             = getLayout();
        
        if (checkRole(getUserGrade(4)))
           return view('auth.change_password', $data);
        elseif (checkRole(getUserGrade(8))) {
           $data['active_class']       = 'user_management';
           return view('bidder.change_password', $data);
        }
        else
           return redirect(URL_USERS_LOGIN);

        
    }
    
    /**
     * This method updates the password submitted by the user
     * @param  Request $request [description]
     * @return [type]           [description]
     */
     public function updatePassword(Request $request)
    {

       if (!checkRole(getUserGrade(7)))
        {
            prepareBlockUserMessage();
            return back();
        }

        $this->validate($request, [
            'old_password' => 'required',
            'password'     => 'required|confirmed',
        ]);



        $credentials = $request->only(
            'old_password', 'password', 'password_confirmation'
        );

        if ($redirect = $this->check_isdemo()) {
            flash('info','crud_operations_disabled_in_demo', 'info');
            return redirect($redirect);
        }

        $user = \Auth::user();
        
        
        if (Hash::check($credentials['old_password'], $user->password)){

            $user->password = bcrypt($credentials['password']);
            $user->save();

            flash('success','password_updated_successfully', 'success');
            return redirect(URL_USERS_CHANGE_PASSWORD.$user->slug);

        }else {

            flash('Oops..!','old_and_new_passwords are not same', 'error');
            return redirect()->back();            
       }
  }


    /**
     * [changeStatus description]
     * @param  [type] $slug   [description]
     * @param  [type] $status [description]
     * @return [type]         [description]
     */
    public function changeStatus($slug,$status)
    {
      if(!checkRole(getUserGrade(1)))
      {
        prepareBlockUserMessage();
        return back();
      }

      if(!env('DEMO_MODE')) {

            $user = User::where('slug', '=', $slug)->first();

            if($isValid = $this->isValidRecord($user))
                return redirect($isValid);

            $account_status='Blocked';
            if ($status=='block') {
                User::where('slug','=' ,$slug)->update(['approved'=> 0]);
            }
            else if ($status=='unblock') {
                $account_status='Unblocked';
                User::where('slug', '=', $slug)->update(['approved'=> 1]);
            }

            $message = 'user_account_status_updated_successfully';

            try {

                $user = getUserRecord($user->id);
                $user->notify(new \App\Notifications\UserAccountNotification($user,$account_status));

            } catch(Exception $ex) {

                $message = getPhrase('user_account_status_updated_successfully ');
                $message .= getPhrase('\ncannot_send_email_to_user, please_check_your_server_settings');
            }
        
      }

        flash('success',$message, 'success');
        return redirect(URL_USERS);    
    }


    /**
      * This method returns the cities based on state
      * @param  [type] $request [description]
      * @return [type] array    [description]
      */
    public function getCities(Request $request)
    {
        $state_id = $request->id;

        $cities = City::where('state_id','=',$state_id)
                        ->where('status','Active')
                        ->get();

        return json_encode(array('cities'=>$cities));
    }


    /**
      * [check_isdemo description]
      * @return [type] [description]
      */
    public function check_isdemo()
    {
       if (env('DEMO_MODE'))
          return URL_USERS;
       else
          return false;
    }

}
