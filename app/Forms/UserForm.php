<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class UserForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('first_name', Field::TEXT, [
                'rules' => 'required|min:3|max:250',
            ])
            ->add('last_name', Field::TEXT, [
                'rules' => 'required|min:3|max:250'
            ])
            ->add('email', Field::EMAIL, [
                'rules' => 'required|min:3|max:250|email'
            ])
            ->add('avatar', Field::FILE, [

            ])
            ->add('submit', Field::BUTTON_SUBMIT);
    }
}
