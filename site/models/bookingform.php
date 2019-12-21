<?php
class BookingformPage extends Page {


    public function isAvailable() {

        if(!$this->parent()->openTours()->isEmpty()) {
            return true;
        }

    }

    public function openTours() {

        return $this->parent()->openTours();

    }

    public function tourTitle() {

        return $this->parent()->title();

    }

}
