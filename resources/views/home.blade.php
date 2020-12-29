@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create post</div>
                <form action="{{ route('posts.store') }}" method="POST">@csrf
                    <div class="card-body">
                    <div class="mb-3">
                        <textarea class="form-control" id="body" rows="3" placeholder="Post something..." name="body"></textarea>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Post</button>
                    </div>
                    <div class="mb-3">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(Session::has('success_message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ Session::get('success_message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                        @endif
                        @if(Session::has('error_message'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            {{ Session::get('error_message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                        @endif
                    </div>
                </div>
                </form>
            </div>
            @if($posts->count() > 0)
                @foreach($posts as $post)
                <div class="card" style="margin-top: 20px;">
                    <div class="card-header"><a href="" class="badge badge-primary">{{ $post->user->name }}</a><span class="badge badge-light">{{ $post->created_at->diffForHumans() }}</span></div>

                    <div class="card-body">
                        <div class="mb-1">
                            {{ $post->body }}
                        </div>
                        <hr>
                       <div>
                            <span class="badge badge-success">Like</span>
                            <span class="badge badge-danger">Dislike</span>
                        </div>
                        <hr>
                        <div class="btn-group" role="group" aria-label="Post button group">
                            <button type="button" class="btn btn-primary">Primary</button>
                            <button type="button" class="btn btn-secondary">Secondary</button>
                            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#commentPost-{{ $post->id }}" aria-expanded="false" aria-controls="commentPost-{{ $post->id }}">
                                Comments
                            </button>
                        </div>
                        {{-- comment --}}
                        <div class="collapse mt-3" id="commentPost-{{ $post->id }}">
                            <div class="card card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                Doesn't any post.
            @endif
        </div>
    </div>
</div>
@endsection
