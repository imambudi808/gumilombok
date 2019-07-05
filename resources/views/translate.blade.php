
<form action="" method="post" >
    @csrf

       <select name="to" id="to">
            <option value="en">english</option>
            <option value="id">indo</option>
            <option value="ar">arab</option>
        </select>

    <textarea name="translate" id="translate" cols="30" rows="10">{{isset($original) ? $original:old('translate')}}</textarea>
<button type="submit" >terjemahkan</button>
</form>
<br>
<h1>Hasil :</h1>
@isset($res)
    {{ $res[0]->translations[0]->text }}
@endisset

{{-- <form action="" method="post" >
        @csrf
    <input type="text" name="translate2">
    <button type="submit" >terjemahkan</button>
    </form>
    <br>
    <h1>Hasil :</h1>
    @isset($res2)
        {{ $res2 }}
    @endisset --}}