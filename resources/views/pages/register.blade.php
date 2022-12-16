@include('partials.header', ['title' => 'Sign Up - MaiBoutique'])
<div class="register flex justify-center my-16">
    <div class="register flex flex-col items-center w-[400px] bg-white rounded-lg p-8">
        <h2 class="text-3xl font-semibold">
            Register
        </h2>
        <form action={{ route('users.store') }} method="POST" class="mt-4 w-full">
            @csrf
            <div class="username mt-2">
                <label for="username">
                    Username
                </label><br>
                <input type="text" name="username" id="username" class="w-full border-2 rounded-md px-2 py-1 mt-2"
                    placeholder="(5-20 letters)" value="{{ old('username') }}">

                @error('username')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="email mt-2">
                <label for="email">
                    Email
                </label><br>
                <input type="text" name="email" id="email" class="w-full border-2 rounded-md px-2 py-1 mt-2"
                    value="{{ old('email') }}">

                @error('email')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="password mt-2">
                <label for="password">
                    Password
                </label><br>
                <input type="password" name="password" id="password" class="w-full border-2 rounded-md px-2 py-1 mt-2"
                    placeholder="(5-20 letters)" value="{{ old('password') }}">
                @error('password')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="phone mt-2">
                <label for="phone">
                    Phone Number
                </label><br>
                <input type="text" name="phone" id="phone" class="w-full border-2 rounded-md px-2 py-1 mt-2"
                    placeholder="(10-13 letters)" value="{{ old('phone') }}">

                @error('phone')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="address mt-2">
                <label for="address">
                    Address
                </label><br>
                <input type="text" name="address" id="address" class="w-full border-2 rounded-md px-2 py-1 mt-2"
                    placeholder="(min 5 letters)" value="{{ old('address') }}">
                @error('address')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <button type="submit"
                class="w-full rounded-md bg-blue-400 hover:bg-blue-600 p-2 mt-6
            text-white text-lg font-bold">
                Submit
            </button>
        </form>

        <div class="sign-in text-sm mt-4">
            Already have an account?
            <a href={{ route('users.login') }} class="underline text-blue-400 hover:text-blue-600">
                Sign In Here
            </a>
        </div>
    </div>
</div>
@include('partials.footer')
