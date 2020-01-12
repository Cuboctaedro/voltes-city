ΣΤΟΙΧΕΙΑ ΚΡΑΤΗΣΗΣ

<?php if ( $status == 'waiting' ): ?>
---
ΛΙΣΤΑ ΑΝΑΜΟΝΗΣ
<?php endif; ?>
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

Αριθμός ενηλίκων:
<?= $data['adult_number']; ?>
---
Αριθμός παιδιών:
<?= $data['children_number']; ?>
---
Ονόματα παιδιών:
<?= $data['children_names']; ?>
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
