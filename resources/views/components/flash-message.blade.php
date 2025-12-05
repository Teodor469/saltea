@if(session('success'))
    <div class="text-green-700 border border-green-400 bg-green-50 dark:bg-green-900 px-3 py-3 rounded m-4">
        {{-- TODO Learn alpine and create a flash message like toasty --}}
        {{ session('success') }}
    </div>
@endif

@if(session('failure') || session('fail'))
    <div class="text-red-700 border border-red-400 bg-red-50 dark:bg-red-900 px-3 py-3 rounded m-4">
        {{ session('fail') }}
    </div>
@endif