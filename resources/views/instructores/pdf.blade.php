<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Avanzer</title>
</head>

<body>
                    <h4>Avances</h4>
                      <table>
                        <thead>
                          <tr>
                            <th>Proyecto</th>
                            <th>Nombre Evidencia</th>
                            <th>Avance</th>
                        </thead>
                        <tbody>
                        @foreach ($result[1] as $avances)
						               <tr>
							              <td>{{ $avances->nombreProyecto }}</td>
                            <td>{{ $avances->nombreEvidencia }}</td>
                            <td>{{ $avances->avance }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                      </table>
</body>


