@extends('layouts.app')

@section('content')
    <div class="d-flex">
        @include('partials.chat_navbar')
        <div class="container">
            <h3>HOME</h3>
            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="card p-1 " id="profile_mess">
                        <span>
                            <img src="images/profile.svg" alt="profile" height="50" width="50">
                            <button class="btn btn-outline-light text-info ">Everyone <i
                                    class="fas fa-angle-down"></i></button>
                        </span>

                        <form action="{{ route('post') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="input-group py-2">
                                {{-- TODO: i will remove shadow --}}
                                <textarea class="form-control border-0 shadow-none" row='10' aria-label="With textarea"
                                    placeholder="What's on your mind" name="user_comment"></textarea>
                            </div>
                            <div class="mb-2">
                                <input type="text" class="form-control" name="post_name" id=""
                                    value="{{ Auth::user()->name }}">
                            </div>
                            <div class="ps-4 d-flex align-items-center gap-2">
                                <button class="btn btn-outline-info p-1" style="font-size:60%; border:none;">
                                    <i class="fas fa-globe-americas"></i> Everyone can reply
                                </button>
                                <input type="file" accept="image/*" id="preloadInput" class="form-control d-none"
                                    name="user_image">
                                <div id="preloadDisplay"></div>
                            </div>

                            <div class="d-flex justify-content-center">
                                <hr class="w-75 ">
                            </div>

                            <div class="d-flex justify-content-around py-4" id="icons-chat">

                                <div class="d-flex gap-4 text-info fs-5">
                                    <label for="preloadInput" style="cursor: pointer;">
                                        <i class="fas fa-photo-video"></i>
                                    </label>
                                    <i class="fas fa-poll"></i>
                                    <i class="fas fa-smile"></i>
                                    <i class="fas fa-clipboard-list"></i>
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>

                                <div class="">
                                    <button class="btn btn-info text-light ">Chatlive</button>
                                </div>
                            </div>

                            <div class="m-2">
                                <button class="btn btn-outline-info">
                                    Submit
                                </button>
                            </div>
                        </form>

                    </div>
                </div>

                <div class="col-md-4 d-md-block d-none">
                    <div class="card p-1">
                        <div class="card-header text-center text-info fw-bolder">
                            News Feeds
                        </div>
                        <div class="card-body">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ut officia vel cumque, laboriosam,
                                natus voluptatibus provident possimus illo repellendus accusamus, accusantium expedita?
                                Neque aut ipsam, ut sed sunt totam illo porro in. Reiciendis animi est eligendi, ipsum id
                                quasi, voluptatibus, ad quis velit quos quisquam similique sunt ut numquam? Corrupti facilis
                                numquam nemo eos. Aut exercitationem nam totam iste. Est dolorem autem odit earum sequi
                                praesentium reprehenderit. Quas distinctio dignissimos eligendi, reiciendis officiis nobis
                                molestiae maiores fugiat ex asperiores! Iure repellendus, odit ad ut, impedit possimus
                                beatae rem tempora quia voluptates magni fugiat praesentium repudiandae reprehenderit cum
                                earum excepturi magnam.</p>
                        </div>
                    </div>
                </div>

                {{-- second column --}}

                @forelse ($posts as $post)
                    <div class="col-12 col-md-8 py-2" id="myposts">
                        <div class="card p-2">
                            <div class="user-imag d-flex align-items-center gap-2">
                                <img src="{{ asset('uploads/' . $post->post_image) }}" alt="myimage" height="50"
                                    width="50" class="rounded-pill">
                                <div class="user-content p-2">
                                    <h5>{{ $post->poster_name }}</h5>
                                    <p>{{ $post->post_caption }}</p>
                                    <div class="user-icon d-flex gap-4 justify-content-around align-items-center">
                                        <!-- Button trigger modal -->
                                        <a type="button" class="text-decoration-none text-dark" data-bs-toggle="modal"
                                            data-bs-target="#comment{{ $post->id }}">
                                            <i class="fa text-primary fa-comment"></i> {{ $post->comments->count() }}
                                        </a>

                                        <!-- Modal -->
                                        <div class="modal fade" id="comment{{ $post->id }}" data-bs-backdrop="static"
                                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <form action="{{ route('create_comment', $post->id) }}" method="POST"
                                                    class="modal-content">
                                                    @csrf
                                                    <div class="modal-header">
                                                        {{-- <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1> --}}
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <textarea name="comment" class="form-control"></textarea>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Comment</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        {{-- retweet --}}

                                            <i class="fas text-primary fa-retweet"> </i>

                                        {{-- like post --}}
                                        <form action="{{ route('like_post', $post->id) }}" method="post">
                                            @csrf
                                            <button class="btn btn-transparent border-0" type="submit">
                                                <i
                                                    class="fas fa-heart text-primary
                                                    @foreach ($post->likes as $like)
                                                        {{ $like->user_id == Auth::user()->id ? 'text-danger' : '' }} @endforeach
                                                "></i>
                                                {{ $post->likes->count() }}
                                            </button>
                                        </form>


                                        <i class="fa text-primary fa-street-view">0</i>
                                        <i class="fa text-primary fa-share-square"></i>

                                    </div>
                                </div>

                            </div>



                            <div class="card-body">

                                <div class="accordion accordion-flush" id="accordionFlushExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header border-bottom" id="flush-headingOne">
                                            <button class="accordion-button collapsed " type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#comment_users{{ $post->id }}" aria-expanded="false"
                                                aria-controls="flush-collapseOne">
                                                Comments
                                            </button>
                                        </h2>
                                        <div id="comment_users{{ $post->id }}" class="accordion-collapse collapse"
                                            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                            @foreach ($post->comments as $comment)
                                                <div class="accordion-body">


                                                    <div
                                                        class="d-flex border-bottom justify-content-between align-items-start">
                                                        <p>
                                                            {{ $comment->comment }}
                                                        </p>
                                                        <p>
                                                            {{ date('M. jS, Y h:i a', strtotime($comment->created_at)) }}
                                                        </p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @empty
                @endforelse
                <div class="col-md-4 d-md-block d-none">
                    <div class="card p-1">
                        <div class="card-header text-center text-info fw-bolder">
                            News Feeds
                        </div>
                        <div class="card-body">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto, adipisci?</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
