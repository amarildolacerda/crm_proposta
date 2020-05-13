<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mensageria extends CI_Controller {

    function __construct() {
        parent::__construct();
        if ((!session_id()) || (!$this->session->userdata('logado'))) {
            redirect(base_url() . 'index.php/login');
        }
    }

    public function index() {
        $data = $this->telegram_lib->sendmsg("Testando...");
        $data2 = $this->telegram_lib->updates();

        echo "<pre>";
        print_r($data);
        echo "<BR><BR><BR>";
        print_r($data2);

        $teste = $data2['result'];
        foreach ($teste as $value) {
            $mensagem = $value['message'];
            $chat = $mensagem['chat'];
            echo "UPDATE ID: " . $value['update_id'];
            echo "<BR>";

            echo "MENSAGEM ID: " . $mensagem['message_id'];
            echo "<BR>";

            echo "MENSAGEM DE TEXTO " . $mensagem['text'];
            echo "<BR>";

            if ($mensagem['text'] == "Ola") {
                $data = $this->telegram_lib->sendmsg("Olá, tudo bem?");
            }

            echo "ID DA CONVERSA " . $chat['id'];
            echo "<BR>";

            echo "NOME " . $chat['first_name'] . " SOBRENOME: " . $chat['last_name'];
            echo "<BR><br><br>";
        }


        die;
        $this->load->view('telegram');
    }

    public function novocadastro() {
        $data = $this->telegram_lib->sendmsg("Testando...");
        $data2 = $this->telegram_lib->updates();
    }

    public function automatico() {
        ?>
        }
        <script>
            alert("teste");
            window.onload = function () {
                $.post('<?php echo base_url(); ?>index.php/mensageria/email', {destino: "email", assunto: "post botao", mensagem: "mensagem"},
                function () {
                });
                alert("teasd");
            };

        </script>
        <?php
    }

    public function email() {
        $dadoslogin = $this->session->all_userdata();
        $this->load->config('email');
        $this->load->library('email');


        $destino = $this->input->post('destino');
        $assunto = $this->input->post('assunto');
        $mensagem = $this->input->post('mensagem');
        $from = $this->config->item('smtp_user');


        if ($destino) {
            $this->email->from($from, $dadoslogin['nome']);
            $this->email->set_newline("\r\n");
            $this->email->to($destino);
            $this->email->subject($assunto);
            $this->email->message($mensagem);
            //$this->email->attach("C:\Users\gabri\Desktop\locapas.txt");

            if ($this->email->send())
                $this->session->set_flashdata('success_msg', 'E-mail enviado com sucesso!');
            else
                show_error($this->email->print_debugger());
        }
        $this->load->view('mensageria/email');
    }

}
