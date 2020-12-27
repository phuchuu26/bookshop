
<head>
    <style>
        .modal-dialog.comment {
            padding-top: 107px;
            font-size: 18px;
            min-width: 600px;
             min-height: 783px!important;
        }
        textarea.form-control {
    /* height: 1108px; */
    min-height: 88px;
}
    </style>
</head>


@inject('markdown', 'Parsedown')
@php($markdown->setSafeMode(true))


@if(isset($reply) && $reply === true)
  <div id="comment-{{ $comment->getKey() }}" class="media">
@else
  <li id="comment-{{ $comment->getKey() }}" class="media">
@endif


@if($comment)
    @if($comment->commenter)

        @if($comment->commenter->avatar)
        <img style=" width: 60px; height: 60px;border-radius: 28px;" class="mr-3" src="{{asset('storage/app/public/users-avatar')}}/{{ $comment->commenter->avatar }}" alt="{{ $comment->commenter->name ?? $comment->guest_name }} Avatar">
        @else
        <img style=" width: 60px; height: 60px;border-radius: 28px;" class="mr-3" src="{{asset('storage/app/public/users-avatar')}}/avatar.png" alt="{{ $comment->commenter->name ?? $comment->guest_name }} Avatar">
        @endif
    @else
            <img style=" width: 60px; height: 60px;border-radius: 28px;" class="mr-3" src="{{asset('storage/app/public/users-avatar')}}/avatar.png" alt="{{  $comment->guest_name }} Avatar">

    @endif

@endif
    <div class="media-body">
        @if($comment->commenter)
        <h4 class="mt-0 mb-1">{{ $comment->commenter->info->info_lastname .' ' .$comment->commenter->info->info_name?? $comment->guest_name  }} <small class="text-muted">- {{ $comment->created_at->diffForHumans() }}</small></h4>
        @else
        <h4 class="mt-0 mb-1">{{ $comment->guest_name  }} <small class="text-muted">- {{ $comment->created_at->diffForHumans() }}</small></h4>
        @endif
        <div id="a"  style="    margin-bottom: 10px;white-space: pre-wrap; font-size:16px;">{!! $markdown->line($comment->comment) !!}</div>

        <div>
            @can('reply-to-comment', $comment)
                <button style="     padding: 8px;   background-color: #71d8ff;" data-toggle="modal" data-target="#reply-modal-{{ $comment->getKey() }}" class="btn add-to-cart btn-style-2 color-2">Đáp lại</button>
            @endcan
            @can('edit-comment', $comment)
                <button style="padding: 5px;background-color:#ffeaa7;"  data-toggle="modal" data-target="#comment-modal-{{ $comment->getKey() }}" class="btn add-to-cart btn-style-2 color-2">Chỉnh sửa</button>
            @endcan
            @can('delete-comment', $comment)
                <a style="padding: 5px;background-color: #fe4a5b;" href="{{ route('comments.destroy', $comment->getKey()) }}" onclick="event.preventDefault();document.getElementById('comment-delete-form-{{ $comment->getKey() }}').submit();" class="btn add-to-cart btn-style-2 color-2">
                    Xóa bình luận</a>

                <form id="comment-delete-form-{{ $comment->getKey() }}" action="{{ route('comments.destroy', $comment->getKey()) }}" method="POST" style="display: none;">
                    @method('DELETE')
                    @csrf
                </form>
            @endcan
        </div>

        @can('edit-comment', $comment)
            <div class="modal fade " id="comment-modal-{{ $comment->getKey() }}" tabindex="-1" role="dialog">
                <div class="modal-dialog comment" role="document">
                    <div class="modal-content">
                        <form method="POST" action="{{ route('comments.update', $comment->getKey()) }}">
                            @method('PUT')
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">Chỉnh sửa bình luận</h5>
                                <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="message">Cập nhật bình luận:</label>
                                    <textarea style="font-size: 16px;" required class="form-control" name="message" rows="3">{{ $comment->comment }}</textarea>
                                    <small class="form-text text-muted"><a target="_blank" href="{{route('p.home')}}">Sàn đấu giá trực tuyến</a>.</small>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn add-to-cart btn-style-2 color-2" data-dismiss="modal">Hủy</button>
                                <button type="submit" style="background-color: #00aeef;" class="btn add-to-cart btn-style-2 color-2">Cập nhật</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endcan

        @can('reply-to-comment', $comment)
            <div class="modal fade" id="reply-modal-{{ $comment->getKey() }}" tabindex="-1" role="dialog">
                <div class="modal-dialog comment" role="document">
                    <div class="modal-content">
                        <form method="POST" action="{{ route('comments.reply', $comment->getKey()) }}">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">Trả lời bình luận</h5>
                                <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="message">Nhập bình luận của bạn ở đây:</label>
                                    <textarea style="font-size: 16px;" required class="form-control" name="message" rows="3"></textarea>
                                <small class="form-text text-muted"><a target="_blank" href="{{route('p.home')}}">Sàn đấu giá trực tuyến</a></small>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn add-to-cart btn-style-2 color-2" data-dismiss="modal">Hủy</button>
                                <button type="submit" style="background-color: #71d8ff;" class="btn add-to-cart btn-style-2 color-2">Trả lời</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endcan

        <br />{{-- Margin bottom --}}

        {{-- Recursion for children --}}
        @if($grouped_comments->has($comment->getKey()))
            @foreach($grouped_comments[$comment->getKey()] as $child)
                @include('comments::_comment', [
                    'comment' => $child,
                    'reply' => true,
                    'grouped_comments' => $grouped_comments
                ])
            @endforeach
        @endif

    </div>
@if(isset($reply) && $reply === true)
  </div>
@else
  </li>
@endif
