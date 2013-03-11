<?php
require_once 'SplClassLoader.php';

$ClassLoader=new SplClassLoader('JasonKaz\FormBuild', '/vendor');
$ClassLoader->register();

use JasonKaz\FormBuild\Form as Form;
use JasonKaz\FormBuild\Text as Text;
use JasonKaz\FormBuild\Help as Help;
use JasonKaz\FormBuild\Checkbox as Checkbox;
use JasonKaz\FormBuild\Submit as Submit;
use JasonKaz\FormBuild\Password as Password;
use JasonKaz\FormBuild\Select as Select;
use JasonKaz\FormBuild\Radio as Radio;			
use JasonKaz\FormBuild\Button as Button;		
use JasonKaz\FormBuild\Reset as Reset;
use JasonKaz\FormBuild\Custom as Custom;
use JasonKaz\FormBuild\Textarea as Textarea;
use JasonKaz\FormBuild\Hidden as Hidden;
use JasonKaz\FormBuild\Email as Email;
?>
