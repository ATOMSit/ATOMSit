<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;
use function Sodium\add;

class PictureForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('file', Field::FILE, [

            ])
            ->add('x', Field::NUMBER)
            ->add('y', Field::NUMBER)
            ->add('width', Field::NUMBER)
            ->add('height', Field::NUMBER);
    }
}
