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
			<td style="text-align:center;"><h2><?php $image_path = '/upload/SP_Solution_Logo.png' ?>
                <img src="{{public_path().$image_path}}" width="150" height="100" alt="">
            </h2></td>
			<td style="line-height:25px;">
				<p>កម្មវិធីគ្រប់គ្រងសាលា</p>
				<p>លេខទំនាក់ទំនង៖ 098 73 73 99</p>
				<p>Email: lsphunterman@gmail.com</p>
                <p><b>Employee Info</b></p>
			</td>
		</tr>

	</table>
	
	<table id="customers">
        <tr>
            <th width="10%">Sl</th>
            <th width="45%">Employee Details</th>
            <th width="45%">Employee Data</th>
        </tr>

        <tr>
            <td>1</td>
            <td>ID No</td>
            <td>{{$details->id_no}}</td>
        </tr>

        <tr>
            <td>2</td>
            <td>Employee Name</td>
            <td>{{$details->name}}</td>
        </tr>

        <tr>
            <td>3</td>
            <td>Gender</td>
            <td>{{$details->gender}}</td>
        </tr>

        <tr>
            <td>4</td>
            <td>Date of Birth</td>
            <td>{{date('d-m-Y',strtotime($details->dob))}}</td>
        </tr>

        <tr>
            <td>5</td>
            <td>Address</td>
            <td>{{$details->address}}</td>
        </tr>

        <tr>
            <td>6</td>
            <td>Designation</td>
            <td>{{$details['designation']['name']}}</td>
        </tr>

        <tr>
            <td>7</td>
            <td>Join Date</td>
            <td>{{ date('d-m-Y',strtotime($details->join_date))}}</td>
        </tr>

        <tr>
            <td>8</td>
            <td>Salary</td>
            <td>{{$details->salary}}</td>
        </tr>
	
	</table>
    <br>
	<i style="font-size:10px;float: right;">Print Date: {{date("d M Y")}}</i>


</body>
</html>


