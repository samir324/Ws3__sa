<?php
require "connexion.php";
$row = $_POST['ids'];
$mails = $_POST['emails'];
$sql = "SELECT e.message, e.theDate, e.hours, c.nomcours FROM theevanets e  INNER JOIN cours c ON e.coursID = c.idcours WHERE e.eventID = ". $row ."";
$run = mysqli_query($conn, $sql);
$arr = mysqli_fetch_assoc($run);

require __DIR__ . '/vendor/autoload.php';

//if (php_sapi_name() != 'cli') {
//    throw new Exception('This application must be run on the command line.');
//}
/**
 * Returns an authorized API client.
 * @return Google_Client the authorized client object
 */
function getClient()
{
    $client = new Google_Client();
    $client->setApplicationName('Google Calendar API PHP Quickstart');
    $client->setScopes(Google_Service_Calendar::CALENDAR);
    $client->setAuthConfig(__DIR__ .'/credentials.json');
    $client->setAccessType('offline');
    $client->setPrompt('select_account consent');

    // Load previously authorized token from a file, if it exists.
    // The file token.json stores the user's access and refresh tokens, and is
    // created automatically when the authorization flow completes for the first
    // time.
    $tokenPath = 'token.json';
    if (file_exists($tokenPath)) {
        $accessToken = json_decode(file_get_contents($tokenPath), true);
        $client->setAccessToken($accessToken);
    }

    // If there is no previous token or it's expired.
    if ($client->isAccessTokenExpired()) {
        // Refresh the token if possible, else fetch a new one.
        if ($client->getRefreshToken()) {
            $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
        } else {
            // Request authorization from the user.
            $authUrl = $client->createAuthUrl();
            printf("Open the following link in your browser:\n%s\n", $authUrl);

            print 'Enter verification code: ';
            $authCode = trim(fgets(STDIN));

            // Exchange authorization code for an access token.
            $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
            $client->setAccessToken($accessToken);

            // Check to see if there was an error.
            if (array_key_exists('error', $accessToken)) {
                throw new Exception(join(', ', $accessToken));
            }
        }
        // Save the token to a file.
        if (!file_exists(dirname($tokenPath))) {
            mkdir(dirname($tokenPath), 0700, true);
        }
        file_put_contents($tokenPath, json_encode($client->getAccessToken()));
    }
    return $client;
}
// Get the API client and construct the service object.
$client = getClient();
$service = new Google_Service_Calendar($client);
// Print the next 10 events on the user's calendar.
$calendarId = 'primary';
$optParams = array(
    'maxResults' => 10,
    'orderBy' => 'startTime',
    'singleEvents' => true,
    'timeMin' => date('c'),
);
$results = $service->events->listEvents($calendarId, $optParams);
$events = $results->getItems();
// Refer to the PHP quickstart on how to setup the environment:
// https://developers.google.com/calendar/quickstart/php
// Change the scope to Google_Service_Calendar::CALENDAR and delete any stored
// credentials.
$event = new Google_Service_Calendar_Event(array(
    'summary' => $arr['nomcours'],
    'location' => 'At Home',
    'description' => $arr['message'],
    'start' => array(
        'dateTime' => $arr['theDate'].'T'.$arr['hours'].':00',
        'timeZone' => 'Africa/Casablanca',
    ),
    'end' => array(
        'dateTime' => $arr['theDate'].'T'.$arr['hours'].':00',
        'timeZone' => 'Africa/Casablanca',
    ),
    'recurrence' => array(
        'RRULE:FREQ=DAILY;COUNT=1'
    ),
    'conferenceProperties' => array(
        'allowedConferenceSolutionTypes' => 'eventHangout'
    ),
    'reminders' => array(
        'useDefault' => FALSE,
        'overrides' => array(
            array('method' => 'email', 'minutes' => 24 * 60),
            array('method' => 'popup', 'minutes' => 10),
        ),
    ),
));
$PrepaireArray = [];
foreach($mails as $mail){
    $PrepaireArray[]['email'] = $mail;
}
$event['attendees'] = $PrepaireArray;
$calendarId = 'primary';
$event = $service->events->insert($calendarId, $event);
header('location: Teacher.php');

?>