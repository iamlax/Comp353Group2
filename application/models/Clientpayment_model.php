<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 2017-11-30
 * Time: 10:33 PM
 */

class Clientpayment_model extends CI_Model
{
    public function purchaseMP($data)
    {
        $amount = 0;
        switch ($data['membPlanId']) {
            case '1':
                $amount = 25;
                break;
            case '2':
                $amount = 50;
                break;
            case '3':
                $amount = 70;
                break;
        }
        $cardData = array(
            'cardNumber' => $data['cardNumber'],
            'cardType' => $data['cardType']
        );

        $this->db->insert('card', $cardData);

        $this->db->select('cardId');
        $this->db->from('Card');
        $this->db->where(array('cardNumber' => $cardData['cardNumber']));
        $newCardId = $query = $this->db->get()->result_array();

        $paymentData = array(
            'userID' => $data['userId'],
            'amount' => $amount,
            'cardId' => $newCardId[0]['cardId'],
            'date' => date("Y-m-d")
        );

        $this->db->insert('Payment', $paymentData);

        $newMembPlandId = intval($data['membPlanId']);

        $newPlan = array(
            'membPlanId' => $newMembPlandId
        );

        $this->db->where('userId', $data['userId']);
        $this->db->update('user', $newPlan);
        $this->session->set_userdata('membPlanId', $newMembPlandId);
    }

    public function purchasePromo($data)
    {
        $amount = 0;
        switch ($data['promoId']) {
            case '1':
                $amount = 10;
                break;
            case '2':
                $amount = 50;
                break;
            case '3':
                $amount = 90;
                break;
        }
        $cardData = array(
            'cardNumber' => $data['cardNumber'],
            'cardType' => $data['cardType']
        );

        $this->db->insert('card', $cardData);

        $this->db->select('cardId');
        $this->db->from('Card');
        $this->db->where(array('cardNumber' => $cardData['cardNumber']));
        $newCardId = $query = $this->db->get()->result_array();

        $paymentData = array(
            'userID' => $data['userId'],
            'amount' => $amount,
            'cardId' => $newCardId[0]['cardId'],
            'date' => date("Y-m-d")
        );

        $this->db->insert('Payment', $paymentData);

        $newPromoId = intval($data['promoId']);

        $newPromo = array(
            'promoId' => $newPromoId
        );

        $this->db->where('adId', $data['adId']);
        $this->db->update('advertisement', $newPromo);
    }

}