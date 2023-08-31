@extends('admin/layout.app')

@section('title')
    Customers
@endsection

@section('sidebar')
    @include('admin/layout/sidebar')
@endsection

@section('header')
    {{-- Header --}}
    <x-admin-header title="Customers"></x-admin-header>
@endsection

@section('footer')
{{-- Footer --}}
    @include('admin/layout/footer')
@endsection

@section('content')
    @php
    if (isset($pagination) && (int)$pagination>1){
        $pagination = $pagination;
    }else{
        $pagination = null;
    }
    if(!isset($search)){
        $search = null;
    }
    @endphp
    {{-- Title --}}
    {{-- Content --}}
    <main>
        <x-admin-search-bar route-name="admin_customers" search={{$search}} placeholder="Find customers" route-search="/customers/search-name"></x-admin-search-bar>
        <table class="w-full mt-4 border-collapse table-auto">
            <thead>
              <tr class="text-left text-white bg-blue_custom">
                <th class="pl-3">Customers</th>
                <th class="hidden sm:table-cell">Status</th>
                <th class="hidden md:table-cell">Locations</th>
                <th>Phone</th>
                <th class="hidden md:table-cell">Create at</th>
                <th class="pr-4 text-end">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr class="bg-white cursor-pointer">
                        <td>
                            <div class="flex items-center gap-2 py-2 pl-3">
                                <img class="hidden object-cover w-12 rounded-full md:block aspect-square" src="https://th.bing.com/th/id/OIP.OYGQMo9Rp4aMkzniqdnk3AHaHa?w=164&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7" alt="avatar_customer">
                                <span class="font-bold">{{$user['fullName']}}</span>
                            </div>
                        </td>
                        <td class="hidden sm:table-cell">
                            <div class="flex items-center gap-2">
                                <span class="w-2 rounded-full aspect-square bg-green_custom"></span>
                                <span>Online</span>
                            </div>
                        </td>
                        <td class="hidden capitalize md:table-cell">{{isset($user['address'])?$user['address']:"No address"}}</td>
                        <td>{{$user['phone']}}</td>
                        <td class="hidden md:table-cell">{{convertDateTime($user['created_at'])}}</td>
                        <td class="py-3 pr-4">
                            <div class="flex flex-col items-end gap-2 justify-evenly sm:items-center sm:justify-end sm:flex-row">
                                <button type="button" onclick="openModalDelete(`{{$user['fullName']}}`,'{{$user['id']}}','{{route('admin_customers_destroy',$user['id'])}}')" class="w-20 text-white rounded sm:w-auto sm:px-2 sm:py-1 bg-red_custom">Delete</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="flex justify-center mt-5">
            <x-pagination pagination={{$pagination}} name-route="admin_customers" count={{$count}} search={{$search}}/>
        </div>
    </main>
    {{-- Notification when has error --}}
    @if(session('ms_error'))
    <x-toast type="error" msg="{{session('ms_error')}}"/>
    @endif

    {{-- Notification when success --}}
    @if(session('msg'))
    <x-toast type="infor" msg="{{session('msg')}}"/>
    @endif
    {{-- Modal delete --}}
     <x-contain-modal-delete/>
@endsection


