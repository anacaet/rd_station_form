<?php
    
    function AddForm(){
        echo 
        '<form action="' . esc_url( $_SERVER['REQUEST_URI'] ) . '" method="post" class="form-horizontal">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text"  name="nome" class="form-control" id="nome" required="true">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text"  name="email" class="form-control" id="email" required="true">
        </div>
        <div class="form-group">
            <label for="empresa">Empresa</label>
            <input type="text"  name="empresa" class="form-control" id="empresa">
        </div>   
        <div class="form-group">
            <label for="cargo">Cargo</label>
            <input type="text"  name="cargo" class="form-control" id="cargo">
         </div>   
        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text"  name="telefone" class="form-control" id="telefone" required="true">
        </div>    
        <div class="form-group">
            <label for="celular">Celular</label>
            <input type="text"  name="celular" class="form-control" id="celular" required="true">
        </div>    
        <div class="form-group">
            <label for="website">Website</label>
            <input type="text"  name="website" class="form-control" id="website">
        </div>
        <div class="form-group">
            <label for="twitter">Twitter</label>
            <input type="text"  name="twitter" class="form-control" id="twitter">
        </div>
        <button type="submit" class="btn btn-default" name="submit">Enviar</button>

        </form>';
    }

    function SendForm(){
        // if the submit button is clicked, send the information to the API
        if ( isset( $_POST['submit'] ) ) {

            $api_url = "http://www.rdstation.com.br/api/1.2/conversions";

            // sanitize form values
            $form_data["token_rdstation"] = esc_attr( get_option('rd_station_token'));
            $form_data["identificador"] = esc_attr( get_option('identificador'));
            $form_data["email"] = sanitize_text_field( $_POST["email"] );
            $form_data["nome"] = sanitize_text_field( $_POST["nome"] );
            $form_data["empresa"]   = sanitize_email( $_POST["empresa"] );
            $form_data["cargo"] = esc_textarea( $_POST["cargo"] );
            $form_data["telefone"] = sanitize_text_field( $_POST["telefone"] );
            $form_data["celular"]   = sanitize_email( $_POST["celular"] );
            $form_data["website"] = sanitize_text_field( $_POST["website"] );
            $form_data["twitter"] = esc_textarea( $_POST["twitter"] );


            $args = array(
            'headers' => array('Content-Type' => 'application/json'),
            'body' => json_encode($form_data)
            );

            //print_r($form_data);
            //die();

            $response = wp_remote_post( $api_url, $args );

            if (is_wp_error($response)){
                wp_die('Erro ao enviar o formulário');
                unset($form_data);
            }
            else{
                echo '<div id="message" class="updated" style="display: block;"><p>Obrigada por se registrar</p></div>';
            }
        }
    }

    function LoadForm(){
        ob_start();
        SendForm();
        AddForm();

        return ob_get_clean();
    }    

    add_shortcode( 'rdform-plugin', 'LoadForm' );
?>