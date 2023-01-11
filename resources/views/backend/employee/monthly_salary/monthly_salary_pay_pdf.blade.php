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
			<td style="text-align:center;"><?php $image_path = '/upload/SP_Solution_Logo.png' ?>
                <img src="{{public_path().$image_path}}" width="150" height="100" alt="">
            </td>

			<td>
				<p>កម្មវិធីគ្រប់គ្រងសាលា</p>
				<p>លេខទំនាក់ទំនង៖ 098 73 73 99</p>
				<p>Email: lsphunterman@gmail.com</p>
                <p><b>Employee Monthly Salary</b></p>
			</td>
		</tr>

	</table>

    @php

        $date = date('Y-m',strtotime($details['0']->date));

        if($date!=''){
            $where[]= ['date','like',$date.'%'];
        }

        $totalattend = App\Models\EmployeeAttendance::with(['user'])->where($where)->where('employee_id',$details['0']->employee_id)->get();

        $salary = (float) $details['0']['user']['salary'];
        $salaryperday = (float) $salary / 30;
        $absentcount = count($totalattend->where('attend_status','Absent'));
        $totalsalaryminus = (float) $absentcount * (float) $salaryperday;
        $totalsalary = (float) $salary - (float) $totalsalaryminus;

    @endphp
	
	<table id="customers">
        <tr>
            <th width="10%">Sl</th>
            <th width="45%">Employee Details</th>
            <th width="45%">Employee Data</th>
        </tr>

        <tr>
            <td>1</td>
            <td>Employee Name</td>
            <td>{{$details['0']['user']['name']}}</td>
        </tr>

        <tr>
            <td>2</td>
            <td>Basic Salary</td>
            <td>{{$details['0']['user']['salary']}}</td>
        </tr>

        <tr>
            <td>3</td>
            <td>Total Absent for this month</td>
            <td>{{$absentcount}}</td>
        </tr>

        <tr>
            <td>4</td>
            <td>Month</td>
            <td>{{date('m-Y',strtotime($details['0']->date))}}</td>
        </tr>

        <tr>
            <td>5</td>
            <td>Salary This Month</td>
            <td>{{$totalsalary}}</td>
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
            <th width="45%">Employee Details</th>
            <th width="45%">Employee Data</th>
        </tr>

        <tr>
            <td>1</td>
            <td>Employee Name</td>
            <td>{{$details['0']['user']['name']}}</td>
        </tr>

        <tr>
            <td>2</td>
            <td>Basic Salary</td>
            <td>{{$details['0']['user']['salary']}}</td>
        </tr>

        <tr>
            <td>3</td>
            <td>Total Absent for this month</td>
            <td>{{$absentcount}}</td>
        </tr>

        <tr>
            <td>4</td>
            <td>Month</td>
            <td>{{date('m-Y',strtotime($details['0']->date))}}</td>
        </tr>

        <tr>
            <td>5</td>
            <td>Salary This Month</td>
            <td>{{$totalsalary}}</td>
        </tr>

    </table>

</body>
</html>


