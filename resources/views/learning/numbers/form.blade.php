<h1>form</h1>

<form action="{{ route('numbers.storeNumbers') }}" method="post">
@csrf
    <div>
        <label for="number">Number</label>
        <input type="text" name="number" id="number" value="{{ old('number') }}"/>
    </div>

    <div>
        <button type="submit">Submit</button>
    </div>
</form>
