<x-layouts.auth title="{{ __('validation.attributes.register') }}">
  <form method="POST" action="{{ route('register') }}" class="form">
      @csrf

      <div class="field">
          <label class="label" for="email">{{ __('auth.name') }}</label>
          <div class="control">
              <input id="name" type="text" class="input @error('name') is-danger @enderror" name="name"
                  value="{{ old('name') }}" required autocomplete="name" autofocus>
          </div>

          @error('name')
              <p class="help is-danger" role="alert">
                  {{ $message }}
              </p>
          @enderror
      </div>

      <div class="field">
          <label class="label" for="email">{{ __('auth.email') }}</label>
          <div class="control">
              <input id="email" type="email" class="input @error('email') is-danger @enderror" name="email"
                  value="{{ $email ?? old('email') }}" required autocomplete="email">
          </div>
          @error('email')
              <p class="help is-danger" role="alert">
                  {{ $message }}
              </p>
          @enderror
      </div>

      <div class="field">
          <label class="label" for="password">{{ __('validation.attributes.password') }}</label>
          <div class="control">
              <input id="password" type="password" class="input @error('password') is-danger @enderror"
                  name="password" required autocomplete="new-password">
          </div>

          @error('password')
              <p class="help is-danger" role="alert">
                  {{ $message }}
              </p>
          @enderror
      </div>

      <div class="field">
          <label class="label" for="password-confirm">{{ __('validation.attributes.confirm password') }}</label>
          <div class="control">
              <input id="password-confirm" type="password" class="input" name="password_confirmation" required
                  autocomplete="new-password">
          </div>
      </div>

      <hr>

      <div class="field is-form-action-buttons">
          <button type="submit" class="btn is-primary">
            {{ __('validation.attributes.register') }}
          </button>

          <a class="button is-text" href="{{ route('login') }}">
            {{ __('validation.attributes.Login') }}
          </a>
      </div>
  </form>
</x-layouts.auth>
