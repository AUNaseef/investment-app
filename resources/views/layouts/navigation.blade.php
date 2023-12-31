    <div id="sideBar"
      class="relative flex flex-col flex-wrap bg-white border-r border-gray-300 p-6 flex-none w-64 md:-ml-64 md:fixed md:top-0 md:z-30 md:h-screen md:shadow-xl animated faster">

      <!-- sidebar content -->
      <div class="flex flex-col">

        <!-- sidebar toggle -->
        <div class="text-right hidden md:block mb-4">
          <button id="sideBarHideBtn">
            <i class="fad fa-times-circle"></i>
          </button>
        </div>
        <!-- end sidebar toggle -->

        <!-- link -->
        <a href="/"
          class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
          <i class="fad fa-chart-pie text-xs mr-2"></i>
          dashboard
        </a>
        <!-- end link -->

        <p class="uppercase text-xs text-gray-600 mb-4 mt-4 tracking-wider">Payments</p>

        <!-- link -->
        <a href="/payments"
          class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
          <i class="fad fa-envelope-open-text text-xs mr-2"></i>
          All
        </a>
        <!-- end link -->

          <!-- link -->
          <a href="/payments?due=old"
          class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
          <i class="fad fa-envelope-open-text text-xs mr-2"></i>
          Old Due 
        </a>
        <!-- end link -->

        <!-- link -->
        <a href="/payments?due=today"
          class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
          <i class="fad fa-envelope-open-text text-xs mr-2"></i>
          Due Today
        </a>
        <!-- end link -->

        <!-- link -->
        <a href="/payments?status=unpaid"
          class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
          <i class="fad fa-envelope-open-text text-xs mr-2"></i>
          Unpaid
        </a>
        <!-- end link -->

        <!-- link -->
        <a href="/payments?status=paid"
          class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
          <i class="fad fa-envelope-open-text text-xs mr-2"></i>
          Paid
        </a>
        <!-- end link -->

        <p class="uppercase text-xs text-gray-600 mb-4 mt-4 tracking-wider">Customers</p>

        <!-- link -->
        <a href="/customers"
          class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
          <i class="fad fa-envelope-open-text text-xs mr-2"></i>
          All
        </a>
        <!-- end link -->

        <!-- link -->
        <a href="/customers?status=approved"
          class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
          <i class="fad fa-envelope-open-text text-xs mr-2"></i>
          Approved
        </a>
        <!-- end link -->

        <!-- link -->
        <a href="/customers?status=unapproved"
          class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
          <i class="fad fa-envelope-open-text text-xs mr-2"></i>
          Unapproved
        </a>
        <!-- end link -->
      </div>
      <!-- end sidebar content -->
    </div>
