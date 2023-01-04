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
                <p><b>Student Monthly Fee</b></p>
			</td>
		</tr>

	</table>

    @php

        $registrationfee = App\Models\FeeCategroyAmount::where('fee_category_id','2')->where('class_id',$details->class_id)->first();

        $originalfee = $registrationfee->amount;
        $discount = $details['discount']['discount'];
        $discounttablefee = $discount/100*$originalfee;
        $finalfee = (float)$originalfee-(float)$discounttablefee;

    @endphp
	
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
		<td>Roll No</td>
		<td>{{$details->roll}}</td>
	</tr>

	<tr>
		<td>3</td>
		<td>Student Name</td>
		<td>{{$details['student']['name']}}</td>
	</tr>

	<tr>
		<td>4</td>
		<td>Father Name</td>
		<td>{{$details['student']['fname']}}</td>
	</tr>

	<tr>
		<td>5</td>
		<td>Session</td>
		<td>{{$details['student_year']['name']}}</td>
	</tr>

	<tr>
		<td>6</td>
		<td>Class</td>
		<td>{{$details['student_class']['name']}}</td>
	</tr>

	<tr>
		<td>7</td>
		<td>Monthly Fee</td>
		<td>{{$originalfee}} $</td>
	</tr>

	<tr>
		<td>8</td>
		<td>Discount Fee</td>
		<td>{{$discount}} %</td>
	</tr>

	<tr>
		<td>9</td>
		<td><b></b>Fee for this Student of {{$month}}</b></td>
		<td>{{$finalfee}} $</td>
	</tr>
	
	
	</table>
    <br>

	<i style="font-size:10px;float: right;">Print Date: {{date("d M Y")}}</i>
<br><br>
    <hr style="border:dashed 2px;width:95%;color:rgb(22, 21, 21);margin-bottom:50px;">
<br>
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
            <td>Roll No</td>
            <td>{{$details->roll}}</td>
        </tr>
    
        <tr>
            <td>3</td>
            <td>Student Name</td>
            <td>{{$details['student']['name']}}</td>
        </tr>
    
        <tr>
            <td>4</td>
            <td>Father Name</td>
            <td>{{$details['student']['fname']}}</td>
        </tr>
    
        <tr>
            <td>5</td>
            <td>Session</td>
            <td>{{$details['student_year']['name']}}</td>
        </tr>
    
        <tr>
            <td>6</td>
            <td>Class</td>
            <td>{{$details['student_class']['name']}}</td>
        </tr>
    
        <tr>
            <td>7</td>
            <td>Registration Fee</td>
            <td>{{$originalfee}} $</td>
        </tr>
    
        <tr>
            <td>8</td>
            <td>Discount Fee</td>
            <td>{{$discount}} %</td>
        </tr>
    
        <tr>
            <td>9</td>
            <td>Fee for this Student of {{$month}}</td>
            <td>{{$finalfee}} $</td>
        </tr>
        
        
        </table>

</body>
</html>


