<form action="{{ route('authenticate') }}" method="post">
    @csrf
    <label for="nim">NIM</label>
    <input type="text" name="nim" id="nim" value="{{ old('nim') }}" required>
    @error('nim')
        <span>{{ $message }}</span>
    @enderror
    <label for="token">Token</label>
    <input type="text" name="token" id="token" required>
    @error('token')
        <span>{{ $message }}</span>
    @enderror
    <input type="submit" value="Simpan">
</form>

@include('sweetalert::alert')
