<?php
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Generalsetting;
use App\Models\User;



if (!function_exists('human_file_size')) {


    // function setting()
    // {
    //     $user = Generalsetting::all();
    //     return $user->sitetitle;
    // }

    function setting()
    {
      $id= Auth::user()->id;
      $total=DB::table('generalsetting')->where("id",$id)->first();
      return $total;

    }


    function permisstion($id)
        {
          $permisstiondata = array();
          $data=DB::table('users') ->where("id",$id)->first();

            if(!empty($data))
            {
              $permisstion=DB::table('permissions') ->where("role_id",$data->role_id)->first();

              if(!empty($permisstion))
              {
                $permisstiondata =   json_decode($permisstion->permissiondata);
              }
            }

          return $permisstiondata;
        }

        function permisstioncheck($value,$role)
        {

            $p = false ;

            $permisstion=DB::table('permissions') ->where("role_id",$role)->first();

            if(!empty($permisstion))
            {
              $permisstiondata =   json_decode($permisstion->permissiondata);

              if(!empty($permisstiondata))
              {

                if (isset($permisstiondata->$value)) {
                    if ($permisstiondata->$value == "on") {
                        $p = true;

                    }
                  }

              }

            }
            return $p;

        }

    



























}






























