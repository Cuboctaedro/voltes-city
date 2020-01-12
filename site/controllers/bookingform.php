<?php

use Uniform\Form;

return function ($kirby, $pages, $page) {


    if ($page->parent()->programType() == 'children') {
        $bookingform = new Form([
            'tourdate' => [
                'rules' => ['required'],
                'message' => 'Παρακαλώ επιλέξτε ημερομηνία',
            ],
            'first_name' => [
                'rules' => ['required'],
                'message' => 'Παρακαλώ συμπληρώστε το όνομα σας.',
            ],
            'last_name' => [
                'rules' => ['required'],
                'message' => 'Παρακαλώ συμπληρώστε το επίθετο σας.',
            ],
            'address' => [
                'rules' => ['required'],
                'message' => 'Παρακαλώ συμπληρώστε τη διεύθυνση σας.',
            ],
            'city' => [
                'rules' => ['required'],
                'message' => 'Παρακαλώ συμπληρώστε την πόλη σας.',
            ],
            'phone' => [
                'rules' => ['required'],
                'message' => 'Παρακαλώ συμπληρώστε το τηλέφωνο σας.',
            ],
            'email' => [
                'rules' => ['required', 'email'],
                'message' => 'Παρακαλώ συμπληρώστε το email σας.',
            ],
            'children_number' => [
                'rules' => ['required'],
                'message' => 'Παρακαλώ συμπληρώστε τον αριθμό των παιδιών.',
            ],
            'adult_number' => [
                'rules' => ['required'],
                'message' => 'Παρακαλώ συμπληρώστε τον αριθμό των ενηλίκων.',
            ],
            'children_names' => [
                'rules' => ['required'],
                'message' => 'Παρακαλώ συμπληρώστε τα ονόματα και τις ηλικίες των παιδιών.',
            ],
            'terms' => [
                'rules' => ['required'],
                'message' => 'Πρέπει να συμφωνήσετε με τους όρους συμματοχής.',
            ],
            'gdpr' => [
                'rules' => ['required'],
                'message' => 'Πρέπει να συμφωνήσετε με την πολιτική προστασίας προσωπικών δεδομένων.',
            ],
            'tourtitle' => [],
            'formtitle' => [],
            'client_message' => []
        ], 'booking-form');
    
    } else {
        $bookingform = new Form([
            'tourdate' => [
                'rules' => ['required'],
                'message' => 'Παρακαλώ επιλέξτε ημερομηνία',
            ],
            'first_name' => [
                'rules' => ['required'],
                'message' => 'Παρακαλώ συμπληρώστε το όνομα σας.',
            ],
            'last_name' => [
                'rules' => ['required'],
                'message' => 'Παρακαλώ συμπληρώστε το επίθετο σας.',
            ],
            'address' => [
                'rules' => ['required'],
                'message' => 'Παρακαλώ συμπληρώστε τη διεύθυνση σας.',
            ],
            'city' => [
                'rules' => ['required'],
                'message' => 'Παρακαλώ συμπληρώστε την πόλη σας.',
            ],
            'phone' => [
                'rules' => ['required'],
                'message' => 'Παρακαλώ συμπληρώστε το τηλέφωνο σας.',
            ],
            'email' => [
                'rules' => ['required', 'email'],
                'message' => 'Παρακαλώ συμπληρώστε το email σας.',
            ],
            'adult_number' => [
                'rules' => ['required'],
                'message' => 'Παρακαλώ συμπληρώστε τον αριθμό των ενηλίκων.',
            ],
            'teen_number' => [],
            'terms' => [
                'rules' => ['required'],
                'message' => 'Πρέπει να συμφωνήσετε με τους όρους συμματοχής.',
            ],
            'gdpr' => [
                'rules' => ['required'],
                'message' => 'Πρέπει να συμφωνήσετε με την πολιτική προστασίας προσωπικών δεδομένων.',
            ],
            'tourtitle' => [],
            'formtitle' => [],
            'client_message' => []
        ], 'booking-form');
    
    }
    
    if ($kirby->request()->is('POST') && get('formtitle') == 'bookingform') {
    
        $dateslug = explode('__', $bookingform->data('tourdate'))[0];
        $bookingtype = explode('__', $bookingform->data('tourdate'))[1];

        $parent = kirby()->site()->pages()->find('programs')->childrenAndDrafts()->findBy('slug', $bookingform->data('tourtitle'))->childrenAndDrafts()->findBy('dirname', $dateslug);
        
        if ( !$parent->acceptsRegistrations() ) {

            $bookingstatus = 'error';
            kirby()->session()->set('booking', $bookingstatus);

            go('success');

        } else {
            
            if ( $parent->bookingStatus() == 'waiting' ) {
                $bookingstatus = 'waiting';
            } else {
                $bookingstatus = $bookingtype;
            }

            $bookingform->honeypotGuard()
            // ->sessionStoreAction(['name' => 'booking-form'])
            ->saveBookingAction()
            ->mailBookingAction()
            ->mailToTinaAction()
            ;
            
            if ($bookingform->success()) {
                kirby()->session()->set('booking', $$bookingstatus);

                go('success');
            }
            
        }


    
    }
    

    if ( param('date') ) {
        $selected_date = urldecode(param('date'));
    } elseif (get('tourdate')) {
        $selected_date = get('tourdate');
    } else {
        $selected_date = false;
    }


    return compact('bookingform', 'selected_date');
};
