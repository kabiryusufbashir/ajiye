@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="py-2 px-4 text-center text-lg">
            {{$error}}
			<hr>
        </div>
    @endforeach
@endif

@if(session('success'))
    <div class="text-green-500 py-2 px-4 text-center text-lg">
        <h4>{{session('success')}}</h4>
		<hr>
    </div>
@endif


@if(session('error'))
    <div class="py-2 px-4 text-center text-lg">
        <h4>{{session('error')}}</h4>
		<hr>
    </div>
@endif