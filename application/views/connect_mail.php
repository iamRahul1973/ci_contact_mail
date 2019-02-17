<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Connect</title>
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/toastr.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/overlay-spinner.css">
</head>
<body>

<form action="<?php echo base_url('welcome/contact_mail')?>" method="post" id="connectMail">
    <table border="1">
        <tr>
            <th style="padding: 10px">
                <label for="firstName">First Name : </label>
            </th>
            <td style="padding: 10px">
                <input type="text" name="first_name" id="firstName">
            </td>
        </tr>
        <tr>
            <th style="padding: 10px">
                <label for="lastName">Last Name : </label>
            </th>
            <td style="padding: 10px">
                <input type="text" name="last_name" id="lastName">
            </td>
        </tr>
        <tr>
            <th style="padding: 10px">
                <label for="email">Email Address : </label>
            </th>
            <td style="padding: 10px">
                <input type="email" name="email" id="email">
            </td>
        </tr>
        <tr>
            <th style="padding: 10px">
                <label for="phone">Phone : </label>
            </th>
            <td style="padding: 10px">
                <input type="text" name="phone" id="phone">
            </td>
        </tr>
        <tr>
            <th style="padding: 10px">
                <label for="message">Message : </label>
            </th>
            <td style="padding: 10px">
                <textarea name="message" id="message" cols="30" rows="10"></textarea>
            </td>
        </tr>
        <tr>
            <th style="padding: 10px" colspan="2">
                <input type="submit" name="submit" id="sendMail">
            </th>
        </tr>
    </table>
</form>

<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/toastr.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/connect.js"></script>
</body>
</html>