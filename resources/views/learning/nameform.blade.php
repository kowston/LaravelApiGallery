<form action="{{ route('message.store') }}" method="post">
    @csrf

    <div>
        <label for="name">Enter you're name</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}"/>
    </div>

    <div>
        <button type="submit">Submit </button>
    </div>
</form>
