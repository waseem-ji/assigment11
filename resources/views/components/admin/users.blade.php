

<div class="list-group w-auto" id="adminUsers">
    <div class="p-4 border shadow rounded-3">
        <h3>All Users</h3>
        @foreach ($users as $user)
            <li href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3 " aria-current="true">
                <img src="{{asset($user->profile_pic ?? asset('images/profile/dummy.jpg'))}}" alt="twbs" width="32" height="32"
                    class="rounded-circle flex-shrink-0">
                <div class="d-flex gap-2 w-75 justify-content-between">
                    <div>
                        <p></p>
                        <h6 class="mb-0">{{ $user->name}}</h6>
                        {{-- <p class="mb-0 opacity-75">{{ count($user->posts) }}</p> --}}
                    </div>
                    
                </div>
                <div class="fs-5 fw-lighter">   {{count($user->posts)}}  Posts</div>

                <a href="/admin/{{$user->id}}/editUser" class="btn btn-warning">Edit</a>
                <a href="" class="btn btn-danger"> Delete</a>
            </li>
        @endforeach
        <div class="mt-3 mx-2">
    
            {{$users->links()}}
        </div>
    </div>

</div>







