@include('partials.header', [
    'title' => 'Add Product - MaiBoutique',
    'signedIn' => $signedIn,
    'admin' => $admin,
])
@if ($signedIn && $admin)
    <div class='h-auto p-5 mb-auto flex justify-center items-center'>
        <form action="" method="post" enctype="multipart/form-data"
            class='w-10/12 md:w-1/2 border border-gray-200 bg-slate-200 my-3 md:mt-10 md:px-2 py-5 flex flex-col justify-center items-start gap-2'>
            <h1 class='text-xl md:text-2xl font-semibold mb-1 self-center'>
                Add Item
            </h1>
            <div class='flex flex-col mb-1 md:w-full px-3'>
                <label for="image" class='mb-2'>Clothes Image</label>
                <input type="file" name='image'>
            </div>
            <div class='flex flex-col mb-1 md:w-full px-3'>
                <label for="name" class='mb-2'>Clothes Name</label>
                <input type="text" name='name' placeholder='(5-20 letters)' class='px-2 py-1 w-full'>
            </div>
            <div class='flex flex-col mb-1 md:w-full px-3'>
                <label for="desc" class='mb-2'>Clothes Description</label>
                <input type="text" name='desc' placeholder='(min 5 letters)' class='px-2 py-1 w-full'>
            </div>
            <div class='flex flex-col mb-1 md:w-full px-3'>
                <label for="price" class='mb-2'>Clothes Price</label>
                <input type="number" name='price' placeholder="≥ 1000" class='px-2 py-1 w-full'>
            </div>
            <div class='flex flex-col mb-1 md:w-full px-3'>
                <label for="stock" class='mb-2'>Clothes Stock</label>
                <input type="number" name='stock' placeholder='≥ 1' class='px-2 py-1 w-full'>
            </div>
            <div class='px-3'>
                @include('components.button', [
                    'link' => false,
                    'text' => 'Add',
                    'color' => 'fill',
                    'size' => 'sm',
                ])
            </div>
        </form>
    </div>
@endif
@include('partials.footer')
