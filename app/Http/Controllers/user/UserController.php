<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Http\Requests\update_user_profile;


class UserController extends Controller
{
    public function HomeUser()
    {
        return view('ProjectView.mainpage');
    }

    public function PageUser()
    {
        $data=Product::select('*')->latest()->paginate(5);
        return view('ProjectView.userpage',['data'=>$data]);
    }

    public function edit_profile($id)
    {
        $data=User::select('*')->find($id);

        return view('ProjectView.edit_profile',['data'=>$data]);
    }

  /*  public function store_profile(update_user_profile $request,$id)
    {
        // يمكنك استخدام الطلب للوصول إلى البيانات بطريقة أكثر أمانًا
    $request->validated();

  $data = [
    'name' => $request->name,
    'email' => $request->email,
  
];

        User::where(['id' => $id])->update($data);

         return redirect()->route('userpage')->with('success', 'تم التعديل بنجاح');
  }*/

  public function store_profile(update_user_profile $request, $id)
{
    $request->validated();

    $data = [
        'name' => $request->name,
        'email' => $request->email,
    ];

    User::where(['id' => $id])->update($data);

    $user = User::find($id);

    // تحديد الصفحة المستهدفة بناءً على نوع المستخدم
    $redirectRoute = $user->is_admin ? 'admin.index' : 'userpage';

    return redirect()->route($redirectRoute)->with('success', 'Modified successfully');
}



}
