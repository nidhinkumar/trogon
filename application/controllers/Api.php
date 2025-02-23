<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('User_model');
        $this->load->helper('url');

    }
    public function main_page()
    {


        $this->load->view('users_view');
    }

    public function documentation()
    {


        $this->load->view('documentation');
    }

    public function get_users()
    {
        $users = $this->User_model->get_all_users();

        if (!empty($users)) {
            echo json_encode(['status' => 'success', 'data' => $users]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'No items found']);
        }
    }

    function calculate_discount($total_amount, $customer_type)
    {
        // Validate Inputs
        if (!is_numeric($total_amount) || $total_amount < 0) {
            die("Error: Total amount should be  positive number.");
        }

        if (!in_array($customer_type, ["VIP", "Regular"])) {
            die("Error: Unknown customer type. Accepted values: 'VIP' or 'Regular'.");
        }


        $discount_rate = ($customer_type == "VIP") ? 0.20 : 0.10;

        // Corrected Calculation
        $discount_value = $total_amount * $discount_rate;
        $discounted_amount = $total_amount - $discount_value;

        // Display Results
        echo "Original Amount: $" . number_format($total_amount, 2) . '<br>';
        echo "Discounted Amount: $" . number_format($discounted_amount, 2) . '<br>';
        echo "You saved: $" . number_format($discount_value, 2) . '<br>';
    }


    // function question_3(){
    //     $products=[
    //         ['id'=>1,'name'=>'keyboard','price'=>29.99,'quantity'=>100],
    //          ['id'=>2,'name'=>'Mouse','price'=>19.99,'quantity'=>150],
    //           ['id'=>3,'name'=>'Monitor','price'=>199.99,'quantity'=>80],
    //            ['id'=>4,'name'=>'Pc','price'=>749.99,'quantity'=>30],
    //             ['id'=>5,'name'=>'Headset','price'=>49.99,'quantity'=>60],
    //     ];
    // }


    function question_3()
    {
        $query = "
        
        
        SELECT 
    order_id,
    order_date,
    status,
    CASE 
        WHEN status = 'Pending' AND DATEDIFF(NOW(), order_date) <= 7 THEN 'Pending Review'
        WHEN status = 'Pending' AND DATEDIFF(NOW(), order_date) > 7 THEN 'Urgent Review'
        WHEN status = 'Processing' AND DATEDIFF(NOW(), order_date) > 10 THEN 'Delayed'
        WHEN status = 'Processing' THEN 'Processing'
        WHEN status = 'Shipped' THEN 'Shipped'
        WHEN status = 'Cancelled' THEN 'Cancelled'
  
    END AS order_category
FROM orders;




";
    }

    private function formatString($string, $rules)
    {
        foreach ($rules as $rule => $value) {
            switch ($rule) {
                case 'uppercase':
                    if ($value) {
                        $string = strtoupper($string);
                    }
                    break;
            
                case 'addPrefix':
                    $string = $value . $string;
                    break;
                case 'addSuffix':
                    $string = $string . $value;
                    break;
                case 'replace':
                    if (is_array($value) && count($value) == 2) {
                        $string = str_replace($value[0], $value[1], $string);
                    }
                    break;
            }
        }
        return $string;
    }
    public function example6()
    {
        $rules=[
            'uppercase' => true,
            'capitalize' =>true,
            'addPrefix' =>'ID: ',
             'addSuffix' => " - Have a great day!",
              'replace' => ['doe', 'david'] 
        ];

              echo $this->formatString('john doe',$rules);
    }

}
