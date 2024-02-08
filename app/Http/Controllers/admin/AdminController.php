<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\req_update_user;


class AdminController extends Controller
{
    public function PageAdmin()
    {
        return view('ProjectView.adminpage');
    }

    public function index()
    {
    
       // $data = User::select('*')->latest()->get();
        $data = User::select('*')->latest()->paginate(5); // 10 هو عدد العناصر لكل صفحة


        if ($data->count() > 0) {
            return view('ProjectView.adminpage', ['data' => $data]);
        }
         else {
            // استخدام dd للتحقق من قيمة المتغير
            return view ('ProjectView.no_data_found',['data'=>'There are no accounts to display']); // يمكنك إنشاء عرض يظهر رسالة لعدم وجود بيانات
        }
    }

    public function edit($id)
    {
        $data=User::select('*')->find($id);

        return view('ProjectView.editpage',['data'=>$data]);
    }

    public function store(req_update_user $request,$id)
    {
        // يمكنك استخدام الطلب للوصول إلى البيانات بطريقة أكثر أمانًا
    $request->validated();

  $data = [
    'name' => $request->name,
    'email' => $request->email,
    'is_admin' => $request->usertype,
  
];

        User::where(['id' => $id])->update($data);

         return redirect()->route('admin.index')->with('success', 'Modified successfully');
  }

  public function page_wait_accept()
  {
    return view('ProjectView.page_wait_accept');
  }


    public function delete($id)
    {
        User::destroy($id);
        return redirect()->route('admin.index')->with('success', 'Deleted successfully');

    }


    public function active($id)
    { 
       
        $data = User::find($id);

        if (!$data) {
            return redirect()->route('admin.index')->with('error', 'It was not found on the user');
        }


    
     if(  $data->is_active=='0' ) {
        $data->is_active = '1';
        $data->save();
        return redirect()->route('admin.index')->with('success', 'Activation completed successfully');
     }  

    else if($data->is_active=='1' ){
        $data->is_active = '0';
        $data->save();
        return redirect()->route('admin.index')->with('success', 'Disabled successfully');
     }
       

    }

    public function show_active_accounts()
    {
        $data=User::select('*')->where('is_active',1)->where('is_admin',0)->latest()->paginate(5);

        if($data->count()>0)
        {
            return view('ProjectView.show_active_or_disable_accounts',['data'=>$data,'type_accounts'=>'active']);
        }

        else{
            return view( 'ProjectView.no_data_found',['data'=>'There are no active accounts']);
        }
    }
   
    
    public function  show_disable_accounts()
    {
        $data=User::select('*')->where('is_active',0)->where('is_admin',0)->latest()->get();

        if($data->count()>0)
        {
            return view('ProjectView.show_active_or_disable_accounts',['data'=>$data,'type_accounts'=>'disable']);
        }

        else{
            return view('ProjectView.no_data_found',['data'=>'There are no suspended accounts']);

        }
    }

    public function show_admins()
    {
        $data=User::select('*')->where('is_admin',1)->latest()->paginate(5);
        if($data->count()>0)
        {
            return view('ProjectView.show_admins',['data'=>$data]);

        }

        else{
            return view('ProjectView.no_data_found');
        }
    }

    public function disable_all()
    {
        User::where('is_active', 1)->where('is_admin',0)->update(['is_active' => 0]);
    
        return redirect()->route('admin.index')->with('success', 'All accounts have been successfully disabled');
    }

    public function active_all()
    {
        User::where('is_active', 0)->where('is_admin',0)->update(['is_active' => 1]);
    
        return redirect()->route('admin.index')->with('success', 'All accounts have been activated successfully');
    }
    
}
