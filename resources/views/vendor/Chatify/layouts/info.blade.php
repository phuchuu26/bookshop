{{-- user info and avatar --}}
<div class="avatar av-l"></div>
{{-- @if() --}}
{{-- <p class="info-name">{{ config('chatify.name') }}</p> --}}
{{-- @else --}}
<p class="info-name">{{ config('chatify.name') }}</p>
{{-- @endif --}}
<div class="messenger-infoView-btns">
    {{-- <a href="#" class="default"><i class="fas fa-camera"></i> default</a> --}}
    <a href="#" class="danger delete-conversation"><i class="fas fa-trash-alt"></i>Xóa cuộc trò chuyện</a>
</div>
{{-- shared photos --}}
<div class="messenger-infoView-shared">
    <p class="messenger-title">Các file đã chia sẻ</p>
    <div class="shared-photos-list"></div>
</div>
