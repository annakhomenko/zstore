<?php

namespace App\Entity\Doc;

use \App\Entity\MoneyFund;
use \App\Entity\Pay;
use \App\Helper as H;

/**
 * Класс-сущность  документ расходный
 *
 */
class OutcomeMoney extends Document {

    public function Execute() {


        Pay::addPayment($this->document_id, 0 - $this->amount, $this->headerdata['mffrom'], notes);


        return true;
    }

    public function generateReport() {


        $header = array(
            'amount' => $this->amount,
            'date' => date('d.m.Y', $this->document_date),
            "notes" => $this->notes,
            "from" => $this->headerdata["mffromname"],
            "document_number" => $this->document_number
        );
        $report = new \App\Report('outcomemoney.tpl');

        $html = $report->generate($header);

        return $html;
    }

}