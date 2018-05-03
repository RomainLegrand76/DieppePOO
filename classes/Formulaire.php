<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 27/04/2018
 * Time: 16:28
 */


class Formulaire
{
    public $path;
    public $file;

    public function __construct($f)
    {
        $this->file = $f;
    }

    public function frmGenerate()
    {
        $conf = parse_ini_file($this->file . ".ini", true);
        $form = '<form action="form.php" method="POST">';
        foreach ($conf as $c){
            if(isset($c['name'])){
                if(isset($c['assoc'])){
                    $form .=  "<$c[assoc] for='$c[name]' id='$c[name]'>$c[name]</$c[assoc]> = <$c[tag]  type='$c[type]'  name='$c[name]'  /><br/>";
                }
                else{
                    $form .=  "<$c[tag]  type='$c[type]'  name='$c[name]'  /><br/>";
                }
            }
            else{
                $form .=  "<$c[tag]  type='$c[type]'  value='$c[value]' /><br/>";
            }

        }
        $form .= '</form>';
        return $form;
    }

    public function frmCheck()
    {
        $conf = parse_ini_file($this->path . $this->file . ".ini", true);

        $hiddenFieldName = array_key_exists('5th_item', $conf) ? $conf['5th_item']['name'] : false;

        var_dump($hiddenFieldName);
        if (isset($_POST[$hiddenFieldName])) {
            $errors = array();
            foreach($conf as $content) {
                if (isset($content['name']) && $content['name'] != "hiddenField") {
                    $value = $content['name'];
                    $$value = $_POST[$value];
                    if(!empty($_POST[$content['name']])){
                        if(isset($content['pattern'])){
                            if(filter_var($$value, $content['pattern']) === false){
                                array_push($errors,"Erreur de validation de la variable" . $content['name']);
                            }
                        }
                    }
                }
            }
            if(count($errors ) === 0){
                echo "Pas d'erreur";
            }
            else{
                var_dump($errors);
            }
        }
        else {
            return false;
        }
    }
}



