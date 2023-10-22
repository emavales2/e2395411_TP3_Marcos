<?php

// ---- ERROR DISPLAY (turn off when ready to hand in project) ----
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL); 
// ---- END error display ----

require_once('Crud.php');

class ExchgPlantTransaction extends Crud {

    public $table = 'cptp3_exchange';
    public $primaryKey = 'id';

    public $fillable = [
        'exchange_id',
        'plant_id',
        'traded_for'
    ];
}

?>