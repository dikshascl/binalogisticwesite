use Twilio\Rest\Client;

<?php
require_once 'vendor/autoload.php'; // Twilio SDK include karein


// Twilio Account Details
$sid = 'your_account_sid'; // Replace with your Twilio Account SID
$token = 'your_auth_token'; // Replace with your Twilio Auth Token
$twilio = new Client($sid, $token);

// Form se data collect karein
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// SMS bhejne ka code
$receiverPhoneNumber = '+91xxxxxxxxxx'; // Replace with the recipient's phone number
$twilioPhoneNumber = '+1xxxxxxxxxx'; // Replace with your Twilio phone number

try {
    $sms = $twilio->messages->create(
        $receiverPhoneNumber, // Receiver's phone number
        [
            'from' => $twilioPhoneNumber, // Twilio phone number
            'body' => "New Inquiry from $name ($email): $message"
        ]
    );
    echo "SMS sent successfully!";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>