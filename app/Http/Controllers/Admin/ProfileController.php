<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use upload;
use Illuminate\Support\Facades\Input;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
    /**
     * @return mixed
     */
    public function index()
    {
        return view('admin::usuarios.profile');
    }
    /**
     * @param object $request
     * @param $id
     * @return array|mixed
     */
    public function update(ProfileRequest $request)
    {
        try {
            $user = Auth::user();
            $user->nome = Input::get('nome');
            $user->email = Input::get('email');

            if (trim(Input::get('password')) != '') {
                $user->password = bcrypt(Input::get('password'));
            }

            if (Input::hasFile('foto') AND $request->file('foto')->isValid()) {
                $handle = new upload($_FILES['foto']);
                if ($handle->uploaded) {
                    $handle->file_overwrite       = false;
                    $handle->image_ratio_fill     = true;
                    $handle->image_ratio_crop     = true;
                    $handle->image_resize         = true;
                    $handle->image_ratio          = true;
                    $handle->image_x              = 100;
                    $handle->image_y              = 100;
                    $handle->process(public_path().'/media/usuarios/');
                    if ($handle->processed) {
                        $user->foto = $handle->file_dst_name ;
                        $handle->clean();
                    } else {
                        return Redirect::back()->withInput()->withErrors($handle->error);
                    }
                }
            }
            if(!$user->save()) {
                $message = 'Erro ao atualizar perfil. Tente novamente.';
                return Redirect::route('admin.profile')->withErrors($message);
            }
            $message = 'Perfil atualizado com sucesso.';
            return Redirect::route('admin.profile')->withMessage($message);
        } catch (ValidatorException $e) {
            return Redirect::back()->withInput()->withErrors($e->getMessageBag());
        }
    }
}