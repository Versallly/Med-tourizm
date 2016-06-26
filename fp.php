<?php


/* Осуществляем проверку вводимых данных и их защиту от враждебных
скриптов */

$first_name = htmlspecialchars($_POST["first_name"]);

$last_name = htmlspecialchars($_POST["last_name"]);

$phone = htmlspecialchars($_POST["phone"]);

$email = htmlspecialchars($_POST["email"]);


$make_model = htmlspecialchars($_POST["make_model"]);

$year = htmlspecialchars($_POST["year"]);

$vin = htmlspecialchars($_POST["vin"]);

$miles = htmlspecialchars($_POST["miles"]);

$engine = htmlspecialchars($_POST["engine"]);

$transmission = htmlspecialchars($_POST["transmission"]);

$drivetrain = htmlspecialchars($_POST["drivetrain"]);

$seats = htmlspecialchars($_POST["seats"]);

$exterior = htmlspecialchars($_POST["exterior"]);

$interior = htmlspecialchars($_POST["interior"]);

$keyless = htmlspecialchars($_POST["keyless"]);

$cruise = htmlspecialchars($_POST["cruise"]);

$navi = htmlspecialchars($_POST["navi"]);

$bt_wireless = htmlspecialchars($_POST["bt_wireless"]);

/*$park_sens = htmlspecialchars($_POST["park_sens"]);*/

if (isset($_POST['park_sens'])) {
    $park_sens = "Yes";
}

$back_cam = htmlspecialchars($_POST["back_cam"]);

$heat_seat = htmlspecialchars($_POST["heat_seat"]);

$roof = htmlspecialchars($_POST["roof"]);

$condition = htmlspecialchars($_POST["condition"]);


$make_model_interest = htmlspecialchars($_POST["make_model_interest"]);




$message =

    "Personal and Contact info: \r\n" .
    "---------------------------------------" ."\r\n" .
    "First Name: " . $first_name . "\r\n" .
    "Last Name: " . $last_name . "\r\n" .
    "Phone #: " . $phone . "\r\n" .
    "Email: " . $email . "\r\n" . "\r\n" .

    "Trade-In car: \r\n" .
    "---------------------------------------" ."\r\n" .
    "Make and model: " . $make_model . "\r\n" .
    "Year: " . $year . "\r\n" .
    "VIN number: " . $vin . "\r\n" .
    "Mileage: " . $miles . "\r\n" .
    "Engine: " . $engine . "\r\n" .
    "Transmission: " . $transmission . "\r\n" .
    "Drivetrain: " . $drivetrain . "\r\n" .

    "Seats material: " . $seats . "\r\n" .
    "Exterior color: " . $exterior . "\r\n" .
    "Interior color: " . $interior . "\r\n" .
    "Keyless entry: " . $keyless . "\r\n" .
    "Cruise control: " . $cruise . "\r\n" .
    "Navigation: " . $navi . "\r\n" .
    "Bluetooth option: " . $bt_wireless . "\r\n" .

    "Parking sensors: " . $park_sens . "\r\n" .
    "Backup camera: " . $back_cam . "\r\n" .
    "Heated seats: " . $heat_seat . "\r\n" .
    "Panorama poof: " . $roof . "\r\n" .
    "Condition: " . $condition . "\r\n" . "\r\n" .


    "Car wants to lease: \r\n" .
    "---------------------------------------" ."\r\n" .
    "Car wants to lease: " . $make_model_interest . "\r\n";



$message = wordwrap($message, 70, "\r\n");


/* Проверяем правильно ли записан e-mail */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
    show_error("<br /> Е-mail address does not exist, check it please!");
}

/* Отправляем сообщение, используя mail() функцию */
$from  = 'From: leasehp@gmail.com' . "\r\n" .
    'Reply-To: leasehp@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
mail('exoticmotorworldhp@gmail.com', $vehicle . " Trade-In " . $first_name . " " . $last_name, $message, $from);
?>
    <p><?php echo $first_name ?></p>
    <p>Your Trade-In information has been transmitted!
        <br>
        Our sales team will contact you soon!</p>
    <p><a href="index.php">Go to the main page >>></a></p>

<?php
/* Если при заполнении формы были допущены ошибки сработает
следующий код: */
function check_input($data, $problem = "")
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    if ($problem && strlen($data) == 0)
    {
        show_error($problem);
    }
    return $data;
}
function show_error($myError)
{
    ?>
    <html>
    <body>
    <p>Please fix this Error or contact our Tech Support (732-781-6661):</p>
    <?php echo $myError; ?>
    </body>
    </html>
    <?php
    exit();
}
?>