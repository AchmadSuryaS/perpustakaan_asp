@extends('layouts.sidebar')

@section('container')
<form action="/dashboard/user/edituser/edituserpassword/{{ $userId }}" method="POST">
    @csrf
    <div class="mb-5">
        <label class="block mb-2 text-sm font-medium text-primary">Password</label>
        <input type="text" name="password" 
            class="bg-white text-primary text-sm font-semibold rounded-lg block w-full p-2.5" >
    </div>
    <button type="submit"
    class="text-white bg-primary font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center">Submit</button>
</form>
@endsection