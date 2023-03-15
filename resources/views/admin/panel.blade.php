<x-layout>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3 sidebar-sticky">

                    <div class="card mt-5 mb-5">
                        <div class="card-body">
                            <h5 class="card-title">Users</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Total Active Users</h6>
                            <p class="card-text display-4"> 56</p>
                            <a href="#" class="card-link text-decoration-none">View all users</a>

                        </div>
                    </div>
                    {{-- <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                <span></span>
               
              </h6> --}}
                    <div class="card ">
                        <div class="card-body">
                            <h5 class="card-title">Posts</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Total Posts on site</h6>
                            <p class="card-text display-4">12345</p>
                            <a href="#" class="card-link text-decoration-none">View all posts</a>

                        </div>
                    </div>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                        <div class=""></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink">
                        <div class=""></div>
                    </div>
                </div>
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Admin Panel</h1>

                </div>


            </main>
        </div>
    </div>
</x-layout>
