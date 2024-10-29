<x-master title="Publications">Publications 
    <div class="container mx-auto w-75">
    <div class="row">
        @foreach($publications as $publication)
        <x-publication :publication="$publication"/>
        @endforeach
    </div>
</div>

</x-master>