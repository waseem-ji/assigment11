

<div class="list-group w-auto" id="adminPosts">
    <div class="p-4 border shadow rounded-3">
        <h3>All Posts</h3>
        @foreach ($posts as $post)
            <li href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3 " aria-current="true">
       
                <div class="d-flex gap-2 w-75 justify-content-between">
                    <div>
                        <p></p>
                        <h6 class="mb-0">{{ $post->title }}</h6>
                        <p class="mb-0 opacity-75">By {{ $post->user['name'] }}</p>
                    </div>
    
                </div>
                <div class="d-flex flex-row-reverse w-25 gap-3 mx-3 align-items-center">
                    <div class="">
                        <a href="#"  class="btn btn-danger" > Delete</a>

                    </div>
                    <div class="">
                        <a href="/admin/{{$post->id}}/editPost" class="btn btn-warning">Edit</a>
                    </div>
                </div>
            </li>
        @endforeach
        <div class="mt-3 mx-2">
    
            {{$posts->links()}}
        </div>
    </div>

</div>







