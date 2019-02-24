# CodeIgniter Contact Mail Script


This repo contains the script to send emails from your website using the CodeIgniter framework.  This repo is
intended towards those who doesn't have any grasp in the backend technologies and still want to have a contact mail
feature in their website. So if you are a backend dev, this is certainly not a place for you. Go on your own and
create something awesome. 

This script is aimed to be used in the following scenario : 

1. You have a website with a contact mail form in it.
2. The customers can reach out to you through your contact form.
3. You wanna get notified whenever someone tries to connect with you

## How it works

Before downloading and proceeding with the script just go through and get to know how this actually works. If it is OK 
for you, then go on with it. Let's assume you have a Contact form with First name, Last name, Email Address, Phone 
number and the message field. However you can play around with it and make changes as you like, but here i'm describing 
how i actually defined the DOM and its elements.

1. form 
    * id = connectMail
    * action = [path_to_your_ci_sub_folder]/welcome/contact_mail
    * method = post
2. First name
    * name = first_name
    * id = firstName
3. Last Name
    * name = last_name
    * lastName
4. Email Address
    * name = email
    * id = email
5. Phone
    * name = phone
    * id = phone
6. Message
    * name = message
    * id = message
    
All the fields except last_name is required in the server side by default. Go to application/config/form_validation.php 
to tweak the validation rules.

This script uses SMTP Mails. So go to the welcome controller in the Application/Controllers directory and inside the 
contact mail method, define the SMTP Host, Email address and Password of that account. This script will work in such a 
manner that you will receive notification emails from this email address whenever someone connects with you. You can 
change any of the config items according to your need.

You can customize message if you want.

## Dependencies

This script uses some third-party js libraries for customizing the messages shown to the user and for validating the 
user input. If you want to make any changes to the validation rules, go to assets/js/connect.js where i've defined the 
validation rules according to js-validate library.

If you want to change the id's used in the form, make sure to update the names here too.

Other libraries used, are,
1. Overlay Spinner CSS - For the loader while sending the data in the background to the server.
2. toastr - Message alerts for users once they got the response back
3. jquery
4. jquery.validate - for validating the form on client side

(_Place dependencies on your web folder_)

The example view file is located in the application/views folder