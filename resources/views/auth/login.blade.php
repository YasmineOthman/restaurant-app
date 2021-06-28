<x-layouts.auth title="{{ __('validation.attributes.Login') }}">
  <form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="field">
      <label class="label" for="email">{{ __('auth.email') }}</label>
      <div class="control">
          <input id="email" type="email" class="input @error('email') is-danger @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
      </div>
      @error('email')
          <p class="help is-danger" role="alert">
            {{-- $message = {{$message }} --}}
              {{__($message)}}
          </p>
      @enderror
    </div>
    <div class="field">
      <label class="label" for="password">{{ __('validation.attributes.password') }}</label>
      <div class="control">
          <input id="password" type="password" class="input @error('password') is-danger @enderror" name="password" required autocomplete="current-password">
      </div>
      @error('password')
          <p class="help is-danger" role="alert">
            {{__($message)}}
          </p>
      @enderror
    </div>
    <div class="field">
      <div class="control">
          <label class="checkbox">
              <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
              {{ __('validation.attributes.Remember Me') }}
          </label>
      </div>
    </div>
    <hr>
    <div class="field is-grouped">
      <div class="control">
          <button type="submit" class="btn is-primary">
            {{ __('validation.attributes.Login') }}
          </button>
      </div>
      @if (Route::has('password.request'))
          <div class="control">
              <a class="button is-text" href="{{ route('password.request') }}">
                  {{ __('validation.attributes.Forgot Your Password?') }}
              </a>
          </div>
      @endif
    </div>
  </form>
</x-layouts.auth>
