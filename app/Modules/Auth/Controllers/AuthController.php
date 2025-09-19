<?php

namespace App\Modules\Auth\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Empleados\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller {

   //Login de Usuarios-Empleados
    public function login(Request $request){

        // Validar el login
        $request->validate([
            'usuario_empleado' => 'required',
            'password' => 'required'
        ]);

        //Crear Las Apitokens que se relacionaran con el usuario
        //$user = User::with('roles')->where('email', $request->email)->first();
       /*  $user = User::where('email', $request->email)->first();

        //Validar que el usuario exista y que la contraseña sea correcta
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        } */

        if (!Auth::attempt($request->only('usuario_empleado', 'password'))) {
            return response()->json([
               'status' => false,
               'message' => 'Credenciales Inválidas'
            ], 401);
        }

        $usuario = User::where('usuario_empleado', $request->usuario_empleado)->first();

        //si todo esta bien se crea el token relacionado al usuario
        $token = $usuario->createToken($request->usuario_empleado)->plainTextToken;
        //$token = $usuario->createToken('ACCESS_TOKEN')->plainTextToken;

        return response()->json([
            'status'=> true,
            'message' => 'Autenticación exitosa',
            'user' => $usuario,
            'token' => $token,
        ],200);
    }


   //Logout
   public function logout(Request $request){
   // Eliminando token que fue usado para hacer autenticarse
   $request->user()->currentAccessToken()->delete();

   return response()->json([
      'res'=> true,
      'message'=> 'Sesión cerrada'
   ],200);
   }
}