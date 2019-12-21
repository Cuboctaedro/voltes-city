<?php
class ProgramPage extends Page {

    public function activeTours() {

        return $this->children()->filterBy('isCancelled', false)->filterby('isFuture', true)->sortBy('date');

    }

    public function openTours() {

        return $this->activeTours()->filterBy('acceptsRegistrations', true);

    }

    public function programType() {

        if ($this->tourtype()->exists() && $this->tourtype()->isNotEmpty()) {
            return $this->tourtype();
        } else {
            return 'children';
        }
    }

    public function tourAges() {

        if ($this->programType() == 'children') {
            return $this->ages();
        } else {
            return '18+';
        }
    }

}
