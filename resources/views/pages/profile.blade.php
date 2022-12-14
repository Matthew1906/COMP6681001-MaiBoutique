@include('partials.header', ['title' => 'My Profile - MaiBoutique'])

    <div
    class="profile-card w-2/5 m-auto mt-16 p-8 border-2 border-gray-400 text-center">
        <h1 class="text-4xl">My Profile</h1>

        <div class="user-label w-fit m-auto bg-gray-400 text-white rounded-lg font-semibold
        mt-8 px-8 py-1">
            @if (auth()->user()->id == 1)
                admin
            @else
                member
            @endif
        </div>

        <div class="user-details">
            <strong>username: {{auth()->user()->username}}</strong>

            <p>{{auth()->user()->email}}</p>
            <p>Address: {{auth()->user()->address}}</p>
            <p>Phone: {{auth()->user()->phone}}</p>
        </div>

        <div
        class="button-container flex justify-center mt-4">
            @if (auth()->user()->id != 1)
                <a href={{route('edit-profile')}}
                class="edit-profile mx-8 py-2 px-8 bg-blue-600 text-white  rounded-lg border-2 border-blue-600
                hover:bg-white hover:text-blue-600 transition">
                    Edit Profile
                </a>
            @endif

            <a href={{route('edit-password')}}
            class="edit-password mx-8 py-2 px-8 rounded-lg border-2 border-blue-600 text-blue-600
            hover:bg-blue-600 hover:text-white
            transition">
                Edit Password
            </a>
        </div>
    </div>

@include('partials.footer')
