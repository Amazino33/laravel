@props(['user', 'size' => 'w-12 h-12'])

@if ($user->image)
    <img class="{{ $size }} rounded-full object-cover" src="{{$user->imgUrl() }}"
        alt="{{ $user->name }}'s Avatar">
@else
    <img class="{{ $size }} rounded-full object-cover" src="{{ Storage::url('avatars/dummy-avatar.png') }}"
        alt="Dummy Avatar">
@endif