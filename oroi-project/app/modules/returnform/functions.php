<?php

function makeReturnForm() {
    global $html;

    if (isset($_SESSION['second_return_form']) && $_SESSION['second_return_form'] == true) {
        return makeSecondReturnForm($_SESSION['returnform_postdata']);
    }

    $fields = array(
        'revenue' => makeInput('revenue', 'text', 'Gewenste omzet per maand', null, '&euro; 100.000'),
         'margin' => makeInput('margin', 'select', 'Marge', null, null, array('greatherthan' => '&gt; 15&percnt;', 'lessthan' => '&lt; 15&percnt;')),
          'worth' => makeInput('worth', 'text', 'Gewenste bestel waarde', null, '&euro; 100'),
'conversion_rate' => makeInput('conversion_rate', 'text', 'Conversiepercentage', 'percentage', '1'),
      'dont_know' => makeInput('dont_know', 'checkbox', 'Weet ik niet'),
        'webshop' => makeInput('webshop', 'text', 'URL webshop', null, 'webshop.nl'),
          'email' => makeInput('email', 'text', 'E-mailadres', null, 'info@webshop.nl'),
     'newsletter' => makeInput('newsletter', 'checkbox', 'Ja, ik wil mij graag inschrijven voor de nieuwsbrief'),
   'Search_terms' => makeInput('search_terms', 'multyple_input', 'Zoektermen', null, null, array(
                        'search_term_1' => makeInput('search_term_1', 'text', null, 'multyple'),
                        'search_term_2' => makeInput('search_term_2', 'text', null, 'multyple'),
                        'search_term_3' => makeInput('search_term_3', 'text', null, 'multyple'),
                        'search_term_4' => makeInput('search_term_4', 'text', null, 'multyple'),
                        'search_term_5' => makeInput('search_term_5', 'text', null, 'multyple')
                     ))
    );

    return $html->render('returnform/form',array(
        'fields' => $fields
    ));
}

function makeSecondReturnForm($postdata) {
    global $html;

    if (empty($postdata)) {
        return;
    }

    $fields = array(
        'direct' => makeInput('direct', 'text', 'direct', 'percentage', '20'),
        'google' => makeInput('google', 'text', 'Google', 'percentage', '25'),
        'adwords' => makeInput('adwords', 'text', 'AdWords', 'percentage', '35'),
        'site_payed' => makeInput('site_payed', 'text', 'Verwijzende sites, betaald', 'percentage', '10'),
        'site_unpayed' => makeInput('site_unpayed', 'text', 'onbetaald', 'percentage', '10'),
        'remaining' => makeInput('remaining', 'text', 'Overig', 'percentage', 0),
        'conversion' => makeInput('conversion', 'text', 'Conversiepercentage', 'percentage', (!empty($postdata['conversion_rate']) ? $postdata['conversion_rate'] :(!empty($postdata['dont_know']) ? '1' : null))),
        'average_order_worth' => makeInput('average_order_worth', 'text', 'Gemiddelde bestel waarde', 'euro', (!empty($postdata['worth']) ? $postdata['worth'] : '100')),
        'goal' => makeInput('goal', 'text', 'Doelstelling/omzet per maand', 'euro', (!empty($postdata['revenue']) ? $postdata['revenue'] : '100.000')),
        'margin_goal' => makeInput('margin_goal', 'select', 'marge', null, (!empty($postdata['margin']) ? 'check for options' : null)),
        'budget_marketing' => makeInput('budget_marketing', 'text', 'Budget marketing', 'percentage', null)
    );

    return $html->render('returnform/secondform', array(
        'fields' => $fields
    ));
}

function makeInput($name, $type, $label, $class= null, $placeholder = null, $options = null) {
    $field = array(
        'type' => $type,
        'name' => $name,
       'label' => $label,
          'id' => $name,
       'class' => $class,
 'placeholder' => (!empty($placeholder) ? $placeholder : null),
     'options' => (!empty($options) ? $options : null)
    );

    return $field;
}