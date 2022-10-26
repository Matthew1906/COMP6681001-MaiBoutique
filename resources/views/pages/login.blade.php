@include('partials.header', ['title' => 'Sign In - MaiBoutique'])

<div class="register flex justify-center mt-16">
    <div class="register flex flex-col items-center w-[300px]">
        <h2 class="text-3xl">
            Sign In
        </h2>

        <form action={{ route('authenticate') }} method="POST" class="mt-8 w-full">
            @csrf
            <div class="email mt-4">
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

            <div class="password mt-4">
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

            <button type="submit"
                class="w-full rounded-md bg-blue-400 hover:bg-blue-600 p-2 mt-8
            text-white text-lg font-bold">
                Sign In
            </button>
        </form>

        <div class="sign-in text-sm">
            Not Registered yet?
            <a href={{ route('create-user') }} class="underline text-blue-400 hover:text-blue-600">
                Register Here
            </a>
        </div>
    </div>
</div>

@include('partials.footer')
