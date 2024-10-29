<x-master title="form">
    <form action="{{route('form')}}" method="POST">
        @csrf
        <h3>Request/Response</h3>
        <input type="date" class="text" name="input_txt"/>
        <input type="submit" class="btn btn-primary" value="Submit"/>
    </form>
</x-master>