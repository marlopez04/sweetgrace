<!DOCTYPE html>
<html>
<body>
        </div>
            <div>
                <!-- status -->
                <div >
                    <div >
                        <table >
                            <thead>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Tipo</th>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                </div>
            </div>
</body>
</html>
