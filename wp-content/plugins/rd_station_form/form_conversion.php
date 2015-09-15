<?php
    function AddForm(){
        echo 
        '<form action="' . esc_url( $_SERVER['REQUEST_URI'] ) . '" method="post">
        Nome: <input type="text"  name="nome" ><br>
        Email: <input type="text"  name="email"><br>
        Empresa: <input type="text"  name="empresa"><br>
        Cargo: <input type="text"  name="cargo"><br>
        Telefone: <input type="text"  name="telefone"><br>
        Celular: <input type="text"  name="celular"><br>
        Website: <input type="text"  name="website"><br>
        Twitter: <input type="text"  name="twitter"><br>
        <input type="submit" name="submitt" value="Enviar"/>
        </form>';
    }

    function SendForm(){
        // if the submit button is clicked, send the information to the API
        if ( isset( $_POST['submitt'] ) ) {

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

    add_shortcode( 'rd-plugin', 'LoadForm' );
?>