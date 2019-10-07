<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>



<h1 style="text-align: center;"> Order id:-{{$order['id']}}</h1>

 <table align="center" border="1px" style='font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 75%;text-align: center;'>
<thead>
<tr>
<th>Payment Method</th>
<th>Total amount</th>
<th>Status</th>
</tr>
</thead>
<tbody>
<tr>
<td>{{$order['method']}}</td>
<td>{{$order['total']}}</td>
<td>{{$order['status']}}</td>
</tr>
</tbody>
</table>

</body>
</html>