<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Posyandu extends BD_Controller
{

  public function __construct()
  {
    parent::__construct();
    // $this->auth();
  }

  public function index_get()
  {
    // instantiate and use the dompdf class
    $dompdf = new Dompdf\Dompdf();
    $id = $this->input->get('id');
    // $this->load->library('pdf');
    if ($id == 1) {
      $html = $this->load->view('posyandu/posyandu_pdf', [], true);
      $dompdf->setPaper('legal', 'landscape');
      $dompdf->loadHtml($html);
      // Render the HTML as PDF
      $dompdf->render();
      // Get the generated PDF file contents
      $dompdf->output();
      // Output the generated PDF to Browser
      $dompdf->stream();
    } elseif ($id == 2) {
      $html = $this->load->view('posyandu/posyandu2_pdf', [], true);
      $dompdf->setPaper('legal', 'landscape');
      $dompdf->loadHtml($html);
      // Render the HTML as PDF
      $dompdf->render();
      // Get the generated PDF file contents
      $dompdf->output();
      // Output the generated PDF to Browser
      $dompdf->stream();
    } elseif ($id == 3) {
      $html = $this->load->view('posyandu/posyandu3_pdf', [], true);
      $dompdf->setPaper('legal', 'landscape');
      $dompdf->loadHtml($html);
      // Render the HTML as PDF
      $dompdf->render();
      // Get the generated PDF file contents
      $dompdf->output();
      // Output the generated PDF to Browser
      $dompdf->stream();
    } else {
      $html = $this->load->view('posyandu/posyandu_pdf', [], true);
      $dompdf->setPaper('legal', 'landscape');
      $dompdf->loadHtml($html);
      // Render the HTML as PDF
      $dompdf->render();
      // Get the generated PDF file contents
      $dompdf->output();
      // Output the generated PDF to Browser
      $dompdf->stream();
    }
  }
}
