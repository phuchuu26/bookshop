{{-- -------------------- Saved Messages -------------------- --}}
@php
\Carbon\Carbon::setLocale('vi');
@endphp
@if($get == 'saved')
    <table class="messenger-list-item m-li-divider @if('user_'.Auth::user()->id == $id && $id != "0") m-list-active @endif">
        <tr data-action="0">
            {{-- Avatar side --}}
            <td>
            <div class="avatar av-m" style="background-color: #d9efff; text-align: center;">
                <span class="far fa-bookmark" style="font-size: 22px; color: #68a5ff; margin-top: calc(50% - 10px);"></span>
            </div>
            </td>
            {{-- center side --}}
            <td>
                <p data-id="{{ 'user_'.Auth::user()->id }}">Truyền file<span>Bạn</span></p>
                <span>Lưu tin nhắn bảo mật</span>
            </td>
        </tr>
    </table>
@endif

{{-- -------------------- All users/group list -------------------- --}}
{{-- {{dd($user)}} --}}
@if($get == 'users')
<table class="messenger-list-item @if($user->id == $id && $id != "0") m-list-active @endif" data-contact="{{ $user->id }}">
    <tr data-action="0">
        {{-- Avatar side --}}
        <td style="position: relative">
            @if($user->active_status)
                <span class="activeStatus"></span>
            @endif
        <div class="avatar av-m"
        style="background-image: url('{{ asset('public/storage/'.config('chatify.user_avatar.folder').'/'.$user->avatar) }}');">
        </div>
        </td>
        {{-- center side --}}
        <td>
            @php
                \Carbon\Carbon::setLocale('vi');
            @endphp
            @if($user->info)
            {{-- {{dd($user)}} --}}
        <p data-id="{{ $type.'_'.$user->id }}">
            {{ strlen($user->info->info_lastname.' '.$user->info->info_name	) > 20 ? trim(substr($user->info->info_lastname.' '.$user->info->info_name,0,20)).'..' :$user->info->info_lastname .' '.$user->info->info_name}}
            <span>{{  $lastMessage->created_at->diffForHumans() }}</span></p>
        <span>
            @else
            <p data-id="{{ $type.'_'.$user->id }}">
                {{ strlen($user->username) > 12 ? trim(substr($user->username,0,12)).'..' : $user->username }}
                <span>{{ $lastMessage->created_at->diffForHumans() }}</span></p>
            <span>
                @endif
            {{-- Last Message user indicator --}}
            {!!
                $lastMessage->from_id == Auth::user()->id
                ? '<span class="lastMessageIndicator">Bạn :</span>'
                : ''
            !!}
            {{-- Last message body --}}
            @if($lastMessage->attachment == null)
            {{
                strlen($lastMessage->body) > 30
                ? trim(substr($lastMessage->body, 0, 30)).'..'
                : $lastMessage->body
            }}
            @else
            <span class="fas fa-file"></span> Attachment
            @endif
        </span>
        {{-- New messages counter --}}
            {!! $unseenCounter > 0 ? "<b>".$unseenCounter."</b>" : '' !!}
        </td>

    </tr>
</table>
@endif

{{-- -------------------- Search Item -------------------- --}}
@if($get == 'search_item')
<table class="messenger-list-item" data-contact="{{ $user->id_account }}">
    <tr data-action="0">
        {{-- Avatar side --}}
        <td>
            {{-- {{dd($user->infor2)}} --}}
        <div class="avatar av-m"
        style="background-image: url('{{ asset('public/storage/'.config('chatify.user_avatar.folder').'/'.$user->infor2->avatar) }}');">
        </div>
        </td>
        {{-- center side --}}
        <td>

            {{-- {{dd($user)}} --}}
            {{-- @if($user) --}}
        <p data-id="{{ $type.'_'.$user->id_account }}">
            {{ strlen($user->info_name.' '.$user->info_lastname	) > 20 ? trim(substr($user->info_name.' '.$user->info_lastname,0,20)).'..' : $user->info_name.' '.$user->info_lastname}}
            {{-- <span>{{ $lastMessage->created_at->diffForHumans() }}</span></p> --}}
        <span>
            {{-- @else
            <p data-id="{{ $type.'_'.$user->id_account }}">
                {{ strlen($user->username) > 12 ? trim(substr($user->username,0,12)).'..' : $user->username }} --}}
                {{-- <span>{{ $lastMessage->created_at->diffForHumans() }}</span></p> --}}
            {{-- <span>
                @endif --}}
        {{-- <p data-id="{{ $type.'_'.$user->id }}">
            {{ strlen($user->username) > 12 ? trim(substr($user->username,0,12)).'..' : $user->username }}
        </td> --}}

    </tr>
</table>
@endif

{{-- -------------------- Shared photos Item -------------------- --}}
@if($get == 'sharedPhoto')
<div class="shared-photo chat-image" style="background-image: url('{{ $image }}')"></div>
@endif


