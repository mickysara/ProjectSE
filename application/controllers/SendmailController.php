<?php
class SendmailController extends CI_Controller
{

    public function _construct()
    {
        parent::_construct();
    }
    public function index()
    {
        $this->load->helper('url');
        $this->load->view('Header');
        $this->load->view('Sendmail');
        $this->load->view('Footer');
    }

    public function send_email() {
        $to = ('buygameraidee@gmail.com');
        $subject = ('Test');
        $message = ('message');
       // $this->load->library('email');
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.gmail.co',
            'smtp_port' => 587, //465,
            'smtp_user' => 'systemofuniver@gmail.com',
            'smtp_pass' => '0873428415',
            'smtp_crypto' => 'tls',
            'smtp_timeout' => '20',
            'mailtype'  => 'html', 
            'charset'   => 'iso-8859-1'
        );
        $config['newline'] = "\r\n";
        $config['crlf'] = "\r\n";
        $this->load->library('email', $config);
        $this->email->from('systemofuniver@gmail.com', 'Admin');
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
    
        //$this->email->send();
        if ( ! $this->email->send()) {
            return false;
        }
        return true;
    }
}