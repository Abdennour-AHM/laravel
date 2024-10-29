<x-master title="all profiles">
    <div class="row">
        @foreach ($profiles as $profile)
        <x-profile-card :profile='$profile'/>
        @endforeach
    </div>
{{$profiles->links()}}
</x-master>
