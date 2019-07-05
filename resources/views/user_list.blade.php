<table>
    <tr>
        <th>ID</th>
        <th>Avatar</th>
        <th>Email</th>
        <th>Password</th>
    </tr>
    @foreach($users->data as $u)
    <tr>
    
    <td>{{ $u->id }}</td>
    <td><img src="{{ $u->avatar }}" alt=""></td>
    <td>{{ $u->email }}</td>
    </tr>
    @endforeach
</table>