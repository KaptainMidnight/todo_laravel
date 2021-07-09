@extends('layouts.app')

@section('title', 'Домашняя страница')

@section('content')
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-white">
                        <thead class="bg-gray-50">
                        </thead>
                        <tbody class="bg-indigo-700">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-16 w-16">
                                        <img class="h-16 w-16 rounded-full border"
                                             src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=60"
                                             alt="">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-2xl text-white font-light leading-normal">
                                            Hello,<br>{{ auth()->user()->name }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-white text-6xl font-thin">
                                {{ now()->day }}
                                <div class="text-sm inline-block leading-normal"><strong>{{ now()->dayName }}</strong> <br>{{ now()->monthName }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-left text-sm text-white font-bold leading-normal">
                                <a href="{{ route('logout') }}">Logout</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="container px-3 max-w-md mx-auto">
        <div class="bg-white rounded shadow px-4 py-4">
            <div class="title font-bold text-lg">Todo Application</div>
            <form action="{{ route('task.create') }}" method="post">
                @csrf
                <input type="text" name="name" placeholder="what is your plan for today"
                       class="rounded-sm shadow-sm px-4 py-2 border border-gray-200 w-full mt-4 @if(!empty($errors->all())) border-red-300 @endif">
            </form>
            <ul class="todo-list mt-4">
                @foreach(auth()->user()->task as $task)
                    <li class="flex justify-between items-center mt-3">
                        <form action="{{ route('task.delete', $task->id) }}" method="post">
                            @csrf
                            <div class="flex items-center">
                                <div class="capitalize ml-3 text-sm font-semibold inline-block">{{ $task->name }}</div>
                            </div>
                            <div>
                                <button type="submit">
                                    <svg class=" w-4 h-4 text-gray-600 fill-current" fill="none" stroke-linecap="round"
                                         stroke-linejoin="round" stroke-width="2"
                                         viewBox="0 0 24 24" stroke="currentColor">
                                        <path d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
