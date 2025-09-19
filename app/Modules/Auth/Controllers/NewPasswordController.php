<?php

namespace App\Modules\Auth\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Empleados\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class NewPasswordController extends Controller {


   public function resetPassword(Request $request, User $usuario)
      {
      try{
          $request->validate([
              'usuario_empleado' => 'required|exists:empleados_bn,usuario_empleado',
              'password' => 'required',
              'password_confirmation' => 'required',
              'new_password' => 'required'
          ]);
  
          $updatePassword = DB::table('empleados_bn')->where([
               'usuario_empleado' => $request->usuario_empleado
            ])->first();
  
         if(!$updatePassword){
            return response()->json(['message' => 'Token Invalido!',], 500);
         }
  
         $usuario = User::where('usuario_empleado', $request->usuario_empleado)
         ->update(['password' => Hash::make($request->password)]);
 

         return response()->json([
            'usuario' => $usuario,
            'message' => 'Contraseña Actualizada!',
         ], 200);

          //DB::table('password_resets')->where(['email'=> $request->email])->delete();
      } catch (\Exception $e) {
              return response()->json([
              'message' => 'Error al Actualizar Contraseña',
              'error' => $e->getMessage()
          ], 500);
        }
   } 



   /* public function resetPassword(Request $request, $id) {
      try {
         $request->validate([
            'usuario_empleado' => 'required|exists:empleados_bn,usuario_empleado',
            'password' => 'required',
            'new_password' => 'required',
            'password_confirmation' => 'required'
          ]);

         $usuario = User::findOrFail($id);
         $credenciales = User::select('id', 'usuario_empleado', 'password');

         $usuario = $credenciales->usuario_empleado;
         $current_password = $credenciales->password;

         // COMPARANDO LA CONTRASEÑA HASHEADA CON LA CONTRASEÑA INSERTADA
         if (Hash::check($request->password, $current_password)) {
            if ($request->new_password === $request->password_confirmation) {
            $usuario = User::where('usuario_empleado', $request->usuario_empleado)
            ->update(['password' => Hash::make($request->new_password)]);
            }
         } else {
            print_r("NOT MATCHING");   
         }

         return response()->json([
            'status'=> true,
            'usuario' => $usuario,
            'message' => 'Contraseña Actualizada!',
         ], 200);


    } catch (\Exception $e) {
              return response()->json([
              'message' => 'Error al Actualizar Contraseña',
              'error' => $e->getMessage()
          ], 500);
        }
   } */
}