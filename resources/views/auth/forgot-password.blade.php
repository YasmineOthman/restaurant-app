<x-layouts.auth title="forgot-password">
  <form method="POST" action="{{ route('password.email') }}">
    @csrf

    <!-- Email Address -->
    <div class="control has-icons-left has-icons-right">
      {{-- <label for="email">{{ __('Email') }}</label> --}}

      <input id="email"  class="input" type="email" placeholder="Email" type="email" name="email" :value="old('email')" >
      <span class="icon is-small is-left">
        <i class="fas fa-envelope"></i>
      </span>
      <span class="icon is-small is-right">
        <i class="fas fa-check"></i>
      </span>
    </div>
    {{-- <div class="control">

      <input id="email" class="input is-focused" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus /> --}}
      @error('email')
      {{ $message }}
      @enderror
    </div>
  <br>

    <button class="button is-success" >
        {{ __('Email Password Reset Link') }}
      </button>
    </div>
  </form>
</x-layouts.auth>
