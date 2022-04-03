<!DOCTYPE html>
<html>
<head>

</head>
<body>

<h2>AM Medical</h2>

<table style="font-family: arial, sans-serif;border-collapse: collapse;width: 100%;">
    <tr>
        <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">{{$about}}</th>
        <td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">{{($about == 'service')? $service: $device}}</td>
    </tr>
    <tr style="background-color: #dddddd;">
        <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Name</th>
        <td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">{{$first_name}} {{$last_name}}</td>
    </tr>
    <tr>
        <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Position</th>
        <td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">{{$position_title}}</td>
    </tr>
    <tr style="background-color: #dddddd;">
        <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Company</th>
        <td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">{{$company}}</td>
    </tr>
    <tr>
        <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Email</th>
        <td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">{{$email}}</td>
    </tr>
    <tr style="background-color: #dddddd;">
        <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Phone</th>
        <td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">{{$phone}}</td>
    </tr>
    <tr>
        <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Message</th>
        <td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">{{$mail_message}}</td>
    </tr>
</table>

</body>
</html>

