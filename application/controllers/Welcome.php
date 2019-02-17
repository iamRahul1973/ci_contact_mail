<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}

    public function load_email_form()
    {
        $this->load->helper('url');
        $this->load->view('connect_mail');
	}

    public function contact_mail()
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: POST");

        // Initializing the response
        $response = new stdClass;

        $response->request = $this->input->post();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $response->status = FALSE;
            $response->response = 'Method not allowed !';
            return $this->send_response($response);
        }

        $this->load->library('form_validation');

        if ($this->form_validation->run() === FALSE) {
            $response->status = FALSE;
            $response->response = 'Invalid input given';
            $response->message = $this->form_validation->error_array();
            return $this->send_response($response);
        } else {
            $first_name = $this->input->post('first_name', TRUE);
            $last_name = $this->input->post('last_name', TRUE);
            $email = $this->input->post('email', TRUE);
            $phone = $this->input->post('phone', TRUE);
            $message = $this->input->post('message', TRUE);

            $this->load->library('email');

            $config = [
                'mailtype'      => 'html',
                'protocol'      => 'smtp',
                'charset'       => 'iso-8859-1',
                'smtp_timeout'  => 60,
                'newline'       => "\r\n",
                'validate'      => TRUE,
                'smtp_host'     => '_YOUR_HOST',
                'smtp_user'     => '_EMAIL_ADDRESS',
                'smtp_pass'     => '_PASSWORD',
                'smtp_crypto'   => 'tls',
                'smtp_port'     => 587
            ];

            $this->email->initialize($config);
            $this->email->from('_FROM_ADDRESS', '_FROM_NAME');
            $this->email->to('_TO_ADDRESS');
            $this->email->subject('_SUBJECT');

            $message = "<div style='font-family: Tahoma; padding: 20px 40px; border-radius: 19px; border: 1px solid #c9cdd1;'>" .
                "<h3>CLIENTS ARE CONNECTING WITH YOU !</h3>" .
                "<p>Hello Avanzo, {$first_name} is tried to connect with you through your website.</p>" .
                "<div>" .
                "<p>First Name : " . $first_name . "</p>" .
                "<p>Last Name : " . $last_name . "</p>" .
                "<p>Email Address : " . $email . "</p>" .
                "<p>Contact Number : " . $phone . "</p>" .
                "<p>Message : " . $message . "</p>" .
                "</div>" .
                "</div>";

            $this->email->message($message);

            if ($this->email->send()) {
                $response->status = TRUE;
                $response->response = 'Thank you for connecting with us';
                return $this->send_response($response);
            } else {
                $response->status = FALSE;
                $response->response = 'OOPS! Something went wrong !';
                $response->message = $this->email->print_debugger();
                return $this->send_response($response);
            }
        }
	}

    public function send_response($response_body)
    {
        $this->output->set_content_type('application/json');
        echo json_encode($response_body);
        return;
	}
}
