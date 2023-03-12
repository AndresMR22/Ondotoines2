<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\ShoppingCart;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::ADMINS;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
    }

    protected function create(array $data)
    {
      // dd($data);
      $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
      ]);
      
      if(isset($data['foto']))
        {
            $file = $data['foto'];
                     $elemento = Cloudinary::upload($file->getRealPath(),['folder'=>'administradores']);
              $public_id = $elemento->getPublicId();
              $url = $elemento->getSecurePath();
               $user->imagen()->create([
                  'url'=>$url,
                  'public_id'=>$public_id
                  ]);   
        }

      $user->assignRole('Administrador');
    //   $shopping_cart  = ShoppingCart::get_the_session_shopping_cart();
    //   $shopping_cart->update([
    //       "user_id"=>$user->id
    //   ]);
    Alert::toast('Administrador agregado', 'success');
      return $user;
    }
}
