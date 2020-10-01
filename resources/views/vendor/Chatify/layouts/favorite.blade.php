
 @php
 \Carbon\Carbon::setLocale('vi');
@endphp
<div class="favorite-list-item">
    {{-- {{dd($user->info->info_lastname)}} --}}
    <div data-id="{{ $user->id }}" data-action="0" class="avatar av-m"
        style="background-image: url('{{ asset('public/storage/'.config('chatify.user_avatar.folder').'/'.$user->avatar) }}');">
    </div>
    @if($user->info)
    @php
    $ten = $user->info->info_name.' '. $user->info->info_lastname
    @endphp
    <p>{{ strlen($ten) > 8 ? substr($ten,0,8).'..' : $ten }}</p>
    @else
    <p>{{ strlen($user->username) > 5 ? substr($user->username,0,6).'..' : $user->username }}</p>
    @endif
</div>
