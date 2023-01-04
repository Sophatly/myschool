<!DOCTYPE html>
<html>
<head>
<style>
	body{
		font-family: 'khmerossiemreap'
	}
#customers {
  font-family: 'khmerossiemreap', Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

	<table id="customers">
		<tr>
			<td><h2>SP Solution</h2></td>
			<td>
				<p>កម្មវិធីគ្រប់គ្រងសាលា</p>
				<p>លេខទំនាក់ទំនង៖ 098 73 73 99</p>
				<p>Email: lsphunterman@gmail.com</p>
			</td>
		</tr>

	</table>
	
	<table id="customers">
	<tr>
		<th width="10%">Sl</th>
		<th width="45%">Student Details</th>
		<th width="45%">Student Data</th>
	</tr>

	<tr>
		<td>1</td>
		<td>ID No</td>
		<td>{{$details['student']['id_no']}}</td>
	</tr>

	<tr>
		<td>2</td>
		<td>Student Name</td>
		<td>{{$details['student']['name']}}</td>
	</tr>

	<tr>
		<td>3</td>
		<td>Gender</td>
		<td>{{$details['student']['gender']}}</td>
	</tr>

	<tr>
		<td>4</td>
		<td>Date of Birth</td>
		<td>{{$details['student']['dob']}}</td>
	</tr>
	
	

	<tr>
		<td>5</td>
		<td>Father Name</td>
		<td>{{$details['student']['fname']}}</td>
	</tr>

	<tr>
		<td>6</td>
		<td>Mother Name</td>
		<td>{{$details['student']['mname']}}</td>
	</tr>

	<tr>
		<td>7</td>
		<td>Mobile</td>
		<td>{{$details['student']['mobile']}}</td>
	</tr>
	<tr>
		<td>8</td>
		<td>Address</td>
		<td>{{$details['student']['address']}}</td>
	</tr>
	<tr>
		<td>9</td>
		<td>Class Name</td>
		<td>{{$details['student_class']['name']}}</td>
	</tr>
	<tr>
		<td>10</td>
		<td>Year</td>
		<td>{{$details['student_year']['name']}}</td>
	</tr>
	
	
	</table>

	<i style="font-size:10px;float: right;">Print Date: {{date("d M Y")}}</i>

</body>
</html>


