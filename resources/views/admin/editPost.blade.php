<x-layout>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3 sidebar-sticky">

                    <div class="card mt-5 mb-5">
                        <div class="card-body">

                            <h5 class="card-title">By {{ $post->user->name }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted"></h6>
                            <img src="{{ asset($post->user->profile_pic ?? asset('images/profile/dummy.jpg')) }}"
                                alt="twbs" width="202" height="202" class="rounded-5 flex-shrink-0">
                            <p class="card-text display-4 mt-5 ">{{ count($post->user->posts) }} Posts</p>


                        </div>
                    </div>



                </div>
                <a href="/admin" class="text-decoration-none">Go back to admin panel</a>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <a href="/admin" class="h2 text-decoration-none">Admin Panel</a>
                </div>

                {{-- Form Begin --}}
                <div class=" rounded-2 mt-3 p-4 mb-2">
                    <form action="/admin/{{ $post->id }}/updatePost" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <!-- Name input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="title">Title</label>
                            <input type="text" id="title" class="form-control" name="title"
                                placeholder="Make your thoughts stand out" value="{{ $post->title }}" />
                            @error('title')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Message input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="body">Your Message</label>
                            <textarea class="form-control" id="body" rows="4" name="body" title="body"
                                placeholder="Speak your mind..."> {{ $post->body }} </textarea>
                            @error('body')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </div>




                        {{-- add images --}}

                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="new_images[]" multiple max="5">
                            @error('images')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="flex justify-end col-1">
                                {{-- image upload  --}}
                                <button type="submit" class="btn btn-primary btn-block mb-4">Update </button>
                            </div>
                    </form>
                    <div class="col-1">
                        <form class="dropdown-item text-center" action="/admin/{{ $post->id }}/deletePost"
                            method="post">
                            @csrf
                            @method('DELETE')


                            <button type="submit"
                                onclick="return confirm('Are you sure you want to delete this item?');"
                                class="btn btn-danger fw-bold w-100 text-decoration-none ">Delete</button>



                        </form>

                    </div>


                </div>
                <!-- Submit button -->
                @if (count($pictures))
                    <h5>Delete Pictures ?</h5>
                @endif
                @foreach ($pictures as $picture)
                    <div class="mb-3 pb-3">

                        <form action="/admin/{{ $post->id }}/deletePostPicture" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <img src="{{ asset($picture->url) }}" alt="Post Image" width="400px">
                                        <input type="hidden" name="delete_picture_{{ $picture->id }}" value="1">
                                        <button type="submit" class="ms-3 btn btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>

                                    </div>
                                    <div class="col d-flex align-items-center">

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="h4 pb-2 mb-4 text-danger border-bottom border-danger">

                    </div>
                @endforeach
        </div>

        {{-- Form Ends --}}
        </main>
    </div>
    </div>

</x-layout>
