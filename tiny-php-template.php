<?php
/**
 * Simplest tiny PHP template | Smallest and easy to use PHP in template anywhere
 * @author m4gz
 * @email maxim@inbox.ru
 * @github https://github.com/m4gz/tiny-php-template
 */
/**
 *
 * Simple tiny php template
 *
 * Important USE that code if you need to enable php in text {{ PHP CODE; }} or {{ PHP CODE }}
 * Include this file or wrap in function to use in any place php code
 * Pass $input with php blocks code {{ }} and that execute code inside in one time
 * You can use blocks and combine it with non php {{ if( 1 == 1 ): }} SHOW {{ endif }}
 * with spaces or without same with loops and other blocks
 * {{=$some_var}} makes <?php echo $some_var; ?>
 * You can add or remove ';' at the end of block it will be added after excepts ':' '{' '}'
 * remove $to_eval = str_replace(array('<p>','</p>'),'',$to_eval); if you dont need to strip <p> which most wysiwyg editors adds
 *
 **/

preg_match_all('/{{(.*?)\}}/s', $input, $matches);
$done_code = array();
if(!empty($matches)) {
    foreach ($matches[1] as $code) {

        $to_eval = trim($code);

        $to_eval = str_replace(array('<p>','</p>'),'',$to_eval);

        $last_char = substr($to_eval, -1);
        if($last_char != ';' && $last_char != ':' && $last_char != '{' && $last_char != '}') {
            $to_eval .= ';';
        }

        if(substr($to_eval, 0, 1) == '=') {
            $to_eval = 'echo '. substr($to_eval, 1);;
        }

        $to_eval = "<?php $to_eval ?>";

        $done_code[] = $to_eval;
    }

    $input =  str_replace($matches[0], $done_code, $input);
    ob_start();

    @eval('?>'. $input);

    $input =  ob_get_clean();
}

/**
 * Pass as input and then return
 * Don't use as single function, else current variables scopes will be lost.
 */

