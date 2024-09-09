@if(!empty(session('success')))
 <div class="sucees">
 	{{ session('success') }}
 </div>
@endif

@if(!empty(session('error')))
 <div class="sucees">
 	{{ session('error') }}
 </div>
@endif