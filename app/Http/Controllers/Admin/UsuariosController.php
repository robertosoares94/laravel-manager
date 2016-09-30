<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsuariosRequest;
use App\Role;
use App\Usuario;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use upload;
use Illuminate\Support\Facades\Input;

class UsuariosController extends Controller
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
        $usuarios = Usuario::orderby('nome')->paginate(10);
        return view('admin::usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        $roles = Role::orderby('name')->get();
        return view('admin::usuarios.create',compact('roles'));
    }

    public function store(UsuariosRequest $request)
    {
        try {
            $store = new Usuario();
            $store->nome = Input::get('nome');
            $store->email = Input::get('email');
            $store->password = bcrypt(Input::get('password'));

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
                        $store->foto = $handle->file_dst_name ;
                        $handle->clean();
                    } else {
                        return Redirect::back()->withInput()->withErrors($handle->error);
                    }
                }
            }
            if (!$store->save()) {
                $message = 'Erro ao cadastrar usuário. Tente novamente.';
                return Redirect::route('admin.usuarios.add')->withErrors($message);
            }
            foreach ($request->input('roles') as $key => $value) {
                $store->attachRole($value);
            }
            $message = 'Usuário cadastrado com sucesso';
            return Redirect::route('admin.usuarios')->withMessage($message);
        } catch (ValidatorException $e) {
            return Redirect::back()->withInput()->withErrors($e->getMessageBag());
        }
    }

    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        $roles = Role::orderby('name')->get();
        $userRole = $usuario->roles->lists('id','id')->toArray();
        return view('admin::usuarios.edit', compact('usuario','roles','userRole'));
    }

    /**
     * @param object $request
     * @param $id
     * @return array|mixed
     */
    public function update(UsuariosRequest $request, $id)
    {
        try {
            $usuario = Usuario::findOrFail($id);
            $usuario->nome = Input::get('nome');
            $usuario->email = Input::get('email');
            if (trim(Input::get('password')) != '') {
                $usuario->password = bcrypt(Input::get('password'));
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
                        $usuario->foto = $handle->file_dst_name ;
                        $handle->clean();
                    } else {
                        return Redirect::back()->withInput()->withErrors($handle->error);
                    }
                }
            }
            if(!$usuario->update()) {
                $message = 'Erro ao atualizar informações do usuário. Tente novamente.';
                return Redirect::route('admin.usuarios')->withErrors($message);
            }
            DB::table('role_usuario')->where('usuario_id',$id)->delete();
            foreach ($request->input('roles') as $key => $value) {
                $usuario->attachRole($value);
            }
            $message = 'Informações do usuário atualizadas com sucesso.';
            return Redirect::route('admin.usuarios')->withMessage($message);
        } catch (ValidatorException $e) {
            return Redirect::back()->withInput()->withErrors($e->getMessageBag());
        }
    }

    public function destroy($id)
    {
        try{
            $usuario = Usuario::findOrFail($id);
            if(!empty($usuario->foto)) {
                if (file_exists(public_path() . '/media/usuarios/' . $usuario->foto)) {
                    unlink(public_path() . '/media/usuarios/' . $usuario->foto);
                }
            }
            $usuario->delete();
            $message = 'Usuario deletado com sucesso.';
            return Redirect::route('admin.usuarios')->withMessage($message);
        }catch (Exception $e){
            return Redirect::back()->withErrors($e->getMessageBag());
        }
    }


}