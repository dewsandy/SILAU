<?php
//Ensure that a session exists (just in case)
if( !session_id())
{
    session_start();
}

/**
 * Function to create and display error and success messages
 * @access public
 * @param string session name
 * @param string message
 * @param string display class
 * @return string message
 */
function flash( $name = '', $message = '', $class = '' )
{
    //We can only do something if the name isn't empty
    if( !empty( $name ) )
    {       
        //No message, create it
        if( !empty( $message ) && empty( $_SESSION[$name] ) )
        {
            if( !empty( $_SESSION[$name] ) )
            {
                unset( $_SESSION[$name] );
            }
            if( !empty( $_SESSION[$name.'_class'] ) )
            {
                unset( $_SESSION[$name.'_class'] );
            }

            $_SESSION[$name] = $message;
            $_SESSION[$name.'_class'] = $name;
        }
        //Message exists, display it
        elseif( !empty( $_SESSION[$name] ) && empty( $message ) )
        {
            // $class = !empty( $_SESSION[$name.'_class'] ) ? 'danger' : 'success';
            $class = ( $_SESSION[$name.'_class']=='gagal' ) ? 'danger' : 'success';
            echo '<div class="alert alert-'.$class.' alert-dismissable" id="msg-flash">';
            echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
            echo $_SESSION[$name].'</div>'; 
            unset($_SESSION[$name]);
            unset($_SESSION[$name.'_class']);
        }
    }
}
function current_url()
{
    $url = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
    if (isset($_GET['id'])) {
        // panjang &id= sama dg 4
        $len = 4 + strlen($_GET['id']);
        $bs = "\x08";
        $url = substr($url, 0, (strlen($url)-$len));
    }
    return $url;
    // return var_dump($_SERVER);
}

?>