<?php

namespace Paymill\Lib\Models\Response;

/**
 * Transaction Model
 * A transaction is the charging of a credit card or a direct debit. 
 * In this case you need a new transaction object with either a valid token, payment, client + payment or 
 * preauthorization. Every transaction has a unique identifier which will be generated by Paymill to identify every 
 * transaction. You can issue/create, list and display transactions in detail. Refunds can be done in an extra entity.
 * @tutorial https://paymill.com/de-de/dokumentation/referenz/api-referenz/#document-transactions
 */
class Transaction
        extends Base
{

    /**
     * 'real' amount
     * @var string
     */
    private $_amount;

    /**
     * Returns the 'real' amount
     * @return string
     */
    public function getAmount()
    {
        return $this->_amount;
    }

    /**
     * Sets the 'real' amount for the transaction.
     * The number musst be in the smallest currency unit and will be saved as a string
     * @param string $amount
     * @return \Paymill\Lib\Models\Response\Transaction
     */
    public function setAmount($amount)
    {
        $this->_amount = $amount;
        return $this;
    }

    /**
     * origin amount
     * @var integer
     */
    private $_originAmount;

    /**
     * Returns the origin amount for the transaction.
     * @return integer
     */
    public function getOriginAmount()
    {
        return $this->_originAmount;
    }

    /**
     * Sets the origin amount for the transaction.
     * The number musst be in the smallest currency unit and will be saved as a string
     * @param integer $originAmount
     * @return \Paymill\Lib\Models\Response\Transaction
     */
    public function setOriginAmount($originAmount)
    {
        $this->_originAmount = $originAmount;
        return $this;
    }

    /**
     * Possible status values (open, closed, failed, preauth, pending, refunded, partially_refunded, chargeback)
     * @var string
     */
    private $_status;

    /**
     * Returns the transaction status
     * @return string
     */
    public function getStatus()
    {
        return $this->_status;
    }

    /**
     * Sets the transaction status
     * @param string $status
     * @return \Paymill\Lib\Models\Response\Transaction
     */
    public function setStatus($status)
    {
        $this->_status = $status;
        return $this;
    }

    /**
     * @var string 
     */
    private $_description;

    /**
     * Returns the transaction description
     * @return string
     */
    public function getDescription()
    {
        return $this->_description;
    }

    /**
     * Sets the transaction description
     * @param string $description
     * @return \Paymill\Lib\Models\Response\Transaction
     */
    public function setDescription($description)
    {
        $this->_description = $description;
        return $this;
    }

    /**
     * @var boolean
     */
    private $_livemode;

    /**
     * Returns the livemode flag of the transaction
     * @return boolean
     */
    public function getLivemode()
    {
        return $this->_livemode;
    }

    /**
     * Sets the livemode flag of the transaction
     * @param boolean $livemode
     * @return \Paymill\Lib\Models\Response\Transaction
     */
    public function setLivemode($livemode)
    {
        $this->_livemode = $livemode;
        return $this;
    }

    /**
     * @var array
     */
    private $_refunds = null;

    /**
     * Returns the refunds stored in the transaction
     * @return array|null
     */
    public function getRefunds()
    {
        return $this->_refunds;
    }

    /**
     * Sets the refunds stored in the transaction
     * @param array $refunds
     * @return \Paymill\Lib\Models\Response\Transaction
     */
    public function setRefunds($refunds)
    {
        $this->_refunds = $refunds;
        return $this;
    }

    /**
     * @var string
     */
    private $_currency;

    /**
     * Returns the currency
     * @return string
     */
    public function getCurrency()
    {
        return $this->_currency;
    }

    /**
     * Sets the currency
     * @param string $currency
     * @return \Paymill\Lib\Models\Response\Transaction
     */
    public function setCurrency($currency)
    {
        $this->_currency = $currency;
        return $this;
    }

    /**
     * Response code for transaction feedback. 20000 marks a successful transaction
     * @tutorial https://paymill.com/de-de/dokumentation/referenz/api-referenz/#document-statuscodes
     * @var integer
     */
    private $_responseCode;

    /**
     * Returns the response code (20000 marks a successful transaction)
     * @return integer
     */
    public function getResponseCode()
    {
        return $this->_responseCode;
    }

    /**
     * Sets the response code of the transaction
     * @param integer $responseCode
     * @return \Paymill\Lib\Models\Response\Transaction
     */
    public function setResponseCode($responseCode)
    {
        $this->_responseCode = $responseCode;
        return $this;
    }

    /**
     * Unique identifier of this transaction provided to the acquirer for the statements.
     * @var string 
     */
    private $_shortId;

    /**
     * Returns the short id of the transaction
     * @return string
     */
    public function getShortId()
    {
        return $this->_shortId;
    }

    /**
     * Sets the transaction short id
     * @param string $shortId
     * @return \Paymill\Lib\Models\Response\Transaction
     */
    public function setShortId($shortId)
    {
        $this->_shortId = $shortId;
        return $this;
    }

    /**
     * PAYMILL invoice where the transaction fees are charged or null.
     * @var array
     */
    private $_invoices = null;

    /**
     * Returns an array of invoices stored in the transaction
     * @return array|null
     */
    public function getInvoices()
    {
        return $this->_invoices;
    }

    /**
     * Stores an array of invoices in the transaction
     * @param array $invoices
     * @return \Paymill\Lib\Models\Response\Transaction
     */
    public function setInvoices($invoices)
    {
        $this->_invoices = $invoices;
        return $this;
    }

    /**
     * @var \Paymill\Lib\Models\Response\Payment 
     */
    private $_payment;

    /**
     * Returns the payment associated with the transaction
     * @return \Paymill\Lib\Models\Response\Payment
     */
    public function getPayment()
    {
        return $this->_payment;
    }

    /**
     * Sets the Payment for the transcation
     * @param \Paymill\Lib\Models\Response\Payment $payment
     * @return \Paymill\Lib\Models\Response\Transaction
     */
    public function setPayment($payment)
    {
        $this->_payment = $payment;
        return $this;
    }

    /**
     * @var \Paymill\Lib\Models\Response\Client
     */
    private $_client = null;

    /**
     * Returns the Client associated with the transaction. If no client is available null will be returned
     * @return \Paymill\Lib\Models\Response\Client|null
     */
    public function getClient()
    {
        return $this->_client;
    }

    /**
     * Sets the Client for the transaction
     * @param \Paymill\Lib\Models\Response\Client $client
     * @return \Paymill\Lib\Models\Response\Transaction
     */
    public function setClient($client)
    {
        $this->_client = $client;
        return $this;
    }

    /**
     * @var \Paymill\Lib\Models\Response\Preauthorization 
     */
    private $_preauthorization = null;

    /**
     * Returns the Preauthorization associated with the transaction. If no preAuth is available null will be returned
     * @return \Paymill\Lib\Models\Response\Preauthorization|null
     */
    public function getPreauthorization()
    {
        return $this->_preauthorization;
    }

    /**
     * Sets the Preauthorization for the transaction
     * @param \Paymill\Lib\Models\Response\Preauthorization $preauthorization
     * @return \Paymill\Lib\Models\Response\Transaction
     */
    public function setPreauthorization($preauthorization)
    {
        $this->_preauthorization = $preauthorization;
        return $this;
    }

    /**
     * @var array
     */
    private $_fees;

    /**
     * Returns the fee array stored in the transaction
     * @return array
     */
    public function getFees()
    {
        return $this->_fees;
    }

    /**
     * Sets the Fees array for the transaction
     * @param array $fees
     * @return \Paymill\Lib\Models\Response\Transaction

     */
    public function setFees($fees)
    {
        $this->_fees = $fees;
        return $this;
    }

    /**
     * @var integer
     */
    private $_feeAmount;

    /**
     * Returns the FeeAmount
     * Fee included in the transaction amount (set by a connected app). Mandatory if feePayment is set
     * @return integer
     */
    public function getFeeAmount()
    {
        return $this->_feeAmount;
    }

    /**
     * Sets the Fee included in the transaction amount (set by a connected app).
     * @param integer $feeAmount
     * @return \Paymill\Lib\Models\Response\Transaction
     */
    public function setFeeAmount($feeAmount)
    {
        $this->_feeAmount = $feeAmount;
        return $this;
    }

    /**
     * @var string 
     */
    private $_feePayment;

    /**
     * Returns the identifier of the payment from which the fee will be charged (creditcard-object or directdebit-object).
     * @return string
     */
    public function getFeePayment()
    {
        return $this->_feePayment;
    }

    /**
     * Sets the identifier of the payment from which the fee will be charged (creditcard-object or directdebit-object).
     * @param string $feePayment
     * @return \Paymill\Lib\Models\Response\Transaction
     */
    public function setFeePayment($feePayment)
    {
        $this->_feePayment = $feePayment;
        return $this;
    }

}