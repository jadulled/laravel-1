<?php

Form::macro('boxFooterSubmit', function($route, $entity = null){
    return view('components.macros.box-footer-submit', compact('route', 'entity'));
});
