
<form action="{{ route('search.job')}}" class="searchbar opacity-100" method= "POST">
    @csrf
    <div class="">
        <div class="m-5 md:flex justify-center items-center">
            <div class="md:w-1/3 relative">
                <input class='position border border-gray-400 w-full rounded h-12 pl-3 pr-10' type='text' placeholder="Search your job" name='Title_offer' data-target="position">
                <div class="text-gray-400 text-[20px] absolute right-3 bottom-2"  data-target="position"><i class="fa-solid fa-xmark erasePosition"></i></div>
            </div>
            <div class="md:w-1/3 relative">
                <input class='localization border border-gray-400 w-full rounded h-12 pl-3 pr-10' type='text' placeholder="City, departement or region" name="location" data-target="localization">
                <div class="text-gray-400 text-[20px] absolute right-3 bottom-2 "><i class="fa-solid fa-xmark eraseLocalization"></i></div>
            </div>
            <div class="m-2">
                <input class='my-4 w-full md:flex bg-blue-950 p-2 rounded text-white h-12 ' type="submit"  value=Search>
            </div>
        </div>
    </div>
</form>

@push('scripts')
    <script src="{{ asset('javascript/search.js')}}"></script>
@endpush

