<?php

//ESERCIZIO
//Creare una funzione php che dato in input mese e anno
//mi disegna in html il calendario di quel mese
//incolonnato per giorni della settimana
//con evidenziati in colore diverso i giorni precedenti e
//successivi al mese
//e con altro colore sabati e domeniche
//elementi da usare: funzioni, cicli e fx date


//tutte le settimane hanno 7 colonne e 6 righe
//1 marzo - 1 = ultimo giorno febbraio

//cicli:
// giorni antecedenti
// mese corrente
// giorni successivi

function Calendario($mese, $anno)
{
?>
    <h1>
        <?php
        // stampo il mese per esteso e l'anno
        echo date('F', mktime(0, 0, 0, $mese, 1, $anno));
        echo " " . $anno;
        ?>
    </h1>
    <div class="calendar">
        <div class="cal_header">Lun</div>
        <div class="cal_header">Mar</div>
        <div class="cal_header">Mer</div>
        <div class="cal_header">Gio</div>
        <div class="cal_header">Ven</div>
        <div class="cal_header">Sab</div>
        <div class="cal_header">Dom</div>
        <?php
        $dataPrimoGiorno = mktime(0, 0, 0, $mese, 1, $anno);

        //giorno settimana del primo giorno del mese richiesto
        $indicePrimoGiorno = date('w', $dataPrimoGiorno);

        //numero dei giorni del mese corrente (es 28, 30, 31)
        $numGiorniMeseCorrente = date("t", $dataPrimoGiorno);

        $dataUltimoGiorno = mktime(0, 0, 0, $mese, $numGiorniMeseCorrente, $anno);

        //da 0 a 6 - da domenica a sabato
        $indiceUltimoGiorno = date('w', $dataUltimoGiorno);

        //ultimo giorno del mese precedente
        $ultimoGiornoMesePrecedente = date('j', $dataPrimoGiorno - 1);

        //stampo gli ultimi giorni del mese precedente
        for ($i = 0; $i < $indicePrimoGiorno - 1; $i++) {
        ?>
            <div class="extra_day"><?php echo $ultimoGiornoMesePrecedente - $indicePrimoGiorno + $i + 2 ?></div>
        <?php
        }

        //stampo i giorni del mese richiesto
        for ($i = 1; $i <= $numGiorniMeseCorrente; $i++) {
        ?>
            <div><?php echo $i ?></div>
        <?php
        }

        //stampo i primi giorni del mese dopo
        for ($i = 1; $i <= 7 - $indiceUltimoGiorno; $i++) {
        ?>
            <div class="extra_day"><?php echo $i ?></div>
        <?php
        }
        ?>
    </div>

    <style>
        .calendar div {
            border: 1px solid black;
        }

        .calendar {
            display: grid;
            grid-template-columns: repeat(7, 70px);
        }

        .extra_day {
            color: #ccc;
        }

        .cal_header {
            font-weight: bold;
        }
    </style>
<?php
}

//richiamo la funzione passandogli mese e anno
Calendario(6, 2022);
