@extends('layouts.Tailwind')
@section('title', 'ค้นหา Refcode')
@section('content')


<h2 class="text-center mt-2 text-lg font-semibold">Search Refcode</h2>
    

<div class="container mt-2">
    <form action="importrefcode" method="POST" enctype="multipart/form-data" id="csvForm"
        class="flex flex-col sm:flex-row items-center gap-4 justify-center">
        @csrf
        <input type="file" class="w-full sm:w-[300px] h-[29px] text-xs border border-gray-500 rounded-md p-1" name="csv_file_add" accept=".csv" required>
        <input type="submit" class="bg-blue-500 text-white text-xs px-4 py-2 rounded-md hover:bg-blue-600 cursor-pointer" name="preview_add" value="แสดงข้อมูล Refcode ที่ต้องการเพิ่ม" data-bs-toggle="modal" data-bs-target="#refcodeModal">
    </form>
</div>


<!-- แสดงข้อความสำเร็จ -->
@if (session('success'))
    <div class="alert alert-success bg-green-100 border border-green-500 text-green-800 px-2 py-2 rounded-md mt-2 w-full sm:w-auto sm:max-w-md mx-auto">
        <strong>สำเร็จ!</strong> {{ session('success') }}
    </div>
@endif

<!-- แสดงข้อความข้อผิดพลาด -->
@if ($errors->has('error'))
    <div class="alert alert-danger bg-red-100 border border-red-500 text-red-800 px-2 py-2 rounded-md mt-2 w-full sm:w-auto sm:max-w-md mx-auto">
        <strong>ข้อผิดพลาด!</strong> {{ $errors->first('error') }}
    </div>
@endif



    @if (!empty($dataToSave) && (is_array($dataToSave) || is_object($dataToSave)))
    <div class="modal fade show d-block" id="refcodeModal" tabindex="-1" role="dialog"
        aria-labelledby="refcodeModalLabel" aria-hidden="true" style="background-color: rgba(0, 0, 0, 0.5);">
        <div class="modal-dialog modal-xl relative w-full sm:w-11/12 md:w-9/12 lg:w-8/12 xl:w-7/12" role="document">
            <div class="modal-content bg-white rounded-lg shadow-lg max-h-[650px]">
                <div class="modal-header flex justify-between items-center p-4 border-b border-gray-200">
                    <h2 class="text-xl font-semibold" id="refcodeModalLabel">ตรวจสอบข้อมูล Refcode</h2>
                    <a href="home" class="btn-close text-gray-600 hover:text-gray-900" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                        </svg>
                    </a>
                </div>
                <div class="modal-body p-4">
                    <div class="overflow-y-auto" style="max-height: 450px;">
                        <table class="table-auto w-full table-fixed border-collapse">
                            <thead class="sticky top-0 bg-white z-10">
                                <tr class="text-xs text-center">
                                    <th class="px-2 py-3 bg-blue-50 text-gray-700">Refcode</th>
                                    <th class="px-2 py-3 bg-blue-50 text-gray-700">Description</th>
                                    <th class="px-2 py-3 bg-blue-50 text-gray-700">Office</th>
                                    <th class="px-2 py-3 bg-blue-50 text-gray-700">Project</th>
                                    <th class="px-2 py-3 bg-blue-50 text-gray-700">Check Refcode</th>
                                </tr>
                            </thead>
                            <tbody class="text-xs text-center bg-white">
                                @foreach ($dataToSave as $row)
                                    <tr class="border-t border-gray-100 hover:bg-red-200">
                                        @foreach ($row as $key => $cell)
                                            <td class="px-2 py-2">{{ $cell }}</td>
                                        @endforeach
                                        <td class="px-2 py-2">
                                            @php
                                                $check = collect($refcode)->contains('refcode', $row['refcode']);
                                            @endphp
                                            @if ($check)
                                                <span class="text-red-500">refcode ซ้ำกัน</span>
                                            @else
                                                <span class="text-green-500">สามารถ Upload refcode ได้</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>                            
                        </table>
                    </div>
                </div>
                <div class="modal-footer flex  items-center p-4 bg-gray-50">
                    <form action="saverefcode" method="POST" class="flex items-center gap-4">
                        @csrf
                        <input type="hidden" name="data_add" value="{{ json_encode($dataToSave) }}">
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">เพิ่มข้อมูล</button>
                    </form>
                    <a href="home" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">ย้อนกลับ</a>
                </div>
            </div>
        </div>
    </div>
    @endif


    <!-- ตาราง -->
<div class="mt-2 overflow-y-auto" style="height: 560px;">
    <table class="table-auto w-full mt-2 border-collapse">
        <thead class="sticky top-0 bg-white shadow-md">
            <tr class="text-xs text-center">
                <th class="bg-blue-950 text-neutral-50 px-2 py-1">
                    <div class="flex flex-col items-center">
                        <span>Refcode</span>
                        <input class="filter-input mt-1 w-[200px] h-[20px] p-2 text-xs border border-sky-300 rounded-md text-gray-950" type="text" data-column="0"placeholder="">
                    </div>
                </th>

                <th class="bg-blue-950 text-neutral-50 px-2 py-1">
                    <div class="flex flex-col items-center">
                        <span>SiteCode</span>
                        <input class="filter-input mt-1 w-[250px] h-[20px] p-2 text-xs border border-sky-300 rounded-md text-gray-950" type="text" data-column="1" placeholder="">
                    </div>
                </th>

                <th class="bg-blue-950 text-neutral-50 px-2 py-1">
                    <div class="flex flex-col items-center">
                        <span>Office</span>
                        <input class="filter-input mt-1 w-[200px] h-[20px] p-2 text-xs border border-sky-300 rounded-md text-gray-950" type="text" data-column="2" placeholder="">
                    </div>
                </th>

                <th class="bg-blue-950 text-neutral-50 px-2 py-1">
                    <div class="flex flex-col items-center">
                        <span>Project</span>
                        <input class="filter-input mt-1 w-[250px] h-[20px] p-2 text-xs border border-sky-300 rounded-md text-gray-950" 
                        type="text" data-column="3" placeholder="">
                 
                    </div>
                </th>
            </tr>
        </thead>

        <tbody class="text-xs text-center bg-white">
            @foreach ($refcode as $item)
                <tr class="hover:bg-red-100 hover:text-red-600">
                    <td>{{ $item->refcode }}</td>
                    <td>{{ $item->sitecode }}</td>
                    <td>{{ $item->office }}</td>
                    <td>{{ $item->project }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        $(".filter-input").on("input", function () {
            var filters = [];

            // ดึงค่าทุกช่องกรองที่มีค่า
            $(".filter-input").each(function () {
                var column = $(this).data("column");
                var value = $(this).val().toLowerCase();
                filters[column] = value; // บันทึกค่าของแต่ละคอลัมน์
            });

            $("tbody tr").each(function () {
                var row = $(this);
                var match = true;

                // ตรวจสอบทุกคอลัมน์
                row.find("td").each(function (index) {
                    if (filters[index]) { // ถ้ามีค่าที่ต้องกรอง
                        var cellText = $(this).text().toLowerCase();
                        if (cellText.indexOf(filters[index]) === -1) {
                            match = false; // ไม่ตรงกับค่ากรอง
                        }
                    }
                });

                // แสดงแถวที่ตรงกับเงื่อนไข
                match ? row.show() : row.hide();
            });
        });
    });
</script>




@endsection