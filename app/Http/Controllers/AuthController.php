<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function create(): View
    {
        return view('lab5::auth.signin');
    }

    public function registration(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'max:255'],
        ], [
            'name.required' => 'Введите имя.',
            'name.string' => 'Имя должно быть текстом.',
            'name.max' => 'Имя должно содержать не более 255 символов.',
            'email.required' => 'Введите электронную почту.',
            'email.string' => 'Электронная почта должна быть текстом.',
            'email.email' => 'Введите корректный адрес электронной почты.',
            'email.max' => 'Адрес должен содержать не более 255 символов.',
            'password.required' => 'Введите пароль.',
            'password.string' => 'Пароль должен быть текстом.',
            'password.min' => 'Пароль должен содержать не менее 8 символов.',
            'password.max' => 'Пароль должен содержать не более 255 символов.',
        ]);

        return response()->json([
            'name' => $validated['name'],
            'email' => $validated['email'],
        ], 200, [], JSON_UNESCAPED_UNICODE);
    }
}
