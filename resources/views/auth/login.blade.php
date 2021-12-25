@extends('layouts.app')

@section('content')
<div class="py-12">
    <h2 class="text-2xl font-bold text-center">{{ __('Login') }}</h2>
    <div class="mt-8 max-w-xl mx-auto">
      <div class="grid grid-cols-1 gap-6">
        <form method="POST" action="{{ route('login') }}">
            @csrf
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
        <div class="block mt-2">
          <div class="mt-2">
            <div>
                <label class="inline-flex items-center">
                  <input
                    type="checkbox"
                    class="
                      border-gray-300 border-2
                      text-black
                      focus:border-gray-300 focus:ring-black
                    " {{ old('remember') ? 'checked' : '' }}
                  />
                  <span class="ml-2">{{ __('Remember Me') }}</span>
                </label>
              </div>
            <div>
                <button type="submit" class="p-2 rounded-xl cursor-pointer text-white bg-green-300 hover:bg-green-500 mt-2">{{ __('Login') }}</button>
            </div>
            @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
        @endif
          </div>
        </div>
    </form>
      </div>
    </div>
  </div>
@endsection
