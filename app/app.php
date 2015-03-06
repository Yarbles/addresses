<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Contact.php";

    session_start();
    if (empty($_SESSION['list_of_contacts'])) {
        $_SESSION['list_of_contacts'] = array();
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app) {
        return $app['twig']->render('contacts.twig', array('contacts' => Contact::getAll()));

    });

    $app->post("/contacts", function() use ($app) {
        $contact = new Contact($_POST['name'], $_POST['phone'], $_POST['home']);
        $contact->save();
        return $app['twig']->render('create_contact.twig', array('newcontact' => $contact));

    });

    $app->post("/delete_contact", function() use($app) {
        Contact::deleteAll();
        return $app['twig']->render('delete_contact.twig');
    });

    return $app

?>
