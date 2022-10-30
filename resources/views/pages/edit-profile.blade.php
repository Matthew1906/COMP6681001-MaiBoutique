@include('partials.header', ['title' => 'Sign Up - MaiBoutique'])

<div class="update-profile flex justify-center my-16">
    <div class="update-profile w-[400px] bg-white rounded-lg p-8">
        <h2 class="text-3xl text-center">
            Update Profile
        </h2>

        <form action={{ route('update-profile') }} method="POST" class="my-8 w-full">
            @csrf
            @method('PATCH')
            <div class="username mt-4">
                <label for="username">
                    Username
                </label><br>
                <input type="text" name="username" id="username" class="w-full border-2 rounded-md px-2 py-1 mt-2"
                    value={{auth()->user()->username}}>

                @error('username')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="email mt-4">
                <label for="email">
                    Email
                </label><br>
                <input type="text" name="email" id="email" class="w-full border-2 rounded-md px-2 py-1 mt-2"
                    value={{auth()->user()->email}}>

                @error('email')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="phone mt-4">
                <label for="phone">
                    Phone Number
                </label><br>
                <input type="text" name="phone" id="phone" class="w-full border-2 rounded-md px-2 py-1 mt-2"
                    value={{auth()->user()->phone}}>

                @error('phone')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="address mt-4">
                <label for="address">
                    Address
                </label><br>
                <input type="text" name="address" id="address" class="w-full border-2 rounded-md px-2 py-1 mt-2"
                    value={{auth()->user()->address}}>

                @error('address')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <button type="submit"
                class="w-full rounded-md bg-green-600 hover:bg-green-700 p-2 mt-8
                text-white text-lg font-bold">
                Save
            </button>
        </form>

        <a href={{url()->previous()}}
        class="py-2 px-8 rounded-lg border-2 border-red-600 text-red-600
        hover:bg-red-600 hover:text-white">
            Back
        </a>
    </div>
</div>

@include('partials.footer')
