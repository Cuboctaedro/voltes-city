<?php
class TourdatePage extends Page {

    public static function hookPageCreate($page){

        // set slug according to add field title
        $page->changeSlug(Str::slug($page->date()->toDate('F jS H:i') ));
    }

    public function bookings() {

        return $this->childrenAndDrafts()->filterBy('intendedTemplate', '==', 'booking')->filterBy('isCancelled', '==', false);

    }

    public function childrenNumber() {

        $allchildrenarray = $this->bookings()->pluck('children_number');

        return array_reduce($allchildrenarray, function($carry, $item) { $carry += $item->int(); return $carry; });

    }

    public function adultsNumber() {

        $alladultsarray = $this->bookings()->pluck('adult_number');

        return array_reduce($alladultsarray, function($carry, $item) { $carry += $item->int(); return $carry; });

    }

    public function teensNumber() {

        $teensarray = $this->bookings()->pluck('teen_number');

        return array_reduce($teensarray, function($carry, $item) { $carry += $item->int(); return $carry; });

    }

    public function allowedNumber() {

        if ($this->seats()->exists() and $this->seats()->isNotEmpty()){
            return $this->seats()->int();
        } else {
            return 18;
        }

    }

    public function isCancelled() {

        if ($this->cancelled()->exists() && $this->cancelled() == 'True' ) {
            return true;
        }
    }

    public function isClosed() {


        $closingdate = $this->date()->toDate('U') + 43200;

        if (time() > $closingdate) {

            return true;

        }

    }

    public function isFull() {

        if ($this->parent()->programType() == 'children') {

            if ( $this->childrenNumber() >= $this->allowedNumber() ) {

                return true;

            }

        } else if ( $this->adultsNumber() >= $this->allowedNumber() ) {

            return true;

        }

    }

    public function isAlmost() {

        if ($this->parent()->programType() == 'children') {

            if ( $this->childrenNumber() >= $this->allowedNumber() - 8 ) {

                return true;

            }
        } else if ( $this->adultsNumber() >= $this->allowedNumber() - 8) {

            return true;

        }

    }

    public function isFuture() {

        $closingdate = $this->date()->toDate() + 43200;

        if (time() < $closingdate) {

            return true;

        }

    }

    public function acceptsRegistrations() {

        if (!$this->isCancelled() && !$this->isClosed()) {
            return true;
        }
    }

    public function tourstatus() {

        if ($this->isCancelled()) {

            return "Ακυρώθηκε";

        } elseif ($this->isClosed()) {

            return "Ολοκληρώθηκε";

        } elseif ( $this->isFull() ) {

            return "Πλήρης";

        } elseif ( $this->isAlmost() ) {

            return "Λίγες θέσεις";

        } else {

            return "Ανοικτή";

        }

    }

    public function statusCode() {

        if ( $this->isFull() ) {

            return "red";

        } elseif ( $this->isAlmost() ) {

            return "yellow";

        } else {

            return "green";

        }

    }

    public function longDate() {

        $rawdate = $this->date()->toDate('U');

        if($this->kirby()->language()->code() == 'el' ) {

            return t(date('l', $rawdate)) . ', ' . date('j', $rawdate) . ' ' . t(date('F', $rawdate)) . ', ' . $this->time();

        } else {

            return date('l', $rawdate) . ', ' . date('F', $rawdate) . ' ' . date('jS', $rawdate) . ', ' . $this->time();

        }

    }

    public function midDate() {

        $rawdate = $this->date()->toDate('U');

        if($this->kirby()->language()->code() == 'el' ) {

            return t(date('D', $rawdate)) . ', ' . date('j', $rawdate) . ' ' . t(date('M', $rawdate)) . ', ' . $this->time();

        } else {

            return date('D', $rawdate) . ', ' . date('M', $rawdate) . ' ' . date('jS', $rawdate) . ', ' . $this->time();

        }

    }

    public function shortDate() {

        $rawdate = $this->date()->toDate('U');

        if($this->kirby()->language()->code() == 'el' ) {

            return  date('d.m.y g:i', $rawdate);

        } else {

            return  date('m.d.y g:i', $rawdate);

        }

    }


}
