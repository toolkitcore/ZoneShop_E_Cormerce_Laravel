<section>
    <div class="col-12">
        <h5 class="title">{{ __('Update Account Information') }}</h5>
        <form method="post" action="{{ route('account.update') }}">
            @csrf
            @method('put')

            <div class="form-group">
                <label for="name">{{ __('Name') }}</label>
                <input id="name" name="name" type="text" class="form-control"
                    value="{{ old('name', $user->name) }}" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">{{ __('Email Address') }}</label>
                <input id="email" name="email" type="email" class="form-control"
                    value="{{ old('email', $user->email) }}" required>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <input type="submit" class="axil-btn" value="{{ __('Save Changes') }}">
            </div>

            @if (session('status') === 'profile-updated')
                <p class="text-success mt-2">{{ __('Profile information updated successfully!') }}</p>
            @endif
        </form>
    </div>
</section>
