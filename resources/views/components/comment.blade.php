<div>
    <div class="my-3">
        <strong>{{$comment->User->name}}</strong> says:
{{--        <span class="inline-block float-right text-xs">{{ \Carbon\Carbon::parse($comment->created_at)->format('j F, Y \a\t g:i A') }}</span>--}}
        <span class="inline-block float-right text-xs">{{ $this->CommentDate($comment->created_at) }}</span>
    </div>
    <div class="my-3">
        {{$comment->content}}
    </div>
    <div class="py-3">
        @auth
            @if($user_id === $comment->user_id)
                <a class="inline-block text-xs align-bottom cursor-pointer"><i>Edit</i></a>
                 .
                <a class="inline-block text-xs align-bottom cursor-pointer"><i>Delete</i></a>
            @else
                <a class="inline-block text-xs align-bottom cursor-pointer"><i>Reply</i></a>
            @endif
        @endauth
    </div>
    @foreach($comment->Comments as $comment)
        <div class="ml-3 pl-3 border-l border-t" wire:key="{{ $loop->index }}">
            <div wire:key="{{ $loop->index }}">
                @include('components.comment')
            </div>
        </div>
    @endforeach
</div>
