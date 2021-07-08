@extends('layouts.app')

@section('title', 'Аутентификация')

@section('content')
    <div class="text-center mt-24">
        <div class="flex items-center justify-center">
            <svg fill="none" viewBox="0 0 24 24" class="w-12 h-12 text-blue-500" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
            </svg>
        </div>
        <h2 class="text-4xl tracking-tight">
            Sign in into your account
        </h2>
        <span class="text-sm">or <a href="#" class="text-blue-500">
         register a new account
      </a>
   </span>
    </div>
    <div class="flex justify-center my-2 mx-4 md:mx-0">
        <form class="w-full max-w-xl bg-white rounded-lg shadow-md p-6" action="{{ route('authenticate') }}"
              method="post">
            @csrf
            @if($errors->any())
                <div class="alert flex flex-row items-center bg-red-200 p-5 rounded border-b-2 border-red-300 mb-4">
                    <div class="alert-icon flex items-center bg-red-100 border-2 border-red-500 justify-center h-10 w-10 flex-shrink-0 rounded-full">
                        <span class="text-red-500">
                            <svg fill="currentColor"
                                 viewBox="0 0 20 20"
                                 class="h-6 w-6">
                                <path fill-rule="evenodd"
                                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                      clip-rule="evenodd"></path>
                            </svg>
                        </span>
                    </div>

                        <div class="alert-content ml-4">
                            <div class="alert-title font-semibold text-lg text-red-800">
                                Error
                            </div>
                            @foreach($errors->all() as $error)
                                <div class="alert-description text-sm text-red-600">
                                    {{ $error }}<br>
                                </div>
                            @endforeach
                        </div>
                </div>
            @endif
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-full px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for='Password'>Email
                        address</label>
                    <input name="email"
                           class="appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none"
                           type='email'>
                </div>
                <div class="w-full md:w-full px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for='Password'>Password</label>
                    <input name="password"
                           class="appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none"
                           type='password'>
                </div>
                <div class="w-full md:w-full px-3">
                    <button
                        class="appearance-none block w-full bg-blue-600 text-gray-100 font-bold border border-gray-200 rounded-lg py-3 px-3 leading-tight hover:bg-blue-500 focus:outline-none focus:bg-white focus:border-gray-500">
                        Sign in
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
