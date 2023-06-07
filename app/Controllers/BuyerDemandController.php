<?php

namespace App\Controllers;

use App\Master\Controller;
use App\Models\BuyerDemand;

class BuyerDemandController extends Controller
{
    public function index()
    {
        return views('buyer_demand.php');
    }
    public function getReportPanel()
    {
        return views('buyer_demand_report.php');
    }
    public function getBuyerDemandData()
    {
        $demand_data = new BuyerDemand();
        $start_date = isset($_POST['start_date']) ? $_POST['start_date'] : '';
        $end_date = isset($_POST['end_date']) ? $_POST['end_date'] : '';
        $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : '';

        if (($start_date && $end_date) || $user_id) {
            $data = $demand_data->getBuyerDemandData(['start_date' => $start_date, 'end_date' => $end_date, 'user_id' => $user_id]);
            return json_encode(["data" => $data, "status" => 200,'success'=>true]);
        } else {
            return json_encode(["message" => "Please provide user id or select date range", "status" => 403,'success'=>false]);
        }
    }
    // Start Storing Data
    public function storeBuyerDemand()
    {
        //For testing purpose need to unseet cookie
        //setcookie('buyer_demand_submission', '', time() - 3600);
       // unset($_COOKIE['buyer_demand_submission']);

        if ($this->isSubmissionAllowed()) {
            // Validate and sanitize the input data
            $validatedData = $this->validateData($_POST);

            // Check if validation passed
            if (!$validatedData['success']) {
                // Return the validation errors to the frontend
                $errorMessages = implode("\n", $validatedData['errors']);
                return json_encode(['success' => false,'message'=>$errorMessages, 'errors' => $validatedData['errors']]);

            }

            // Create a new instance of the BuyerDemand model
            $buyerDemand = new BuyerDemand();

            // Store the buyer demand
            $buyerDemand->storeBuyerDemand($validatedData['data']);

            // Set a cookie to prevent further submissions within 24 hours
            $this->setSubmissionCookie();

            // Return a success message to the frontend
            echo json_encode(['success' => true, 'message' => 'Buyer demand stored successfully']);
        } else {
            // Return an error message to the frontend
            echo json_encode(['success' => false, 'message' => 'Multiple submissions not allowed within 24 hours']);
        }
    }

    private function isSubmissionAllowed()
    {
        $cookieName = 'buyer_demand_submission';
        $cookieDuration = 24 * 60 * 60; // 24 hours

        if (!isset($_COOKIE[$cookieName])) {
            return true;
        }

        $lastSubmissionTime = $_COOKIE[$cookieName];
        $currentTime = time();

        return ($currentTime - $lastSubmissionTime) >= $cookieDuration;
    }

    private function setSubmissionCookie()
    {
        $cookieName = 'buyer_demand_submission';
        $cookieValue = time();
        $cookieDuration = 24 * 60 * 60; // 24 hours

        setcookie($cookieName, $cookieValue, time() + $cookieDuration, '/');
    }

    private function validateData($data)
    {
        $validatedData = [];
        $errors = [];

        // Perform validation and sanitization for each input field
        $validatedData['amount'] = $this->validateAmount($data['amount'], $errors);
        $validatedData['buyer'] = $this->validateBuyer($data['buyer'], $errors);
        $validatedData['receipt_id'] = $this->validateReceiptId($data['receipt_id'], $errors);
        $validatedData['items'] = $this->validateItems($data['items'], $errors);
        $validatedData['buyer_email'] = $this->validateBuyerEmail($data['buyer_email'], $errors);
        $validatedData['note'] = $this->validateNote($data['note'], $errors);
        $validatedData['city'] = $this->validateCity($data['city'], $errors);
        $validatedData['phone'] = $this->validatePhone($data['phone'], $errors);
        $validatedData['entry_by'] = $this->validateEntryBy($data['entry_by'], $errors);

        // Additional validations and manipulations
        $validatedData['buyer_ip'] = $_SERVER['REMOTE_ADDR'];
        $validatedData['hash_key'] = $this->generateHashKey($validatedData['receipt_id']);
        $validatedData['entry_at'] = date('Y-m-d');

        if (count($errors) > 0) {
            return ['success' => false, 'errors' => $errors];
        }

        return ['success' => true, 'data' => $validatedData];
    }

    private function validateAmount($value, &$errors)
    {
        $value = filter_var($value, FILTER_SANITIZE_NUMBER_INT);

        if (!is_numeric($value)) {
            $errors['amount'] = 'Amount must be a numeric value';
        }

        return $value;
    }

    private function validateBuyer($value, &$errors)
    {
        $value = $this->prepareInput($value);

        if (empty($value)) {
            $errors['buyer'] = 'Buyer field is required';
        } elseif (!preg_match('/^[a-zA-Z0-9\s]+$/', $value)) {
            $errors['buyer'] = 'Buyer field allows only letters, numbers, and spaces';
        } elseif (strlen($value) > 20) {
            $errors['buyer'] = 'Buyer field should not exceed 20 characters';
        }

        return $value;
    }

    private function validateReceiptId($value, &$errors)
    {
        $value = trim($value);

        if (empty($value)) {
            $errors['receipt_id'] = 'Receipt ID field is required';
        }

        return $value;
    }

    private function validateItems($value, &$errors)
    {
        $value = $this->prepareInput($value);

        if (empty($value)) {
            $errors['items'] = 'Items field is required';
        } elseif (strlen($value) > 255) {
            $errors['items'] = 'Items field should not exceed 255 characters';
        }

        return $value;
    }

    private function validateBuyerEmail($value, &$errors)
    {
        $value = trim($value);

        if (empty($value)) {
            $errors['buyer_email'] = 'Buyer Email field is required';
        } elseif (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $errors['buyer_email'] = 'Invalid Buyer Email format';
        }

        return $value;
    }

    private function validateNote($value, &$errors)
    {
        $value = $this->prepareInput($value);

        if (empty($value)) {
            $errors['note'] = 'Note field is required';
        } elseif (str_word_count($value) > 30) {
            $errors['note'] = 'Note field should not exceed 30 words';
        }

        return $value;
    }

    private function validateCity($value, &$errors)
    {
        $value = $this->prepareInput($value);

        if (empty($value)) {
            $errors['city'] = 'City field is required';
        } elseif (!preg_match('/^[a-zA-Z\s]+$/', $value)) {
            $errors['city'] = 'City field allows only letters and spaces';
        }

        return $value;
    }

    private function validatePhone($value, &$errors)
    {
        $value = filter_var($value, FILTER_SANITIZE_NUMBER_INT);

        // Remove any leading zeros from the phone number
        $value = ltrim($value, '0');

        if (!preg_match('/^880[1-9]\d{9}$/', $value)) {
            $errors['phone'] = 'Phone field must be a valid Bangladeshi phone number';
        }

        return $value;
    }


    private function validateEntryBy($value, &$errors)
    {
        $value = filter_var($value, FILTER_SANITIZE_NUMBER_INT);

        if (!is_numeric($value)) {
            $errors['entry_by'] = 'Entry By field allows only numbers';
        }

        return $value;
    }

    private function generateHashKey($receiptId)
    {
        $salt = 'salt’ ';

        return hash('sha512', $receiptId . $salt);
    }
    private function prepareInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}