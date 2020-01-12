<?php 

if($page->parent()->programType() == 'children') {

    if ( $status == 'waiting' ) {
        echo site()->childrenwaitingstart();
    } else {
        echo site()->childrenbookingstart();
    }

} else {

    if ( $status == 'waiting' ) {
        echo site()->adultwaitingstart();
    } else {
        echo site()->adultbookingstart();
    }
}

?>


---
ΣΤΟΙΧΕΙΑ ΚΡΑΤΗΣΗΣ
---
Ξενάγηση:
<?= $page->parent()->title() ?>
---
Ημερομηνία:
<?= $page->longDate() ?>
---
Όνομα:
<?= $data['first_name']; ?>
---
Επώνυμο:
<?= $data['last_name']; ?>
---
Διεύθυνση:
<?= $data['address']; ?>
---
Πόλη:
<?= $data['city']; ?>
---
Τηλέφωνο:
<?= $data['phone']; ?>
---
Email:
<?= $data['email']; ?>
---
<?php if($page->parent()->programType() == 'children'): ?>
Ονόματα παιδιών:
<?= $data['children_names']; ?>
---
Αριθμός ενηλίκων:
<?= $data['adult_number']; ?>
---
Αριθμός παιδιών:
<?= $data['children_number']; ?>
---
<?php else: ?>
Αριθμός ενηλίκων:
<?= $data['adult_number']; ?>
---
Αριθμός εφήβων:
<?= $data['teen_number']; ?>
---
<?php endif; ?>
Μήνυμα:
<?=  $data['client_message']; ?>
---

ΠΛΗΡΟΦΟΡΙΕΣ
--

<?php 

if($page->parent()->programType() == 'children') {

    if ( $status == 'waiting' ) {
        echo site()->childrenwaitingend();
    } else {
        echo site()->childrenbookingend();
    }

} else {

    if ( $status == 'waiting' ) {
        echo site()->adultwaitingend();
    } else {
        echo site()->adultbookingend();
    }
}

?>
--
ΠΛΗΡΟΦΟΡΙΕΣ ΡΑΝΤΕΒΟΥ:
Βρείτε εδώ τις πληροφορίες του ραντεβού μας:
<?= url($page->parent()->url() . '/info' , ['params' => ['date' => $page->dirname()]]) ?>

---

Do Not Reply to this E-mail
Παρακαλούμε μην απαντάτε σε αυτό το μήνυμα μέσω e-mail.
Αυτή η διεύθυνση είναι αυτοματοποιημένη, χωρίς επιτήρηση και δεν μπορεί να βοηθήσει με ερωτήσεις ή αιτήματα.
Αν θέλετε να μας γράψατε παρακαλώ χρησιμοποιήστε αυτήν την διεύθυνση: info@voltes.city.
---

Βόλτες στην πόλη
Ξεναγήσεις σε μουσεία & αρχαιολογικούς χώρους για Παιδιά - Σχολεία - Ενήλικες.
Tel: 690.729.0084
Email: voltes.city@gmail.com
Website: www.voltes.city
