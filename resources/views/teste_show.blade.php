<form action="{{ url('/result') }}" method="post">
    @csrf

    <input type="url" name="url" />

    <button type="submit">Ok</button>
</form>