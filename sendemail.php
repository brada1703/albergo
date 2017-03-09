<?php

$errors         = array();      // array to hold validation errors
$data           = array();      // array to pass back data

// validate the variables ======================================================
    if (empty($_POST['email']))
        $errors['email'] = 'Email is required.';

    if (empty($_POST['startDate']))
        $errors['startDate'] = 'Start date is required.';

    if (empty($_POST['endDate']))
        $errors['endDate'] = 'End date is required.';

// return a response ===========================================================

    // response if there are errors
    if ( ! empty($errors)) {

        // if there are items in our errors array, return those errors
        $data['success'] = false;
        $data['errors']  = $errors;
    } else {

        // if there are no errors, return a message
        $data['success'] = true;
        $data['message'] = 'Success! This message has been sent successfully. - Questo messaggio è stato inviato con successo.';
    }

    // return all our data to an AJAX call
    echo json_encode($data);

// email a response ===========================================================

    mail("bradleyjamesahrens@gmail.com",
        "Contact message",
        "\r\nHai una richiesta di prenotazione da: " .
        "\r\n\nNome: " . $_POST['name'] .
        "\r\nEmail: " . $_POST['email'] .
        "\r\nPhone: " . $_POST['phone'] .
        "\r\nNumber of Guests: " . $_POST['guests'] .
        "\r\nRoom: " . $_POST['room'] .
        "\r\nCheck-in: " . $_POST['startDate'] .
        "\r\nCheck-out: " . $_POST['endDate'] .
        "\r\nMessage: " . $_POST['message']
        );