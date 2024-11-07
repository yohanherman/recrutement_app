
<form action="" class="searchbar opacity-100">
    @csrf
    <div class="">
        <div class="m-5 md:flex justify-center items-center">
            <div class="md:w-1/3 relative">
                <input class='border border-gray-400 w-full rounded h-12 p-3' type='text' placeholder="Search your job">
                <div class="text-gray-400 text-[20px] absolute right-3 bottom-2 "><i class="fa-solid fa-xmark"></i></div>
            </div>
            <div class="md:w-1/3 relative">
                <input class='border border-gray-400 w-full rounded h-12 p-3' type='text' placeholder="City, departement or region">
                <div class="text-gray-400 text-[20px] absolute right-3 bottom-2 "><i class="fa-solid fa-xmark"></i></div>
            </div>
            <div>
                <input class='hidden md:flex  bg-blue-950 p-2 rounded text-white h-12 mx-2' type="submit"  value=Search>
            </div>
        </div>
    </div>
</form>

