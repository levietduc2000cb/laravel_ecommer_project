@extends('admin/layout.app')

@section('title')
    Analystics
@endsection

@section('sidebar')
    @include('admin/layout/sidebar')
@endsection

@section('header')
    {{-- Header --}}
    <x-admin-header title="Analystics"></x-admin-header>
@endsection

@section('footer')
{{-- Footer --}}
    @include('admin/layout/footer')
@endsection

@section('content')

    @php
        $topCustomers = [
        ['name' => 'Nam Hoàng'],
        ['name' => 'Lê Trọng'],
        ['name' => 'Bùi Vũ'],
        ['name' => 'Nam Trang'],
        ['name' => ' Nam'],
        ['name' => ' Nam'],
        ['name' => ' Nam'],
        ['name' => ' Nam'],
        ['name' => ' Nam'],
        ['name' => ' Nam'],
        ['name' => ' Nam'],
    ];

    $topBooks = [
        ['id'=>'1', 'name'=>'Đắc nhân tâm', 'author'=>'Tác giả','price'=>12000,'quantity'=>10000,'created_at'=>'12/12/2022'],
        ['id'=>'1', 'name'=>'Đắc nhân tâm', 'author'=>'Tác giả','price'=>12000,'quantity'=>10000,'created_at'=>'12/12/2022'],
        ['id'=>'1', 'name'=>'Đắc nhân tâm', 'author'=>'Tác giả','price'=>12000,'quantity'=>10000,'created_at'=>'12/12/2022'],
        ['id'=>'1', 'name'=>'Đắc nhân tâm', 'author'=>'Tác giả','price'=>12000,'quantity'=>10000,'created_at'=>'12/12/2022'],
        ['id'=>'1', 'name'=>'Đắc nhân tâm', 'author'=>'Tác giả','price'=>12000,'quantity'=>10000,'created_at'=>'12/12/2022']
    ];

    function topRankStyle($index){
        switch($index){
            case 0: return "text-red_custom font-extrabold";
            case 1: return "text-blue_custom font-bold";
            case 2: return "text-orange_custom font-semibold";
            case 3: return "text-green_custom font-medium";
            default: return;
        }
    };
    @endphp
    {{-- Title --}}
    {{-- Content --}}
    <main>
        <div class="grid grid-cols-1 lg:grid-cols-[3fr,1fr] gap-3 md:gap-6">
            <div class="flex flex-col">
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3">
                    <div class="hidden p-4 rounded-lg bg-light_blue md:block">
                       <div class="flex items-center gap-x-2">
                            <span class="flex items-center justify-center w-10 bg-white rounded-md aspect-square"><i class="fa-solid fa-users"></i></span>
                            <span class="text-base font-bold">Total Customers</span>
                       </div>
                       <div class="mt-2 text-3xl font-bold">1000</div>
                    </div>
                    <div class="p-4 rounded-lg bg-light_yellow">
                        <div class="flex items-center gap-x-2">
                             <span class="flex items-center justify-center w-10 bg-white rounded-md aspect-square"><i class="fa-solid fa-file-invoice"></i></span>
                             <span class="text-base font-bold">Total Orders</span>
                        </div>
                        <div class="mt-2 text-3xl font-bold">1000</div>
                     </div>
                     <div class="p-4 rounded-lg bg-light_purple">
                        <div class="flex items-center gap-x-2">
                             <span class="flex items-center justify-center w-10 bg-white rounded-md aspect-square"><i class="fa-solid fa-money-bill"></i></span>
                             <span class="text-base font-bold">Total Revenue</span>
                        </div>
                        <div class="mt-2 text-3xl font-bold">100.000 đ</div>
                     </div>
                </div>
                <div class="mt-4">
                    <div class="px-3 border border-solid rounded-md border-gray_custom_2">
                        <h2 class="my-4 text-xl font-bold text-center">Line</h2>
                        <canvas id="myChartJS"></canvas>
                    </div>
                </div>
            </div>
            <div class="border border-solid border-gray_custom_2 rounded overflow-y-scroll [&::-webkit-scrollbar]:hidden">
                <h2 class="py-2 text-xl font-bold text-center">Top customers</h2>
                <div class="grid grid-cols-[1fr,2fr] text-center font-semibold">
                    <span>Top</span>
                    <span>Name</span>
                </div>
                <ul class="flex flex-col justify-between">
                    @foreach ($topCustomers as $index=>$customer)
                        <li class="grid grid-cols-[1fr,2fr] text-center py-2 truncate {{topRankStyle($index)}}"><span>{{$index}}</span><span>{{$customer['name']}}</span></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="mt-4 grid grid-cols-1 lg:grid-cols-[3fr,1fr] gap-3 md:gap-6">
            <div class="w-full p-4 border border-solid rounded-md border-gray_custom_2">
                <h2 class="py-2 text-xl font-bold text-left">Top selling book</h2>
                <table class="w-full border-collapse table-auto">
                    <thead>
                      <tr class="text-left">
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th class="hidden md:table-cell">Create at</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($topBooks as $book)
                        <tr class="cursor-default hover:bg-gray_custom_4">
                            <td class="flex items-center gap-4 py-4">
                                <img class="w-12 aspect-[1/1.125]" src="https://th.bing.com/th/id/R.662c1f06b89f20ee2557f43e8080bb55?rik=OipJtw%2fOFBPJ4w&riu=http%3a%2f%2fsach86.com%2fwp-content%2fuploads%2f2020%2f01%2fDac-Nhan-Tam-788x1147.jpg&ehk=Qr72hhsbeXsuaK%2bTe3g71uNvkiRPqc2beZoxd3ib7VM%3d&risl=&pid=ImgRaw&r=0" alt="image_book">
                                <div class="flex-col hidden md:flex">
                                    <span class="text-xs font-bold">#{{$book['id']}}</span>
                                    <span class="font-bold truncate">{{$book['name']}}</span>
                                    <span class="font-light truncate">{{$book['author']}}</span>
                                </div>
                            </td>
                            <td>{{$book['price']}}</td>
                            <td>{{$book['quantity']}}</td>
                            <td class="hidden md:table-cell">{{$book['created_at']}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                  </table>
            </div>
            <div class="w-full">
                <div class="p-4 border border-solid rounded-md border-gray_custom_2">
                    <h2 class="my-4 text-xl font-bold text-center">Doughnut</h2>
                    <canvas id="myDoughnutJS"></canvas>
                </div>
            </div>
        </div>
    </main>
     {{-- Footer --}}
@endsection

@once
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@endpush
@endonce

@once
@push('scripts_low')
    {{-- Scrip create a line chart --}}
    <script>
        //Create line chart;
        //Get 12 months in a year from past to current month
        function getMonths(){
            const currentDate = new Date();
            const months = [];
            for (let i = 0; i < 12; i++) {
            const monthDate = new Date(currentDate.getFullYear(), currentDate.getMonth() - i);
            const monthName = monthDate.toLocaleString('default', { month: 'long' });
            months.unshift(monthName);
            }

            return months;
        }



        const ctx = document.getElementById('myChartJS');
        //Label from January to December
        const labels = getMonths();
        //Data from January to December
        const data = [12, 19, 3, 5, 2, 3,12,4,5,10,30,12]
        //Config to line chart
        const config = {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
            label: 'Turnover',
            data: data,
            borderWidth: 1.5,
            tension: 0.2,
            borderColor: 'blue'
            }]
        },
        options: {
            scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    color: 'black', // Set the text color
                    },
                },
            x: {
                beginAtZero: true,
                ticks: {
                color: 'black', // Set the text color
                    },
                }
            },
            responsive:true
        }
        }
        //Create a new line chart
        new Chart(ctx, config);
    </script>


    {{-- Script create a pie chart --}}
    <script>
        const ctxDoughnut = document.getElementById('myDoughnutJS');
        //Label Books, Customers, Orders
        const labelsDoughnut = ['Books','Customers','Orders'];
        //Data Books, Customers, Orders
        const dataDoughnut = [300, 50, 100];
        //Config to doughnut chart
        const configDoughnut = {
        type: 'doughnut',
        data: {
            labels: labelsDoughnut,
            datasets: [{
            data: dataDoughnut,
            backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)',
            'rgb(255, 205, 86)'
            ],
            hoverOffset: 4,
            }]
        },
        options: {
            responsive:true
        }
        }
        //Create a new line chart
        new Chart(ctxDoughnut, configDoughnut);
    </script>
@endpush
@endonce
