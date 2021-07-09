@if ($message = Session::get('success'))
<div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
  <p class="font-bold">Perfecto</p>
  <p class="text-sm">{{$message}}</p>
</div>
@endif

@if ($message = Session::get('error'))
<div role="alert">
  <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
    Error
  </div>
  <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
    <p>{{$message}}</p>
  </div>
</div>
@endif