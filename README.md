# tiny-php-template
Simplest tiny PHP template | Smallest and easy to use PHP in template anywhere

Simple tiny php template
 
 * Important USE that code if you need to enable php in text {{ PHP CODE; }} or {{ PHP CODE }}
 * Include this file or wrap in function to use in any place php code
 * Pass $input with php blocks code {{ }} and that execute code inside in one time
 * You can use blocks and combine it with non php {{ if( 1 == 1 ): }} SHOW {{ endif }}
 * with spaces or without same with loops and other blocks
 * {{=$some_var}} makes <?php echo $some_var; ?>
 * You can add or remove ';' at the end of block it will be added after excepts ':' '{' '}'
 * remove '$to_eval = str_replace(array('<p>','</p>'),'',$to_eval);' if you dont need to strip <p> which most wysiwyg editors adds

