@props(['sponsor'])
<a class="relative w-full h-64 rounded-lg overflow-hidden block group" href="https://alex.villas/en/?utm_source=baliexpat" target="_blank">
    <img src="{{ $sponsor->background_url }}" alt="" class="absolute inset-0 w-full h-full object-cover rounded-lg transition duration-300 hover:scale-110">
    <div class="absolute inset-0 w-full h-full bg-opacity-75 bg-coolGray-900 transition duration-300 group-hover:bg-opacity-60"></div>
    <div class="absolute inset-0 flex justify-center items-center p-6">
        <div>
            <img src="{{ $sponsor->logo_url }}" alt="{{ $sponsor->name }}" class="h-16 w-auto mx-auto">
            <div class="mx-auto text-center">
                <p class="text-coolGray-200 mt-6 max-w-sm mx-auto">{{ $sponsor->description }}</p>
            </div>
        </div>
    </div>
</a>
