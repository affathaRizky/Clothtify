<!-- MODAL ADD CATEGORY -->
<div id="{{ $modalToggle }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full bg-gray-900 bg-opacity-50 backdrop-blur-sm">

    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-xl shadow-2xl">

            <!-- Modal header -->
            <div class="flex items-center justify-between p-5 border-b border-gray-200 rounded-t-xl">
                <h3 class="text-xl font-bold text-gray-900">
                    {{ $modalHeader }}
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-100 hover:text-gray-600 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                    data-modal-hide="{{ $modalToggle }}">
                    <i class="fa-solid fa-xmark text-lg"></i>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <!-- Modal body -->
            <div class="p-5">
                {!!  $modalBody !!}
            </div>

            <!-- Modal footer -->
            <div>
                {!! $modalFooter !!}   
            </div>
        </div>
    </div>
</div>