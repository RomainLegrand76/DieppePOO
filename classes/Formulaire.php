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
        $form = '<form action="index.php" method="POST">';
        foreach ($conf as $c){
            if(isset($c['name'])){
                $form .=  "<$c[assoc] for='$c[name]' id='$c[name]'>$c[name]</$c[assoc]> = <$c[tag]  type='$c[type]'  name='$c[name]'  /><br/>";
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
    }
}