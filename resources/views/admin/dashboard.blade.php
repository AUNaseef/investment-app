<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <!-- strat wrapper -->
<div class="h-screen flex flex-row flex-wrap">
  

  <!-- strat content -->
  <div class="bg-gray-100 flex-1 p-6 md:mt-16"> 

    
    <!-- General Report -->
    <div class="grid grid-cols-4 gap-6 xl:grid-cols-1">


    <!-- card -->
    <div class="report-card">
        <div class="card">
            <div class="card-body flex flex-col">
                
                <!-- top -->
                <div class="flex flex-row justify-between items-center">
                    <div class="h6 text-indigo-700 fad fa-shopping-cart"></div>
                    <span class="rounded-full text-white badge bg-teal-400 text-xs">
                        <i class="fal fa-chevron-up ml-1"></i>
                    </span>
                </div>
                <!-- end top -->

                <!-- bottom -->
                <div class="mt-8">
                    <h1 class="h5 num-4"></h1>
                    <p class="text-2xl text-green-500 font-bold">LKR {{$data['total_investments']}}<p>
                    <p>items sales</p>
                </div>                
                <!-- end bottom -->
    
            </div>
        </div>
        <div class="footer bg-white p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
    </div>
    <!-- end card -->


    <!-- card -->
    <div class="report-card">
        <div class="card">
            <div class="card-body flex flex-col">
                
                <!-- top -->
                <div class="flex flex-row justify-between items-center">
                    <div class="h6 text-red-700 fad fa-store"></div>
                    <span class="rounded-full text-white badge bg-red-400 text-xs">
                        <i class="fal fa-chevron-down ml-1"></i>
                    </span>
                </div>
                <!-- end top -->

                <!-- bottom -->
                <div class="mt-8">
                    <h1 class="h5 num-4"></h1>
                    {{-- TODO --}}
                    <p class="text-2xl text-orange-500 font-bold">LKR {{$data['total_due']}}<p>
                    <p>Total Due</p>
                </div>                
                <!-- end bottom -->
    
            </div>
        </div>
        <div class="footer bg-white p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
    </div>
    <!-- end card -->


    <!-- card -->
    <div class="report-card">
        <div class="card">
            <div class="card-body flex flex-col">
                
                <!-- top -->
                <div class="flex flex-row justify-between items-center">
                    <div class="h6 text-yellow-600 fad fa-sitemap"></div>
                    <span class="rounded-full text-white badge bg-teal-400 text-xs">
                        <i class="fal fa-chevron-up ml-1"></i>
                    </span>
                </div>
                <!-- end top -->

                <!-- bottom -->
                <div class="mt-8">
                    <h1 class="h5 num-4"></h1>
                    {{-- TODO --}}
                    <p class="text-2xl text-blue-500 font-bold">{{$data['user_count']}}<p>
                    <p>total Users</p>
                </div>                
                <!-- end bottom -->
    
            </div>
        </div>
        <div class="footer bg-white p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
    </div>
    <!-- end card -->


    <!-- card -->
    <div class="report-card">
        <div class="card">
            <div class="card-body flex flex-col">
                
                <!-- top -->
                <div class="flex flex-row justify-between items-center">
                    <div class="h6 text-green-700 fad fa-users"></div>
                    <span class="rounded-full text-white badge bg-teal-400 text-xs">
                        <i class="fal fa-chevron-up ml-1"></i>
                    </span>
                </div>
                <!-- end top -->

                <!-- bottom -->
                <div class="mt-8">
                    <h1 class="h5 num-4"></h1>
                    {{-- TODO --}}
                    <p class="text-2xl text-red-500 font-bold">{{$data['unapproved_users']}}<p>
                    <p>New Users</p>
                </div>                
                <!-- end bottom -->
    
            </div>
        </div>
        <div class="footer bg-white p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
    </div>
    <!-- end card -->
    

</div>
    <!-- End General Report -->

    <!-- strat Analytics -->
    <div class="mt-6 grid grid-cols-2 gap-6 xl:grid-cols-1">

    <!-- update section -->
    <div class="card bg-teal-400 border-teal-400 shadow-md text-white">
        <div class="card-body flex flex-row">
            
            <!-- image -->
            <div class="img-wrapper w-40 h-40 flex justify-center items-center">
                <img src="./img/happy.svg" alt="img title">
            </div>
            <!-- end image -->

            <!-- info -->
            <div class="py-2 ml-10">
                <h1 class="h6">Welcome, {{Auth::user()->name}}!</h1>
                <p class="text-white text-xs">Hope you are having a great day.</p>
            </div>
            <!-- end info -->

        </div>
    </div>
    <!-- end update section -->

</div>
    <!-- end Analytics -->

    <!-- Sales Overview -->
    <div class="card mt-6">

    <!-- header -->
    <div class="card-header flex flex-row justify-between">
        <h1 class="h6">Sales Overview</h1>

        <div class="flex flex-row justify-center items-center">

            <a href="">
                <i class="fad fa-chevron-double-down mr-6"></i>
            </a>

            <a href="">
                <i class="fad fa-ellipsis-v"></i>
            </a>

        </div>

    </div>
    <!-- end header -->

    <!-- body -->
    <div class="card-body grid grid-cols-2 gap-6 lg:grid-cols-1">

        <div class="p-8">
            <h1 class="h2 text-green-600">LKR {{$data['total_investments_lastweek']}}</h1>
            <p class="text-black font-medium">Investment this week</p>

            <div class="mt-20 mb-2 flex items-center">
                <div class="py-1 px-3 rounded bg-green-200 text-green-900 mr-3">
                    <i class="fa fa-caret-up"></i>
                </div>
                <p class="text-black"><span class="num-2 text-green-400"></span><span class="text-green-400">% more sales</span> in comparison to last month.</p>
            </div>

            <div class="flex items-center">
                <div class="py-1 px-3 rounded bg-red-200 text-red-900 mr-3">
                    <i class="fa fa-caret-down"></i>
                </div>
                <p class="text-black"><span class="num-2 text-red-400"></span><span class="text-red-400">% revenue per sale</span> in comparison to last month.</p>
            </div>

            <a href="/customers" class="btn-shadow mt-6">View Investments</a>

        </div>

        </div>
    
        <div class="">
            <div id="sealsOverview"></div>
        </div>
    
    </div>
    <!-- end body -->

</div>
    <!-- end Sales Overview -->

    <!-- start quick Info -->
    <div class="grid grid-cols-3 gap-6 mt-6 xl:grid-cols-1">

</div>
    <!-- end quick Info -->
        

  </div>
  <!-- end content -->

</div>
<!-- end wrapper -->
</x-app-layout>