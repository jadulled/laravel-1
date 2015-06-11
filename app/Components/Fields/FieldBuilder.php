<?php

namespace App\Components\Fields;

use Collective\Html\FormBuilder as Form;
use Illuminate\View\Factory as View;
use Illuminate\Session\Store as Session;


class FieldBuilder
{

    protected $form;
    protected $view;
    protected $session;

    protected $defaultClass = [
        'default' => 'form-control',
        'checkbox' => '',
        'file' => ''
    ];

    public function __construct(Form $form, View $view, Session $session)
    {
        $this->form = $form;
        $this->view = $view;
        $this->session = $session;
    }

    public function getDefaultClass($type)
    {
        if (isset ($this->defaultClass[$type]))
        {
            return $this->defaultClass[$type];
        }

        return $this->defaultClass['default'];
    }

    public function buildCssClasses($type, &$attributes)
    {
        $defaultClasses = $this->getDefaultClass($type);

        if (isset ($attributes['class']))
        {
            $attributes['class'] .= ' ' . $defaultClasses;
        }
        else
        {
            $attributes['class'] = $defaultClasses;
        }
    }

    public function buildLabel($name)
    {
        if (\Lang::has('validation.attributes.' . $name))
        {
            $label = \Lang::get('validation.attributes.' . $name);
        }
        else
        {
            $label = str_replace('_', ' ', $name);
        }

        return ucfirst($label);
    }

    public function buildControl($type, $name, $value = null, $attributes = array(), $options = array())
    {

        switch ($type)
        {
            case 'select':
                $options = array('' => 'Seleccione') + $options;
                return $this->form->select($name, $options, $value, $attributes);
            case 'selectYesNo':
                $options = array('' => 'Select', '1' => 'Yes', '0' => 'No');
                return $this->form->select($name, $options, $value, $attributes);
            case 'password':
                return $this->form->password($name, $attributes);
            case 'checkbox':
                return $this->form->checkbox($name, $value, isset($attributes['checked']), $attributes);
            case 'textarea':
                return $this->form->textarea($name, $value, $attributes);
            case 'number':
                return $this->form->number($name, $value, $attributes);
            case 'radio':
                return $this->form->radio($name, $value, $attributes);
            default:
                return $this->form->input($type, $name, $value, $attributes);
        }
    }

    public function buildError($name)
    {
        $error = null;
        if ($this->session->has('errors'))
        {
            $errors = $this->session->get('errors');

            if ($errors->has($name))
            {
                $error = $errors->first($name);
            }
        }
        return $error;
    }

    public function buildTemplate($type)
    {
        if(ends_with($type, 'Group'))
        {
            return 'components/fields/input_group';
        }
        else if (\File::exists(base_path().'/resources/views/components/fields/' . $type . '.blade.php'))
        {
            return 'components/fields/' . $type;
        }
        return 'components/fields/default';
    }

    public function input($type, $name, $value = null, $attributes = array(), $options = array())
    {
        $this->buildCssClasses($type, $attributes);

        $icon = '';

        if(isset($attributes['icon']))
        {
            $icon = $attributes['icon'];
            unset($attributes['icon']);
        }

        $label = $this->buildLabel($name);
        $control = $this->buildControl($type, $name, $value, $attributes, $options);
        $error = $this->buildError($name);
        $template = $this->buildTemplate($type);
        return $this->view->make($template, compact ('name', 'label', 'control', 'error', 'icon'));
    }

    public function password($name, $attributes = array())
    {
        return $this->input('password', $name, null, $attributes);
    }

    public function date($name)
    {
        $attributes = ['data-inputmask' => '\'alias\': \'dd/mm/yyyy\'', 'data-mask' => 'datemask'];
        return $this->input('date-input', $name, null, $attributes);
    }

    public function phone($name)
    {
        $attributes = ['data-inputmask' => '"mask": "(999) 999-9999"', 'data-mask' => ''];
        return $this->input('phone-input', $name, null, $attributes);
    }

    public function time($name)
    {
        $attributes = ['class' => 'timepicker'];
        return $this->input('time-input', $name, null, $attributes);
    }

    public function hidden($name, $value = null, $attributes)
    {
        return $this->input('hidden', $name, $value, $attributes);
    }

    public function email($name, $attributes = array())
    {
        return $this->input('email-input', $name, null, $attributes);
    }

    public function select($name, $options, $value = null, $attributes = array())
    {
        return $this->input('select', $name, $value, $attributes, $options);
    }

    public function __call($method, $params)
    {
        array_unshift($params, $method);
        return call_user_func_array([$this, 'input'], $params);
    }
} 