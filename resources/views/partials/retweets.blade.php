@foreach ($retweets  as $post)
<div class="col-12 col-md-8 py-2" id="myposts">
    <div class="card p-2">
        <p class="fs-6">
            <i class="fab fa-twitter text-primary"></i> Retweeted by {{ $post->user->name }}
        </p>
        <div class="user-imag d-flex align-items-center gap-2">
            <img src="{{ asset('uploads/' . $post->post->post_image) }}" alt="myimage" height="50"
                width="50" class="rounded-pill">
            <div class="user-content p-2">
                <h5>{{ $post->post->poster_name }}</h5>
                <p>{{ $post->post->post_caption }}</p>
                <div class="user-icon d-flex gap-4 justify-content-around align-items-center">
                    <!-- Button trigger modal -->
                    <a type="button" class="text-decoration-none text-dark" data-bs-toggle="modal"
                        data-bs-target="#comment{{ $post->post->id }}">
                        <i class="fa text-primary fa-comment"></i> {{ $post->post->comments->count() }}
                    </a>

                    <!-- Modal -->
                    <div class="modal fade" id="comment{{ $post->id }}" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <form action="{{ route('create_comment', $post->post->id) }}" method="POST"
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
                    <form action="{{ route('retweet_post', $post->post->id) }}" method="post">
                        @csrf
                        <button class="btn btn-transparent" type="submit" name="rtw" >
                            <i class="fas text-primary fa-retweet"> </i> {{ $post->post->retweets->count() }}
                        </button>
                    </form>

                    {{-- like post --}}
                    <form action="{{ route('like_post', $post->post->id) }}" method="post">
                        @csrf
                        <button class="btn btn-transparent border-0" type="submit">
                            <i
                                class="fas fa-heart text-primary
                                @foreach ($post->post->likes as $like)
                                    {{ $like->user_id == Auth::user()->id ? 'text-danger' : '' }} @endforeach
                            "></i>
                            {{ $post->post->likes->count() }}
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
                            data-bs-target="#comment_users{{ $post->post->id }}" aria-expanded="false"
                            aria-controls="flush-collapseOne">
                            Comments
                        </button>
                    </h2>
                    <div id="comment_users{{ $post->post->id }}" class="accordion-collapse collapse"
                        aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        @foreach ($post->post->comments as $comment)
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

@endforeach
