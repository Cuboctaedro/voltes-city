<?php

namespace Uniform\Actions;

use Kirby\Cms\App;

class SaveBookingAction extends Action
{
    public function perform()
    {
        $kirby = kirby();
        $kirby->impersonate('kirby');

        $parent = $kirby->site()->pages()->find('programs')->childrenAndDrafts()->findBy('slug', $this->form->data('tourtitle'))->childrenAndDrafts()->findBy('dirname', $this->form->data('tourdate'));

        $slug = url_slug($this->form->data('first_name')) . '-' . url_slug($this->form->data('last_name')) . '-' . microtime();

        if($parent->isFull() == true) {
            $bookingtype = 'waiting';
        } else {
            $bookingtype = 'booked';
        }
        try {
            $parent->createChild([
                'slug'     => $slug,
                'template' => 'booking',
                'content'  => [
                    'first_name'      => $this->form->data('first_name'),
                    'last_name'       => $this->form->data('last_name'),
                    'address'         => $this->form->data('address'),
                    'city'            => $this->form->data('city'),
                    'phone'           => $this->form->data('phone'),
                    'email'           => $this->form->data('email'),
                    'children_number' => $this->form->data('children_number'),
                    'teen_number'     => $this->form->data('teen_number'),
                    'adult_number'    => $this->form->data('adult_number'),
                    'children_names'  => $this->form->data('children_names'),
                    'client_message'  => $this->form->data('client_message'),
                    'booking_type'    => $bookingtype,
                    'booking_time'    => date('r'),
                ]
            ]);

        } catch (\Exception $e) {
            $this->fail($e->getMessage());
        }
    }
}

class MailBookingAction extends Action {

    public function perform() {
        $kirby = kirby();
        $receiver = $this->form->data('email');

        try {
            $kirby->email( [
                'to'       => $receiver,
                'from'     => env('EMAIL_SENDER'),
                'subject'  => 'Η κράτηση σας στο Βόλτες στην Πόλη',
                'template' => 'toclient',
                'data'     => [
                    'data' => $this->form->data(),
                    'page' => $kirby->site()->pages()->find('programs')->childrenAndDrafts()->findBy('slug', $this->form->data('tourtitle'))->childrenAndDrafts()->findBy('dirname', $this->form->data('tourdate'))
                 ]
            ]);
        } catch (Exception $error) {
            echo $error;
        }
    }
}

class MailToTinaAction extends Action {

    public function perform() {
        $kirby = kirby();
        $page = $kirby->site()->pages()->find('programs')->childrenAndDrafts()->findBy('slug', $this->form->data('tourtitle'))->childrenAndDrafts()->findBy('dirname', $this->form->data('tourdate'));

        if ($page->parent()->tourtype() == 'adults') {
            $receiver = env('EMAIL_RECEIVER_ADULT');
        } else {
            $receiver = env('EMAIL_RECEIVER_KIDS');
        }

        $tourtitle = $kirby->site()->pages()->find('programs')->childrenAndDrafts()->findBy('slug', $this->form->data('tourtitle'))->title();

        $tourdate = $kirby->site()->pages()->find('programs')->childrenAndDrafts()->findBy('slug', $this->form->data('tourtitle'))->childrenAndDrafts()->findBy('dirname', $this->form->data('tourdate'))->shortDate();

        try {
            $kirby->email( [
                'subject'  => 'Booking: ' . $tourtitle . ' - ' . $tourdate . ' - ' . $this->form->data('last_name'),
                'template' => 'totina',
                'from'     => env('EMAIL_SENDER'),
                'to'       => $receiver,
                'data'     => [
                    'data' => $this->form->data(),
                    'page' => $kirby->site()->pages()->find('programs')->childrenAndDrafts()->findBy('slug', $this->form->data('tourtitle'))->childrenAndDrafts()->findBy('dirname', $this->form->data('tourdate'))
                 ]
            ]);
        } catch (Exception $error) {
            echo $error;
        }
    }
}


class MailContactAction extends Action {

    public function perform() {
        $kirby = kirby();

        try {
            $kirby->email( [
                'template' => 'contact',
                'from'     => env('EMAIL_SENDER') ,
                'to'       => env('EMAIL_RECEIVER'),
                'subject'  => 'Μηνυμα απο φόρμα επικοινωνίας',
                'data'     => [
                    'data' => $this->form->data()
                 ]
            ]);
        } catch (Exception $error) {
            echo $error;
        }

    }

}


class MailSubscriptionAction extends Action {

    public function perform() {
        $kirby = kirby();

        try {
            $kirby->email( [
                'template' => 'newsletter',
                'from'     => env('EMAIL_SENDER'),
                'subject'  => 'Εγγραφή στο newsletter',
                'to'       => env('EMAIL_RECEIVER'),
                'data'     => [
                    'data' => $this->form->data()
                 ]
            ]);
        } catch (Exception $error) {
            echo $error;
        }
    }

}
