<?php
namespace App\Http\Controllers\Session;

use Auth;
use Request;
use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request as Req;
use Validator;
use Redirect;

class Settings extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function render()
  {
    if (Request::isMethod('post'))
    {
      if (!file_exists(public_path() . '/images/profile_backgrounds/' . request()->get('background'))) {
        return redirect()->back()->withErrors('Selected Background doesnt exist.');
      }
      if (!file_exists(public_path() . '/goldfish/images/me/views/' . request()->get('hotelview'))) {
        return redirect()->back()->withErrors('Selected hotelview doesnt exist.');
      }
        User::where('id', Auth()->User()->id)->update([
          'hotelview' => request()->get('hotelview'),
          'profile_background' => request()->get('background')
        ]);
        return redirect()->back()->withSuccess('Changed!');
    }
    $pbg = \File::allFiles(public_path('images/profile_backgrounds'));
    $hview = \File::allFiles(public_path('goldfish/images/me/views'));
    return view('pages.me.settings.hotel',
    [
      'group' => 'me',
      'pbg' => $pbg,
      'hview' => $hview,
    ]);
  }
  public function admin_credential_rules(array $data)
  {
    $messages = [
    'current-password.required' => 'Please enter current password',
    'password.required' => 'Please enter password',
    ];

    $validator = Validator::make($data, [
    'current-password' => 'required',
    'password' => 'required|same:password',
    'password_confirmation' => 'required|same:password',
    ], $messages);

    return $validator;
  }
  public function account(Req $request)
  {
    if (Request::isMethod('post'))
    {
      $request_data = $request->All();
      $validator = $this->admin_credential_rules($request_data);
      if($validator->fails())
      {
        return Redirect::back()->withErrors($validator->getMessageBag()->toArray());
      }
      else
      {
        $current_password = Auth::User()->password;
        if(Hash::check($request_data['current-password'], $current_password))
        {
          $user_id = Auth::User()->id;
          $obj_user = User::find($user_id);
          $obj_user->password = Hash::make($request_data['password']);;
          $obj_user->save();
          $request->session()->flash('message', "Password changed!");
          return redirect()->back();
        }
        else
        {
          $error = array('current-password' => 'Please enter correct current password');
          return Redirect::back()->withErrors($error);
        }
      }
    }
      return view('pages.me.settings.account',
      [
        'group' => 'me'
      ]);
  }
}
