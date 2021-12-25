@extends('layouts.app')

@section('content')
<div class="py-12">
    <h2 class="text-2xl font-bold text-center">{{ __('Register') }}</h2>
    <div class="mt-8 max-w-xl mx-auto">
      <div class="grid grid-cols-1 gap-6">
        <form method="POST" action="{{ route('register') }}" novalidate>
            @csrf
        <label class="block">
          <span class="text-gray-700">{{ __('Name') }}</span>
          <input
            type="text" name="name"
            class="
              mt-0
              block
              w-full
              px-0.5
              border-0 border-b-2 border-gray-200
              focus:ring-0 focus:border-black
            "
            placeholder="your name" value="{{ old('name') }}"
          />
          @error('name')
          <span class="text-red-300" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
        </label>
        <label class="block mt-2">
          <span class="text-gray-700">{{ __('E-Mail Address') }}</span>
          <input
            type="email" name="email"
            class="
              mt-0
              block
              w-full
              px-0.5
              border-0 border-b-2 border-gray-200
              focus:ring-0 focus:border-black
            "
            placeholder="john@example.com" value="{{ old('email') }}"
          />
          @error('email')
          <span class="text-red-300" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
        </label>
        <label class="block mt-2">
          <span class="text-gray-700">{{ __('Password') }}</span>
          <input
            type="password" name="password"
            class="
              mt-0
              block
              w-full
              px-0.5
              border-0 border-b-2 border-gray-200
              focus:ring-0 focus:border-black
            "
            placeholder="password"
          />
          @error('password')
          <span class="text-red-300" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
        </label>
        <label class="block mt-2">
          <span class="text-gray-700">{{ __('Confirm Password') }}</span>
          <input
            type="password" name="password_confirmation"
            class="
              mt-0
              block
              w-full
              px-0.5
              border-0 border-b-2 border-gray-200
              focus:ring-0 focus:border-black
            "
            placeholder="password"
          />
          @error('password')
          <span class="text-red-300" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
        </label>
        <div class="block mt-2">
          <div class="mt-2">
            <div>
                <button type="submit" class="p-2 rounded-xl cursor-pointer text-white bg-yellow-300 hover:bg-yellow-500">{{ __('Register') }}</button>
            </div>
          </div>
        </div>
    </form>
      </div>
    </div>
  </div>
@endsection
