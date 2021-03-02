<!DOCTYPE html>
<html>
<title>Reporte de Pilones</title>
<head>
<style>
table{
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width:100%
}
td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}
tr:nth-child(even){
    background-Color: #dddddd; 
}
</style>
</head>
<body>
<h2 align="center">Reporte de Pilones</h2>
</div>
    <table>
    <tr>
    <th>Numero</th>
    <th>Codigo</th>
    <th>Descripcion</th>
    <th>Fecha</th>
    <th>Ubicacion</th>
    </tr>
    @foreach($Pilones AS $p)
    <tr>
    <td>{{ $p->id}}</td>
    <td>{{ $p->codigo_pilon}}</td>
    <td>{{ $p->descripcion_pilon}}</td>
    <td>{{ $p->Fecha_datos_pilones}}</td>
    <td>{{ $p->ubicacion}}</td>
    </tr>
    @endforeach
    </table>
</body>
</html>