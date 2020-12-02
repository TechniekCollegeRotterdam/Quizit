 <!DOCTYPE html>
<html>
<head>
    <title>Gebruikers_info</title>
</head>
<body>
<h2 style="color: #1f6fb2">Gebruiker</h2
            <table width="14" border="4">
                <thead style="border: #1d2124;color:#1d2124;">
                <tr>
                    <th style="color: #1f6fb2" scope="col">Naam</th>
                    <th style="color: #1f6fb2" scope="col">E-mail</th>
                    <th style="color: #1f6fb2" scope="col">Aangemaakt</th>
                    <th style="color: #1f6fb2" scope="col">Layout</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td scope="row">{{$username}}</td>
                    <td>{{ $email }}</td>
                    <td>{{ $aangemaakt}}</td>
                    <td>{{$design}} </td>
                </tr>
                </tbody>
            </table>


<h2 style="color: #1f6fb2">Games</h2>
            <table width="14" border="4">
                <thead style="border: #1d2124;color:#1d2124;">
                <tr>
                    <th style="color: #1f6fb2" scope="col">Naam</th>
                    <th style="color: #1f6fb2" scope="col">Omschrijving</th>
                    <th style="color: #1f6fb2" scope="col">Quiz Aanmaak datum</th>
                </tr>
                </thead>
                <tbody>
                @foreach($quizzes as $quiz_info)
                    <tr>
                        <td scope="row">{{ $quiz_info->name }}</td>
                        <td>{{ $quiz_info->description }}</td>
                        <td>{{ $quiz_info->created_at }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
</body>
</html>
