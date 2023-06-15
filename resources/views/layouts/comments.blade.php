<div class=" comment mt-3 ">
    <h3>
        Comments & reply
    </h3>
    <div>
        @forelse ($article->comments()->whereNull('parent_id')->latest('id')->get() as $comment)
        <div class=" card mb-3">
            <div class=" card-body">
                <p class=" mb-1">
                    <i class=" bi bi-person-circle me-2"></i>
                    <b>{{ $comment->user->name ?? 'Anonymous' }}</b>
                </p>
                <p class=" mb-1">
                    <i class=" bi bi-chat-square-text-fill me-2"></i>
                    " {{ $comment->content }} "
                </p>
                <span class=" badge bg-dark">
                    {{ $comment->created_at->diffForHumans() }}
                </span>
               @can('delete', $comment)
               <form action="{{ route('comment.destroy',$comment->id) }}" method="post" class=" d-inline-block">
                @csrf
                @method('delete')
                <button class=" badge bg-dark border-0">
                    <i class=" bi bi-trash3-fill"></i>
                </button>
            </form>
            @endcan

            @auth
            
            <span role="button" class=" user-select-none badge bg-dark rp-btn">
                <i class=" bi bi-reply-fill"></i>
                Reply
            </span>


            <form action="{{ route('comment.store') }}" method="post" class=" d-none mt-3">
                @csrf
                <input type="hidden"  name="parent_id" value="{{ $comment->id }}">
                <input type="hidden"  name="article_id" value="{{ $article->id }}">
                <textarea name="content" rows="1" class=" form-control" placeholder="Replying to {{ $comment->user->name }} as {{ Auth::user()->name }}"></textarea>
                <div class=" d-flex justify-content-between align-content-center mt-3">
                    <button class=" btn btn-sm btn-dark">
                        reply
                    </button>
                </div>
            </form>
            @endauth

            @forelse ($comment->replies()->latest('id')->get() as $reply)
            <div class=" card mb-3 mt-3">
                <div class=" card-body">
                    <p class=" mb-1">
                        <i class=" bi bi-reply-fill me-2"></i>
                       " {{ $reply->content }} "
                    </p>
                    <p class=" mb-1">
                        replied from :
                        <b>{{ $reply->user->name ?? 'Anonymous' }}</b>
                    </p>
                    <span class=" badge bg-dark">
                        {{ $reply->created_at->diffForHumans() }}
                    </span>
                   @can('delete', $reply)
                   <form action="{{ route('comment.destroy',$reply->id) }}" method="post" class=" d-inline-block">
                    @csrf
                    @method('delete')
                    <button class=" badge bg-dark border-0">
                        <i class=" bi bi-trash3-fill"></i>
                    </button>
                </form>
                @endcan
                </div>
            </div>
            @empty
                
            @endforelse

            </div>
        </div>

        



        @empty
        <div class=" card mb-3">
            <div class=" card-body">
                <p>
                    No one talk about this yet
                </p>
            </div>
        </div>
        @endforelse
    </div>
    @auth
    <form action="{{ route('comment.store') }}" method="post">
        @csrf
        <input type="hidden"  name="article_id" value="{{ $article->id }}">
        <textarea name="content" rows="2" class=" form-control" placeholder="Say something about this article ....."></textarea>
        <div class=" d-flex justify-content-between align-content-center mt-3">
            <p>Commenting as <b>{{ Auth::user()->name }}</b></p>
            <button class=" btn btn-sm btn-dark">
                send
            </button>
        </div>
    </form>
    @endauth
</div>

@vite(['resources/js/reply.js'])