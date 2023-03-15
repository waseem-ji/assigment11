{{-- @props('posts') --}}

<div class="list-group w-auto" id="adminPosts">
    <div class="p-4 border shadow rounded-3">
        <h3>All Posts</h3>
        @foreach ($posts as $post)
            <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3 " aria-current="true">
                {{-- <img src="https://github.com/twbs.png" alt="twbs" width="32" height="32"
                    class="rounded-circle flex-shrink-0"> --}}
                <div class="d-flex gap-2 w-75 justify-content-between">
                    <div>
                        <p></p>
                        <h6 class="mb-0">{{ $post->title }}</h6>
                        <p class="mb-0 opacity-75">{{ $post->user['name'] }}</p>
                    </div>
    
                </div>
                <button class="btn btn-warning">Editt</button>
                <button class="btn btn-danger"> Delete</button>
            </a>
        @endforeach
        <div class="mt-3 mx-2">
    
            {{$posts->links()}}
        </div>
    </div>

</div>







