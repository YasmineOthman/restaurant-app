<x-layouts.app>

  <x-auth-card>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <!-- Email Address -->
                <div class="field">

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="{{ __('Email') }}" required autofocus />
                </div>
                <!-- Password -->
                <div class="field">

                    <x-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    placeholder="{{__('Password') }}"
                                    required autocomplete="current-password" />
                </div>


                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                        </a>
                    @endif
                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link">{{__ ('Meal Name')}}</button>
                    </div>
                    <div class="control">
                        <button class="button is-link is-light">{{__('cancel')}}</button>
                </div>
            </form>
          </x-auth-card>
</x-layouts.app>

