<section>
    {{-- <div class="col-12"> --}}
    <h5 class="title">{{ __('Update Password') }}</h5>
    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        <div class="form-group">
            <label for="current_password">{{ __('Current Password') }}</label>
            <input id="current_password" name="current_password" type="password" class="form-control"
                autocomplete="current-password" required>
            @error('current_password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">{{ __('New Password') }}</label>
            <input id="password" name="password" type="password" class="form-control" autocomplete="new-password"
                required>
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password_confirmation">{{ __('Confirm New Password') }}</label>
            <input id="password_confirmation" name="password_confirmation" type="password" class="form-control"
                autocomplete="new-password" required>
            @error('password_confirmation')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb--0">
            <input type="submit" class="axil-btn" value="{{ __('Save Changes') }}">
        </div>

        @if (session('status') === 'password-updated')
            <p class="text-success mt-2">{{ __('Password updated successfully!') }}</p>
        @endif
    </form>
    {{-- </div> --}}
</section>
