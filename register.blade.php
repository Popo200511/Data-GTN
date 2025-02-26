@extends('layouts.Tailwind')
@section('title', 'Add Member')

@section('content')

@if (session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 my-4" role="alert">
        {{ session('success') }}
    </div>
@endif

<div class="flex justify-center items-center min-h-screen bg-gray-100 p-4">
    <div class="w-full max-w-2xl bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-xl font-semibold text-gray-700 text-center mb-4">Add Member</h2>

        <form method="POST" action="{{ route('register') }}" id="add-member-form">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium">Name</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required
                    class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium">Email Address</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                    class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-medium">Password</label>
                <input id="password" type="password" name="password" required
                    class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400">
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password-confirm" class="block text-gray-700 font-medium">Confirm Password</label>
                <input id="password-confirm" type="password" name="password_confirmation" required
                    class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400">
            </div>

            <div class="mb-4">
                <label for="status" class="block text-gray-700 font-medium">Status</label>
                <input id="status" type="number" name="status" required min="1" max="4"
                    class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400">
                <p class="text-red-500 text-sm mt-1">
                    - Status 1: สามารถ UPDATE งานได้ทั้งหมด <br>
                    - Status 2: สามารถ UPDATE งาน CR และ SAQ <br>
                    - Status 3: สามารถ UPDATE งาน TSSR และ CIVILWORK
                </p>
            </div>

            <div class="flex justify-between">
                <button type="button" class="bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600"
                    onclick="confirmSubmission()">Add Member</button>
                <a href="/home" class="bg-red-500 text-white py-2 px-4 rounded-md hover:bg-red-600">Home</a>
            </div>
        </form>
    </div>
</div>

<script>
function confirmSubmission() {
    if (confirm("ต้องการเพิ่มสมาชิก ?")) {
        document.getElementById('add-member-form').submit();
    }
}
</script>

@endsection
