@extends('layouts.Tailwind')
@section('title', 'หน้าแรกของเว็บไซต์')
@section('content')

<div class="relative w-full h-screen flex items-center justify-center bg-cover bg-center" 
    style="background-image: url('https://img.pikbest.com/wp/202347/pastel-green-background-3d-rendering-of-a-winner-s-podium-on-matching_9767186.jpg!bw700');">
    
    <!-- Layer มืดเพื่อให้ข้อความอ่านง่าย -->
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>

    <!-- Content -->
    <div class="relative z-10 text-center">
        <h2 class="text-4xl md:text-6xl font-bold text-white animate-fade-up">
            Welcome To <span class="text-teal-400">GTN</span>
        </h2>

        <!-- ปุ่มเริ่มต้น -->
        <div class="mt-6">
            <a href="/login" class="px-6 py-3 bg-teal-500 text-white text-lg font-semibold rounded-lg shadow-lg 
                hover:bg-teal-600 transition-all duration-300 animate-fade-up delay-300">
                เริ่มต้นใช้งาน
            </a>
        </div>
    </div>
</div>

@endsection
