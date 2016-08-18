<?php
$errors = '';
$myemail = 'martinez-manuel@neuf.fr';
if(empty($_POST['name'])  || 
   empty($_POST['tel'])||
   empty($_POST['email']) || 
   empty($_POST['message']))
{
    $errors .= "\n Error: all fields are required";
}
 
$name = $_POST['name']; 
$tel = $_POST['tel'];
$email_address = $_POST['email']; 
$message = $_POST['message']; 
 
if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}if( empty($errors))
 
{
 
$to = $myemail;
 
$email_subject = "Contact de la part de : $name";
 
$email_body = "Vous avez un nouveau message du site AgricOil. ".
 
" Voici les détails:\n Nom: $name \n Tel \n $tel ".
 
"Email: $email_address\n Message \n $message";
 
$headers = "De: $myemail\n";
 
$headers .= "Repondre à: $email_address";
 
mail($to,$email_subject,$email_body,$headers);
 
 
header('Location: contact.php');
 
}
  ?>
