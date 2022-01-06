<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Libraries Templates
 *
 * This Libraries for ...
 * 
 * @package		CodeIgniter
 * @category	Libraries
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Template
{

  var $template_data = [];

  // ------------------------------------------------------------------------

  public function __construct()
  {
    // 
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------

  public function set($name, $value)
  {
    $this->template_data[$name] = $value;
  }

  public function load($template = '', $view = '', $view_data = [], $return = FALSE)
  {
    $this->CI = &get_instance();
    $this->set('contents', $this->CI->load->view($view, $view_data, TRUE));
    return $this->CI->load->view($template, $this->template_data, $return);
  }

  // ------------------------------------------------------------------------
}

/* End of file Templates.php */
/* Location: ./application/libraries/Templates.php */